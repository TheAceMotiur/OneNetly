<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';

defineOptions({ layout: PublicLayout });
</script>

<template>
    <Head title="Privacy Policy" />
    <article class="mx-auto max-w-4xl px-5 py-16 sm:px-8">
        <p class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-[#c7f36b]">OneNetly legal</p>
        <h1 class="text-5xl font-semibold tracking-[-0.06em] text-white">Privacy Policy</h1>
        <p class="mt-5 text-[#aebdb0]">Last updated: September 16, 2026</p>
        <div class="prose prose-invert mt-12 max-w-none prose-headings:font-semibold prose-headings:tracking-tight prose-p:text-[#b8c5b9] prose-li:text-[#b8c5b9] prose-strong:text-white">
            <h2>1. Information we collect</h2><p>We collect account details such as your name and email, files and metadata you choose to store, and technical information needed to keep OneNetly secure and operational.</p>
            <h2>2. How we use information</h2><p>We use information to provide storage and file features, authenticate accounts, protect the service, respond to requests, and improve reliability.</p>
            <h2>3. Storage providers</h2><p>When you connect a Google Drive account, files may be uploaded to that provider using credentials configured by an authorized administrator. Provider terms and privacy policies also apply.</p>
            <h2>4. Security</h2><p>We use reasonable safeguards, including authenticated access and encrypted credential storage. No internet service can guarantee absolute security.</p>
            <h2>5. Your choices</h2><p>You can update profile information, remove stored files, revoke share links, and request account information or deletion through support.</p>
            <h2>6. Contact</h2><p>For privacy questions or requests, visit our <a href="/contact">contact page</a>.</p>
        </div>
    </article>
</template>
