<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';

defineOptions({ layout: PublicLayout });
</script>

<template>
    <Head title="Acceptable Use" />
    <article class="mx-auto max-w-4xl px-5 py-16 sm:px-8">
        <p class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-[#c7f36b]">OneNetly legal</p>
        <h1 class="text-5xl font-semibold tracking-[-0.06em] text-white">Acceptable Use</h1>
        <p class="mt-5 text-[#aebdb0]">A clear standard for a useful, respectful network</p>
        <div class="prose prose-invert mt-12 max-w-none prose-headings:font-semibold prose-headings:tracking-tight prose-p:text-[#b8c5b9] prose-li:text-[#b8c5b9] prose-strong:text-white">
            <h2>Keep it lawful</h2><p>Do not use OneNetly for fraud, harassment, exploitation, threats, unauthorized surveillance, or any activity that violates applicable law.</p>
            <h2>Respect rights</h2><p>Only upload and share content you have the right to use. Do not distribute malware, stolen credentials, or content that infringes another person’s rights.</p>
            <h2>Protect the service</h2><p>Do not probe, overload, scrape, reverse engineer, bypass access controls, or interfere with the operation of OneNetly or its connected storage providers.</p>
            <h2>Enforcement</h2><p>We may remove content, limit features, suspend access, or close accounts when necessary to protect users, rights holders, or the service.</p>
        </div>
    </article>
</template>
