<script setup lang="ts">
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import {
    ChevronLeft,
    ChevronRight,
    Search,
    Shield,
    ShieldAlert,
    ShieldCheck,
    Trash2,
    UserCheck,
    UserMinus,
    Users,
} from '@lucide/vue';
import { ref, watch } from 'vue';
import { Avatar, AvatarFallback } from '@/components/ui/avatar';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { useInitials } from '@/composables/useInitials';
import admin from '@/routes/admin';

type UserItem = {
    id: number;
    name: string;
    email: string;
    is_admin: boolean;
    created_at: string;
};

type PaginationLink = {
    url: string | null;
    label: string;
    active: boolean;
};

type PaginatedUsers = {
    data: UserItem[];
    current_page: number;
    last_page: number;
    prev_page_url: string | null;
    next_page_url: string | null;
    links: PaginationLink[];
    total: number;
    from: number | null;
    to: number | null;
};

const props = defineProps<{
    users: PaginatedUsers;
    filters: {
        search?: string;
        role?: string;
    };
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Admin Dashboard',
                href: admin.dashboard(),
            },
            {
                title: 'Users',
                href: admin.users.index(),
            },
        ],
    },
});

const page = usePage();
const authUser = page.props.auth.user;
const { getInitials } = useInitials();

const search = ref(props.filters.search ?? '');
const role = ref(props.filters.role ?? '');

let searchTimeout: ReturnType<typeof setTimeout> | null = null;

watch(search, (newSearch) => {
    if (searchTimeout) clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        applyFilters();
    }, 350);
});

const applyFilters = () => {
    router.get(
        admin.users.index.url(),
        {
            search: search.value || undefined,
            role: role.value || undefined,
        },
        {
            preserveState: true,
            replace: true,
        },
    );
};

const onRoleChange = (newRole: string) => {
    role.value = newRole;
    applyFilters();
};

const toggleUserRole = (user: UserItem) => {
    const actionText = user.is_admin ? 'revoke admin privileges from' : 'grant admin privileges to';
    if (!confirm(`Are you sure you want to ${actionText} ${user.name}?`)) {
        return;
    }

    router.patch(
        admin.users.updateRole.url({ user: user.id }),
        {
            is_admin: !user.is_admin,
        },
        {
            preserveScroll: true,
        },
    );
};

const deleteUser = (user: UserItem) => {
    if (!confirm(`Are you sure you want to permanently delete user "${user.name}"? This action cannot be undone.`)) {
        return;
    }

    router.delete(admin.users.destroy.url({ user: user.id }), {
        preserveScroll: true,
    });
};

const formatDate = (dateString: string) => {
    return new Date(dateString).toLocaleDateString(undefined, {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
    });
};
</script>

<template>
    <Head title="User Management - Admin" />

    <div class="flex flex-1 flex-col gap-6 p-4 md:p-6">
        <!-- Header -->
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
            <div>
                <h1 class="text-2xl font-bold tracking-tight">User Management</h1>
                <p class="text-sm text-muted-foreground">
                    View registered users, assign or revoke administrative rights, and manage accounts.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <Badge variant="secondary" class="text-xs">
                    Total: {{ users.total }} {{ users.total === 1 ? 'user' : 'users' }}
                </Badge>
            </div>
        </div>

        <!-- Filters & Search -->
        <Card>
            <CardContent class="pt-6">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div class="relative flex-1 max-w-sm">
                        <Search class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" />
                        <Input
                            v-model="search"
                            placeholder="Search by name or email..."
                            class="pl-9"
                        />
                    </div>

                    <div class="flex items-center gap-2">
                        <span class="text-xs text-muted-foreground">Filter by Role:</span>
                        <div class="inline-flex rounded-lg border p-1 bg-muted/40">
                            <button
                                type="button"
                                @click="onRoleChange('')"
                                :class="[
                                    'px-3 py-1 text-xs font-medium rounded-md transition-colors',
                                    role === '' ? 'bg-background shadow-xs text-foreground' : 'text-muted-foreground hover:text-foreground'
                                ]"
                            >
                                All
                            </button>
                            <button
                                type="button"
                                @click="onRoleChange('admin')"
                                :class="[
                                    'px-3 py-1 text-xs font-medium rounded-md transition-colors',
                                    role === 'admin' ? 'bg-background shadow-xs text-foreground' : 'text-muted-foreground hover:text-foreground'
                                ]"
                            >
                                Admins
                            </button>
                            <button
                                type="button"
                                @click="onRoleChange('user')"
                                :class="[
                                    'px-3 py-1 text-xs font-medium rounded-md transition-colors',
                                    role === 'user' ? 'bg-background shadow-xs text-foreground' : 'text-muted-foreground hover:text-foreground'
                                ]"
                            >
                                Users
                            </button>
                        </div>
                    </div>
                </div>
            </CardContent>
        </Card>

        <!-- Users Table -->
        <Card>
            <CardHeader class="pb-3">
                <CardTitle>Users List</CardTitle>
                <CardDescription>
                    Showing {{ users.from ?? 0 }} to {{ users.to ?? 0 }} of {{ users.total }} users
                </CardDescription>
            </CardHeader>
            <CardContent class="p-0">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-y bg-muted/30 text-xs uppercase text-muted-foreground">
                            <tr>
                                <th class="py-3 px-4">User</th>
                                <th class="py-3 px-4">Email</th>
                                <th class="py-3 px-4">Role</th>
                                <th class="py-3 px-4">Registered Date</th>
                                <th class="py-3 px-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            <tr
                                v-for="user in users.data"
                                :key="user.id"
                                class="hover:bg-muted/40 transition-colors"
                            >
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-3">
                                        <Avatar class="h-8 w-8 rounded-lg">
                                            <AvatarFallback class="rounded-lg text-xs font-semibold">
                                                {{ getInitials(user.name) }}
                                            </AvatarFallback>
                                        </Avatar>
                                        <div>
                                            <div class="font-medium flex items-center gap-1.5">
                                                {{ user.name }}
                                                <span
                                                    v-if="user.id === authUser.id"
                                                    class="text-[10px] bg-muted px-1.5 py-0.5 rounded text-muted-foreground font-normal"
                                                >
                                                    You
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-muted-foreground">
                                    {{ user.email }}
                                </td>
                                <td class="py-3 px-4">
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
                                <td class="py-3 px-4 text-muted-foreground">
                                    {{ formatDate(user.created_at) }}
                                </td>
                                <td class="py-3 px-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Toggle Admin status -->
                                        <Button
                                            v-if="user.id !== authUser.id"
                                            size="sm"
                                            variant="outline"
                                            class="h-8 text-xs"
                                            @click="toggleUserRole(user)"
                                        >
                                            <template v-if="user.is_admin">
                                                <UserMinus class="mr-1 h-3.5 w-3.5 text-amber-500" />
                                                Demote
                                            </template>
                                            <template v-else>
                                                <Shield class="mr-1 h-3.5 w-3.5 text-blue-500" />
                                                Make Admin
                                            </template>
                                        </Button>
                                        <span v-else class="text-xs text-muted-foreground italic px-2">
                                            Current Admin
                                        </span>

                                        <!-- Delete User -->
                                        <Button
                                            v-if="user.id !== authUser.id"
                                            size="icon"
                                            variant="ghost"
                                            class="h-8 w-8 text-destructive hover:bg-destructive/10"
                                            title="Delete User"
                                            @click="deleteUser(user)"
                                        >
                                            <Trash2 class="h-4 w-4" />
                                        </Button>
                                    </div>
                                </td>
                            </tr>

                            <tr v-if="users.data.length === 0">
                                <td colspan="5" class="py-12 text-center text-muted-foreground">
                                    <Users class="mx-auto h-8 w-8 mb-2 opacity-50" />
                                    <p class="font-medium">No users found</p>
                                    <p class="text-xs mt-1">Try adjusting your search or filters.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div
                    v-if="users.last_page > 1"
                    class="flex items-center justify-between border-t px-4 py-3 sm:px-6"
                >
                    <div class="text-xs text-muted-foreground">
                        Page {{ users.current_page }} of {{ users.last_page }}
                    </div>
                    <div class="flex items-center gap-1">
                        <template v-for="(link, i) in users.links" :key="i">
                            <Button
                                v-if="link.url"
                                as-child
                                size="sm"
                                :variant="link.active ? 'default' : 'outline'"
                                class="h-8 min-w-8 px-2 text-xs"
                            >
                                <Link
                                    :href="link.url"
                                    preserve-scroll
                                    v-html="link.label"
                                />
                            </Button>
                            <Button
                                v-else
                                size="sm"
                                variant="outline"
                                disabled
                                class="h-8 min-w-8 px-2 text-xs opacity-50"
                                v-html="link.label"
                            />
                        </template>
                    </div>
                </div>
            </CardContent>
        </Card>
    </div>
</template>
