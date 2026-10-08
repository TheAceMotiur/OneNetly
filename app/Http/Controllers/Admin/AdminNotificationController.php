<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\AdminAnnouncement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Inertia\Inertia;
use Inertia\Response;

class AdminNotificationController extends Controller
{
    /**
     * Display the broadcast notification form.
     */
    public function index(): Response
    {
        return Inertia::render('admin/Notifications', [
            'userCount' => User::count(),
        ]);
    }

    /**
     * Send an announcement notification to every registered user.
     */
    public function broadcast(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:1000'],
        ]);

        User::query()->chunk(200, function ($users) use ($validated) {
            Notification::send($users, new AdminAnnouncement($validated['title'], $validated['body']));
        });

        return back()->with('status', 'Announcement sent to all users.');
    }
}
