<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of all user subscriptions.
     */
    public function index(Request $request): Response
    {
        $status = $request->string('status')->trim()->toString();
        $search = $request->string('search')->trim()->toString();

        $subscriptions = Subscription::query()
            ->with(['user:id,name,email', 'plan:id,name,interval'])
            ->when($status !== '', fn ($query) => $query->where('status', $status))
            ->when($search !== '', function ($query) use ($search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return Inertia::render('admin/subscriptions/Index', [
            'subscriptions' => $subscriptions,
            'filters' => [
                'status' => $status,
                'search' => $search,
            ],
            'stats' => [
                'activeCount' => Subscription::query()->where('status', 'active')->count(),
                'cancelledCount' => Subscription::query()->where('status', 'cancelled')->count(),
                'expiredCount' => Subscription::query()->where('status', 'expired')->count(),
            ],
        ]);
    }

    /**
     * Cancel a user's subscription from the admin panel.
     */
    public function cancel(Subscription $subscription): RedirectResponse
    {
        $subscription->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
        ]);

        return back()->with('status', 'Subscription cancelled successfully.');
    }
}
