<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import BrandMark from '@/components/BrandMark.vue';
import { dashboard, home, login, register } from '@/routes';
import { contact } from '@/routes/legal';
import { index as pricing } from '@/routes/subscriptions';

const page = usePage();
</script>

<template>
    <header class="sticky top-0 z-30 h-20 border-b border-white/10 bg-[#10221d]">
        <div class="mx-auto flex h-full w-full max-w-7xl items-center justify-between px-5 sm:px-8">
            <Link :href="home()" aria-label="OneNetly home">
                <BrandMark />
            </Link>
            <nav class="flex items-center gap-2 text-sm text-[#b8c5b9]">
                <Link :href="pricing()" class="hidden rounded-full px-4 py-2 transition hover:bg-white/10 hover:text-white sm:block">Pricing</Link>
                <Link :href="contact()" class="hidden rounded-full px-4 py-2 transition hover:bg-white/10 hover:text-white sm:block">Contact</Link>
                <Link v-if="page.props.auth.user" :href="dashboard()" class="rounded-full bg-[#c7f36b] px-4 py-2 font-semibold text-[#10221d] transition hover:bg-[#d8ff8c]">Open drive</Link>
                <template v-else>
                    <Link :href="login()" class="rounded-full px-4 py-2 transition hover:bg-white/10 hover:text-white">Log in</Link>
                    <Link :href="register()" class="rounded-full border border-white/15 px-4 py-2 font-semibold text-white transition hover:border-[#c7f36b] hover:text-[#c7f36b]">Create account</Link>
                </template>
            </nav>
        </div>
    </header>
</template>
