export type SubscriptionPlan = {
    id: number;
    name: string;
    slug: string;
    description: string | null;
    price: string | number;
    currency: string;
    interval: 'month' | 'year';
    paypal_plan_id: string | null;
    features: string[] | null;
    is_active: boolean;
    is_featured: boolean;
    sort_order: number;
    storage_gb: number | null;
    active_subscribers_count?: number;
    created_at?: string;
    updated_at?: string;
};

export type Subscription = {
    id: number;
    user_id: number;
    subscription_plan_id: number;
    provider: string;
    provider_subscription_id: string | null;
    status: 'pending' | 'active' | 'cancelled' | 'expired';
    starts_at: string | null;
    ends_at: string | null;
    cancelled_at: string | null;
    metadata: {
        amount_paid?: number;
        currency?: string;
        paypal_capture_id?: string;
    } | null;
    plan?: SubscriptionPlan;
    user?: {
        id: number;
        name: string;
        email: string;
    };
};

export type AdsSettings = {
    enabled: boolean;
    clientId: string | null;
    autoAds: boolean;
    slots: {
        header: string | null;
        infeed: string | null;
    };
};
