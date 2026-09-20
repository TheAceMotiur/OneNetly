<script setup lang="ts">
import { Head, router, useForm } from '@inertiajs/vue3';
import {
    AlertCircle,
    ArrowDown,
    ArrowUp,
    Check,
    CheckCircle2,
    Copy,
    Database,
    Edit3,
    Eye,
    EyeOff,
    HardDrive,
    HelpCircle,
    Layers,
    Plus,
    Power,
    RefreshCw,
    Search,
    Shield,
    Trash2,
    XCircle,
    Zap,
} from '@lucide/vue';
import { computed, ref, watch } from 'vue';
import InputError from '@/components/InputError.vue';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from '@/components/ui/card';
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import { useInitials } from '@/composables/useInitials';
import admin from '@/routes/admin';

type DriveAccount = {
    id: number;
    name: string;
    email: string | null;
    client_id: string;
    client_secret: string;
    refresh_token: string;
    is_active: boolean;
    priority: number;
    total_storage_bytes: number | null;
    used_storage_bytes: number | null;
    available_storage_bytes: number | null;
    last_synced_at: string | null;
    created_at: string;
};

type PoolStats = {
    total_bytes: number;
    used_bytes: number;
    available_bytes: number;
    active_accounts_count: number;
    accounts: Array<{
        id: number;
        name: string;
        email: string | null;
        priority: number;
        total_bytes: number;
        used_bytes: number;
        available_bytes: number;
        percent: number;
    }>;
};

type PaginationLink = {
    url: string | null;
    label: string;
    active: boolean;
};

type PaginatedAccounts = {
    data: DriveAccount[];
    current_page: number;
    last_page: number;
    prev_page_url: string | null;
    next_page_url: string | null;
    links: PaginationLink[];
    total: number;
    from: number | null;
    to: number | null;
};

type TestResultData = {
    success: boolean;
    message: string;
    accountName?: string;
    account?: {
        name?: string | null;
        email?: string | null;
        photo?: string | null;
    };
    storage?: {
        limit?: number | null;
        usage?: number | null;
        usageInDrive?: number | null;
    };
};

const props = defineProps<{
    accounts: PaginatedAccounts;
    pool: PoolStats;
    filters: {
        search?: string;
        status?: string;
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
                title: 'Drive Accounts',
                href: admin.driveAccounts.index(),
            },
        ],
    },
});

const { getInitials } = useInitials();

const search = ref(props.filters.search ?? '');
const status = ref(props.filters.status ?? '');

let searchTimeout: ReturnType<typeof setTimeout> | null = null;
watch(search, () => {
    if (searchTimeout) clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        applyFilters();
    }, 350);
});

const applyFilters = () => {
    router.get(
        admin.driveAccounts.index.url(),
        {
            search: search.value || undefined,
            status: status.value || undefined,
        },
        {
            preserveState: true,
            replace: true,
        },
    );
};

const onStatusFilter = (newStatus: string) => {
    status.value = newStatus;
    applyFilters();
};

// Modals State
const isModalOpen = ref(false);
const isEditing = ref(false);
const editingAccountId = ref<number | null>(null);
const showSecrets = ref<Record<number, boolean>>({});
const copiedKey = ref<string | null>(null);
const showHelp = ref(false);

// Test Connection & Sync State
const testingAccountId = ref<number | null>(null);
const syncingAccountId = ref<number | null>(null);
const isSyncingAll = ref(false);
const isTestingCredentials = ref(false);
const testResult = ref<TestResultData | null>(null);
const isResultModalOpen = ref(false);

const form = useForm({
    name: '',
    email: '',
    client_id: '',
    client_secret: '',
    refresh_token: '',
    priority: 1,
    is_active: true,
});

const openCreateModal = () => {
    isEditing.value = false;
    editingAccountId.value = null;
    form.reset();
    form.clearErrors();
    form.priority = props.accounts.data.length + 1;
    form.is_active = true;
    isModalOpen.value = true;
};

const openEditModal = (account: DriveAccount) => {
    isEditing.value = true;
    editingAccountId.value = account.id;
    form.clearErrors();
    form.name = account.name;
    form.email = account.email ?? '';
    form.client_id = account.client_id;
    form.client_secret = account.client_secret;
    form.refresh_token = account.refresh_token;
    form.priority = account.priority;
    form.is_active = account.is_active;
    isModalOpen.value = true;
};

const submitForm = () => {
    if (isEditing.value && editingAccountId.value) {
        form.put(admin.driveAccounts.update.url({ driveAccount: editingAccountId.value }), {
            preserveScroll: true,
            onSuccess: () => {
                isModalOpen.value = false;
                form.reset();
            },
        });
    } else {
        form.post(admin.driveAccounts.store.url(), {
            preserveScroll: true,
            onSuccess: () => {
                isModalOpen.value = false;
                form.reset();
            },
        });
    }
};

const updatePriority = (account: DriveAccount, delta: number) => {
    const newPriority = Math.max(1, account.priority + delta);
    if (newPriority === account.priority) return;

    router.patch(
        admin.driveAccounts.priority.url({ driveAccount: account.id }),
        { priority: newPriority },
        { preserveScroll: true }
    );
};

const syncAccountQuota = (account: DriveAccount) => {
    syncingAccountId.value = account.id;
    router.post(
        admin.driveAccounts.sync.url({ driveAccount: account.id }),
        {},
        {
            preserveScroll: true,
            onFinish: () => {
                syncingAccountId.value = null;
            },
        }
    );
};

const syncAllQuotas = () => {
    isSyncingAll.value = true;
    router.post(
        admin.driveAccounts.syncAll.url(),
        {},
        {
            preserveScroll: true,
            onFinish: () => {
                isSyncingAll.value = false;
            },
        }
    );
};

const toggleAccountStatus = (account: DriveAccount) => {
    router.patch(
        admin.driveAccounts.toggle.url({ driveAccount: account.id }),
        {},
        {
            preserveScroll: true,
        },
    );
};

const deleteAccount = (account: DriveAccount) => {
    if (
        !confirm(
            `Are you sure you want to remove Google Drive account "${account.name}"? Applications relying on this account will no longer be able to use these credentials.`,
        )
    ) {
        return;
    }

    router.delete(admin.driveAccounts.destroy.url({ driveAccount: account.id }), {
        preserveScroll: true,
    });
};

const getCsrfToken = () => {
    const match = document.cookie.match(new RegExp('(^|;\\s*)(XSRF-TOKEN)=([^;]*)'));
    return match ? decodeURIComponent(match[3]) : '';
};

const testAccountConnection = async (account: DriveAccount) => {
    testingAccountId.value = account.id;
    try {
        const response = await fetch(admin.driveAccounts.test.url({ driveAccount: account.id }), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-XSRF-TOKEN': getCsrfToken(),
            },
        });
        const data = await response.json();
        testResult.value = {
            ...data,
            accountName: account.name,
        };
        isResultModalOpen.value = true;
    } catch (err: unknown) {
        const errorMessage = err instanceof Error ? err.message : 'Network request failed when contacting server.';
        testResult.value = {
            success: false,
            message: errorMessage,
            accountName: account.name,
        };
        isResultModalOpen.value = true;
    } finally {
        testingAccountId.value = null;
    }
};

const testModalCredentials = async () => {
    if (!form.client_id || !form.client_secret || !form.refresh_token) {
        return;
    }

    isTestingCredentials.value = true;
    try {
        const response = await fetch(admin.driveAccounts.testCredentials.url(), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-XSRF-TOKEN': getCsrfToken(),
            },
            body: JSON.stringify({
                client_id: form.client_id,
                client_secret: form.client_secret,
                refresh_token: form.refresh_token,
            }),
        });
        const data = await response.json();
        testResult.value = {
            ...data,
            accountName: form.name || 'Current Form Credentials',
        };
        isResultModalOpen.value = true;
    } catch (err: unknown) {
        const errorMessage = err instanceof Error ? err.message : 'Network request failed when contacting server.';
        testResult.value = {
            success: false,
            message: errorMessage,
            accountName: form.name || 'Current Form Credentials',
        };
        isResultModalOpen.value = true;
    } finally {
        isTestingCredentials.value = false;
    }
};

const formatBytes = (bytes?: number | null) => {
    if (bytes === undefined || bytes === null || isNaN(bytes)) return 'Unlimited / Unknown';
    if (bytes === 0) return '0 B';
    const k = 1024;
    const sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
};

const calculateStoragePercent = (usage?: number | null, limit?: number | null) => {
    if (!usage || !limit || limit <= 0) return 0;
    return Math.min(100, Math.round((usage / limit) * 100));
};

const copyToClipboard = (text: string, key: string) => {
    navigator.clipboard.writeText(text);
    copiedKey.value = key;
    setTimeout(() => {
        if (copiedKey.value === key) {
            copiedKey.value = null;
        }
    }, 2000);
};

const toggleSecretVisibility = (id: number) => {
    showSecrets.value[id] = !showSecrets.value[id];
};

const maskSecret = (secret: string) => {
    if (!secret) return '';
    if (secret.length <= 10) return '••••••••';
    return secret.substring(0, 6) + '••••••••' + secret.substring(secret.length - 4);
};

const formatDate = (dateString: string) => {
    if (!dateString) return '';
    return new Date(dateString).toLocaleDateString(undefined, {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
    });
};
</script>

<template>
    <Head title="Google Drive Accounts - Admin" />

    <div class="flex flex-1 flex-col gap-6 p-4 md:p-6">
        <!-- Header Banner -->
        <div
            class="relative overflow-hidden rounded-2xl border border-sidebar-border/70 bg-gradient-to-r from-neutral-900 via-neutral-900 to-neutral-950 p-6 text-white shadow-sm"
        >
            <div class="relative z-10 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                <div class="space-y-1">
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center justify-center rounded-lg bg-blue-500/20 p-2 text-blue-400">
                            <HardDrive class="h-6 w-6" />
                        </span>
                        <div>
                            <h1 class="text-2xl font-bold tracking-tight">
                                Google Drive Accounts & Storage Routing
                            </h1>
                            <p class="text-sm text-neutral-300">
                                Smart multi-account load balancing: checks 1st account &rarr; 2nd account &rarr; 3rd account based on available quota.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex shrink-0 items-center gap-2.5">
                    <Button
                        type="button"
                        variant="outline"
                        class="border-neutral-700 bg-neutral-800/80 text-neutral-200 hover:bg-neutral-800 hover:text-white text-xs"
                        :disabled="isSyncingAll"
                        @click="syncAllQuotas"
                    >
                        <Spinner v-if="isSyncingAll" class="mr-1.5 h-3.5 w-3.5 text-blue-400" />
                        <RefreshCw v-else class="mr-1.5 h-3.5 w-3.5 text-blue-400" />
                        Sync All Quotas
                    </Button>
                    <Button
                        type="button"
                        variant="outline"
                        class="border-neutral-700 bg-neutral-800/80 text-neutral-200 hover:bg-neutral-800 hover:text-white text-xs"
                        @click="showHelp = !showHelp"
                    >
                        <HelpCircle class="mr-1.5 h-3.5 w-3.5 text-blue-400" />
                        Setup Guide
                    </Button>
                    <Button
                        type="button"
                        class="bg-blue-600 text-white hover:bg-blue-500 font-medium text-xs"
                        @click="openCreateModal"
                    >
                        <Plus class="mr-1.5 h-4 w-4" />
                        Add Drive Account
                    </Button>
                </div>
            </div>
        </div>

        <!-- Aggregate Storage Pool Summary Grid -->
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <Card>
                <CardHeader class="flex flex-row items-center justify-between pb-2">
                    <CardTitle class="text-sm font-medium">Total Pool Capacity</CardTitle>
                    <Database class="h-4 w-4 text-blue-500" />
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold text-foreground">
                        {{ formatBytes(pool.total_bytes) }}
                    </div>
                    <p class="text-xs text-muted-foreground mt-1">
                        Aggregated across all connected drives
                    </p>
                </CardContent>
            </Card>

            <Card>
                <CardHeader class="flex flex-row items-center justify-between pb-2">
                    <CardTitle class="text-sm font-medium">Used Space</CardTitle>
                    <Layers class="h-4 w-4 text-amber-500" />
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold text-foreground">
                        {{ formatBytes(pool.used_bytes) }}
                    </div>
                    <p class="text-xs text-muted-foreground mt-1">
                        {{ pool.total_bytes > 0 ? calculateStoragePercent(pool.used_bytes, pool.total_bytes) + '% of capacity filled' : 'No storage active' }}
                    </p>
                </CardContent>
            </Card>

            <Card>
                <CardHeader class="flex flex-row items-center justify-between pb-2">
                    <CardTitle class="text-sm font-medium">Free Available Space</CardTitle>
                    <CheckCircle2 class="h-4 w-4 text-emerald-500" />
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">
                        {{ formatBytes(pool.available_bytes) }}
                    </div>
                    <p class="text-xs text-muted-foreground mt-1">
                        Ready for new uploads
                    </p>
                </CardContent>
            </Card>

            <Card>
                <CardHeader class="flex flex-row items-center justify-between pb-2">
                    <CardTitle class="text-sm font-medium">Active Accounts</CardTitle>
                    <HardDrive class="h-4 w-4 text-primary" />
                </CardHeader>
                <CardContent>
                    <div class="text-2xl font-bold text-foreground">
                        {{ pool.active_accounts_count }}
                    </div>
                    <p class="text-xs text-muted-foreground mt-1">
                        Sorted by priority for automatic failover
                    </p>
                </CardContent>
            </Card>
        </div>

        <!-- Setup Guide Collapsible -->
        <Card v-if="showHelp" class="border-blue-500/30 bg-blue-500/5 dark:bg-blue-950/20">
            <CardHeader class="pb-3">
                <div class="flex items-center gap-2">
                    <AlertCircle class="h-5 w-5 text-blue-500" />
                    <CardTitle class="text-base text-blue-600 dark:text-blue-400">
                        Multi-Account Storage Routing & Google Credentials
                    </CardTitle>
                </div>
                <CardDescription>
                    Configure multiple Google accounts. Files will automatically route to Account #1. If Account #1 does not have enough storage space or fails, the file will automatically upload to Account #2, then Account #3.
                </CardDescription>
            </CardHeader>
            <CardContent class="text-sm space-y-2 text-muted-foreground">
                <ol class="list-decimal list-inside space-y-1.5 pl-1">
                    <li>Go to <strong class="text-foreground">Google Cloud Console</strong> &rarr; Create or select a project.</li>
                    <li>Enable the <strong class="text-foreground">Google Drive API</strong> from <em>APIs & Services &rarr; Library</em>.</li>
                    <li>Create an <strong class="text-foreground">OAuth 2.0 Client ID</strong> under <em>Credentials</em>.</li>
                    <li>Generate a <strong class="text-foreground">Refresh Token</strong> with scope <code class="rounded bg-muted px-1.5 py-0.5 text-xs text-foreground font-mono">https://www.googleapis.com/auth/drive</code>.</li>
                </ol>
            </CardContent>
        </Card>

        <!-- Filters & Search -->
        <Card>
            <CardContent class="pt-6">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div class="relative flex-1 max-w-sm">
                        <Search class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" />
                        <Input
                            v-model="search"
                            placeholder="Search by name, email, or client ID..."
                            class="pl-9"
                        />
                    </div>

                    <div class="flex items-center gap-2">
                        <span class="text-xs text-muted-foreground">Status:</span>
                        <div class="inline-flex rounded-lg border p-1 bg-muted/40">
                            <button
                                type="button"
                                @click="onStatusFilter('')"
                                :class="[
                                    'px-3 py-1 text-xs font-medium rounded-md transition-colors',
                                    status === '' ? 'bg-background shadow-xs text-foreground' : 'text-muted-foreground hover:text-foreground'
                                ]"
                            >
                                All
                            </button>
                            <button
                                type="button"
                                @click="onStatusFilter('active')"
                                :class="[
                                    'px-3 py-1 text-xs font-medium rounded-md transition-colors',
                                    status === 'active' ? 'bg-background shadow-xs text-foreground' : 'text-muted-foreground hover:text-foreground'
                                ]"
                            >
                                Active
                            </button>
                            <button
                                type="button"
                                @click="onStatusFilter('inactive')"
                                :class="[
                                    'px-3 py-1 text-xs font-medium rounded-md transition-colors',
                                    status === 'inactive' ? 'bg-background shadow-xs text-foreground' : 'text-muted-foreground hover:text-foreground'
                                ]"
                            >
                                Inactive
                            </button>
                        </div>
                    </div>
                </div>
            </CardContent>
        </Card>

        <!-- Drive Accounts Table -->
        <Card>
            <CardHeader class="pb-3">
                <div class="flex items-center justify-between">
                    <div>
                        <CardTitle>Connected Accounts & Priority Order</CardTitle>
                        <CardDescription>
                            Priority determines failover order (Priority 1 is chosen first, followed by Priority 2, etc.)
                        </CardDescription>
                    </div>
                </div>
            </CardHeader>
            <CardContent class="p-0">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-y bg-muted/30 text-xs uppercase text-muted-foreground">
                            <tr>
                                <th class="py-3 px-4">Priority</th>
                                <th class="py-3 px-4">Account</th>
                                <th class="py-3 px-4">Storage Usage</th>
                                <th class="py-3 px-4">Client ID</th>
                                <th class="py-3 px-4">Secrets</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            <tr
                                v-for="account in accounts.data"
                                :key="account.id"
                                class="hover:bg-muted/40 transition-colors"
                            >
                                <!-- Priority Badging & Order Controls -->
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-1.5">
                                        <Badge
                                            :variant="account.priority === 1 ? 'default' : 'outline'"
                                            :class="account.priority === 1 ? 'bg-blue-600 font-bold' : ''"
                                        >
                                            #{{ account.priority }}
                                        </Badge>
                                        <div class="flex flex-col gap-0.5">
                                            <button
                                                type="button"
                                                class="rounded p-0.5 hover:bg-muted text-muted-foreground hover:text-foreground"
                                                title="Increase priority"
                                                @click="updatePriority(account, -1)"
                                            >
                                                <ArrowUp class="h-3 w-3" />
                                            </button>
                                            <button
                                                type="button"
                                                class="rounded p-0.5 hover:bg-muted text-muted-foreground hover:text-foreground"
                                                title="Decrease priority"
                                                @click="updatePriority(account, 1)"
                                            >
                                                <ArrowDown class="h-3 w-3" />
                                            </button>
                                        </div>
                                    </div>
                                </td>

                                <!-- Name / Email -->
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-2.5">
                                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-500/10 text-blue-600 dark:text-blue-400">
                                            <HardDrive class="h-4 w-4" />
                                        </div>
                                        <div>
                                            <div class="font-medium text-foreground">
                                                {{ account.name }}
                                            </div>
                                            <div v-if="account.email" class="text-xs text-muted-foreground">
                                                {{ account.email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Storage Quota Progress Bar -->
                                <td class="py-3 px-4 min-w-[180px]">
                                    <div class="space-y-1.5">
                                        <div class="flex items-center justify-between text-xs">
                                            <span class="font-medium text-foreground">
                                                {{ formatBytes(account.used_storage_bytes) }} / {{ formatBytes(account.total_storage_bytes) }}
                                            </span>
                                            <span class="text-muted-foreground font-mono text-[11px]">
                                                {{ calculateStoragePercent(account.used_storage_bytes, account.total_storage_bytes) }}%
                                            </span>
                                        </div>
                                        <div class="h-1.5 w-full rounded-full bg-muted overflow-hidden">
                                            <div
                                                :class="[
                                                    'h-full transition-all duration-500',
                                                    calculateStoragePercent(account.used_storage_bytes, account.total_storage_bytes) > 90
                                                        ? 'bg-rose-500'
                                                        : calculateStoragePercent(account.used_storage_bytes, account.total_storage_bytes) > 75
                                                          ? 'bg-amber-500'
                                                          : 'bg-blue-500'
                                                ]"
                                                :style="{ width: `${calculateStoragePercent(account.used_storage_bytes, account.total_storage_bytes)}%` }"
                                            />
                                        </div>
                                        <div class="flex items-center justify-between text-[10px] text-muted-foreground">
                                            <span>Free: {{ formatBytes(account.available_storage_bytes) }}</span>
                                            <button
                                                type="button"
                                                class="hover:text-blue-500 underline flex items-center gap-0.5"
                                                :disabled="syncingAccountId === account.id"
                                                @click="syncAccountQuota(account)"
                                            >
                                                <Spinner v-if="syncingAccountId === account.id" class="h-2.5 w-2.5" />
                                                <span v-else>Sync Quota</span>
                                            </button>
                                        </div>
                                    </div>
                                </td>

                                <!-- Client ID -->
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-1.5 font-mono text-xs max-w-[160px]">
                                        <span class="truncate text-muted-foreground" :title="account.client_id">
                                            {{ account.client_id }}
                                        </span>
                                        <Button
                                            type="button"
                                            size="icon"
                                            variant="ghost"
                                            class="h-6 w-6 shrink-0 text-muted-foreground hover:text-foreground"
                                            title="Copy Client ID"
                                            @click="copyToClipboard(account.client_id, 'cid-' + account.id)"
                                        >
                                            <Check v-if="copiedKey === 'cid-' + account.id" class="h-3 w-3 text-emerald-500" />
                                            <Copy v-else class="h-3 w-3" />
                                        </Button>
                                    </div>
                                </td>

                                <!-- Secrets -->
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-1.5 font-mono text-xs max-w-[140px]">
                                        <span class="truncate text-muted-foreground">
                                            {{ showSecrets[account.id] ? account.client_secret : maskSecret(account.client_secret) }}
                                        </span>
                                        <Button
                                            type="button"
                                            size="icon"
                                            variant="ghost"
                                            class="h-6 w-6 shrink-0 text-muted-foreground hover:text-foreground"
                                            :title="showSecrets[account.id] ? 'Hide Secret' : 'Show Secret'"
                                            @click="toggleSecretVisibility(account.id)"
                                        >
                                            <EyeOff v-if="showSecrets[account.id]" class="h-3 w-3" />
                                            <Eye v-else class="h-3 w-3" />
                                        </Button>
                                    </div>
                                </td>

                                <!-- Status -->
                                <td class="py-3 px-4">
                                    <Badge
                                        v-if="account.is_active"
                                        variant="secondary"
                                        class="bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 border-emerald-500/20"
                                    >
                                        <CheckCircle2 class="mr-1 h-3 w-3" />
                                        Active
                                    </Badge>
                                    <Badge
                                        v-else
                                        variant="outline"
                                        class="text-muted-foreground"
                                    >
                                        <XCircle class="mr-1 h-3 w-3" />
                                        Inactive
                                    </Badge>
                                </td>

                                <!-- Actions -->
                                <td class="py-3 px-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <!-- Test Connection Button -->
                                        <Button
                                            type="button"
                                            size="sm"
                                            variant="outline"
                                            class="h-8 text-xs font-medium border-amber-500/30 text-amber-600 dark:text-amber-400 hover:bg-amber-500/10 hover:border-amber-500/50"
                                            :disabled="testingAccountId === account.id"
                                            title="Test connection to Google Drive"
                                            @click="testAccountConnection(account)"
                                        >
                                            <Spinner v-if="testingAccountId === account.id" class="h-3.5 w-3.5 text-amber-500" />
                                            <Zap v-else class="h-3.5 w-3.5 fill-amber-500 text-amber-500" />
                                            <span class="hidden sm:inline">Test</span>
                                        </Button>

                                        <!-- Toggle Status -->
                                        <Button
                                            type="button"
                                            size="icon"
                                            variant="ghost"
                                            class="h-8 w-8 text-muted-foreground hover:text-foreground"
                                            :title="account.is_active ? 'Deactivate Account' : 'Activate Account'"
                                            @click="toggleAccountStatus(account)"
                                        >
                                            <Power :class="['h-4 w-4', account.is_active ? 'text-emerald-500' : 'text-muted-foreground']" />
                                        </Button>

                                        <!-- Edit -->
                                        <Button
                                            type="button"
                                            size="icon"
                                            variant="ghost"
                                            class="h-8 w-8 text-muted-foreground hover:text-foreground"
                                            title="Edit Account"
                                            @click="openEditModal(account)"
                                        >
                                            <Edit3 class="h-4 w-4" />
                                        </Button>

                                        <!-- Delete -->
                                        <Button
                                            type="button"
                                            size="icon"
                                            variant="ghost"
                                            class="h-8 w-8 text-destructive hover:bg-destructive/10"
                                            title="Delete Account"
                                            @click="deleteAccount(account)"
                                        >
                                            <Trash2 class="h-4 w-4" />
                                        </Button>
                                    </div>
                                </td>
                            </tr>

                            <tr v-if="accounts.data.length === 0">
                                <td colspan="7" class="py-12 text-center text-muted-foreground">
                                    <HardDrive class="mx-auto h-8 w-8 mb-2 opacity-40 text-blue-500" />
                                    <p class="font-medium text-foreground">No Google Drive accounts found</p>
                                    <p class="text-xs mt-1 text-muted-foreground">Click "Add Drive Account" above to connect your first Google Drive account.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div
                    v-if="accounts.last_page > 1"
                    class="flex items-center justify-between border-t px-4 py-3 sm:px-6"
                >
                    <div class="text-xs text-muted-foreground">
                        Page {{ accounts.current_page }} of {{ accounts.last_page }}
                    </div>
                    <div class="flex items-center gap-1">
                        <template v-for="(link, i) in accounts.links" :key="i">
                            <Button
                                v-if="link.url"
                                as-child
                                size="sm"
                                :variant="link.active ? 'default' : 'outline'"
                                class="h-8 min-w-8 px-2 text-xs"
                            >
                                <a
                                    :href="link.url"
                                    @click.prevent="router.get(link.url)"
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

        <!-- Add / Edit Modal -->
        <Dialog v-model:open="isModalOpen">
            <DialogContent class="sm:max-w-xl">
                <DialogHeader>
                    <DialogTitle>
                        {{ isEditing ? 'Edit Google Drive Account' : 'Add Google Drive Account' }}
                    </DialogTitle>
                    <DialogDescription>
                        {{ isEditing ? 'Update your Google Drive OAuth credentials and priority.' : 'Enter your Google Drive OAuth 2.0 Client credentials and failover priority.' }}
                    </DialogDescription>
                </DialogHeader>

                <form @submit.prevent="submitForm" class="space-y-4 py-2">
                    <!-- Account Name -->
                    <div class="space-y-1.5">
                        <Label for="name">
                            Account Name / Label <span class="text-destructive">*</span>
                        </Label>
                        <Input
                            id="name"
                            v-model="form.name"
                            placeholder="e.g. Primary Drive 1, Storage Account 2"
                            required
                        />
                        <InputError :message="form.errors.name" />
                    </div>

                    <!-- Email & Priority -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <Label for="email">Account Email (Optional)</Label>
                            <Input
                                id="email"
                                type="email"
                                v-model="form.email"
                                placeholder="e.g. drive-storage@gmail.com"
                            />
                            <InputError :message="form.errors.email" />
                        </div>

                        <div class="space-y-1.5">
                            <Label for="priority">
                                Routing Priority (1 = 1st choice)
                            </Label>
                            <Input
                                id="priority"
                                type="number"
                                min="1"
                                max="100"
                                v-model.number="form.priority"
                                placeholder="1"
                                required
                            />
                            <InputError :message="form.errors.priority" />
                        </div>
                    </div>

                    <!-- Client ID -->
                    <div class="space-y-1.5">
                        <Label for="client_id">
                            Client ID <span class="text-destructive">*</span>
                        </Label>
                        <Input
                            id="client_id"
                            v-model="form.client_id"
                            placeholder="e.g. 1234567890-abcdef.apps.googleusercontent.com"
                            class="font-mono text-xs"
                            required
                        />
                        <InputError :message="form.errors.client_id" />
                    </div>

                    <!-- Client Secret -->
                    <div class="space-y-1.5">
                        <Label for="client_secret">
                            Client Secret <span class="text-destructive">*</span>
                        </Label>
                        <Input
                            id="client_secret"
                            type="password"
                            v-model="form.client_secret"
                            placeholder="e.g. GOCSPX-xxxxxxxxxxxxxxxx"
                            class="font-mono text-xs"
                            :required="!isEditing"
                        />
                        <InputError :message="form.errors.client_secret" />
                    </div>

                    <!-- Refresh Token -->
                    <div class="space-y-1.5">
                        <Label for="refresh_token">
                            Refresh Token <span class="text-destructive">*</span>
                        </Label>
                        <textarea
                            id="refresh_token"
                            v-model="form.refresh_token"
                            placeholder="e.g. 1//0gxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                            class="border-input placeholder:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 flex min-h-[80px] w-full rounded-md border bg-transparent px-3 py-2 text-xs font-mono shadow-xs outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50"
                            :required="!isEditing"
                        />
                        <InputError :message="form.errors.refresh_token" />
                    </div>

                    <!-- Is Active Checkbox -->
                    <div class="flex items-center gap-2 pt-2">
                        <input
                            id="is_active"
                            type="checkbox"
                            v-model="form.is_active"
                            class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                        />
                        <Label for="is_active" class="cursor-pointer text-sm font-normal">
                            Enable this Google Drive account immediately
                        </Label>
                    </div>

                    <DialogFooter class="pt-4 flex flex-col-reverse sm:flex-row sm:items-center sm:justify-between gap-2">
                        <Button
                            type="button"
                            variant="outline"
                            class="border-amber-500/30 text-amber-600 dark:text-amber-400 hover:bg-amber-500/10"
                            :disabled="isTestingCredentials || !form.client_id || !form.client_secret || !form.refresh_token"
                            @click="testModalCredentials"
                        >
                            <Spinner v-if="isTestingCredentials" class="mr-1.5 h-3.5 w-3.5 text-amber-500" />
                            <Zap v-else class="mr-1.5 h-3.5 w-3.5 fill-amber-500 text-amber-500" />
                            Test Credentials
                        </Button>

                        <div class="flex items-center gap-2">
                            <Button
                                type="button"
                                variant="outline"
                                @click="isModalOpen = false"
                            >
                                Cancel
                            </Button>
                            <Button
                                type="submit"
                                class="bg-blue-600 text-white hover:bg-blue-500 font-medium"
                                :disabled="form.processing"
                            >
                                {{ isEditing ? 'Update Account' : 'Save Drive Account' }}
                            </Button>
                        </div>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>

        <!-- Test Connection Result Dialog -->
        <Dialog v-model:open="isResultModalOpen">
            <DialogContent class="sm:max-w-md">
                <DialogHeader>
                    <div class="flex items-center gap-2.5">
                        <div
                            :class="[
                                'flex h-10 w-10 shrink-0 items-center justify-center rounded-xl',
                                testResult?.success ? 'bg-emerald-500/15 text-emerald-600 dark:text-emerald-400' : 'bg-destructive/15 text-destructive'
                            ]"
                        >
                            <CheckCircle2 v-if="testResult?.success" class="h-6 w-6" />
                            <XCircle v-else class="h-6 w-6" />
                        </div>
                        <div>
                            <DialogTitle>
                                {{ testResult?.success ? 'Connection Successful!' : 'Connection Failed' }}
                            </DialogTitle>
                            <DialogDescription>
                                {{ testResult?.accountName }}
                            </DialogDescription>
                        </div>
                    </div>
                </DialogHeader>

                <div class="space-y-4 py-2">
                    <!-- Message Banner -->
                    <div
                        :class="[
                            'rounded-lg border p-3 text-sm',
                            testResult?.success
                                ? 'border-emerald-500/30 bg-emerald-500/10 text-emerald-800 dark:text-emerald-300'
                                : 'border-destructive/30 bg-destructive/10 text-destructive'
                        ]"
                    >
                        {{ testResult?.message }}
                    </div>

                    <!-- Success Details (Google User & Storage) -->
                    <template v-if="testResult?.success">
                        <!-- Account Info -->
                        <div v-if="testResult.account?.email || testResult.account?.name" class="rounded-lg border p-3 bg-muted/20 space-y-2">
                            <div class="text-xs font-semibold uppercase text-muted-foreground">
                                Verified Google Account
                            </div>
                            <div class="flex items-center gap-3">
                                <Avatar class="h-9 w-9 rounded-full">
                                    <AvatarImage
                                        v-if="testResult.account.photo"
                                        :src="testResult.account.photo"
                                        :alt="testResult.account.name || 'Account'"
                                    />
                                    <AvatarFallback class="rounded-full text-xs font-medium">
                                        {{ getInitials(testResult.account.name || testResult.account.email || 'GD') }}
                                    </AvatarFallback>
                                </Avatar>
                                <div class="text-sm">
                                    <div v-if="testResult.account.name" class="font-medium text-foreground">
                                        {{ testResult.account.name }}
                                    </div>
                                    <div v-if="testResult.account.email" class="text-xs text-muted-foreground">
                                        {{ testResult.account.email }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Storage Quota -->
                        <div v-if="testResult.storage" class="rounded-lg border p-3 bg-muted/20 space-y-2">
                            <div class="flex items-center justify-between text-xs font-semibold uppercase text-muted-foreground">
                                <span class="flex items-center gap-1.5">
                                    <Database class="h-3.5 w-3.5" />
                                    Google Drive Storage
                                </span>
                                <span v-if="testResult.storage.limit">
                                    {{ calculateStoragePercent(testResult.storage.usage, testResult.storage.limit) }}% used
                                </span>
                            </div>

                            <div v-if="testResult.storage.limit" class="h-2 w-full overflow-hidden rounded-full bg-muted">
                                <div
                                    class="h-full bg-blue-500 transition-all duration-500"
                                    :style="{ width: `${calculateStoragePercent(testResult.storage.usage, testResult.storage.limit)}%` }"
                                />
                            </div>

                            <div class="flex justify-between text-xs text-muted-foreground">
                                <span>Used: {{ formatBytes(testResult.storage.usage) }}</span>
                                <span>Total: {{ formatBytes(testResult.storage.limit) }}</span>
                            </div>
                        </div>
                    </template>

                    <!-- Failure Troubleshooting Advice -->
                    <div v-else class="text-xs text-muted-foreground space-y-1.5 border-t pt-3">
                        <div class="font-medium text-foreground">Troubleshooting tips:</div>
                        <ul class="list-disc list-inside space-y-1 pl-1">
                            <li>Check if the <strong class="text-foreground">Client ID</strong> and <strong class="text-foreground">Client Secret</strong> match your Google Cloud Console app.</li>
                            <li>Ensure the <strong class="text-foreground">Refresh Token</strong> was generated with the <code class="bg-muted px-1 py-0.5 rounded">https://www.googleapis.com/auth/drive</code> scope.</li>
                            <li>Make sure Google Drive API is enabled in your Google Cloud project.</li>
                        </ul>
                    </div>
                </div>

                <DialogFooter class="pt-2">
                    <Button
                        type="button"
                        class="w-full sm:w-auto"
                        @click="isResultModalOpen = false"
                    >
                        Close
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    </div>
</template>

