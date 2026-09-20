<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GoogleDriveAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(Request $request): Response
    {
        $totalUsers = User::count();
        $totalAdmins = User::where('is_admin', true)->count();
        $totalRegularUsers = User::where('is_admin', false)->count();
        $recentRegistrationsCount = User::where('created_at', '>=', now()->subDays(7))->count();

        $totalDriveAccounts = GoogleDriveAccount::count();
        $activeDriveAccounts = GoogleDriveAccount::where('is_active', true)->count();

        $recentUsers = User::query()
            ->latest()
            ->limit(5)
            ->get(['id', 'name', 'email', 'is_admin', 'created_at']);

        return Inertia::render('admin/Dashboard', [
            'stats' => [
                'totalUsers' => $totalUsers,
                'totalAdmins' => $totalAdmins,
                'totalRegularUsers' => $totalRegularUsers,
                'recentRegistrationsCount' => $recentRegistrationsCount,
                'totalDriveAccounts' => $totalDriveAccounts,
                'activeDriveAccounts' => $activeDriveAccounts,
            ],
            'recentUsers' => $recentUsers,
            'system' => [
                'phpVersion' => PHP_VERSION,
                'laravelVersion' => app()->version(),
                'environment' => app()->environment(),
            ],
        ]);
    }
}
