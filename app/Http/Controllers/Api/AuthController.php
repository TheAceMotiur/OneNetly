<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Register a new account and issue a mobile API token.
     */
    public function register(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'device_name' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'token' => $user->createToken($validated['device_name'])->plainTextToken,
            'user' => $this->userPayload($user),
        ], 201);
    }

    /**
     * Authenticate with email/password and issue a mobile API token.
     */
    public function login(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'device_name' => ['required', 'string', 'max:255'],
        ]);

        if (! Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        /** @var User $user */
        $user = User::where('email', $validated['email'])->firstOrFail();

        // Replace any existing token for this device so re-logins don't accumulate tokens.
        $user->tokens()->where('name', $validated['device_name'])->delete();

        return response()->json([
            'token' => $user->createToken($validated['device_name'])->plainTextToken,
            'user' => $this->userPayload($user),
        ]);
    }

    /**
     * Revoke the current API token.
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Return the authenticated user's profile.
     */
    public function me(Request $request): JsonResponse
    {
        return response()->json([
            'user' => $this->userPayload($request->user()),
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    protected function userPayload(User $user): array
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'storage_limit_bytes' => $user->storageLimitBytes(),
            'has_active_subscription' => $user->hasActiveSubscription(),
        ];
    }
}
