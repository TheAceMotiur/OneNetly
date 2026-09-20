<script setup lang="ts">
import AdSlot from '@/components/AdSlot.vue';
import AppContent from '@/components/AppContent.vue';
import AppFooter from '@/components/AppFooter.vue';
import AppShell from '@/components/AppShell.vue';
import AppSidebar from '@/components/AppSidebar.vue';
import AppSidebarHeader from '@/components/AppSidebarHeader.vue';
import { Toaster } from '@/components/ui/sonner';
import { useAdsense } from '@/composables/useAdsense';
import type { BreadcrumbItem } from '@/types';

type Props = {
    breadcrumbs?: BreadcrumbItem[];
};

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const { ads } = useAdsense();
</script>

<template>
    <AppShell variant="sidebar">
        <AppSidebar />
        <AppContent variant="sidebar" class="min-w-0 overflow-x-clip">
            <AppSidebarHeader :breadcrumbs="breadcrumbs" />
            <div v-if="ads.slots.header" class="px-4 pt-4">
                <AdSlot :slot="ads.slots.header" label="Advertisement" />
            </div>
            <div class="flex flex-1 flex-col">
                <slot />
            </div>
            <AppFooter />
        </AppContent>
        <Toaster />
    </AppShell>
</template>
