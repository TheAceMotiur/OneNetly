<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DeviceToken;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeviceTokenController extends Controller
{
    /**
     * Register (or refresh) this device's push notification token.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'token' => ['required', 'string', 'max:255'],
            'platform' => ['required', 'string', 'in:android,ios'],
        ]);

        DeviceToken::updateOrCreate(
            ['token' => $validated['token']],
            ['user_id' => $request->user()->id, 'platform' => $validated['platform']],
        );

        return response()->json(['success' => true]);
    }

    /**
     * Unregister a device token (e.g. on logout), so it stops receiving pushes.
     */
    public function destroy(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'token' => ['required', 'string', 'max:255'],
        ]);

        DeviceToken::where('user_id', $request->user()->id)
            ->where('token', $validated['token'])
            ->delete();

        return response()->json(['success' => true]);
    }
}
