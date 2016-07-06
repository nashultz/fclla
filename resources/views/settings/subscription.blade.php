<flare-subscription :user="user" :team="team" :billable-type="billableType" inline-template>
    <div>
        <div v-if="plans.length > 0">
            <!-- Trial Expiration Notice -->
            @include('flare::settings.subscription.trial-expiration-notice')

            <!-- New Subscription -->
            <div v-if="needsSubscription">
                @include('flare::settings.subscription.subscribe')
            </div>

            <!-- Update Subscription -->
            <div v-if="subscriptionIsActive">
                @include('flare::settings.subscription.update-subscription')
            </div>

            <!-- Resume Subscription -->
            <div v-if="subscriptionIsOnGracePeriod">
                @include('flare::settings.subscription.resume-subscription')
            </div>

            <!-- Cancel Subscription -->
            <div v-if="subscriptionIsActive">
                @include('flare::settings.subscription.cancel-subscription')
            </div>
        </div>

        <!-- Plan Features Modal -->
        @include('flare::modals.plan-details')
    </div>
</flare-subscription>
