<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';

defineOptions({ layout: PublicLayout });
</script>

<template>
    <Head title="Terms of Service" />
    <article class="mx-auto max-w-4xl px-5 py-16 sm:px-8">
        <p class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-[#c7f36b]">OneNetly legal</p>
        <h1 class="text-5xl font-semibold tracking-[-0.06em] text-white">Terms of Service</h1>
        <p class="mt-5 text-[#aebdb0]">Last updated: September 16, 2026</p>
        <div class="prose prose-invert mt-12 max-w-none prose-headings:font-semibold prose-headings:tracking-tight prose-p:text-[#b8c5b9] prose-li:text-[#b8c5b9] prose-strong:text-white">
            <h2>1. Using OneNetly</h2><p>OneNetly provides personal cloud storage, file organization, sharing, and related tools. By creating an account or using the service, you agree to these terms and to use the service responsibly.</p>
            <h2>2. Your account</h2><p>You are responsible for keeping your credentials secure and for activity that occurs through your account. Tell us promptly if you suspect unauthorized access.</p>
            <h2>3. Your content</h2><p>You keep ownership of files you upload. You grant OneNetly only the permissions needed to store, process, display, and deliver your content as part of the service.</p>
            <h2>4. Prohibited use</h2><p>You may not use OneNetly to store or distribute unlawful, infringing, malicious, abusive, or harmful content, or to interfere with the service or other users.</p>
            <h2>5. Availability and changes</h2><p>We work to keep OneNetly reliable, but the service may change or be temporarily unavailable for maintenance, security, or circumstances beyond our control.</p>
            <h2>6. Termination</h2><p>We may suspend or close accounts that violate these terms or create risk for the service. You may stop using your account at any time.</p>
            <h2>7. Contact</h2><p>Questions about these terms can be sent through our <a href="/contact">contact page</a>.</p>
        </div>
    </article>
</template>
