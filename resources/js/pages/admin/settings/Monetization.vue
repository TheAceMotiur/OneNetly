<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { CheckCircle2, Loader2, XCircle } from '@lucide/vue';
import { ref } from 'vue';
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import InputError from '@/components/InputError.vue';
import admin from '@/routes/admin';

const props = defineProps<{
    settings: {
        paypal_mode: 'sandbox' | 'live';
        paypal_client_id: string | null;
        paypal_has_secret: boolean;
        paypal_receiver_email: string | null;
        adsense_client_id: string | null;
        adsense_enabled: boolean;
        adsense_auto_ads: boolean;
        adsense_slot_header: string | null;
        adsense_slot_infeed: string | null;
    };
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            { title: 'Admin Dashboard', href: admin.dashboard() },
            { title: 'Monetization Settings', href: admin.settings.monetization.edit() },
        ],
    },
});

const paypalForm = useForm({
    paypal_mode: props.settings.paypal_mode,
    paypal_client_id: props.settings.paypal_client_id ?? '',
    paypal_client_secret: '',
    paypal_receiver_email: props.settings.paypal_receiver_email ?? '',
});

const adsenseForm = useForm({
    adsense_client_id: props.settings.adsense_client_id ?? '',
    adsense_enabled: props.settings.adsense_enabled,
    adsense_auto_ads: props.settings.adsense_auto_ads,
    adsense_slot_header: props.settings.adsense_slot_header ?? '',
    adsense_slot_infeed: props.settings.adsense_slot_infeed ?? '',
});

const isTestingPaypal = ref(false);
const testResult = ref<{ success: boolean; message: string } | null>(null);

const getCsrfToken = () => {
    const match = document.cookie.match(new RegExp('(^|;\\s*)(XSRF-TOKEN)=([^;]*)'));
    return match ? decodeURIComponent(match[3]) : '';
};

const submitPaypal = () => {
    paypalForm.put(admin.settings.monetization.paypal.url(), {
        preserveScroll: true,
        onSuccess: () => {
            paypalForm.paypal_client_secret = '';
        },
    });
};

const submitAdsense = () => {
    adsenseForm.put(admin.settings.monetization.adsense.url(), { preserveScroll: true });
};

const testPaypalCredentials = async () => {
    if (!paypalForm.paypal_client_id || !paypalForm.paypal_client_secret) {
        testResult.value = { success: false, message: 'Enter both a client ID and secret to test.' };
        return;
    }

    isTestingPaypal.value = true;
    try {
        const response = await fetch(admin.settings.monetization.paypalTest.url(), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
                'X-XSRF-TOKEN': getCsrfToken(),
            },
            body: JSON.stringify({
                paypal_mode: paypalForm.paypal_mode,
                paypal_client_id: paypalForm.paypal_client_id,
                paypal_client_secret: paypalForm.paypal_client_secret,
            }),
        });
        testResult.value = await response.json();
    } catch {
        testResult.value = { success: false, message: 'Network request failed.' };
    } finally {
        isTestingPaypal.value = false;
    }
};
</script>

<template>
    <div class="flex flex-col gap-6 p-4 sm:p-6">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight">Monetization Settings</h1>
            <p class="text-sm text-muted-foreground">
                Configure PayPal for subscription payments and Google AdSense for free-tier ads.
            </p>
        </div>

        <Card>
            <CardHeader>
                <CardTitle>PayPal</CardTitle>
                <CardDescription>
                    Provide just your PayPal email to accept payments via redirect checkout (no API keys needed) — or
                    add a REST API client ID and secret from developer.paypal.com for embedded checkout buttons.
                </CardDescription>
            </CardHeader>
            <CardContent>
                <form class="space-y-4" @submit.prevent="submitPaypal">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="space-y-1.5">
                            <Label for="paypal-mode">Mode</Label>
                            <select id="paypal-mode" v-model="paypalForm.paypal_mode" class="border-input h-9 w-full rounded-md border bg-transparent px-3 text-sm">
                                <option value="sandbox">Sandbox (testing)</option>
                                <option value="live">Live</option>
                            </select>
                            <InputError :message="paypalForm.errors.paypal_mode" />
                        </div>
                        <div class="space-y-1.5">
                            <Label for="paypal-receiver-email">Receiving PayPal email</Label>
                            <Input id="paypal-receiver-email" v-model="paypalForm.paypal_receiver_email" type="email" placeholder="you@example.com" />
                            <p class="text-xs text-muted-foreground">Enough on its own to accept payments — no client ID/secret required.</p>
                            <InputError :message="paypalForm.errors.paypal_receiver_email" />
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <Label for="paypal-client-id">Client ID (optional)</Label>
                        <Input id="paypal-client-id" v-model="paypalForm.paypal_client_id" />
                        <InputError :message="paypalForm.errors.paypal_client_id" />
                    </div>

                    <div class="space-y-1.5">
                        <Label for="paypal-client-secret">
                            Client secret (optional)
                            <span v-if="settings.paypal_has_secret" class="text-xs text-muted-foreground">(currently set — leave blank to keep)</span>
                        </Label>
                        <Input id="paypal-client-secret" v-model="paypalForm.paypal_client_secret" type="password" placeholder="••••••••" />
                        <InputError :message="paypalForm.errors.paypal_client_secret" />
                    </div>

                    <div v-if="testResult" class="flex items-center gap-2 rounded-md border p-3 text-sm" :class="testResult.success ? 'border-green-500/40 bg-green-500/10 text-green-700 dark:text-green-400' : 'border-destructive/40 bg-destructive/10 text-destructive'">
                        <CheckCircle2 v-if="testResult.success" class="size-4 shrink-0" />
                        <XCircle v-else class="size-4 shrink-0" />
                        {{ testResult.message }}
                    </div>

                    <div class="flex items-center gap-2">
                        <Button type="submit" :disabled="paypalForm.processing">Save PayPal settings</Button>
                        <Button type="button" variant="outline" :disabled="isTestingPaypal" @click="testPaypalCredentials">
                            <Loader2 v-if="isTestingPaypal" class="mr-1.5 size-4 animate-spin" />
                            Test credentials
                        </Button>
                    </div>
                </form>
            </CardContent>
        </Card>

        <Card>
            <CardHeader>
                <CardTitle>Google AdSense</CardTitle>
                <CardDescription>Ads are automatically hidden for users with an active subscription.</CardDescription>
            </CardHeader>
            <CardContent>
                <form class="space-y-4" @submit.prevent="submitAdsense">
                    <div class="space-y-1.5">
                        <Label for="adsense-client-id">AdSense publisher ID</Label>
                        <Input id="adsense-client-id" v-model="adsenseForm.adsense_client_id" placeholder="ca-pub-XXXXXXXXXXXXXXXX" />
                        <InputError :message="adsenseForm.errors.adsense_client_id" />
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="flex items-center gap-2 text-sm">
                            <input v-model="adsenseForm.adsense_enabled" type="checkbox" /> Enable ads for free-tier users
                        </label>
                        <label class="flex items-center gap-2 text-sm">
                            <input v-model="adsenseForm.adsense_auto_ads" type="checkbox" /> Use Auto ads (let Google place ads automatically)
                        </label>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="space-y-1.5">
                            <Label for="adsense-slot-header">Header ad slot ID (optional)</Label>
                            <Input id="adsense-slot-header" v-model="adsenseForm.adsense_slot_header" placeholder="1234567890" />
                            <InputError :message="adsenseForm.errors.adsense_slot_header" />
                        </div>
                        <div class="space-y-1.5">
                            <Label for="adsense-slot-infeed">In-content ad slot ID (optional)</Label>
                            <Input id="adsense-slot-infeed" v-model="adsenseForm.adsense_slot_infeed" placeholder="1234567890" />
                            <InputError :message="adsenseForm.errors.adsense_slot_infeed" />
                        </div>
                    </div>

                    <Button type="submit" :disabled="adsenseForm.processing">Save AdSense settings</Button>
                </form>
            </CardContent>
        </Card>
    </div>
</template>
