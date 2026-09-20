<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { useAdsense } from '@/composables/useAdsense';

const { slot = null, format = 'auto', label = 'Advertisement' } = defineProps<{
    /** AdSense ad slot ID for this placement. Falls back gracefully if empty. */
    slot?: string | null;
    format?: string;
    label?: string;
}>();

const { ads, adsVisible } = useAdsense();
const insRef = ref<HTMLElement | null>(null);

onMounted(() => {
    if (!adsVisible.value || !slot) {
        return;
    }

    try {
        (window as unknown as { adsbygoogle?: unknown[] }).adsbygoogle =
            (window as unknown as { adsbygoogle?: unknown[] }).adsbygoogle || [];
        (window as unknown as { adsbygoogle: unknown[] }).adsbygoogle.push({});
    } catch {
        // AdSense script not yet ready; silently ignore.
    }
});
</script>

<template>
    <div
        v-if="adsVisible && slot"
        class="w-full overflow-hidden rounded-xl border border-dashed border-border/60 bg-muted/30 p-2"
    >
        <span class="mb-1 block text-center text-[10px] tracking-wide text-muted-foreground uppercase">
            {{ label }}
        </span>
        <ins
            ref="insRef"
            class="adsbygoogle block"
            style="display: block"
            :data-ad-client="ads.clientId ?? undefined"
            :data-ad-slot="slot"
            :data-ad-format="format"
            data-full-width-responsive="true"
        />
    </div>
</template>
