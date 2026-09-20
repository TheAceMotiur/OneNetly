<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ArrowRight, Cloud, FileStack, LockKeyhole, Sparkles, Upload } from '@lucide/vue';
import PublicLayout from '@/layouts/PublicLayout.vue';
import { dashboard, login, register } from '@/routes';

defineOptions({ layout: PublicLayout });
</script>

<template>
    <Head title="OneNetly | Your files, beautifully together" />
    <div class="overflow-hidden">
        <section class="relative mx-auto max-w-7xl px-5 pb-20 pt-16 sm:px-8 lg:pb-28 lg:pt-24">
            <div class="pointer-events-none absolute -right-24 top-12 size-72 rounded-full bg-[#c7f36b]/10 blur-3xl" />
            <div class="pointer-events-none absolute bottom-0 left-1/3 size-56 rounded-full bg-[#ffb86b]/10 blur-3xl" />
            <div class="relative grid items-center gap-14 lg:grid-cols-[1.08fr_0.92fr]">
                <div>
                    <div class="mb-8 flex items-center gap-3 text-sm font-medium text-[#c7f36b]"><span class="size-2 rounded-full bg-[#c7f36b] shadow-[0_0_16px_#c7f36b]" />A calmer home for everything you keep</div>
                    <h1 class="max-w-3xl text-6xl font-semibold leading-[0.95] tracking-[-0.075em] text-white sm:text-7xl lg:text-8xl">Your digital life, <span class="text-[#c7f36b]">beautifully together.</span></h1>
                    <p class="mt-8 max-w-xl text-lg leading-8 text-[#b8c5b9] sm:text-xl">OneNetly brings your files, folders, and cloud storage into one focused space that feels as good to use as it is powerful.</p>
                    <div class="mt-10 flex flex-wrap items-center gap-4">
                        <Link :href="$page.props.auth.user ? dashboard() : register()" class="group inline-flex items-center gap-2 rounded-full bg-[#c7f36b] px-6 py-3.5 font-semibold text-[#10221d] shadow-[0_12px_30px_rgba(199,243,107,0.18)] transition hover:-translate-y-0.5 hover:bg-[#d8ff8c]">{{ $page.props.auth.user ? 'Open your drive' : 'Start for free' }}<ArrowRight class="size-4 transition group-hover:translate-x-1" /></Link>
                        <Link :href="$page.props.auth.user ? dashboard() : login()" class="inline-flex items-center gap-2 rounded-full border border-white/15 px-6 py-3.5 font-semibold text-white transition hover:border-white/40 hover:bg-white/5">{{ $page.props.auth.user ? 'Go to dashboard' : 'I already have an account' }}</Link>
                    </div>
                    <div class="mt-10 flex flex-wrap gap-x-7 gap-y-3 text-sm text-[#91a496]"><span class="flex items-center gap-2"><LockKeyhole class="size-4 text-[#c7f36b]" />Private by design</span><span class="flex items-center gap-2"><Cloud class="size-4 text-[#ffb86b]" />Cloud-ready</span></div>
                </div>
                <div class="relative mx-auto w-full max-w-md lg:ml-auto">
                    <div class="absolute -inset-6 rounded-[2.5rem] border border-[#c7f36b]/10 bg-[#c7f36b]/5 rotate-3" />
                    <div class="relative rounded-[2rem] border border-white/15 bg-[#19362d] p-4 shadow-[0_30px_80px_rgba(0,0,0,0.3)]">
                        <div class="rounded-[1.5rem] bg-[#f2f5e9] p-5 text-[#10221d]">
                            <div class="flex items-center justify-between"><div><p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#6f806f]">My drive</p><h2 class="mt-1 text-2xl font-semibold tracking-tight">Good morning.</h2></div><span class="flex size-10 items-center justify-center rounded-full bg-[#c7f36b]"><Sparkles class="size-5" /></span></div>
                            <div class="mt-7 grid grid-cols-2 gap-3"><div class="rounded-2xl bg-[#dfe9d2] p-4"><FileStack class="size-5 text-[#426149]" /><p class="mt-7 text-2xl font-semibold">248</p><p class="text-xs text-[#58705d]">Files organized</p></div><div class="rounded-2xl bg-[#ffe5c8] p-4"><Upload class="size-5 text-[#9d5d22]" /><p class="mt-7 text-2xl font-semibold">12.8</p><p class="text-xs text-[#9d6e3d]">GB in your pool</p></div></div>
                            <div class="mt-3 space-y-2 rounded-2xl border border-[#d6dfcf] p-4"><div class="flex items-center justify-between text-xs font-semibold"><span>Recent spaces</span><span class="text-[#718271]">View all</span></div><div class="flex items-center gap-3 rounded-xl bg-[#f7f9f1] p-3"><span class="flex size-9 items-center justify-center rounded-xl bg-[#c7f36b]"><Cloud class="size-4" /></span><span class="min-w-0 flex-1"><span class="block truncate text-sm font-semibold">Creative archive</span><span class="block text-xs text-[#718271]">Updated 4 minutes ago</span></span><ArrowRight class="size-4 text-[#7b8b7a]" /></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="border-y border-white/10 bg-[#0d1c18]/70"><div class="mx-auto grid max-w-7xl gap-8 px-5 py-10 sm:px-8 md:grid-cols-3"><div><p class="text-3xl font-semibold tracking-tight text-white">One place</p><p class="mt-1 text-sm text-[#91a496]">for every important file</p></div><div><p class="text-3xl font-semibold tracking-tight text-white">Zero clutter</p><p class="mt-1 text-sm text-[#91a496]">with simple, human organization</p></div><div><p class="text-3xl font-semibold tracking-tight text-white">Built to last</p><p class="mt-1 text-sm text-[#91a496]">with control that stays yours</p></div></div></section>
        <section class="mx-auto max-w-7xl px-5 py-20 sm:px-8 lg:py-28"><div class="grid gap-5 md:grid-cols-3"><div class="rounded-[1.75rem] border border-white/10 bg-white/[0.05] p-7"><span class="flex size-11 items-center justify-center rounded-2xl bg-[#c7f36b] text-[#10221d]"><FileStack class="size-5" /></span><h2 class="mt-8 text-2xl font-semibold tracking-tight text-white">Make space for focus</h2><p class="mt-3 leading-7 text-[#9daf9f]">Folders, stars, search, previews, and sharing designed around the way people actually find things.</p></div><div class="rounded-[1.75rem] border border-white/10 bg-white/[0.05] p-7"><span class="flex size-11 items-center justify-center rounded-2xl bg-[#ffb86b] text-[#10221d]"><Cloud class="size-5" /></span><h2 class="mt-8 text-2xl font-semibold tracking-tight text-white">Use your cloud intelligently</h2><p class="mt-3 leading-7 text-[#9daf9f]">Connect Google Drive accounts and let OneNetly route uploads through your available storage pool.</p></div><div class="rounded-[1.75rem] border border-white/10 bg-white/[0.05] p-7"><span class="flex size-11 items-center justify-center rounded-2xl bg-[#b7c7ff] text-[#10221d]"><LockKeyhole class="size-5" /></span><h2 class="mt-8 text-2xl font-semibold tracking-tight text-white">Keep control close</h2><p class="mt-3 leading-7 text-[#9daf9f]">Share intentionally, revoke links whenever you need, and keep your private workspace yours.</p></div></div></section>
    </div>
</template>
