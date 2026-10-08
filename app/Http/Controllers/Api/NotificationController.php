<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * List the authenticated user's notifications, most recent first.
     */
    public function index(Request $request): JsonResponse
    {
        $notifications = $request->user()
            ->notifications()
            ->latest()
            ->limit(50)
            ->get()
            ->map(fn ($notification) => [
                'id' => $notification->id,
                'title' => $notification->data['title'] ?? null,
                'body' => $notification->data['body'] ?? null,
                'read_at' => $notification->read_at,
                'created_at' => $notification->created_at,
            ]);

        return response()->json(['notifications' => $notifications]);
    }

    /**
     * Number of unread notifications, for the bell icon badge.
     */
    public function unreadCount(Request $request): JsonResponse
    {
        return response()->json([
            'unread_count' => $request->user()->unreadNotifications()->count(),
        ]);
    }

    public function markRead(Request $request, string $id): JsonResponse
    {
        $notification = $request->user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        return response()->json(['success' => true]);
    }

    public function markAllRead(Request $request): JsonResponse
    {
        $request->user()->unreadNotifications->markAsRead();

        return response()->json(['success' => true]);
    }
}
