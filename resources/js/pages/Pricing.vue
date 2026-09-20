<script setup lang="ts">
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import { Check, Loader2, Sparkles } from '@lucide/vue';
import { computed, onBeforeUnmount, ref } from 'vue';
import AdSlot from '@/components/AdSlot.vue';
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { useAdsense } from '@/composables/useAdsense';
import PublicLayout from '@/layouts/PublicLayout.vue';
import { login } from '@/routes';
import { cancel as cancelSubscription, standardCheckout } from '@/routes/subscriptions';
import orders from '@/routes/subscriptions/orders';
import type { Subscription, SubscriptionPlan } from '@/types';

const { plans, activeSubscription, paypalClientId, paypalConfigured, paypalMethod } = defineProps<{
    plans: SubscriptionPlan[];
    activeSubscription: Subscription | null;
    paypalClientId: string | null;
    paypalConfigured: boolean;
    paypalMethod: 'api' | 'standard' | 'none';
}>();

const page = usePage();
const isAuthenticated = computed(() => Boolean(page.props.auth.user));
const { ads } = useAdsense();

const checkoutPlanId = ref<number | null>(null);
const checkoutError = ref<string | null>(null);
let paypalSdkPromise: Promise<void> | null = null;

const standardCheckoutStatus = typeof window !== 'undefined'
    ? new URLSearchParams(window.location.search).get('checkout')
    : null;

function formatPrice(plan: SubscriptionPlan): string {
    const value = Number(plan.price);
    if (value <= 0) {
        return 'Free';
    }
    return `$${value.toFixed(2)}`;
}

function loadPaypalSdk(): Promise<void> {
    if (paypalSdkPromise) {
        return paypalSdkPromise;
    }

    paypalSdkPromise = new Promise((resolve, reject) => {
        if (!paypalClientId) {
            reject(new Error('PayPal is not configured yet.'));
            return;
        }

        if ((window as unknown as { paypal?: unknown }).paypal) {
            resolve();
            return;
        }

        const script = document.createElement('script');
        script.src = `https://www.paypal.com/sdk/js?client-id=${paypalClientId}&currency=USD&intent=capture`;
        script.onload = () => resolve();
        script.onerror = () => reject(new Error('Failed to load PayPal SDK.'));
        document.head.appendChild(script);
    });

    return paypalSdkPromise;
}

async function startCheckout(plan: SubscriptionPlan) {
    checkoutError.value = null;

    if (!isAuthenticated.value) {
        router.visit(login());
        return;
    }

    if (Number(plan.price) <= 0) {
        return;
    }

    if (paypalMethod === 'standard') {
        window.location.href = standardCheckout.url({ plan });
        return;
    }

    checkoutPlanId.value = plan.id;

    try {
        await loadPaypalSdk();
        await new Promise((resolve) => requestAnimationFrame(resolve));

        const containerId = `paypal-buttons-${plan.id}`;
        const container = document.getElementById(containerId);
        if (container) {
            container.innerHTML = '';
        }

        const paypal = (window as unknown as { paypal: PaypalNamespace }).paypal;

        paypal
            .Buttons({
                style: { layout: 'vertical', color: 'black', shape: 'pill', label: 'pay' },
                createOrder: async () => {
                    const response = await fetch(orders.create.url({ plan }), {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN':
                                document
                                    .querySelector('meta[name="csrf-token"]')
                                    ?.getAttribute('content') ?? '',
                        },
                    });
                    const data = await response.json();
                    if (!response.ok) {
                        throw new Error(data.message ?? 'Unable to start checkout.');
                    }
                    return data.id;
                },
                onApprove: async (data: { orderID: string }) => {
                    const response = await fetch(orders.capture.url({ orderId: data.orderID }), {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN':
                                document
                                    .querySelector('meta[name="csrf-token"]')
                                    ?.getAttribute('content') ?? '',
                        },
                        body: JSON.stringify({ plan_id: plan.id }),
                    });
                    const result = await response.json();
                    if (!response.ok) {
                        checkoutError.value = result.message ?? 'Payment could not be completed.';
                        return;
                    }
                    router.reload();
                },
                onError: () => {
                    checkoutError.value = 'Something went wrong with PayPal. Please try again.';
                },
            })
            .render(`#${containerId}`);
    } catch {
        checkoutError.value = 'Unable to load PayPal checkout. Please try again shortly.';
    }
}

type PaypalNamespace = {
    Buttons: (config: Record<string, unknown>) => { render: (selector: string) => void };
};

onBeforeUnmount(() => {
    checkoutPlanId.value = null;
});
</script>

<template>
    <Head title="Pricing" />

    <PublicLayout>
        <section class="mx-auto w-full max-w-6xl px-5 py-16 sm:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <Badge class="mb-4 border-white/15 bg-white/5 text-[#c7f36b]">Pricing</Badge>
                <h1 class="text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                    Simple plans, no surprises.
                </h1>
                <p class="mt-4 text-base text-[#b8c5b9]">
                    Start free with ads, or go Pro for an ad-free experience and more storage.
                </p>
            </div>

            <div
                v-if="activeSubscription"
                class="mx-auto mt-8 flex max-w-lg items-center justify-between gap-4 rounded-2xl border border-[#c7f36b]/30 bg-[#c7f36b]/10 px-5 py-4 text-sm text-[#e7ffb0]"
            >
                <span>
                    You're on <strong>{{ activeSubscription.plan?.name }}</strong>
                    <template v-if="activeSubscription.ends_at">
                        until {{ new Date(activeSubscription.ends_at).toLocaleDateString() }}
                    </template>
                </span>
                <Link
                    :href="cancelSubscription().url"
                    method="post"
                    as="button"
                    class="shrink-0 rounded-full border border-white/20 px-3 py-1.5 text-xs font-semibold text-white transition hover:border-red-400 hover:text-red-300"
                >
                    Cancel
                </Link>
            </div>

            <p v-if="!paypalConfigured" class="mx-auto mt-6 max-w-lg text-center text-xs text-[#94a699]">
                Payments are being set up. Please check back soon to subscribe to a paid plan.
            </p>
            <p v-if="standardCheckoutStatus === 'success'" class="mx-auto mt-6 max-w-lg text-center text-sm text-[#c7f36b]">
                Thanks! We're confirming your payment with PayPal — this usually takes a few seconds. Refresh shortly if your plan hasn't updated yet.
            </p>
            <p v-else-if="standardCheckoutStatus === 'cancelled'" class="mx-auto mt-6 max-w-lg text-center text-sm text-[#94a699]">
                Checkout was cancelled. No payment was made.
            </p>
            <p v-if="checkoutError" class="mx-auto mt-6 max-w-lg text-center text-sm text-red-300">
                {{ checkoutError }}
            </p>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="plan in plans"
                    :key="plan.id"
                    class="relative flex flex-col rounded-2xl border p-6"
                    :class="plan.is_featured
                        ? 'border-[#c7f36b]/50 bg-[#c7f36b]/[0.06] shadow-[0_0_0_1px_rgba(199,243,107,0.15)]'
                        : 'border-white/10 bg-white/[0.03]'"
                >
                    <div v-if="plan.is_featured" class="absolute -top-3 left-6 rounded-full bg-[#c7f36b] px-3 py-1 text-xs font-semibold text-[#10221d]">
                        <Sparkles class="mr-1 inline size-3" /> Most popular
                    </div>
                    <h2 class="text-lg font-semibold text-white">{{ plan.name }}</h2>
                    <p class="mt-1 text-sm text-[#94a699]">{{ plan.description }}</p>
                    <div class="mt-5 flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-white">{{ formatPrice(plan) }}</span>
                        <span v-if="Number(plan.price) > 0" class="text-sm text-[#94a699]">/ {{ plan.interval }}</span>
                    </div>

                    <ul class="mt-6 flex-1 space-y-2 text-sm text-[#dfe8dc]">
                        <li v-for="feature in plan.features ?? []" :key="feature" class="flex items-start gap-2">
                            <Check class="mt-0.5 size-4 shrink-0 text-[#c7f36b]" />
                            <span>{{ feature }}</span>
                        </li>
                    </ul>

                    <div class="mt-6">
                        <Button
                            v-if="Number(plan.price) <= 0"
                            variant="outline"
                            class="w-full border-white/20 bg-white/5 text-white hover:bg-white/10"
                            disabled
                        >
                            Included by default
                        </Button>
                        <template v-else>
                            <Button
                                v-if="checkoutPlanId !== plan.id"
                                class="w-full bg-[#c7f36b] font-semibold text-[#10221d] hover:bg-[#d8ff8c]"
                                :disabled="!paypalConfigured"
                                @click="startCheckout(plan)"
                            >
                                Subscribe with PayPal
                            </Button>
                            <div v-show="checkoutPlanId === plan.id" :id="`paypal-buttons-${plan.id}`" class="min-h-11">
                                <div v-if="checkoutPlanId === plan.id" class="flex items-center justify-center gap-2 py-2 text-sm text-[#94a699]">
                                    <Loader2 class="size-4 animate-spin" /> Loading PayPal...
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <div v-if="ads.slots.infeed" class="mx-auto mt-14 max-w-3xl">
                <AdSlot :slot="ads.slots.infeed" label="Advertisement" />
            </div>
        </section>
    </PublicLayout>
</template>
