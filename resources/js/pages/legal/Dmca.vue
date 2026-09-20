<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';

defineOptions({ layout: PublicLayout });
</script>

<template>
    <Head title="DMCA Policy" />
    <article class="mx-auto max-w-4xl px-5 py-16 sm:px-8">
        <p class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-[#c7f36b]">OneNetly legal</p>
        <h1 class="text-5xl font-semibold tracking-[-0.06em] text-white">DMCA Policy</h1>
        <p class="mt-5 text-[#aebdb0]">Copyright complaints and counter-notices</p>
        <div class="prose prose-invert mt-12 max-w-none prose-headings:font-semibold prose-headings:tracking-tight prose-p:text-[#b8c5b9] prose-li:text-[#b8c5b9] prose-strong:text-white">
            <h2>Reporting infringement</h2><p>If you believe content stored or shared through OneNetly infringes your copyright, send a written notice identifying the copyrighted work, the material or link at issue, your contact details, and a good-faith statement that the use is unauthorized.</p>
            <h2>Required signature</h2><p>Your notice must include a physical or electronic signature of the copyright owner or an authorized representative.</p>
            <h2>Our response</h2><p>We may restrict access to reported material, notify the account holder, and take further action where appropriate. Repeated infringement may result in account termination.</p>
            <h2>Counter-notices</h2><p>If material was removed in error, the account holder may submit a counter-notice with the relevant identification, contact information, and required good-faith statements.</p>
            <h2>Submit a notice</h2><p>Send copyright notices to <a href="mailto:copyright@onenetly.com">copyright@onenetly.com</a>. Replace this address with your designated legal contact before launch.</p>
        </div>
    </article>
</template>
