<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import BrandMark from '@/components/BrandMark.vue';
import SiteHeader from '@/components/SiteHeader.vue';
import { terms, privacy, dmca, acceptableUse, contact } from '@/routes/legal';
</script>

<template>
    <div class="min-h-screen bg-[#10221d] text-[#f2f5e9]">
        <SiteHeader />
        <main>
            <slot />
        </main>
        <footer class="mx-auto flex w-full max-w-7xl flex-col gap-5 border-t border-white/10 px-5 py-8 text-sm text-[#94a699] sm:flex-row sm:items-center sm:justify-between sm:px-8">
            <div class="flex items-center gap-3"><BrandMark compact /><span>OneNetly keeps your digital life in one calm place.</span></div>
            <nav class="flex flex-wrap gap-x-5 gap-y-2">
                <Link :href="terms()" class="hover:text-white">Terms</Link>
                <Link :href="privacy()" class="hover:text-white">Privacy</Link>
                <Link :href="dmca()" class="hover:text-white">DMCA</Link>
                <Link :href="acceptableUse()" class="hover:text-white">Acceptable use</Link>
                <Link :href="contact()" class="hover:text-white">Contact</Link>
            </nav>
        </footer>
    </div>
</template>
