<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class SubscriptionPlanController extends Controller
{
    /**
     * Display a listing of subscription plans.
     */
    public function index(): Response
    {
        $plans = SubscriptionPlan::query()
            ->withCount(['subscriptions as active_subscribers_count' => function ($query) {
                $query->where('status', 'active');
            }])
            ->orderBy('sort_order')
            ->get();

        return Inertia::render('admin/subscriptions/Plans', [
            'plans' => $plans,
        ]);
    }

    /**
     * Store a newly created subscription plan.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatePlan($request);
        $validated['slug'] = Str::slug($validated['slug'] ?? $validated['name']);

        SubscriptionPlan::query()->create($validated);

        return back()->with('status', 'Subscription plan created successfully.');
    }

    /**
     * Update the specified subscription plan.
     */
    public function update(Request $request, SubscriptionPlan $subscriptionPlan): RedirectResponse
    {
        $validated = $this->validatePlan($request, $subscriptionPlan->id);
        $validated['slug'] = Str::slug($validated['slug'] ?? $validated['name']);

        $subscriptionPlan->update($validated);

        return back()->with('status', "Subscription plan '{$subscriptionPlan->name}' updated successfully.");
    }

    /**
     * Toggle the active status of a subscription plan.
     */
    public function toggleStatus(SubscriptionPlan $subscriptionPlan): RedirectResponse
    {
        $subscriptionPlan->update(['is_active' => ! $subscriptionPlan->is_active]);

        $status = $subscriptionPlan->is_active ? 'activated' : 'deactivated';

        return back()->with('status', "Subscription plan '{$subscriptionPlan->name}' {$status}.");
    }

    /**
     * Remove the specified subscription plan.
     */
    public function destroy(SubscriptionPlan $subscriptionPlan): RedirectResponse
    {
        if ($subscriptionPlan->subscriptions()->where('status', 'active')->exists()) {
            return back()->with('error', 'Cannot delete a plan with active subscribers.');
        }

        $subscriptionPlan->delete();

        return back()->with('status', 'Subscription plan deleted successfully.');
    }

    /**
     * Validate the incoming plan request.
     *
     * @return array<string, mixed>
     */
    protected function validatePlan(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('subscription_plans', 'slug')->ignore($ignoreId),
            ],
            'description' => ['nullable', 'string', 'max:1000'],
            'price' => ['required', 'numeric', 'min:0'],
            'currency' => ['required', 'string', 'size:3'],
            'interval' => ['required', Rule::in(['month', 'year'])],
            'paypal_plan_id' => ['nullable', 'string', 'max:255'],
            'storage_gb' => ['nullable', 'integer', 'min:1'],
            'features' => ['nullable', 'array'],
            'features.*' => ['string', 'max:255'],
            'is_active' => ['required', 'boolean'],
            'is_featured' => ['required', 'boolean'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);
    }
}
