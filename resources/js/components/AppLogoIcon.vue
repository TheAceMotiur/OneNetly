<script setup lang="ts">
import { useId } from 'vue';
import type { HTMLAttributes } from 'vue';

defineOptions({
    inheritAttrs: false,
});

type Props = {
    className?: HTMLAttributes['class'];
};

defineProps<Props>();

const clipId = `brandmark-clip-${useId()}`;
</script>

<template>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 40 40"
        :class="className"
        v-bind="$attrs"
    >
        <defs>
            <clipPath :id="clipId">
                <rect width="40" height="40" rx="12" />
            </clipPath>
        </defs>
        <g :clip-path="`url(#${clipId})`">
            <rect width="40" height="40" rx="12" fill="#c7f36b" />
            <circle cx="34" cy="3" r="14" fill="none" stroke="#10221d" stroke-width="5" />
            <circle cx="10" cy="35" r="4" fill="#10221d" />
        </g>
        <text
            x="20"
            y="25"
            text-anchor="middle"
            font-family="'Instrument Sans', sans-serif"
            font-size="15"
            font-weight="900"
            letter-spacing="-1.5"
            fill="#10221d"
        >ON</text>
    </svg>
</template>
