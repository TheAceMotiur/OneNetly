<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import {
    Clock,
    CreditCard,
    HardDrive,
    LayoutGrid,
    Megaphone,
    ShieldCheck,
    Sparkles,
    Star,
    Trash2,
    Users,
} from '@lucide/vue';
import { computed } from 'vue';
import AppLogo from '@/components/AppLogo.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { dashboard } from '@/routes';
import admin from '@/routes/admin';
import { index as pricing } from '@/routes/subscriptions';
import type { NavItem } from '@/types';

const page = usePage();
const isAdmin = computed(() => Boolean(page.props.auth?.user?.is_admin));
const hasActiveSubscription = computed(() => Boolean(page.props.auth?.hasActiveSubscription));

const driveNavItems: NavItem[] = [
    {
        title: 'My Drive',
        href: dashboard.url(),
        icon: HardDrive,
    },
    {
        title: 'Recent',
        href: dashboard.url({ query: { filter: 'recent' } }),
        icon: Clock,
    },
    {
        title: 'Starred',
        href: dashboard.url({ query: { filter: 'starred' } }),
        icon: Star,
    },
    {
        title: 'Trash',
        href: dashboard.url({ query: { filter: 'trash' } }),
        icon: Trash2,
    },
];

const adminNavItems = computed<NavItem[]>(() => [
    {
        title: 'Admin Overview',
        href: admin.dashboard(),
        icon: ShieldCheck,
    },
    {
        title: 'Drive Accounts',
        href: admin.driveAccounts.index(),
        icon: HardDrive,
    },
    {
        title: 'Manage Users',
        href: admin.users.index(),
        icon: Users,
    },
    {
        title: 'Subscription Plans',
        href: admin.subscriptionPlans.index(),
        icon: Sparkles,
    },
    {
        title: 'Subscriptions',
        href: admin.subscriptions.index(),
        icon: CreditCard,
    },
    {
        title: 'Notifications',
        href: admin.notifications.index(),
        icon: Megaphone,
    },
    {
        title: 'Monetization Settings',
        href: admin.settings.monetization.edit(),
        icon: Megaphone,
    },
]);

</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="dashboard()">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="driveNavItems" label="My Files" />
            <NavMain
                v-if="!hasActiveSubscription"
                :items="[{ title: 'Go ad-free', href: pricing(), icon: Sparkles }]"
                label="Upgrade"
            />
            <NavMain
                v-if="isAdmin"
                :items="adminNavItems"
                label="Admin Panel"
            />
        </SidebarContent>

        <SidebarFooter>
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
