<script setup lang="ts">
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import {
    Archive,
    Check,
    CheckSquare,
    ChevronRight,
    Copy,
    CornerDownRight,
    Download,
    Edit3,
    ExternalLink,
    Eye,
    File,
    FileCode,
    FileSpreadsheet,
    FileText,
    Files,
    Folder,
    FolderPlus,
    Globe,
    Grid,
    HardDrive,
    Image,
    Info,
    List,
    MoreVertical,
    Move,
    Music,
    Plus,
    RotateCcw,
    Search,
    Share2,
    Square,
    Star,
    Trash2,
    UploadCloud,
    Video,
    X,
} from '@lucide/vue';
import { computed, ref, watch } from 'vue';
import AdSlot from '@/components/AdSlot.vue';
import InputError from '@/components/InputError.vue';
import { useAdsense } from '@/composables/useAdsense';
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
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import { dashboard } from '@/routes';
import drive from '@/routes/drive';

type DriveItem = {
    id: number;
    parent_id: number | null;
    name: string;
    type: 'folder' | 'file';
    mime_type: string | null;
    size: number;
    is_starred: boolean;
    is_trashed: boolean;
    share_token?: string | null;
    share_url?: string | null;
    updated_at: string;
    created_at: string;
};

type Breadcrumb = {
    id: number | null;
    name: string;
};

type FolderOption = {
    id: number;
    parent_id: number | null;
    name: string;
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

const props = defineProps<{
    folders: DriveItem[];
    files: DriveItem[];
    currentFolder: { id: number; name: string; parent_id: number | null } | null;
    breadcrumbs: Breadcrumb[];
    allFolders: FolderOption[];
    filters: {
        folder_id: number | null;
        search: string;
        filter: string;
    };
    storage: {
        used: number;
        limit: number | null;
        pool?: PoolStats;
        activeGoogleDrive: {
            id: number;
            name: string;
            email: string | null;
        } | null;
    };
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'My Files',
                href: dashboard.url(),
            },
        ],
    },
});

// View mode: 'grid' or 'list'
const viewMode = ref<'grid' | 'list'>('grid');

// Thumbnail previews for image files
const thumbnailErrors = ref<Set<number>>(new Set());
const isImageFile = (file: DriveItem) => {
    if (file.mime_type?.startsWith('image/')) return true;
    const ext = file.name.split('.').pop()?.toLowerCase() || '';
    return ['png', 'jpg', 'jpeg', 'gif', 'webp', 'svg'].includes(ext);
};
const getThumbnailUrl = (file: DriveItem) => drive.items.preview.url({ item: file.id });
const markThumbnailError = (id: number) => {
    thumbnailErrors.value.add(id);
};

const { ads } = useAdsense();

const storagePercent = computed(() => {
    if (!props.storage.limit) return null;
    return Math.min(100, Math.round((props.storage.used / props.storage.limit) * 100));
});

// Search & Filter
const searchQuery = ref(props.filters.search ?? '');
let searchTimeout: ReturnType<typeof setTimeout> | null = null;
watch(searchQuery, (query) => {
    if (searchTimeout) clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        router.get(
            dashboard.url(),
            {
                folder_id: props.currentFolder?.id || undefined,
                filter: props.filters.filter !== 'all' ? props.filters.filter : undefined,
                search: query || undefined,
            },
            {
                preserveState: true,
                replace: true,
            },
        );
    }, 350);
});

// Multi-Selection State
const selectedItemIds = ref<number[]>([]);
const isBulkMoveModalOpen = ref(false);
const bulkTargetFolderId = ref<number | null>(null);

const allItems = computed(() => [...props.folders, ...props.files]);

const isAllSelected = computed(() => {
    return allItems.value.length > 0 && selectedItemIds.value.length === allItems.value.length;
});

const toggleSelectAll = () => {
    if (isAllSelected.value) {
        selectedItemIds.value = [];
    } else {
        selectedItemIds.value = allItems.value.map((i) => i.id);
    }
};

const toggleSelectItem = (id: number) => {
    const idx = selectedItemIds.value.indexOf(id);
    if (idx > -1) {
        selectedItemIds.value.splice(idx, 1);
    } else {
        selectedItemIds.value.push(id);
    }
};

const clearSelection = () => {
    selectedItemIds.value = [];
};

// Drag and drop upload state
const isDragging = ref(false);
const isUploading = ref(false);
const uploadProgress = ref<number | null>(null);

const fileInputRef = ref<HTMLInputElement | null>(null);
const folderInputRef = ref<HTMLInputElement | null>(null);

// Modal States
const isNewFolderModalOpen = ref(false);
const isRenameModalOpen = ref(false);
const isMoveModalOpen = ref(false);
const isDetailsModalOpen = ref(false);
const isPreviewModalOpen = ref(false);
const isShareModalOpen = ref(false);

const activeItem = ref<DriveItem | null>(null);
const selectedTargetFolderId = ref<number | null>(null);
const shareUrl = ref<string | null>(null);
const isGeneratingShare = ref(false);
const copiedShare = ref(false);

// Forms
const newFolderForm = useForm({
    name: '',
    parent_id: props.currentFolder?.id ?? null,
});

const renameForm = useForm({
    name: '',
});

// Open New Folder Modal
const openNewFolderModal = () => {
    newFolderForm.reset();
    newFolderForm.clearErrors();
    newFolderForm.parent_id = props.currentFolder?.id ?? null;
    isNewFolderModalOpen.value = true;
};

const createFolder = () => {
    newFolderForm.parent_id = props.currentFolder?.id ?? null;
    newFolderForm.post(drive.folders.store.url(), {
        preserveScroll: true,
        onSuccess: () => {
            isNewFolderModalOpen.value = false;
            newFolderForm.reset();
        },
    });
};

// Open Rename Modal
const openRenameModal = (item: DriveItem) => {
    activeItem.value = item;
    renameForm.clearErrors();
    renameForm.name = item.name;
    isRenameModalOpen.value = true;
};

const submitRename = () => {
    if (!activeItem.value) return;
    renameForm.patch(drive.items.rename.url({ item: activeItem.value.id }), {
        preserveScroll: true,
        onSuccess: () => {
            isRenameModalOpen.value = false;
            activeItem.value = null;
        },
    });
};

// Open Move Modal
const openMoveModal = (item: DriveItem) => {
    activeItem.value = item;
    selectedTargetFolderId.value = item.parent_id ?? null;
    isMoveModalOpen.value = true;
};

// Eligible target folders
const eligibleTargetFolders = computed(() => {
    if (!activeItem.value || activeItem.value.type !== 'folder') {
        return props.allFolders;
    }

    const invalidIds = new Set<number>([activeItem.value.id]);
    let added = true;
    while (added) {
        added = false;
        for (const folder of props.allFolders) {
            if (folder.parent_id && invalidIds.has(folder.parent_id) && !invalidIds.has(folder.id)) {
                invalidIds.add(folder.id);
                added = true;
            }
        }
    }

    return props.allFolders.filter((f) => !invalidIds.has(f.id));
});

const submitMove = () => {
    if (!activeItem.value) return;

    router.patch(
        drive.items.move.url({ item: activeItem.value.id }),
        {
            parent_id: selectedTargetFolderId.value,
        },
        {
            preserveScroll: true,
            onSuccess: () => {
                isMoveModalOpen.value = false;
                activeItem.value = null;
            },
        },
    );
};

// Duplicate file
const duplicateFile = (item: DriveItem) => {
    router.post(drive.items.duplicate.url({ item: item.id }), {}, {
        preserveScroll: true,
    });
};

// File Preview
const openPreviewModal = (item: DriveItem) => {
    if (item.type === 'folder') {
        router.get(dashboard.url({ query: { folder_id: item.id } }));
        return;
    }
    activeItem.value = item;
    isPreviewModalOpen.value = true;
};

// Details Modal
const openDetailsModal = (item: DriveItem) => {
    activeItem.value = item;
    isDetailsModalOpen.value = true;
};

// Share Modal
const getCsrfToken = () => {
    const match = document.cookie.match(new RegExp('(^|;\\s*)(XSRF-TOKEN)=([^;]*)'));
    return match ? decodeURIComponent(match[3]) : '';
};

const openShareModal = async (item: DriveItem) => {
    activeItem.value = item;
    shareUrl.value = item.share_url || null;
    copiedShare.value = false;
    isShareModalOpen.value = true;

    if (!shareUrl.value) {
        isGeneratingShare.value = true;
        try {
            const res = await fetch(drive.items.share.url({ item: item.id }), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-XSRF-TOKEN': getCsrfToken(),
                },
            });
            const data = await res.json();
            if (data.share_url) {
                shareUrl.value = data.share_url;
                item.share_url = data.share_url;
            }
        } finally {
            isGeneratingShare.value = false;
        }
    }
};

const copyShareLink = () => {
    if (!shareUrl.value) return;
    navigator.clipboard.writeText(shareUrl.value);
    copiedShare.value = true;
    setTimeout(() => {
        copiedShare.value = false;
    }, 2500);
};

const revokeShareLink = async () => {
    if (!activeItem.value) return;
    try {
        await fetch(drive.items.unshare.url({ item: activeItem.value.id }), {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-XSRF-TOKEN': getCsrfToken(),
            },
        });
        shareUrl.value = null;
        if (activeItem.value) {
            activeItem.value.share_url = null;
            activeItem.value.share_token = null;
        }
    } catch {
        // Handle revocation failure silently
    }
};

// Bulk Actions
const runBulkAction = (action: 'star' | 'unstar' | 'trash' | 'restore' | 'delete') => {
    if (selectedItemIds.value.length === 0) return;

    if (action === 'delete') {
        if (!confirm(`Are you sure you want to permanently delete ${selectedItemIds.value.length} selected items?`)) return;
    }

    router.post(drive.bulk.url(), {
        action,
        item_ids: selectedItemIds.value,
    }, {
        preserveScroll: true,
        onSuccess: () => {
            selectedItemIds.value = [];
        },
    });
};

const submitBulkMove = () => {
    if (selectedItemIds.value.length === 0) return;

    router.post(drive.bulk.url(), {
        action: 'move',
        item_ids: selectedItemIds.value,
        target_parent_id: bulkTargetFolderId.value,
    }, {
        preserveScroll: true,
        onSuccess: () => {
            isBulkMoveModalOpen.value = false;
            selectedItemIds.value = [];
        },
    });
};

// File upload handler
const handleFilesSelected = (event: Event) => {
    const target = event.target as HTMLInputElement;
    if (target.files && target.files.length > 0) {
        uploadFiles(Array.from(target.files));
        target.value = '';
    }
};

const uploadFiles = (filesList: File[]) => {
    if (filesList.length === 0) return;

    const formData = new FormData();
    filesList.forEach((file) => {
        formData.append('files[]', file);
    });

    if (props.currentFolder?.id) {
        formData.append('parent_id', props.currentFolder.id.toString());
    }

    isUploading.value = true;
    uploadProgress.value = 0;

    router.post(drive.upload.url(), formData, {
        forceFormData: true,
        preserveScroll: true,
        onProgress: (progress) => {
            if (progress?.percentage) {
                uploadProgress.value = progress.percentage;
            }
        },
        onFinish: () => {
            isUploading.value = false;
            uploadProgress.value = null;
        },
    });
};

// Drag and drop events
const onDragOver = (e: DragEvent) => {
    e.preventDefault();
    isDragging.value = true;
};

const onDragLeave = (e: DragEvent) => {
    e.preventDefault();
    isDragging.value = false;
};

const onDrop = (e: DragEvent) => {
    e.preventDefault();
    isDragging.value = false;
    if (e.dataTransfer?.files && e.dataTransfer.files.length > 0) {
        uploadFiles(Array.from(e.dataTransfer.files));
    }
};

// Item Actions
const toggleStar = (item: DriveItem) => {
    router.patch(drive.items.star.url({ item: item.id }), {}, { preserveScroll: true });
};

const deleteItem = (item: DriveItem, permanent = false) => {
    const confirmMessage = permanent || item.is_trashed
        ? `Are you sure you want to permanently delete "${item.name}"? This will also remove it from connected storage.`
        : `Move "${item.name}" to trash?`;

    if (!confirm(confirmMessage)) return;

    router.delete(drive.items.destroy.url({ item: item.id }), {
        data: { permanent: permanent || item.is_trashed },
        preserveScroll: true,
    });
};

const restoreItem = (item: DriveItem) => {
    router.patch(drive.items.restore.url({ item: item.id }), {}, { preserveScroll: true });
};

const downloadFile = (item: DriveItem) => {
    window.location.href = drive.items.download.url({ item: item.id });
};

// Helpers
const formatBytes = (bytes: number) => {
    if (bytes === 0) return '0 B';
    const k = 1024;
    const sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
};

const formatDate = (dateStr: string) => {
    if (!dateStr) return '';
    return new Date(dateStr).toLocaleDateString(undefined, {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
    });
};

const getFileIcon = (mimeType: string | null, name: string) => {
    if (!mimeType) mimeType = '';
    const ext = name.split('.').pop()?.toLowerCase() || '';

    if (mimeType.startsWith('image/') || ['png', 'jpg', 'jpeg', 'gif', 'svg', 'webp'].includes(ext)) {
        return Image;
    }
    if (mimeType.startsWith('video/') || ['mp4', 'mkv', 'webm', 'mov', 'avi'].includes(ext)) {
        return Video;
    }
    if (mimeType.startsWith('audio/') || ['mp3', 'wav', 'ogg', 'm4a', 'flac'].includes(ext)) {
        return Music;
    }
    if (mimeType.includes('pdf') || ext === 'pdf') {
        return FileText;
    }
    if (
        mimeType.includes('spreadsheet') ||
        mimeType.includes('excel') ||
        ['xls', 'xlsx', 'csv'].includes(ext)
    ) {
        return FileSpreadsheet;
    }
    if (
        mimeType.includes('zip') ||
        mimeType.includes('compressed') ||
        mimeType.includes('tar') ||
        ['zip', 'rar', '7z', 'tar', 'gz'].includes(ext)
    ) {
        return Archive;
    }
    if (
        mimeType.includes('javascript') ||
        mimeType.includes('json') ||
        mimeType.includes('html') ||
        mimeType.includes('php') ||
        ['js', 'ts', 'jsx', 'tsx', 'html', 'css', 'json', 'py', 'php', 'sql', 'sh'].includes(ext)
    ) {
        return FileCode;
    }

    return File;
};

const getFileColorClass = (mimeType: string | null, name: string) => {
    if (!mimeType) mimeType = '';
    const ext = name.split('.').pop()?.toLowerCase() || '';

    if (mimeType.startsWith('image/') || ['png', 'jpg', 'jpeg', 'svg', 'webp'].includes(ext)) {
        return 'text-rose-500 bg-rose-500/10';
    }
    if (mimeType.startsWith('video/') || ['mp4', 'mkv', 'mov'].includes(ext)) {
        return 'text-purple-500 bg-purple-500/10';
    }
    if (mimeType.includes('pdf') || ext === 'pdf') {
        return 'text-red-500 bg-red-500/10';
    }
    if (mimeType.includes('spreadsheet') || ['xls', 'xlsx', 'csv'].includes(ext)) {
        return 'text-emerald-500 bg-emerald-500/10';
    }
    if (mimeType.includes('zip') || ['zip', 'rar', '7z'].includes(ext)) {
        return 'text-amber-500 bg-amber-500/10';
    }
    if (mimeType.includes('json') || ['js', 'ts', 'html', 'php'].includes(ext)) {
        return 'text-cyan-500 bg-cyan-500/10';
    }

    return 'text-blue-500 bg-blue-500/10';
};
</script>

<template>
    <Head title="My Files" />

    <!-- Hidden file inputs for uploading -->
    <input
        ref="fileInputRef"
        type="file"
        multiple
        class="hidden"
        @change="handleFilesSelected"
    />
    <input
        ref="folderInputRef"
        type="file"
        multiple
        webkitdirectory
        class="hidden"
        @change="handleFilesSelected"
    />

    <div
        class="relative flex flex-1 flex-col gap-5 p-4 md:p-6"
        @dragover="onDragOver"
        @dragleave="onDragLeave"
        @drop="onDrop"
    >
        <!-- Drag and drop overlay backdrop -->
        <div
            v-if="isDragging"
            class="pointer-events-none absolute inset-0 z-50 flex items-center justify-center rounded-2xl border-2 border-dashed border-blue-500 bg-blue-500/10 backdrop-blur-xs transition-all"
        >
            <div class="flex flex-col items-center gap-3 rounded-2xl bg-background/90 p-8 shadow-2xl border">
                <UploadCloud class="h-16 w-16 text-blue-500 animate-bounce" />
                <h3 class="text-xl font-bold">Drop files here to upload</h3>
                <p class="text-sm text-muted-foreground">Files are automatically stored and organized for you.</p>
            </div>
        </div>

        <!-- Top Header & Search Bar -->
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <!-- Search Input (Drive Style) -->
            <div class="relative flex-1 max-w-xl">
                <Search class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" />
                <Input
                    v-model="searchQuery"
                    placeholder="Search your files..."
                    class="pl-10 h-10 rounded-full bg-muted/40 border-muted focus-visible:bg-background focus-visible:ring-blue-500"
                />
                <button
                    v-if="searchQuery"
                    type="button"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-muted-foreground hover:text-foreground"
                    @click="searchQuery = ''"
                >
                    <X class="h-4 w-4" />
                </button>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-2.5">
                <!-- "+ New" Dropdown Button -->
                <DropdownMenu>
                    <DropdownMenuTrigger as-child>
                        <Button
                            size="default"
                            class="rounded-full bg-blue-600 px-5 text-white shadow-md hover:bg-blue-500 font-medium"
                        >
                            <Plus class="mr-1.5 h-5 w-5 stroke-[2.5]" />
                            New
                        </Button>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent align="end" class="w-56 rounded-xl p-1.5 shadow-xl">
                        <DropdownMenuItem @click="openNewFolderModal" class="cursor-pointer py-2 rounded-lg">
                            <FolderPlus class="mr-2.5 h-4 w-4 text-amber-500" />
                            <span>New folder</span>
                        </DropdownMenuItem>
                        <DropdownMenuSeparator />
                        <DropdownMenuItem @click="fileInputRef?.click()" class="cursor-pointer py-2 rounded-lg">
                            <UploadCloud class="mr-2.5 h-4 w-4 text-blue-500" />
                            <span>File upload</span>
                        </DropdownMenuItem>
                        <DropdownMenuItem @click="folderInputRef?.click()" class="cursor-pointer py-2 rounded-lg">
                            <Folder class="mr-2.5 h-4 w-4 text-blue-500" />
                            <span>Folder upload</span>
                        </DropdownMenuItem>
                    </DropdownMenuContent>
                </DropdownMenu>
            </div>
        </div>

        <!-- Uploading Progress Bar Banner -->
        <div
            v-if="isUploading"
            class="flex items-center justify-between rounded-xl border border-blue-500/30 bg-blue-500/10 p-3 text-sm text-blue-700 dark:text-blue-300"
        >
            <div class="flex items-center gap-2.5">
                <Spinner class="h-4 w-4 text-blue-600 dark:text-blue-400" />
                <span class="font-medium">Uploading your files...</span>
            </div>
            <div v-if="uploadProgress !== null" class="text-xs font-mono font-semibold">
                {{ uploadProgress }}%
            </div>
        </div>

        <!-- Breadcrumbs & View Toggle Bar -->
        <div class="flex flex-wrap items-center justify-between gap-2 border-b pb-3">
            <!-- Breadcrumbs -->
            <div class="flex min-w-0 flex-1 items-center gap-1 text-sm font-medium overflow-x-auto py-1">
                <template v-for="(crumb, idx) in breadcrumbs" :key="crumb.id ?? 'root'">
                    <Link
                        v-if="idx < breadcrumbs.length - 1"
                        :href="dashboard.url({ query: { folder_id: crumb.id || undefined } })"
                        class="rounded-md px-2 py-1 text-muted-foreground hover:bg-muted hover:text-foreground transition-colors shrink-0"
                    >
                        {{ crumb.name }}
                    </Link>
                    <span v-else class="rounded-md px-2 py-1 text-foreground font-semibold shrink-0">
                        {{ crumb.name }}
                    </span>
                    <ChevronRight
                        v-if="idx < breadcrumbs.length - 1"
                        class="h-4 w-4 text-muted-foreground/60 shrink-0"
                    />
                </template>

                <!-- Filter indicator tag -->
                <Badge
                    v-if="filters.filter && filters.filter !== 'all'"
                    variant="secondary"
                    class="ml-2 uppercase text-[10px]"
                >
                    {{ filters.filter }}
                </Badge>
            </div>
            <!-- Grid / List Switcher & Select All -->
            <div class="flex items-center gap-1.5 shrink-0">
                <div
                    v-if="storagePercent !== null"
                    class="hidden items-center gap-2 rounded-full border bg-muted/40 px-3 py-1 text-[11px] text-muted-foreground sm:flex"
                    :title="`${formatBytes(storage.used)} of ${formatBytes(storage.limit!)} used`"
                >
                    <HardDrive class="h-3.5 w-3.5" />
                    <div class="h-1.5 w-20 overflow-hidden rounded-full bg-border">
                        <div
                            class="h-full rounded-full"
                            :class="storagePercent >= 90 ? 'bg-destructive' : 'bg-primary'"
                            :style="{ width: `${storagePercent}%` }"
                        />
                    </div>
                    <span>{{ formatBytes(storage.used) }} / {{ formatBytes(storage.limit!) }}</span>
                </div>

                <Button
                    v-if="allItems.length > 0"
                    type="button"
                    size="sm"
                    variant="ghost"
                    class="h-8 text-xs text-muted-foreground"
                    @click="toggleSelectAll"
                >
                    <component :is="isAllSelected ? CheckSquare : Square" class="mr-1.5 h-3.5 w-3.5" />
                    {{ isAllSelected ? 'Deselect all' : 'Select all' }}
                </Button>

                <Button
                    type="button"
                    size="icon"
                    variant="ghost"
                    :class="['h-8 w-8 rounded-lg', viewMode === 'grid' ? 'bg-muted text-foreground' : 'text-muted-foreground']"
                    title="Grid view"
                    @click="viewMode = 'grid'"
                >
                    <Grid class="h-4 w-4" />
                </Button>
                <Button
                    type="button"
                    size="icon"
                    variant="ghost"
                    :class="['h-8 w-8 rounded-lg', viewMode === 'list' ? 'bg-muted text-foreground' : 'text-muted-foreground']"
                    title="List view"
                    @click="viewMode = 'list'"
                >
                    <List class="h-4 w-4" />
                </Button>
            </div>
        </div>

        <!-- In-feed ad slot (hidden for subscribers) -->
        <AdSlot v-if="ads.slots.infeed" :slot="ads.slots.infeed" label="Advertisement" />

        <!-- FLOATING BULK ACTIONS TOOLBAR -->
        <div
            v-if="selectedItemIds.length > 0"
            class="sticky top-4 z-40 flex flex-wrap items-center justify-between gap-2 rounded-2xl border bg-card/95 p-3 shadow-xl backdrop-blur-md"
        >
            <div class="flex items-center gap-2">
                <Badge variant="default" class="bg-blue-600">
                    {{ selectedItemIds.length }} selected
                </Badge>
                <Button size="sm" variant="ghost" class="h-7 text-xs" @click="clearSelection">
                    Clear
                </Button>
            </div>

            <div class="flex flex-wrap items-center gap-1.5">
                <Button size="sm" variant="outline" class="h-8 text-xs" @click="runBulkAction('star')">
                    <Star class="mr-1.5 h-3.5 w-3.5 fill-amber-400 text-amber-400" /> Star
                </Button>
                <Button size="sm" variant="outline" class="h-8 text-xs" @click="isBulkMoveModalOpen = true">
                    <Move class="mr-1.5 h-3.5 w-3.5 text-blue-500" /> Move to
                </Button>
                <template v-if="filters.filter === 'trash'">
                    <Button size="sm" variant="outline" class="h-8 text-xs text-emerald-600" @click="runBulkAction('restore')">
                        <RotateCcw class="mr-1.5 h-3.5 w-3.5" /> Restore
                    </Button>
                    <Button size="sm" variant="destructive" class="h-8 text-xs" @click="runBulkAction('delete')">
                        <Trash2 class="mr-1.5 h-3.5 w-3.5" /> Delete Forever
                    </Button>
                </template>
                <Button v-else size="sm" variant="destructive" class="h-8 text-xs" @click="runBulkAction('trash')">
                    <Trash2 class="mr-1.5 h-3.5 w-3.5" /> Move to Trash
                </Button>
            </div>
        </div>

        <!-- FOLDERS SECTION -->
        <div v-if="folders.length > 0" class="space-y-3">
            <h2 class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                Folders ({{ folders.length }})
            </h2>

            <!-- Folders Grid View -->
            <div v-if="viewMode === 'grid'" class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
                <div
                    v-for="folder in folders"
                    :key="folder.id"
                    :class="[
                        'group relative flex items-center justify-between rounded-xl border bg-card p-3 shadow-2xs transition-all cursor-pointer',
                        selectedItemIds.includes(folder.id) ? 'border-blue-500 bg-blue-500/10 ring-2 ring-blue-500/20' : 'hover:border-blue-500/50 hover:bg-muted/40 hover:shadow-sm'
                    ]"
                    @dblclick="router.get(dashboard.url({ query: { folder_id: folder.id } }))"
                >
                    <!-- Checkbox selection -->
                    <button
                        type="button"
                        class="mr-2 text-muted-foreground hover:text-foreground"
                        @click.stop="toggleSelectItem(folder.id)"
                    >
                        <component
                            :is="selectedItemIds.includes(folder.id) ? CheckSquare : Square"
                            :class="['h-4 w-4', selectedItemIds.includes(folder.id) ? 'text-blue-500' : 'opacity-0 group-hover:opacity-100']"
                        />
                    </button>

                    <Link
                        :href="dashboard.url({ query: { folder_id: folder.id } })"
                        class="flex items-center gap-2 min-w-0 flex-1"
                    >
                        <Folder class="h-5 w-5 shrink-0 fill-amber-400 text-amber-500 dark:fill-amber-500/20" />
                        <span class="truncate text-sm font-medium text-foreground" :title="folder.name">
                            {{ folder.name }}
                        </span>
                    </Link>

                    <!-- Context Dropdown -->
                    <DropdownMenu>
                        <DropdownMenuTrigger as-child>
                            <Button
                                size="icon"
                                variant="ghost"
                                class="h-7 w-7 opacity-0 group-hover:opacity-100 transition-opacity"
                                @click.stop
                            >
                                <MoreVertical class="h-3.5 w-3.5 text-muted-foreground" />
                            </Button>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent align="end" class="w-44 rounded-xl">
                            <DropdownMenuItem
                                @click="router.get(dashboard.url({ query: { folder_id: folder.id } }))"
                            >
                                <Folder class="mr-2 h-4 w-4" /> Open
                            </DropdownMenuItem>
                            <DropdownMenuItem @click="toggleStar(folder)">
                                <Star :class="['mr-2 h-4 w-4', folder.is_starred ? 'fill-amber-400 text-amber-400' : '']" />
                                {{ folder.is_starred ? 'Remove star' : 'Add star' }}
                            </DropdownMenuItem>
                            <DropdownMenuItem @click="openRenameModal(folder)">
                                <Edit3 class="mr-2 h-4 w-4" /> Rename
                            </DropdownMenuItem>
                            <DropdownMenuItem @click="openMoveModal(folder)">
                                <Move class="mr-2 h-4 w-4" /> Move to
                            </DropdownMenuItem>
                            <DropdownMenuItem @click="openDetailsModal(folder)">
                                <Info class="mr-2 h-4 w-4" /> Folder details
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                class="text-destructive focus:text-destructive"
                                @click="deleteItem(folder)"
                            >
                                <Trash2 class="mr-2 h-4 w-4" /> Move to trash
                            </DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                </div>
            </div>

            <!-- Folders List View -->
            <div v-else class="rounded-xl border bg-card overflow-x-auto">
                <table class="w-full min-w-[560px] text-left text-sm">
                    <thead class="border-b bg-muted/30 text-xs uppercase text-muted-foreground">
                        <tr>
                            <th class="w-10 px-4"></th>
                            <th class="py-2.5 px-4">Name</th>
                            <th class="py-2.5 px-4">Type</th>
                            <th class="py-2.5 px-4">Modified</th>
                            <th class="py-2.5 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr
                            v-for="folder in folders"
                            :key="folder.id"
                            :class="[
                                'hover:bg-muted/40 transition-colors group cursor-pointer',
                                selectedItemIds.includes(folder.id) ? 'bg-blue-500/10' : ''
                            ]"
                            @dblclick="router.get(dashboard.url({ query: { folder_id: folder.id } }))"
                        >
                            <td class="px-4" @click.stop>
                                <button type="button" @click="toggleSelectItem(folder.id)">
                                    <component
                                        :is="selectedItemIds.includes(folder.id) ? CheckSquare : Square"
                                        :class="['h-4 w-4', selectedItemIds.includes(folder.id) ? 'text-blue-500' : 'text-muted-foreground opacity-60']"
                                    />
                                </button>
                            </td>
                            <td class="py-2.5 px-4 font-medium">
                                <Link
                                    :href="dashboard.url({ query: { folder_id: folder.id } })"
                                    class="flex items-center gap-2.5 text-foreground"
                                >
                                    <Folder class="h-4 w-4 fill-amber-400 text-amber-500" />
                                    <span>{{ folder.name }}</span>
                                    <Star v-if="folder.is_starred" class="h-3.5 w-3.5 fill-amber-400 text-amber-400" />
                                </Link>
                            </td>
                            <td class="py-2.5 px-4 text-xs text-muted-foreground">Folder</td>
                            <td class="py-2.5 px-4 text-xs text-muted-foreground">{{ formatDate(folder.updated_at) }}</td>
                            <td class="py-2.5 px-4 text-right">
                                <DropdownMenu>
                                    <DropdownMenuTrigger as-child>
                                        <Button size="icon" variant="ghost" class="h-7 w-7">
                                            <MoreVertical class="h-3.5 w-3.5" />
                                        </Button>
                                    </DropdownMenuTrigger>
                                    <DropdownMenuContent align="end" class="w-44 rounded-xl">
                                        <DropdownMenuItem @click="openRenameModal(folder)">
                                            <Edit3 class="mr-2 h-4 w-4" /> Rename
                                        </DropdownMenuItem>
                                        <DropdownMenuItem @click="openMoveModal(folder)">
                                            <Move class="mr-2 h-4 w-4" /> Move to
                                        </DropdownMenuItem>
                                        <DropdownMenuItem class="text-destructive" @click="deleteItem(folder)">
                                            <Trash2 class="mr-2 h-4 w-4" /> Trash
                                        </DropdownMenuItem>
                                    </DropdownMenuContent>
                                </DropdownMenu>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- FILES SECTION -->
        <div class="space-y-3">
            <h2 class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                Files ({{ files.length }})
            </h2>

            <!-- Files Grid View -->
            <div v-if="viewMode === 'grid' && files.length > 0" class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
                <div
                    v-for="file in files"
                    :key="file.id"
                    :class="[
                        'group relative flex flex-col rounded-2xl border bg-card shadow-2xs transition-all cursor-pointer overflow-hidden',
                        selectedItemIds.includes(file.id) ? 'border-blue-500 bg-blue-500/10 ring-2 ring-blue-500/20' : 'hover:border-blue-500/50 hover:shadow-md'
                    ]"
                    @dblclick="openPreviewModal(file)"
                >
                    <!-- Thumbnail -->
                    <div class="relative aspect-square w-full bg-muted/40" @click="openPreviewModal(file)">
                        <img
                            v-if="isImageFile(file) && !thumbnailErrors.has(file.id)"
                            :src="getThumbnailUrl(file)"
                            :alt="file.name"
                            loading="lazy"
                            decoding="async"
                            class="h-full w-full object-cover transition-transform duration-200 group-hover:scale-105"
                            @error="markThumbnailError(file.id)"
                        />
                        <div v-else :class="['flex h-full w-full items-center justify-center', getFileColorClass(file.mime_type, file.name)]">
                            <component :is="getFileIcon(file.mime_type, file.name)" class="h-10 w-10 sm:h-12 sm:w-12" />
                        </div>

                        <!-- Selection checkbox overlay -->
                        <button
                            type="button"
                            class="absolute left-2 top-2 rounded-md bg-background/80 p-1 text-muted-foreground backdrop-blur-sm hover:text-foreground"
                            @click.stop="toggleSelectItem(file.id)"
                        >
                            <component
                                :is="selectedItemIds.includes(file.id) ? CheckSquare : Square"
                                :class="['h-4 w-4', selectedItemIds.includes(file.id) ? 'text-blue-500' : 'opacity-0 group-hover:opacity-100']"
                            />
                        </button>

                        <!-- Star overlay -->
                        <button
                            type="button"
                            class="absolute right-2 top-2 rounded-md bg-background/80 p-1 text-muted-foreground backdrop-blur-sm hover:text-amber-400 transition-colors"
                            @click.stop="toggleStar(file)"
                        >
                            <Star :class="['h-3.5 w-3.5', file.is_starred ? 'fill-amber-400 text-amber-400' : 'opacity-0 group-hover:opacity-100']" />
                        </button>
                    </div>

                    <!-- File Name & Actions -->
                    <div class="flex items-start justify-between gap-1 p-2.5 pb-1">
                        <span
                            class="truncate text-xs font-semibold text-foreground hover:underline"
                            :title="file.name"
                            @click="openPreviewModal(file)"
                        >
                            {{ file.name }}
                        </span>

                        <DropdownMenu>
                            <DropdownMenuTrigger as-child>
                                <Button size="icon" variant="ghost" class="h-6 w-6 shrink-0 text-muted-foreground hover:text-foreground" @click.stop>
                                    <MoreVertical class="h-3.5 w-3.5" />
                                </Button>
                            </DropdownMenuTrigger>
                            <DropdownMenuContent align="end" class="w-48 rounded-xl shadow-xl">
                                <DropdownMenuItem v-if="!file.is_trashed" @click="openPreviewModal(file)">
                                    <Eye class="mr-2 h-4 w-4 text-primary" /> Preview
                                </DropdownMenuItem>
                                <DropdownMenuItem v-if="!file.is_trashed" @click="downloadFile(file)">
                                    <Download class="mr-2 h-4 w-4 text-blue-500" /> Download
                                </DropdownMenuItem>
                                <DropdownMenuItem v-if="!file.is_trashed" @click="openShareModal(file)">
                                    <Share2 class="mr-2 h-4 w-4 text-indigo-500" /> Get link
                                </DropdownMenuItem>
                                <DropdownMenuItem v-if="!file.is_trashed" @click="duplicateFile(file)">
                                    <Files class="mr-2 h-4 w-4 text-emerald-500" /> Make a copy
                                </DropdownMenuItem>
                                <DropdownMenuItem v-if="!file.is_trashed" @click="toggleStar(file)">
                                    <Star :class="['mr-2 h-4 w-4', file.is_starred ? 'fill-amber-400 text-amber-400' : '']" />
                                    {{ file.is_starred ? 'Remove star' : 'Add star' }}
                                </DropdownMenuItem>
                                <DropdownMenuItem v-if="!file.is_trashed" @click="openRenameModal(file)">
                                    <Edit3 class="mr-2 h-4 w-4" /> Rename
                                </DropdownMenuItem>
                                <DropdownMenuItem v-if="!file.is_trashed" @click="openMoveModal(file)">
                                    <Move class="mr-2 h-4 w-4" /> Move to
                                </DropdownMenuItem>
                                <DropdownMenuItem @click="openDetailsModal(file)">
                                    <Info class="mr-2 h-4 w-4" /> File details
                                </DropdownMenuItem>
                                <DropdownMenuSeparator />
                                <template v-if="file.is_trashed">
                                    <DropdownMenuItem @click="restoreItem(file)">
                                        <RotateCcw class="mr-2 h-4 w-4 text-emerald-500" /> Restore
                                    </DropdownMenuItem>
                                    <DropdownMenuItem class="text-destructive focus:text-destructive" @click="deleteItem(file, true)">
                                        <Trash2 class="mr-2 h-4 w-4" /> Delete permanently
                                    </DropdownMenuItem>
                                </template>
                                <DropdownMenuItem
                                    v-else
                                    class="text-destructive focus:text-destructive"
                                    @click="deleteItem(file)"
                                >
                                    <Trash2 class="mr-2 h-4 w-4" /> Move to trash
                                </DropdownMenuItem>
                            </DropdownMenuContent>
                        </DropdownMenu>
                    </div>

                    <!-- Meta -->
                    <div class="space-y-1.5 px-2.5 pb-2.5">
                        <div class="flex items-center justify-between text-[11px] text-muted-foreground">
                            <span>{{ formatBytes(file.size) }}</span>
                            <span>{{ formatDate(file.created_at) }}</span>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Files List View -->
            <div v-else-if="viewMode === 'list' && files.length > 0" class="rounded-xl border bg-card overflow-x-auto">
                <table class="w-full min-w-[640px] text-left text-sm">
                    <thead class="border-b bg-muted/30 text-xs uppercase text-muted-foreground">
                        <tr>
                            <th class="w-10 px-4"></th>
                            <th class="py-3 px-4">Name</th>
                            <th class="py-3 px-4">Size</th>
                            <th class="py-3 px-4">Storage</th>
                            <th class="py-3 px-4">Date Added</th>
                            <th class="py-3 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr
                            v-for="file in files"
                            :key="file.id"
                            :class="[
                                'hover:bg-muted/40 transition-colors group cursor-pointer',
                                selectedItemIds.includes(file.id) ? 'bg-blue-500/10' : ''
                            ]"
                            @dblclick="openPreviewModal(file)"
                        >
                            <td class="px-4" @click.stop>
                                <button type="button" @click="toggleSelectItem(file.id)">
                                    <component
                                        :is="selectedItemIds.includes(file.id) ? CheckSquare : Square"
                                        :class="['h-4 w-4', selectedItemIds.includes(file.id) ? 'text-blue-500' : 'text-muted-foreground opacity-60']"
                                    />
                                </button>
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-2.5">
                                    <div :class="['flex h-7 w-7 shrink-0 items-center justify-center overflow-hidden rounded-lg', getFileColorClass(file.mime_type, file.name)]">
                                        <img
                                            v-if="isImageFile(file) && !thumbnailErrors.has(file.id)"
                                            :src="getThumbnailUrl(file)"
                                            :alt="file.name"
                                            loading="lazy"
                                            decoding="async"
                                            class="h-full w-full object-cover"
                                            @error="markThumbnailError(file.id)"
                                        />
                                        <component v-else :is="getFileIcon(file.mime_type, file.name)" class="h-3.5 w-3.5" />
                                    </div>
                                    <span class="font-medium text-foreground truncate max-w-xs md:max-w-md hover:underline" :title="file.name" @click="openPreviewModal(file)">
                                        {{ file.name }}
                                    </span>
                                    <Star v-if="file.is_starred" class="h-3.5 w-3.5 shrink-0 fill-amber-400 text-amber-400" />
                                    <Globe v-if="file.share_token" class="h-3.5 w-3.5 shrink-0 text-emerald-500" title="Publicly shared" />
                                </div>
                            </td>
                            <td class="py-3 px-4 text-xs text-muted-foreground">
                                {{ formatBytes(file.size) }}
                            </td>
                            <td class="py-3 px-4 text-xs">
                                <span class="inline-flex items-center gap-1 text-blue-600 dark:text-blue-400">
                                    <Cloud class="h-3 w-3" />
                                    Cloud storage
                                </span>
                            </td>
                            <td class="py-3 px-4 text-xs text-muted-foreground">
                                {{ formatDate(file.created_at) }}
                            </td>
                            <td class="py-3 px-4 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <Button
                                        v-if="!file.is_trashed"
                                        size="icon"
                                        variant="ghost"
                                        class="h-7 w-7 text-muted-foreground hover:text-foreground"
                                        title="Preview"
                                        @click.stop="openPreviewModal(file)"
                                    >
                                        <Eye class="h-3.5 w-3.5" />
                                    </Button>

                                    <Button
                                        v-if="!file.is_trashed"
                                        size="icon"
                                        variant="ghost"
                                        class="h-7 w-7 text-muted-foreground hover:text-foreground"
                                        title="Download"
                                        @click.stop="downloadFile(file)"
                                    >
                                        <Download class="h-3.5 w-3.5" />
                                    </Button>

                                    <DropdownMenu>
                                        <DropdownMenuTrigger as-child>
                                            <Button size="icon" variant="ghost" class="h-7 w-7">
                                                <MoreVertical class="h-3.5 w-3.5" />
                                            </Button>
                                        </DropdownMenuTrigger>
                                        <DropdownMenuContent align="end" class="w-48 rounded-xl">
                                            <DropdownMenuItem v-if="!file.is_trashed" @click="openPreviewModal(file)">
                                                <Eye class="mr-2 h-4 w-4" /> Preview
                                            </DropdownMenuItem>
                                            <DropdownMenuItem v-if="!file.is_trashed" @click="downloadFile(file)">
                                                <Download class="mr-2 h-4 w-4" /> Download
                                            </DropdownMenuItem>
                                            <DropdownMenuItem v-if="!file.is_trashed" @click="openShareModal(file)">
                                                <Share2 class="mr-2 h-4 w-4 text-indigo-500" /> Share link
                                            </DropdownMenuItem>
                                            <DropdownMenuItem v-if="!file.is_trashed" @click="duplicateFile(file)">
                                                <Files class="mr-2 h-4 w-4" /> Make a copy
                                            </DropdownMenuItem>
                                            <DropdownMenuItem v-if="!file.is_trashed" @click="toggleStar(file)">
                                                <Star class="mr-2 h-4 w-4" /> {{ file.is_starred ? 'Unstar' : 'Star' }}
                                            </DropdownMenuItem>
                                            <DropdownMenuItem v-if="!file.is_trashed" @click="openRenameModal(file)">
                                                <Edit3 class="mr-2 h-4 w-4" /> Rename
                                            </DropdownMenuItem>
                                            <DropdownMenuItem v-if="!file.is_trashed" @click="openMoveModal(file)">
                                                <Move class="mr-2 h-4 w-4" /> Move to
                                            </DropdownMenuItem>
                                            <DropdownMenuItem @click="openDetailsModal(file)">
                                                <Info class="mr-2 h-4 w-4" /> Details
                                            </DropdownMenuItem>
                                            <DropdownMenuSeparator />
                                            <DropdownMenuItem
                                                class="text-destructive focus:text-destructive"
                                                @click="deleteItem(file, file.is_trashed)"
                                            >
                                                <Trash2 class="mr-2 h-4 w-4" />
                                                {{ file.is_trashed ? 'Delete permanently' : 'Move to trash' }}
                                            </DropdownMenuItem>
                                        </DropdownMenuContent>
                                    </DropdownMenu>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Empty State -->
            <div
                v-if="folders.length === 0 && files.length === 0"
                class="flex flex-col items-center justify-center rounded-2xl border-2 border-dashed py-16 px-4 text-center bg-muted/10"
            >
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-500/10 text-blue-500 mb-4">
                    <UploadCloud class="h-8 w-8" />
                </div>
                <h3 class="text-lg font-semibold text-foreground">
                    {{ filters.search ? 'No results found' : 'This folder is empty' }}
                </h3>
                <p class="text-sm text-muted-foreground mt-1 max-w-sm">
                    Drag and drop files here to upload, or click the "New" button above.
                </p>
                <div class="mt-5 flex gap-2">
                    <Button
                        type="button"
                        variant="outline"
                        class="rounded-full"
                        @click="openNewFolderModal"
                    >
                        <FolderPlus class="mr-1.5 h-4 w-4" />
                        New Folder
                    </Button>
                    <Button
                        type="button"
                        class="rounded-full bg-blue-600 text-white hover:bg-blue-500"
                        @click="fileInputRef?.click()"
                    >
                        <UploadCloud class="mr-1.5 h-4 w-4" />
                        Upload Files
                    </Button>
                </div>
            </div>
        </div>

        <!-- NEW FOLDER MODAL -->
        <Dialog v-model:open="isNewFolderModalOpen">
            <DialogContent class="sm:max-w-md">
                <DialogHeader>
                    <DialogTitle>New folder</DialogTitle>
                    <DialogDescription>
                        Create a new folder in {{ currentFolder ? currentFolder.name : 'My Drive' }}.
                    </DialogDescription>
                </DialogHeader>

                <form @submit.prevent="createFolder" class="space-y-4 py-2">
                    <div class="space-y-1.5">
                        <Label for="folder_name">Folder Name</Label>
                        <Input
                            id="folder_name"
                            v-model="newFolderForm.name"
                            placeholder="Untitled folder"
                            autofocus
                            required
                        />
                        <InputError :message="newFolderForm.errors.name" />
                    </div>

                    <DialogFooter class="pt-2">
                        <Button
                            type="button"
                            variant="ghost"
                            @click="isNewFolderModalOpen = false"
                        >
                            Cancel
                        </Button>
                        <Button
                            type="submit"
                            class="bg-blue-600 text-white hover:bg-blue-500 font-medium"
                            :disabled="newFolderForm.processing"
                        >
                            Create
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>

        <!-- RENAME MODAL -->
        <Dialog v-model:open="isRenameModalOpen">
            <DialogContent class="sm:max-w-md">
                <DialogHeader>
                    <DialogTitle>Rename</DialogTitle>
                    <DialogDescription>
                        Enter a new name for this {{ activeItem?.type }}.
                    </DialogDescription>
                </DialogHeader>

                <form @submit.prevent="submitRename" class="space-y-4 py-2">
                    <div class="space-y-1.5">
                        <Label for="rename_name">Name</Label>
                        <Input
                            id="rename_name"
                            v-model="renameForm.name"
                            required
                            autofocus
                        />
                        <InputError :message="renameForm.errors.name" />
                    </div>

                    <DialogFooter class="pt-2">
                        <Button
                            type="button"
                            variant="ghost"
                            @click="isRenameModalOpen = false"
                        >
                            Cancel
                        </Button>
                        <Button
                            type="submit"
                            class="bg-blue-600 text-white hover:bg-blue-500 font-medium"
                            :disabled="renameForm.processing"
                        >
                            Save
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>

        <!-- MOVE TO MODAL (SINGLE ITEM) -->
        <Dialog v-model:open="isMoveModalOpen">
            <DialogContent class="sm:max-w-md">
                <DialogHeader>
                    <DialogTitle>Move "{{ activeItem?.name }}"</DialogTitle>
                    <DialogDescription>
                        Select a destination folder in your Drive.
                    </DialogDescription>
                </DialogHeader>

                <div class="py-2 space-y-2">
                    <div class="max-h-60 overflow-y-auto space-y-1 rounded-xl border p-2 bg-muted/20">
                        <!-- Root My Drive Option -->
                        <div
                            :class="[
                                'flex items-center gap-2.5 rounded-lg p-2.5 text-sm cursor-pointer transition-colors',
                                selectedTargetFolderId === null ? 'bg-blue-500/15 text-blue-600 dark:text-blue-400 font-semibold border border-blue-500/30' : 'hover:bg-muted text-foreground'
                            ]"
                            @click="selectedTargetFolderId = null"
                        >
                            <HardDrive class="h-4 w-4 shrink-0 text-blue-500" />
                            <span>My Drive (Root)</span>
                            <Check v-if="selectedTargetFolderId === null" class="ml-auto h-4 w-4 text-blue-500" />
                        </div>

                        <!-- All User Folders List -->
                        <div
                            v-for="folder in eligibleTargetFolders"
                            :key="folder.id"
                            :class="[
                                'flex items-center gap-2.5 rounded-lg p-2.5 text-sm cursor-pointer transition-colors pl-6',
                                selectedTargetFolderId === folder.id ? 'bg-blue-500/15 text-blue-600 dark:text-blue-400 font-semibold border border-blue-500/30' : 'hover:bg-muted text-foreground'
                            ]"
                            @click="selectedTargetFolderId = folder.id"
                        >
                            <CornerDownRight class="h-3.5 w-3.5 shrink-0 text-muted-foreground" />
                            <Folder class="h-4 w-4 shrink-0 fill-amber-400 text-amber-500" />
                            <span class="truncate">{{ folder.name }}</span>
                            <Check v-if="selectedTargetFolderId === folder.id" class="ml-auto h-4 w-4 text-blue-500" />
                        </div>
                    </div>
                </div>

                <DialogFooter class="pt-2">
                    <Button
                        type="button"
                        variant="ghost"
                        @click="isMoveModalOpen = false"
                    >
                        Cancel
                    </Button>
                    <Button
                        type="button"
                        class="bg-blue-600 text-white hover:bg-blue-500 font-medium"
                        @click="submitMove"
                    >
                        Move here
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- BULK MOVE MODAL -->
        <Dialog v-model:open="isBulkMoveModalOpen">
            <DialogContent class="sm:max-w-md">
                <DialogHeader>
                    <DialogTitle>Move {{ selectedItemIds.length }} items</DialogTitle>
                    <DialogDescription>
                        Select a destination folder in your Drive.
                    </DialogDescription>
                </DialogHeader>

                <div class="py-2 space-y-2">
                    <div class="max-h-60 overflow-y-auto space-y-1 rounded-xl border p-2 bg-muted/20">
                        <div
                            :class="[
                                'flex items-center gap-2.5 rounded-lg p-2.5 text-sm cursor-pointer transition-colors',
                                bulkTargetFolderId === null ? 'bg-blue-500/15 text-blue-600 dark:text-blue-400 font-semibold border border-blue-500/30' : 'hover:bg-muted text-foreground'
                            ]"
                            @click="bulkTargetFolderId = null"
                        >
                            <HardDrive class="h-4 w-4 shrink-0 text-blue-500" />
                            <span>My Drive (Root)</span>
                            <Check v-if="bulkTargetFolderId === null" class="ml-auto h-4 w-4 text-blue-500" />
                        </div>

                        <div
                            v-for="folder in allFolders"
                            :key="folder.id"
                            :class="[
                                'flex items-center gap-2.5 rounded-lg p-2.5 text-sm cursor-pointer transition-colors pl-6',
                                bulkTargetFolderId === folder.id ? 'bg-blue-500/15 text-blue-600 dark:text-blue-400 font-semibold border border-blue-500/30' : 'hover:bg-muted text-foreground'
                            ]"
                            @click="bulkTargetFolderId = folder.id"
                        >
                            <CornerDownRight class="h-3.5 w-3.5 shrink-0 text-muted-foreground" />
                            <Folder class="h-4 w-4 shrink-0 fill-amber-400 text-amber-500" />
                            <span class="truncate">{{ folder.name }}</span>
                            <Check v-if="bulkTargetFolderId === folder.id" class="ml-auto h-4 w-4 text-blue-500" />
                        </div>
                    </div>
                </div>

                <DialogFooter class="pt-2">
                    <Button type="button" variant="ghost" @click="isBulkMoveModalOpen = false">
                        Cancel
                    </Button>
                    <Button type="button" class="bg-blue-600 text-white hover:bg-blue-500" @click="submitBulkMove">
                        Move here
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- FILE PREVIEW MODAL -->
        <Dialog v-model:open="isPreviewModalOpen">
            <DialogContent class="sm:max-w-4xl max-h-[90vh] flex flex-col p-4">
                <DialogHeader class="pb-2 flex flex-row items-center justify-between">
                    <div class="flex items-center gap-2 min-w-0 flex-1">
                        <component :is="activeItem ? getFileIcon(activeItem.mime_type, activeItem.name) : File" class="h-5 w-5 text-blue-500 shrink-0" />
                        <DialogTitle class="truncate text-base">{{ activeItem?.name }}</DialogTitle>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <Button
                            v-if="activeItem"
                            size="sm"
                            class="bg-blue-600 text-white hover:bg-blue-500"
                            @click="downloadFile(activeItem)"
                        >
                            <Download class="mr-1.5 h-3.5 w-3.5" /> Download
                        </Button>
                    </div>
                </DialogHeader>

                <!-- Preview Viewer Container -->
                <div v-if="activeItem" class="flex-1 flex items-center justify-center overflow-auto rounded-xl bg-muted/30 p-2 min-h-[350px]">
                    <!-- Image Viewer -->
                    <img
                        v-if="activeItem.mime_type?.startsWith('image/')"
                        :src="drive.items.preview.url({ item: activeItem.id })"
                        :alt="activeItem.name"
                        class="max-h-[60vh] max-w-full rounded-lg object-contain shadow-md"
                    />

                    <!-- Video Player -->
                    <video
                        v-else-if="activeItem.mime_type?.startsWith('video/')"
                        controls
                        autoplay
                        class="max-h-[60vh] max-w-full rounded-lg shadow-md"
                    >
                        <source :src="drive.items.preview.url({ item: activeItem.id })" :type="activeItem.mime_type" />
                        Your browser does not support video playback.
                    </video>

                    <!-- Audio Player -->
                    <div v-else-if="activeItem.mime_type?.startsWith('audio/')" class="flex flex-col items-center gap-4 p-8">
                        <Music class="h-16 w-16 text-blue-500 animate-pulse" />
                        <audio controls class="w-72 sm:w-96">
                            <source :src="drive.items.preview.url({ item: activeItem.id })" :type="activeItem.mime_type" />
                            Your browser does not support audio.
                        </audio>
                    </div>

                    <!-- PDF Viewer -->
                    <iframe
                        v-else-if="activeItem.mime_type === 'application/pdf' || activeItem.name.endsWith('.pdf')"
                        :src="drive.items.preview.url({ item: activeItem.id })"
                        class="w-full h-[65vh] rounded-lg border"
                    />

                    <!-- Generic File Fallback -->
                    <div v-else class="flex flex-col items-center justify-center p-8 text-center space-y-3">
                        <div :class="['flex h-16 w-16 items-center justify-center rounded-2xl', getFileColorClass(activeItem.mime_type, activeItem.name)]">
                            <component :is="getFileIcon(activeItem.mime_type, activeItem.name)" class="h-8 w-8" />
                        </div>
                        <div>
                            <p class="font-semibold text-foreground">{{ activeItem.name }}</p>
                            <p class="text-xs text-muted-foreground mt-1">{{ formatBytes(activeItem.size) }} &bull; {{ activeItem.mime_type || 'Unknown type' }}</p>
                        </div>
                        <Button size="sm" class="bg-blue-600 text-white hover:bg-blue-500" @click="downloadFile(activeItem)">
                            <Download class="mr-1.5 h-4 w-4" /> Download to view
                        </Button>
                    </div>
                </div>
            </DialogContent>
        </Dialog>

        <!-- SHARE LINK MODAL -->
        <Dialog v-model:open="isShareModalOpen">
            <DialogContent class="sm:max-w-md">
                <DialogHeader>
                    <div class="flex items-center gap-2">
                        <Share2 class="h-5 w-5 text-indigo-500" />
                        <DialogTitle>Share "{{ activeItem?.name }}"</DialogTitle>
                    </div>
                    <DialogDescription>
                        Anyone with this link will be able to view and download this file directly.
                    </DialogDescription>
                </DialogHeader>

                <div class="space-y-4 py-3">
                    <div v-if="isGeneratingShare" class="flex items-center justify-center py-6">
                        <Spinner class="h-6 w-6 text-blue-500" />
                    </div>

                    <div v-else-if="shareUrl" class="space-y-3">
                        <div class="flex items-center gap-2">
                            <Input
                                :model-value="shareUrl"
                                readonly
                                class="font-mono text-xs select-all bg-muted/40"
                            />
                            <Button
                                type="button"
                                size="sm"
                                class="bg-blue-600 text-white hover:bg-blue-500 shrink-0"
                                @click="copyShareLink"
                            >
                                <Check v-if="copiedShare" class="mr-1.5 h-4 w-4" />
                                <Copy v-else class="mr-1.5 h-4 w-4" />
                                {{ copiedShare ? 'Copied!' : 'Copy' }}
                            </Button>
                        </div>

                        <div class="flex items-center justify-between text-xs text-muted-foreground pt-1">
                            <span class="flex items-center gap-1 text-emerald-600 dark:text-emerald-400">
                                <Globe class="h-3.5 w-3.5" /> Public link active
                            </span>
                            <button
                                type="button"
                                class="text-destructive hover:underline"
                                @click="revokeShareLink"
                            >
                                Revoke link
                            </button>
                        </div>
                    </div>
                </div>

                <DialogFooter>
                    <Button type="button" @click="isShareModalOpen = false">
                        Done
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>

        <!-- DETAILS MODAL -->
        <Dialog v-model:open="isDetailsModalOpen">
            <DialogContent class="sm:max-w-md">
                <DialogHeader>
                    <div class="flex items-center gap-2.5">
                        <div :class="['flex h-9 w-9 shrink-0 items-center justify-center rounded-xl', activeItem ? getFileColorClass(activeItem.mime_type, activeItem.name) : '']">
                            <component :is="activeItem?.type === 'folder' ? Folder : getFileIcon(activeItem?.mime_type || null, activeItem?.name || '')" class="h-5 w-5" />
                        </div>
                        <div>
                            <DialogTitle class="truncate max-w-xs">{{ activeItem?.name }}</DialogTitle>
                            <DialogDescription>{{ activeItem?.type === 'folder' ? 'Folder details' : 'File properties' }}</DialogDescription>
                        </div>
                    </div>
                </DialogHeader>

                <div v-if="activeItem" class="space-y-3 py-2 text-sm">
                    <div class="rounded-xl border p-3.5 bg-muted/20 space-y-2">
                        <div class="flex justify-between">
                            <span class="text-muted-foreground">Type:</span>
                            <span class="font-medium text-foreground">{{ activeItem.mime_type || (activeItem.type === 'folder' ? 'Folder' : 'File') }}</span>
                        </div>
                        <div v-if="activeItem.type === 'file'" class="flex justify-between">
                            <span class="text-muted-foreground">Size:</span>
                            <span class="font-medium text-foreground">{{ formatBytes(activeItem.size) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-muted-foreground">Storage Engine:</span>
                            <span class="font-medium text-blue-600 dark:text-blue-400">
                                Cloud storage
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-muted-foreground">Created:</span>
                            <span class="font-medium text-foreground">{{ formatDate(activeItem.created_at) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-muted-foreground">Last modified:</span>
                            <span class="font-medium text-foreground">{{ formatDate(activeItem.updated_at) }}</span>
                        </div>
                    </div>
                </div>

                <DialogFooter>
                    <Button type="button" @click="isDetailsModalOpen = false">
                        Close
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    </div>
</template>
