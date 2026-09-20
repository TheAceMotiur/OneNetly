<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use App\Services\PayPalSubscriptionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class MonetizationSettingsController extends Controller
{
    /**
     * Display the monetization (PayPal + AdSense) settings form.
     */
    public function edit(): Response
    {
        $settings = AppSetting::current();

        return Inertia::render('admin/settings/Monetization', [
            'settings' => [
                'paypal_mode' => $settings->paypal_mode,
                'paypal_client_id' => $settings->paypal_client_id,
                'paypal_has_secret' => filled($settings->paypal_client_secret),
                'paypal_receiver_email' => $settings->paypal_receiver_email,
                'adsense_client_id' => $settings->adsense_client_id,
                'adsense_enabled' => $settings->adsense_enabled,
                'adsense_auto_ads' => $settings->adsense_auto_ads,
                'adsense_slot_header' => $settings->adsense_slot_header,
                'adsense_slot_infeed' => $settings->adsense_slot_infeed,
            ],
        ]);
    }

    /**
     * Update the PayPal settings.
     */
    public function updatePaypal(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'paypal_mode' => ['required', Rule::in(['sandbox', 'live'])],
            'paypal_client_id' => ['nullable', 'string', 'max:255'],
            'paypal_client_secret' => ['nullable', 'string', 'max:255'],
            'paypal_receiver_email' => ['nullable', 'email', 'max:255'],
        ]);

        $settings = AppSetting::current();

        if (blank($validated['paypal_client_secret'])) {
            unset($validated['paypal_client_secret']);
        }

        $settings->update($validated);

        return back()->with('status', 'PayPal settings updated successfully.');
    }

    /**
     * Update the AdSense settings.
     */
    public function updateAdsense(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'adsense_client_id' => ['nullable', 'string', 'max:255'],
            'adsense_enabled' => ['required', 'boolean'],
            'adsense_auto_ads' => ['required', 'boolean'],
            'adsense_slot_header' => ['nullable', 'string', 'max:255'],
            'adsense_slot_infeed' => ['nullable', 'string', 'max:255'],
        ]);

        AppSetting::current()->update($validated);

        return back()->with('status', 'AdSense settings updated successfully.');
    }

    /**
     * Test the PayPal credentials without saving them.
     */
    public function testPaypal(Request $request, PayPalSubscriptionService $payPal): JsonResponse
    {
        $validated = $request->validate([
            'paypal_mode' => ['required', Rule::in(['sandbox', 'live'])],
            'paypal_client_id' => ['required', 'string'],
            'paypal_client_secret' => ['required', 'string'],
        ]);

        $isValid = $payPal->verifyCredentials(
            $validated['paypal_client_id'],
            $validated['paypal_client_secret'],
            $validated['paypal_mode'],
        );

        return response()->json([
            'success' => $isValid,
            'message' => $isValid
                ? 'PayPal credentials verified successfully.'
                : 'Unable to authenticate with PayPal using these credentials.',
        ]);
    }
}
