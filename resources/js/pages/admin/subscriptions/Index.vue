<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { CreditCard, Search } from '@lucide/vue';
import { ref, watch } from 'vue';
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
import admin from '@/routes/admin';
import type { Subscription } from '@/types';

type PaginationLink = {
    url: string | null;
    label: string;
    active: boolean;
};

type PaginatedSubscriptions = {
    data: Subscription[];
    current_page: number;
    last_page: number;
    links: PaginationLink[];
};

const props = defineProps<{
    subscriptions: PaginatedSubscriptions;
    filters: { status?: string; search?: string };
    stats: { activeCount: number; cancelledCount: number; expiredCount: number };
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            { title: 'Admin Dashboard', href: admin.dashboard() },
            { title: 'Subscriptions', href: admin.subscriptions.index() },
        ],
    },
});

const search = ref(props.filters.search ?? '');
const status = ref(props.filters.status ?? '');

let searchTimeout: ReturnType<typeof setTimeout> | null = null;
watch(search, () => {
    if (searchTimeout) clearTimeout(searchTimeout);
    searchTimeout = setTimeout(applyFilters, 350);
});

const applyFilters = () => {
    router.get(
        admin.subscriptions.index.url(),
        { search: search.value || undefined, status: status.value || undefined },
        { preserveState: true, replace: true },
    );
};

const onStatusFilter = (newStatus: string) => {
    status.value = newStatus;
    applyFilters();
};

const cancelSubscription = (subscription: Subscription) => {
    if (!confirm(`Cancel this subscription for ${subscription.user?.name}?`)) {
        return;
    }

    router.patch(admin.subscriptions.cancel.url({ subscription: subscription.id }), {}, { preserveScroll: true });
};

const statusVariant = (status: string) => {
    if (status === 'active') return 'default';
    if (status === 'cancelled') return 'destructive';
    return 'secondary';
};
</script>

<template>
    <Head title="Subscriptions" />

    <div class="flex flex-col gap-6 p-4 sm:p-6">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight">Subscriptions</h1>
            <p class="text-sm text-muted-foreground">View and manage all user subscriptions.</p>
        </div>

        <div class="grid gap-4 sm:grid-cols-3">
            <Card>
                <CardHeader class="pb-2"><CardDescription>Active</CardDescription><CardTitle class="text-2xl">{{ stats.activeCount }}</CardTitle></CardHeader>
            </Card>
            <Card>
                <CardHeader class="pb-2"><CardDescription>Cancelled</CardDescription><CardTitle class="text-2xl">{{ stats.cancelledCount }}</CardTitle></CardHeader>
            </Card>
            <Card>
                <CardHeader class="pb-2"><CardDescription>Expired</CardDescription><CardTitle class="text-2xl">{{ stats.expiredCount }}</CardTitle></CardHeader>
            </Card>
        </div>

        <Card>
            <CardHeader>
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div class="relative w-full sm:max-w-xs">
                        <Search class="absolute top-1/2 left-2.5 size-4 -translate-y-1/2 text-muted-foreground" />
                        <Input v-model="search" placeholder="Search by name or email..." class="pl-8" />
                    </div>
                    <div class="flex gap-1">
                        <Button size="sm" :variant="status === '' ? 'default' : 'outline'" @click="onStatusFilter('')">All</Button>
                        <Button size="sm" :variant="status === 'active' ? 'default' : 'outline'" @click="onStatusFilter('active')">Active</Button>
                        <Button size="sm" :variant="status === 'cancelled' ? 'default' : 'outline'" @click="onStatusFilter('cancelled')">Cancelled</Button>
                        <Button size="sm" :variant="status === 'expired' ? 'default' : 'outline'" @click="onStatusFilter('expired')">Expired</Button>
                    </div>
                </div>
            </CardHeader>
            <CardContent class="p-0">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="border-b text-left text-xs text-muted-foreground uppercase">
                            <tr>
                                <th class="px-4 py-3">User</th>
                                <th class="px-4 py-3">Plan</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Started</th>
                                <th class="px-4 py-3">Ends</th>
                                <th class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            <tr v-for="subscription in subscriptions.data" :key="subscription.id">
                                <td class="px-4 py-3">
                                    <div class="font-medium">{{ subscription.user?.name }}</div>
                                    <div class="text-xs text-muted-foreground">{{ subscription.user?.email }}</div>
                                </td>
                                <td class="px-4 py-3">{{ subscription.plan?.name }}</td>
                                <td class="px-4 py-3"><Badge :variant="statusVariant(subscription.status)">{{ subscription.status }}</Badge></td>
                                <td class="px-4 py-3 text-xs text-muted-foreground">
                                    {{ subscription.starts_at ? new Date(subscription.starts_at).toLocaleDateString() : '—' }}
                                </td>
                                <td class="px-4 py-3 text-xs text-muted-foreground">
                                    {{ subscription.ends_at ? new Date(subscription.ends_at).toLocaleDateString() : '—' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <Button
                                        v-if="subscription.status === 'active'"
                                        size="sm"
                                        variant="outline"
                                        class="text-destructive hover:text-destructive"
                                        @click="cancelSubscription(subscription)"
                                    >
                                        Cancel
                                    </Button>
                                </td>
                            </tr>
                            <tr v-if="subscriptions.data.length === 0">
                                <td colspan="6" class="px-4 py-10 text-center text-muted-foreground">
                                    <CreditCard class="mx-auto mb-2 size-8 opacity-50" />
                                    <p class="font-medium">No subscriptions found</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div v-if="subscriptions.last_page > 1" class="flex items-center justify-between border-t px-4 py-3">
                    <div class="text-xs text-muted-foreground">
                        Page {{ subscriptions.current_page }} of {{ subscriptions.last_page }}
                    </div>
                    <div class="flex items-center gap-1">
                        <template v-for="(link, i) in subscriptions.links" :key="i">
                            <Button
                                v-if="link.url"
                                as-child
                                size="sm"
                                :variant="link.active ? 'default' : 'outline'"
                                class="h-8 min-w-8 px-2 text-xs"
                            >
                                <Link :href="link.url" preserve-scroll v-html="link.label" />
                            </Button>
                            <Button v-else size="sm" variant="outline" disabled class="h-8 min-w-8 px-2 text-xs opacity-50" v-html="link.label" />
                        </template>
                    </div>
                </div>
            </CardContent>
        </Card>
    </div>
</template>
