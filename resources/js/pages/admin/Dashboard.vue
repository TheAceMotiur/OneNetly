<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import {
    Activity,
    ArrowRight,
    HardDrive,
    Server,
    ShieldCheck,
    UserCheck,
    UserPlus,
    Users,
} from '@lucide/vue';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from '@/components/ui/card';
import admin from '@/routes/admin';

type Stats = {
    totalUsers: number;
    totalAdmins: number;
    totalRegularUsers: number;
    recentRegistrationsCount: number;
    totalDriveAccounts?: number;
    activeDriveAccounts?: number;
};

type RecentUser = {
    id: number;
    name: string;
    email: string;
    is_admin: boolean;
    created_at: string;
};

type SystemInfo = {
    phpVersion: string;
    laravelVersion: string;
    environment: string;
};

defineProps<{
    stats: Stats;
    recentUsers: RecentUser[];
    system: SystemInfo;
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Admin Dashboard',
                href: admin.dashboard(),
            },
        ],
    },
});

const formatDate = (dateString: string) => {
    return new Date(dateString).toLocaleDateString(undefined, {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
    });
};
</script>

<template>
    <Head title="Admin Dashboard" />

    <div class="flex flex-1 flex-col gap-6 p-4 md:p-6">
        <!-- Admin Hero Banner -->
        <div
            class="relative overflow-hidden rounded-2xl border border-amber-500/20 bg-gradient-to-r from-amber-950/40 via-neutral-900 to-neutral-950 p-6 shadow-sm"
        >
            <div class="relative z-10 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                <div class="space-y-1">
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center justify-center rounded-lg bg-amber-500/20 p-2 text-amber-400">
                            <ShieldCheck class="h-6 w-6" />
                        </span>
                        <div>
                            <h1 class="text-2xl font-bold tracking-tight">
                                Administration Overview
                            </h1>
                            <p class="text-sm text-muted-foreground">
                                Manage users, Google Drive accounts, administrative privileges, and application settings.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex shrink-0 items-center gap-2">
                    <Button as-child variant="outline" class="border-neutral-700 bg-neutral-800/80 text-neutral-200 hover:bg-neutral-800 hover:text-white">
                        <Link :href="admin.driveAccounts.index()">
                            <HardDrive class="mr-2 h-4 w-4 text-blue-400" />
                            Drive Accounts
                        </Link>
                    </Button>
                    <Button as-child class="bg-amber-500 text-black hover:bg-amber-400 font-medium">
                        <Link :href="admin.users.index()">
                            <Users class="mr-2 h-4 w-4" />
                            Manage Users
                        </Link>
                    </Button>
                </div>
            </div>
        </div>

        <!-- Metrics Grid -->
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <Card>
                <CardHeader class="flex flex-row items-center justify-between pb-2">
                    <CardTitle class="text-sm font-medium">Total Users</CardTitle>
                    <Users class="h-4 w-4 text-muted-foreground" />
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold">{{ stats.totalUsers }}</div>
                    <p class="text-xs text-muted-foreground mt-1">
                        All registered accounts
                    </p>
                </CardContent>
            </Card>

            <Card>
                <CardHeader class="flex flex-row items-center justify-between pb-2">
                    <CardTitle class="text-sm font-medium">Drive Accounts</CardTitle>
                    <HardDrive class="h-4 w-4 text-blue-500" />
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                        {{ stats.totalDriveAccounts ?? 0 }}
                    </div>
                    <p class="text-xs text-muted-foreground mt-1">
                        {{ stats.activeDriveAccounts ?? 0 }} active connected
                    </p>
                </CardContent>
            </Card>

            <Card>
                <CardHeader class="flex flex-row items-center justify-between pb-2">
                    <CardTitle class="text-sm font-medium">Administrators</CardTitle>
                    <ShieldCheck class="h-4 w-4 text-amber-500" />
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold text-amber-600 dark:text-amber-400">
                        {{ stats.totalAdmins }}
                    </div>
                    <p class="text-xs text-muted-foreground mt-1">
                        Active admin roles
                    </p>
                </CardContent>
            </Card>

            <Card>
                <CardHeader class="flex flex-row items-center justify-between pb-2">
                    <CardTitle class="text-sm font-medium">New This Week</CardTitle>
                    <UserPlus class="h-4 w-4 text-emerald-500" />
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">
                        +{{ stats.recentRegistrationsCount }}
                    </div>
                    <p class="text-xs text-muted-foreground mt-1">
                        Registered in last 7 days
                    </p>
                </CardContent>
            </Card>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            <!-- Recent Users Table / Card -->
            <Card class="md:col-span-2">
                <CardHeader class="flex flex-row items-center justify-between">
                    <div>
                        <CardTitle>Recent Registrations</CardTitle>
                        <CardDescription>
                            Latest users registered on the platform.
                        </CardDescription>
                    </div>
                    <Button as-child variant="ghost" size="sm">
                        <Link :href="admin.users.index()">
                            View all
                            <ArrowRight class="ml-1 h-4 w-4" />
                        </Link>
                    </Button>
                </CardHeader>
                <CardContent>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="border-b text-xs uppercase text-muted-foreground">
                                <tr>
                                    <th class="py-2.5 px-3">User</th>
                                    <th class="py-2.5 px-3">Email</th>
                                    <th class="py-2.5 px-3">Role</th>
                                    <th class="py-2.5 px-3">Joined</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <tr
                                    v-for="user in recentUsers"
                                    :key="user.id"
                                    class="hover:bg-muted/50 transition-colors"
                                >
                                    <td class="py-3 px-3 font-medium">{{ user.name }}</td>
                                    <td class="py-3 px-3 text-muted-foreground">{{ user.email }}</td>
                                    <td class="py-3 px-3">
                                        <Badge
                                            v-if="user.is_admin"
                                            variant="secondary"
                                            class="bg-amber-500/15 text-amber-600 dark:text-amber-400 border-amber-500/20"
                                        >
                                            <ShieldCheck class="mr-1 h-3 w-3" />
                                            Admin
                                        </Badge>
                                        <Badge
                                            v-else
                                            variant="outline"
                                            class="text-muted-foreground"
                                        >
                                            User
                                        </Badge>
                                    </td>
                                    <td class="py-3 px-3 text-muted-foreground">
                                        {{ formatDate(user.created_at) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </CardContent>
            </Card>

            <!-- System Info Card -->
            <Card>
                <CardHeader>
                    <div class="flex items-center gap-2">
                        <Server class="h-5 w-5 text-primary" />
                        <CardTitle>System Information</CardTitle>
                    </div>
                    <CardDescription>Environment & framework versions.</CardDescription>
                </CardHeader>
                <CardContent class="space-y-4">
                    <div class="rounded-lg border p-3 text-sm space-y-2">
                        <div class="flex justify-between">
                            <span class="text-muted-foreground">Laravel:</span>
                            <span class="font-mono font-medium">v{{ system.laravelVersion }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-muted-foreground">PHP:</span>
                            <span class="font-mono font-medium">v{{ system.phpVersion }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-muted-foreground">Environment:</span>
                            <Badge variant="outline" class="uppercase">
                                {{ system.environment }}
                            </Badge>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-muted-foreground">Admin Access:</span>
                            <span class="inline-flex items-center text-xs font-semibold text-emerald-600 dark:text-emerald-400">
                                <Activity class="mr-1 h-3.5 w-3.5" />
                                Active
                            </span>
                        </div>
                    </div>
                </CardContent>
            </Card>
        </div>
    </div>
</template>
