<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import {
    Archive,
    Download,
    File,
    FileCode,
    FileSpreadsheet,
    FileText,
    Image as ImageIcon,
    Music,
    Video,
} from '@lucide/vue';
import { computed } from 'vue';
import PublicLayout from '@/layouts/PublicLayout.vue';
import drive from '@/routes/drive';

defineOptions({ layout: PublicLayout });

const props = defineProps<{
    file: {
        name: string;
        mime_type: string | null;
        size: number;
        created_at: string | null;
        token: string;
    };
}>();

const ext = computed(() => props.file.name.split('.').pop()?.toLowerCase() ?? '');
const mime = computed(() => props.file.mime_type ?? '');

const isImage = computed(() => mime.value.startsWith('image/') || ['png', 'jpg', 'jpeg', 'gif', 'webp', 'svg'].includes(ext.value));
const isVideo = computed(() => mime.value.startsWith('video/') || ['mp4', 'mkv', 'webm', 'mov', 'avi'].includes(ext.value));
const isAudio = computed(() => mime.value.startsWith('audio/') || ['mp3', 'wav', 'ogg', 'm4a', 'flac'].includes(ext.value));
const isPdf = computed(() => mime.value.includes('pdf') || ext.value === 'pdf');

const previewUrl = computed(() => drive.public.preview.url({ token: props.file.token }));
const downloadUrl = computed(() => drive.public.download.url({ token: props.file.token }));

const fileIcon = computed(() => {
    if (isVideo.value) return Video;
    if (isAudio.value) return Music;
    if (isPdf.value) return FileText;
    if (mime.value.includes('spreadsheet') || mime.value.includes('excel') || ['xls', 'xlsx', 'csv'].includes(ext.value)) return FileSpreadsheet;
    if (mime.value.includes('zip') || mime.value.includes('compressed') || ['zip', 'rar', '7z', 'tar', 'gz'].includes(ext.value)) return Archive;
    if (['js', 'ts', 'jsx', 'tsx', 'html', 'css', 'json', 'py', 'php', 'sql', 'sh'].includes(ext.value)) return FileCode;
    return File;
});

const formatBytes = (bytes: number) => {
    if (bytes === 0) return '0 B';
    const k = 1024;
    const sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
};

const formatDate = (dateStr: string | null) => {
    if (!dateStr) return '';
    return new Date(dateStr).toLocaleDateString(undefined, {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
    });
};
</script>

<template>
    <Head :title="`${file.name} — Shared file`" />

    <div class="mx-auto max-w-2xl px-5 py-14 sm:px-8 sm:py-20">
        <div class="overflow-hidden rounded-[2rem] border border-white/10 bg-white/[0.03] shadow-[0_30px_80px_rgba(0,0,0,0.3)]">
            <!-- Preview area -->
            <div class="flex items-center justify-center bg-black/20 p-6 sm:p-10">
                <img
                    v-if="isImage"
                    :src="previewUrl"
                    :alt="file.name"
                    class="max-h-80 max-w-full rounded-xl object-contain shadow-md"
                />
                <video
                    v-else-if="isVideo"
                    :src="previewUrl"
                    controls
                    class="max-h-80 max-w-full rounded-xl shadow-md"
                />
                <div v-else-if="isAudio" class="flex w-full flex-col items-center gap-4 py-6">
                    <Music class="size-16 text-[#c7f36b]" />
                    <audio :src="previewUrl" controls class="w-full max-w-sm" />
                </div>
                <div v-else class="flex size-24 items-center justify-center rounded-2xl bg-[#c7f36b]/10 text-[#c7f36b]">
                    <component :is="fileIcon" class="size-11" />
                </div>
            </div>

            <!-- Details -->
            <div class="border-t border-white/10 p-6 sm:p-8">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#91a496]">Shared file</p>
                <h1 class="mt-1 truncate text-xl font-semibold text-white sm:text-2xl" :title="file.name">
                    {{ file.name }}
                </h1>
                <p class="mt-1.5 text-sm text-[#91a496]">
                    {{ formatBytes(file.size) }}
                    <span v-if="file.created_at">&bull; Shared {{ formatDate(file.created_at) }}</span>
                </p>

                <a
                    :href="downloadUrl"
                    class="mt-6 inline-flex items-center gap-2 rounded-full bg-[#c7f36b] px-6 py-3 font-semibold text-[#10221d] shadow-[0_12px_30px_rgba(199,243,107,0.18)] transition hover:-translate-y-0.5 hover:bg-[#d8ff8c]"
                >
                    <Download class="size-4" /> Download file
                </a>

                <p class="mt-5 text-xs text-[#718271]">
                    Anyone with this link can view and download this file. The owner can revoke access at any time.
                </p>
            </div>
        </div>
    </div>
</template>
