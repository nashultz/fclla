@if (Flare::billsUsingStripe())
    @include('flare::auth.register-stripe')
@else
    @include('flare::auth.register-braintree')
@endif
