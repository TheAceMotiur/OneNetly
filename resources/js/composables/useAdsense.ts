import { usePage } from '@inertiajs/vue3';
import { computed, watchEffect } from 'vue';

const SCRIPT_ID = 'adsbygoogle-script';

let scriptInjected = false;

/**
 * Loads the Google AdSense script once for eligible (non-subscribed) users
 * when ads are enabled in the admin panel, and exposes ad-visibility state.
 */
export function useAdsense() {
    const page = usePage();

    const ads = computed(() => page.props.ads);
    const hasActiveSubscription = computed(
        () => page.props.auth?.hasActiveSubscription ?? false,
    );

    const adsVisible = computed(
        () => ads.value?.enabled && !!ads.value?.clientId && !hasActiveSubscription.value,
    );

    watchEffect(() => {
        if (!adsVisible.value || scriptInjected || typeof document === 'undefined') {
            return;
        }

        if (document.getElementById(SCRIPT_ID)) {
            scriptInjected = true;
            return;
        }

        const script = document.createElement('script');
        script.id = SCRIPT_ID;
        script.async = true;
        script.src = `https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=${ads.value.clientId}`;
        script.crossOrigin = 'anonymous';
        document.head.appendChild(script);

        const meta = document.createElement('meta');
        meta.name = 'google-adsense-account';
        meta.content = ads.value.clientId as string;
        document.head.appendChild(meta);

        scriptInjected = true;
    });

    return { ads, adsVisible, hasActiveSubscription };
}
