@if (Flare::billsUsingStripe())
    @include('flare::settings.subscription.subscribe-stripe')
@else
    @include('flare::settings.subscription.subscribe-braintree')
@endif
