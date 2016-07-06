@extends('flare::layouts.app')

@section('scripts')
    @if (Flare::billsUsingStripe())
        <script src="https://js.stripe.com/v2/"></script>
    @else
        <script src="https://js.braintreegateway.com/v2/braintree.js"></script>
    @endif
@endsection

@section('content')
<flare-settings :user="user" :teams="teams" inline-template>
    <div class="flare-screen container">
        <div class="row">
            <!-- Tabs -->
            <div class="col-md-4">
                <div class="panel panel-default panel-flush">
                    <div class="panel-heading">
                        Settings
                    </div>

                    <div class="panel-body">
                        <div class="flare-settings-tabs">
                            <ul class="nav flare-settings-stacked-tabs" role="tablist">
                                <!-- Profile Link -->
                                <li role="presentation">
                                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                                        <i class="fa fa-fw fa-btn fa-edit"></i>Profile
                                    </a>
                                </li>

                                <!-- Teams Link -->
                                @if (Flare::usesTeams())
                                    <li role="presentation">
                                        <a href="#teams" aria-controls="teams" role="tab" data-toggle="tab">
                                            <i class="fa fa-fw fa-btn fa-users"></i>Teams
                                        </a>
                                    </li>
                                @endif

                                <!-- Security Link -->
                                <li role="presentation">
                                    <a href="#security" aria-controls="security" role="tab" data-toggle="tab">
                                        <i class="fa fa-fw fa-btn fa-lock"></i>Security
                                    </a>
                                </li>

                                <!-- API Link -->
                                @if (Flare::usesApi())
                                    <li role="presentation">
                                        <a href="#api" aria-controls="api" role="tab" data-toggle="tab">
                                            <i class="fa fa-fw fa-btn fa-cubes"></i>API
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Billing Tabs -->
                @if (Flare::canBillCustomers())
                    <div class="panel panel-default panel-flush">
                        <div class="panel-heading">
                            Billing
                        </div>

                        <div class="panel-body">
                            <div class="flare-settings-tabs">
                                <ul class="nav flare-settings-stacked-tabs" role="tablist">
                                    @if (Flare::hasPaidPlans())
                                        <!-- Subscription Link -->
                                        <li role="presentation">
                                            <a href="#subscription" aria-controls="subscription" role="tab" data-toggle="tab">
                                                <i class="fa fa-fw fa-btn fa-shopping-bag"></i>Subscription
                                            </a>
                                        </li>
                                    @endif

                                    <!-- Payment Method Link -->
                                    <li role="presentation">
                                        <a href="#payment-method" aria-controls="payment-method" role="tab" data-toggle="tab">
                                            <i class="fa fa-fw fa-btn fa-credit-card"></i>Payment Method
                                        </a>
                                    </li>

                                    <!-- Invoices Link -->
                                    <li role="presentation">
                                        <a href="#invoices" aria-controls="invoices" role="tab" data-toggle="tab">
                                            <i class="fa fa-fw fa-btn fa-history"></i>Invoices
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Tab Panels -->
            <div class="col-md-8">
                <div class="tab-content">
                    <!-- Profile -->
                    <div role="tabpanel" class="tab-pane active" id="profile">
                        @include('flare::settings.profile')
                    </div>

                    <!-- Teams -->
                    @if (Flare::usesTeams())
                        <div role="tabpanel" class="tab-pane" id="teams">
                            @include('flare::settings.teams')
                        </div>
                    @endif

                    <!-- Security -->
                    <div role="tabpanel" class="tab-pane" id="security">
                        @include('flare::settings.security')
                    </div>

                    <!-- API -->
                    @if (Flare::usesApi())
                        <div role="tabpanel" class="tab-pane" id="api">
                            @include('flare::settings.api')
                        </div>
                    @endif

                    <!-- Billing Tab Panes -->
                    @if (Flare::canBillCustomers())
                        @if (Flare::hasPaidPlans())
                            <!-- Subscription -->
                            <div role="tabpanel" class="tab-pane" id="subscription">
                                <div v-if="user">
                                    @include('flare::settings.subscription')
                                </div>
                            </div>
                        @endif

                        <!-- Payment Method -->
                        <div role="tabpanel" class="tab-pane" id="payment-method">
                            <div v-if="user">
                                @include('flare::settings.payment-method')
                            </div>
                        </div>

                        <!-- Invoices -->
                        <div role="tabpanel" class="tab-pane" id="invoices">
                            @include('flare::settings.invoices')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</flare-settings>
@endsection
