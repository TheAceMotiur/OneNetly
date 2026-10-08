<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    /**
     * Update the authenticated user's name/email.
     */
    public function updateProfile(Request $request): JsonResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
        ]);

        $user->update($validated);

        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'storage_limit_bytes' => $user->storageLimitBytes(),
                'has_active_subscription' => $user->hasActiveSubscription(),
            ],
        ]);
    }

    /**
     * Change the authenticated user's password.
     */
    public function updatePassword(Request $request): JsonResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        if (! Hash::check($validated['current_password'], $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The provided password does not match your current password.'],
            ]);
        }

        $user->update(['password' => Hash::make($validated['password'])]);

        return response()->json(['success' => true]);
    }

    /**
     * Permanently delete the authenticated user's account after password confirmation.
     */
    public function destroy(Request $request): JsonResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'password' => ['required', 'string'],
        ]);

        if (! Hash::check($validated['password'], $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['The provided password is incorrect.'],
            ]);
        }

        $user->tokens()->delete();
        $user->delete();

        return response()->json(['success' => true]);
    }
}
