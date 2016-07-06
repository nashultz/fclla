<flare-invoices :user="user" :team="team" :billable-type="billableType" inline-template>
    <div>
        <!-- Update Extra Billing Information -->
        <div v-if="billable">
            @include('flare::settings.invoices.update-extra-billing-information')
        </div>

        <!-- Invoice List -->
        <div v-if="invoices.length > 0">
        	@include('flare::settings.invoices.invoice-list')
        </div>
    </div>
</flare-invoices>
