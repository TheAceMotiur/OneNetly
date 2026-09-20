<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { acceptableUse, contact, dmca, privacy, terms } from '@/routes/legal';

const year = new Date().getFullYear();
</script>

<template>
    <footer class="border-sidebar-border/70 mt-auto flex flex-col gap-3 border-t px-6 py-4 text-xs text-muted-foreground sm:flex-row sm:items-center sm:justify-between md:px-4">
        <span>&copy; {{ year }} OneNetly. All rights reserved.</span>
        <nav class="flex flex-wrap gap-x-4 gap-y-1">
            <Link :href="terms()" class="hover:text-foreground">Terms</Link>
            <Link :href="privacy()" class="hover:text-foreground">Privacy</Link>
            <Link :href="dmca()" class="hover:text-foreground">DMCA</Link>
            <Link :href="acceptableUse()" class="hover:text-foreground">Acceptable use</Link>
            <Link :href="contact()" class="hover:text-foreground">Contact</Link>
        </nav>
    </footer>
</template>
