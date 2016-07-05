@if (Flare::billsUsingStripe())
    @include('flare::settings.payment-method-stripe')
@else
    @include('flare::settings.payment-method-braintree')
@endif
