<script setup lang="ts">
import { router, useForm } from '@inertiajs/vue3';
import { Edit3, HardDrive, Plus, Power, Sparkles, Trash2 } from '@lucide/vue';
import { ref } from 'vue';
import InputError from '@/components/InputError.vue';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import admin from '@/routes/admin';
import type { SubscriptionPlan } from '@/types';

const props = defineProps<{
    plans: SubscriptionPlan[];
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            { title: 'Admin Dashboard', href: admin.dashboard() },
            { title: 'Subscription Plans', href: admin.subscriptionPlans.index() },
        ],
    },
});

const isModalOpen = ref(false);
const isEditing = ref(false);
const editingPlanId = ref<number | null>(null);
const featuresText = ref('');
const storageGbText = ref('');

const form = useForm({
    name: '',
    slug: '',
    description: '',
    price: 0,
    currency: 'USD',
    interval: 'month' as 'month' | 'year',
    paypal_plan_id: '',
    features: [] as string[],
    is_active: true,
    is_featured: false,
    sort_order: 0,
    storage_gb: null as number | null,
});

const openCreateModal = () => {
    isEditing.value = false;
    editingPlanId.value = null;
    form.reset();
    form.clearErrors();
    form.sort_order = props.plans.length + 1;
    featuresText.value = '';
    storageGbText.value = '';
    isModalOpen.value = true;
};

const openEditModal = (plan: SubscriptionPlan) => {
    isEditing.value = true;
    editingPlanId.value = plan.id;
    form.clearErrors();
    form.name = plan.name;
    form.slug = plan.slug;
    form.description = plan.description ?? '';
    form.price = Number(plan.price);
    form.currency = plan.currency;
    form.interval = plan.interval;
    form.paypal_plan_id = plan.paypal_plan_id ?? '';
    form.features = plan.features ?? [];
    form.is_active = plan.is_active;
    form.is_featured = plan.is_featured;
    form.sort_order = plan.sort_order;
    form.storage_gb = plan.storage_gb;
    featuresText.value = (plan.features ?? []).join('\n');
    storageGbText.value = plan.storage_gb !== null ? String(plan.storage_gb) : '';
    isModalOpen.value = true;
};

const submitForm = () => {
    form.features = featuresText.value
        .split('\n')
        .map((line) => line.trim())
        .filter(Boolean);
    const storageGbValue = String(storageGbText.value ?? '').trim();
    form.storage_gb = storageGbValue === '' ? null : Number(storageGbValue);

    if (isEditing.value && editingPlanId.value) {
        form.put(admin.subscriptionPlans.update.url({ subscriptionPlan: editingPlanId.value }), {
            preserveScroll: true,
            onSuccess: () => {
                isModalOpen.value = false;
                form.reset();
            },
        });
    } else {
        form.post(admin.subscriptionPlans.store.url(), {
            preserveScroll: true,
            onSuccess: () => {
                isModalOpen.value = false;
                form.reset();
            },
        });
    }
};

const toggleStatus = (plan: SubscriptionPlan) => {
    router.patch(admin.subscriptionPlans.toggle.url({ subscriptionPlan: plan.id }), {}, { preserveScroll: true });
};

const deletePlan = (plan: SubscriptionPlan) => {
    if (!confirm(`Delete the "${plan.name}" plan? This cannot be undone.`)) {
        return;
    }

    router.delete(admin.subscriptionPlans.destroy.url({ subscriptionPlan: plan.id }), {
        preserveScroll: true,
    });
};
</script>

<template>
    <div class="flex flex-col gap-6 p-4 sm:p-6">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold tracking-tight">Subscription Plans</h1>
                <p class="text-sm text-muted-foreground">
                    Manage the plans users can subscribe to. Changes apply immediately on the pricing page.
                </p>
            </div>
            <Button @click="openCreateModal">
                <Plus class="mr-1.5 size-4" /> New plan
            </Button>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <Card v-for="plan in plans" :key="plan.id" class="relative">
                <CardHeader class="flex flex-row items-start justify-between gap-2 pb-2">
                    <div>
                        <CardTitle class="flex items-center gap-2 text-base">
                            {{ plan.name }}
                            <Sparkles v-if="plan.is_featured" class="size-4 text-amber-500" />
                        </CardTitle>
                        <p class="mt-1 text-xs text-muted-foreground">/{{ plan.slug }}</p>
                    </div>
                    <Badge :variant="plan.is_active ? 'default' : 'secondary'">
                        {{ plan.is_active ? 'Active' : 'Inactive' }}
                    </Badge>
                </CardHeader>
                <CardContent class="space-y-3">
                    <p class="text-sm text-muted-foreground">{{ plan.description }}</p>
                    <p class="text-2xl font-semibold">
                        ${{ Number(plan.price).toFixed(2) }}
                        <span class="text-sm font-normal text-muted-foreground">/ {{ plan.interval }}</span>
                    </p>
                    <p class="flex items-center gap-1.5 text-sm text-muted-foreground">
                        <HardDrive class="size-3.5" />
                        {{ plan.storage_gb !== null ? `${plan.storage_gb} GB storage` : 'Unlimited storage' }}
                    </p>
                    <ul class="space-y-1 text-sm">
                        <li v-for="feature in plan.features ?? []" :key="feature">• {{ feature }}</li>
                    </ul>
                    <p v-if="plan.active_subscribers_count !== undefined" class="text-xs text-muted-foreground">
                        {{ plan.active_subscribers_count }} active subscriber(s)
                    </p>
                    <div class="flex items-center gap-2 pt-2">
                        <Button size="sm" variant="outline" @click="openEditModal(plan)">
                            <Edit3 class="mr-1 size-3.5" /> Edit
                        </Button>
                        <Button size="sm" variant="outline" @click="toggleStatus(plan)">
                            <Power class="mr-1 size-3.5" /> {{ plan.is_active ? 'Deactivate' : 'Activate' }}
                        </Button>
                        <Button size="sm" variant="ghost" class="text-destructive hover:text-destructive" @click="deletePlan(plan)">
                            <Trash2 class="size-3.5" />
                        </Button>
                    </div>
                </CardContent>
            </Card>
        </div>

        <Dialog v-model:open="isModalOpen">
            <DialogContent class="sm:max-w-lg">
                <DialogHeader>
                    <DialogTitle>{{ isEditing ? 'Edit plan' : 'New plan' }}</DialogTitle>
                    <DialogDescription>Configure pricing and features for this subscription plan.</DialogDescription>
                </DialogHeader>

                <form class="space-y-4" @submit.prevent="submitForm">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <Label for="plan-name">Name</Label>
                            <Input id="plan-name" v-model="form.name" required />
                            <InputError :message="form.errors.name" />
                        </div>
                        <div class="space-y-1.5">
                            <Label for="plan-slug">Slug</Label>
                            <Input id="plan-slug" v-model="form.slug" placeholder="auto-generated if blank" />
                            <InputError :message="form.errors.slug" />
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <Label for="plan-description">Description</Label>
                        <Input id="plan-description" v-model="form.description" />
                        <InputError :message="form.errors.description" />
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="space-y-1.5">
                            <Label for="plan-price">Price</Label>
                            <Input id="plan-price" v-model.number="form.price" type="number" min="0" step="0.01" required />
                            <InputError :message="form.errors.price" />
                        </div>
                        <div class="space-y-1.5">
                            <Label for="plan-currency">Currency</Label>
                            <Input id="plan-currency" v-model="form.currency" maxlength="3" required />
                            <InputError :message="form.errors.currency" />
                        </div>
                        <div class="space-y-1.5">
                            <Label for="plan-interval">Billing interval</Label>
                            <select id="plan-interval" v-model="form.interval" class="border-input h-9 w-full rounded-md border bg-transparent px-3 text-sm">
                                <option value="month">Monthly</option>
                                <option value="year">Yearly</option>
                            </select>
                            <InputError :message="form.errors.interval" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <Label for="plan-paypal-id">PayPal plan ID (optional)</Label>
                            <Input id="plan-paypal-id" v-model="form.paypal_plan_id" placeholder="For recurring PayPal billing plans" />
                            <InputError :message="form.errors.paypal_plan_id" />
                        </div>
                        <div class="space-y-1.5">
                            <Label for="plan-storage-gb">Storage quota (GB)</Label>
                            <Input id="plan-storage-gb" v-model="storageGbText" type="number" min="1" placeholder="Leave blank for unlimited" />
                            <InputError :message="form.errors.storage_gb" />
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <Label for="plan-features">Features (one per line)</Label>
                        <textarea
                            id="plan-features"
                            v-model="featuresText"
                            rows="4"
                            class="border-input w-full rounded-md border bg-transparent px-3 py-2 text-sm"
                        />
                        <InputError :message="form.errors.features" />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <Label for="plan-sort-order">Sort order</Label>
                            <Input id="plan-sort-order" v-model.number="form.sort_order" type="number" min="0" />
                            <InputError :message="form.errors.sort_order" />
                        </div>
                        <div class="flex flex-col justify-end gap-2">
                            <label class="flex items-center gap-2 text-sm">
                                <input v-model="form.is_active" type="checkbox" /> Active
                            </label>
                            <label class="flex items-center gap-2 text-sm">
                                <input v-model="form.is_featured" type="checkbox" /> Featured (highlighted)
                            </label>
                        </div>
                    </div>

                    <DialogFooter>
                        <Button type="button" variant="outline" @click="isModalOpen = false">Cancel</Button>
                        <Button type="submit" :disabled="form.processing">
                            {{ isEditing ? 'Save changes' : 'Create plan' }}
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    </div>
</template>
