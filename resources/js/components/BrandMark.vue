<script setup lang="ts">
defineProps<{
    compact?: boolean;
}>();
</script>

<template>
    <div class="flex items-center gap-3">
        <span class="relative flex size-10 items-center justify-center overflow-hidden rounded-2xl bg-[#c7f36b] text-[#10221d] shadow-[0_8px_24px_rgba(199,243,107,0.25)]">
            <span class="absolute -right-2 -top-3 size-7 rounded-full border-[5px] border-[#10221d]" />
            <span class="absolute bottom-1 left-1.5 size-2 rounded-full bg-[#10221d]" />
            <span class="relative z-10 text-lg font-black tracking-[-0.12em]">ON</span>
        </span>
        <span v-if="!compact" class="font-['Instrument_Sans'] text-xl font-semibold tracking-[-0.04em] text-white">
            One<span class="text-[#c7f36b]">Netly</span>
        </span>
    </div>
</template>
