<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GoogleDriveAccount;
use App\Services\GoogleDriveService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class AdminDriveAccountController extends Controller
{
    public function __construct(
        protected GoogleDriveService $driveService
    ) {}

    /**
     * Display a listing of Google Drive accounts.
     */
    public function index(Request $request): Response
    {
        $search = $request->string('search')->trim()->toString();
        $status = $request->string('status')->trim()->toString();

        $accounts = GoogleDriveAccount::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('client_id', 'like', "%{$search}%");
                });
            })
            ->when($status === 'active', fn ($query) => $query->where('is_active', true))
            ->when($status === 'inactive', fn ($query) => $query->where('is_active', false))
            ->orderBy('priority', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(15)
            ->withQueryString()
            ->through(fn (GoogleDriveAccount $account) => [
                'id' => $account->id,
                'name' => $account->name,
                'email' => $account->email,
                'client_id' => $account->client_id,
                'client_secret' => $account->client_secret,
                'refresh_token' => $account->refresh_token,
                'is_active' => $account->is_active,
                'priority' => $account->priority,
                'total_storage_bytes' => $account->total_storage_bytes,
                'used_storage_bytes' => $account->used_storage_bytes,
                'available_storage_bytes' => $account->getAvailableStorage(),
                'last_synced_at' => $account->last_synced_at?->toISOString(),
                'created_at' => $account->created_at?->toISOString(),
            ]);

        $aggregatePool = $this->driveService->getAggregatePoolStorage();

        return Inertia::render('admin/drive-accounts/Index', [
            'accounts' => $accounts,
            'pool' => $aggregatePool,
            'filters' => [
                'search' => $search,
                'status' => $status,
            ],
        ]);
    }

    /**
     * Store a newly created Google Drive account.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'client_id' => ['required', 'string'],
            'client_secret' => ['required', 'string'],
            'refresh_token' => ['required', 'string'],
            'priority' => ['nullable', 'integer', 'min:1', 'max:100'],
            'is_active' => ['boolean'],
        ]);

        $account = GoogleDriveAccount::create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'client_id' => $validated['client_id'],
            'client_secret' => $validated['client_secret'],
            'refresh_token' => $validated['refresh_token'],
            'priority' => $validated['priority'] ?? (GoogleDriveAccount::max('priority') ?? 0) + 1,
            'is_active' => $validated['is_active'] ?? true,
        ]);

        // Attempt initial quota sync in background
        try {
            $this->driveService->syncAccountQuota($account);
        } catch (Throwable) {
            // Ignore initial sync failure
        }

        return back()->with('status', 'Google Drive account added successfully.');
    }

    /**
     * Update the specified Google Drive account.
     */
    public function update(Request $request, GoogleDriveAccount $driveAccount): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'client_id' => ['required', 'string'],
            'client_secret' => ['nullable', 'string'],
            'refresh_token' => ['nullable', 'string'],
            'priority' => ['nullable', 'integer', 'min:1', 'max:100'],
            'is_active' => ['boolean'],
        ]);

        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'client_id' => $validated['client_id'],
            'priority' => $validated['priority'] ?? $driveAccount->priority,
            'is_active' => $validated['is_active'] ?? $driveAccount->is_active,
        ];

        if (! empty($validated['client_secret'])) {
            $updateData['client_secret'] = $validated['client_secret'];
        }

        if (! empty($validated['refresh_token'])) {
            $updateData['refresh_token'] = $validated['refresh_token'];
        }

        $driveAccount->update($updateData);

        return back()->with('status', "Google Drive account '{$driveAccount->name}' updated successfully.");
    }

    /**
     * Update priority order of accounts.
     */
    public function updatePriority(Request $request, GoogleDriveAccount $driveAccount): RedirectResponse
    {
        $validated = $request->validate([
            'priority' => ['required', 'integer', 'min:1', 'max:100'],
        ]);

        $driveAccount->update(['priority' => $validated['priority']]);

        return back()->with('status', "Priority for '{$driveAccount->name}' set to {$validated['priority']}.");
    }

    /**
     * Synchronize storage quota from Google API for a single account.
     */
    public function syncQuota(GoogleDriveAccount $driveAccount): RedirectResponse
    {
        try {
            $result = $this->driveService->syncAccountQuota($driveAccount);

            return back()->with('status', "Storage quota synced for '{$driveAccount->name}'.");
        } catch (Throwable $e) {
            return back()->with('error', "Failed syncing quota: {$e->getMessage()}");
        }
    }

    /**
     * Synchronize storage quota for all active accounts.
     */
    public function syncAllQuotas(): RedirectResponse
    {
        $accounts = GoogleDriveAccount::where('is_active', true)->get();
        $synced = 0;
        $failed = 0;

        foreach ($accounts as $account) {
            try {
                $this->driveService->syncAccountQuota($account);
                $synced++;
            } catch (Throwable) {
                $failed++;
            }
        }

        return back()->with('status', "Synced storage quota for {$synced} accounts".($failed > 0 ? " ({$failed} failed)" : '').'.');
    }

    /**
     * Toggle active status for the specified Google Drive account.
     */
    public function toggleStatus(GoogleDriveAccount $driveAccount): RedirectResponse
    {
        $driveAccount->update([
            'is_active' => ! $driveAccount->is_active,
        ]);

        $stateText = $driveAccount->is_active ? 'activated' : 'deactivated';

        return back()->with('status', "Google Drive account '{$driveAccount->name}' {$stateText}.");
    }

    /**
     * Remove the specified Google Drive account.
     */
    public function destroy(GoogleDriveAccount $driveAccount): RedirectResponse
    {
        $driveAccount->delete();

        return back()->with('status', "Google Drive account '{$driveAccount->name}' deleted successfully.");
    }

    /**
     * Test connection for an existing Google Drive account.
     */
    public function test(GoogleDriveAccount $driveAccount): JsonResponse
    {
        $result = $driveAccount->testConnection();

        return response()->json($result);
    }

    /**
     * Test connection using provided raw credentials.
     */
    public function testCredentials(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'client_id' => ['required', 'string'],
            'client_secret' => ['required', 'string'],
            'refresh_token' => ['required', 'string'],
        ]);

        $result = GoogleDriveAccount::verifyCredentials(
            $validated['client_id'],
            $validated['client_secret'],
            $validated['refresh_token']
        );

        return response()->json($result);
    }
}
