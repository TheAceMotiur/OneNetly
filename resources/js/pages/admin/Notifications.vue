<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { Megaphone } from '@lucide/vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import admin from '@/routes/admin';

const props = defineProps<{
    userCount: number;
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            { title: 'Admin Dashboard', href: admin.dashboard() },
            { title: 'Notifications', href: admin.notifications.index() },
        ],
    },
});

const form = useForm({
    title: '',
    body: '',
});

const submit = () => {
    form.post(admin.notifications.broadcast.url(), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <div class="flex flex-col gap-6 p-4 sm:p-6">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight">Notifications</h1>
            <p class="text-sm text-muted-foreground">
                Send an announcement notification to every registered user ({{ props.userCount }} total). It appears
                in their in-app notification list (web and mobile).
            </p>
        </div>

        <Card>
            <CardHeader>
                <CardTitle class="flex items-center gap-2">
                    <Megaphone class="size-4" />
                    Broadcast announcement
                </CardTitle>
                <CardDescription>This cannot be undone or recalled once sent.</CardDescription>
            </CardHeader>
            <CardContent>
                <form class="space-y-4" @submit.prevent="submit">
                    <div class="space-y-1.5">
                        <Label for="announcement-title">Title</Label>
                        <Input id="announcement-title" v-model="form.title" maxlength="255" required />
                        <InputError :message="form.errors.title" />
                    </div>

                    <div class="space-y-1.5">
                        <Label for="announcement-body">Message</Label>
                        <textarea
                            id="announcement-body"
                            v-model="form.body"
                            maxlength="1000"
                            rows="4"
                            required
                            class="border-input flex w-full rounded-md border bg-transparent px-3 py-2 text-sm shadow-xs"
                        ></textarea>
                        <InputError :message="form.errors.body" />
                    </div>

                    <Button type="submit" :disabled="form.processing">
                        Send to all {{ props.userCount }} users
                    </Button>
                </form>
            </CardContent>
        </Card>
    </div>
</template>
