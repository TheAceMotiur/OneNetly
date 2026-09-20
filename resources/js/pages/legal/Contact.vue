<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { Mail, MessageCircle, ShieldCheck } from '@lucide/vue';
import PublicLayout from '@/layouts/PublicLayout.vue';
import { home } from '@/routes';

defineOptions({ layout: PublicLayout });
</script>

<template>
    <Head title="Contact OneNetly" />
    <section class="mx-auto grid max-w-6xl gap-12 px-5 py-16 sm:px-8 lg:grid-cols-[1fr_0.8fr] lg:items-center lg:py-24">
        <div>
            <p class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-[#c7f36b]">We’re here to help</p>
            <h1 class="max-w-2xl text-5xl font-semibold tracking-[-0.06em] text-white sm:text-6xl">Let’s make your files feel less complicated.</h1>
            <p class="mt-6 max-w-xl text-lg leading-8 text-[#b8c5b9]">Questions about your account, storage, privacy, or a copyright report? Send us a note and the OneNetly team will point you in the right direction.</p>
            <div class="mt-10 flex flex-wrap gap-3">
                <a href="mailto:hello@onenetly.com" class="inline-flex items-center gap-2 rounded-full bg-[#c7f36b] px-5 py-3 font-semibold text-[#10221d] transition hover:bg-[#d8ff8c]"><Mail class="size-4" /> hello@onenetly.com</a>
                <Link :href="home()" class="inline-flex items-center rounded-full border border-white/15 px-5 py-3 font-semibold text-white transition hover:border-[#c7f36b] hover:text-[#c7f36b]">Back home</Link>
            </div>
        </div>
        <div class="space-y-3">
            <div class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6 backdrop-blur-sm"><MessageCircle class="size-6 text-[#c7f36b]" /><h2 class="mt-5 text-xl font-semibold text-white">General support</h2><p class="mt-2 text-sm leading-6 text-[#aebdb0]">Account help, product questions, and feedback.</p><a class="mt-5 inline-block text-sm font-semibold text-[#c7f36b]" href="mailto:hello@onenetly.com">hello@onenetly.com</a></div>
            <div class="rounded-[2rem] border border-white/10 bg-white/[0.06] p-6 backdrop-blur-sm"><ShieldCheck class="size-6 text-[#ffb86b]" /><h2 class="mt-5 text-xl font-semibold text-white">Trust & safety</h2><p class="mt-2 text-sm leading-6 text-[#aebdb0]">Privacy requests, abuse reports, and copyright notices.</p><a class="mt-5 inline-block text-sm font-semibold text-[#ffb86b]" href="mailto:copyright@onenetly.com">copyright@onenetly.com</a></div>
        </div>
    </section>
</template>
