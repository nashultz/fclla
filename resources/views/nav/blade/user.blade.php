<!-- NavBar For Authenticated Users -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container" v-if="user">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <div class="hamburger">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#flare-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Branding Image -->
            <a class="navbar-brand" href="/home">
                <!-- Flare -->
                <img src="/img/mono-logo.png" style="height: 32px;">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="flare-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @includeIf('flare::nav.user-left')
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                @includeIf('flare::nav.user-right')

                <li class="dropdown">
                    <!-- User Photo / Name -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <img src="{{ Auth::user()->photo_url }}" class="flare-nav-profile-photo m-r-xs">
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <!-- Impersonation -->
                        @if (session('flare:impersonator'))
                            <li class="dropdown-header">Impersonation</li>

                            <!-- Stop Impersonating -->
                            <li>
                                <a href="/flare/kiosk/users/stop-impersonating">
                                    <i class="fa fa-fw fa-btn fa-user-secret"></i>Back To My Account
                                </a>
                            </li>

                            <li class="divider"></li>
                        @endif

                        <!-- Developer -->
                        @if (Flare::developer(Auth::user()->email))
                            @include('flare::nav.developer')
                        @endif

                        <!-- Subscription Reminders -->
                        @include('flare::nav.subscriptions')

                        <!-- Settings -->
                        <li class="dropdown-header">Settings</li>

                        <!-- Your Settings -->
                        <li>
                            <a href="/settings">
                                <i class="fa fa-fw fa-btn fa-cog"></i>Your Settings
                            </a>
                        </li>

                        @if (Flare::usesTeams())
                            <!-- Team Settings -->
                            @include('flare::nav.blade.teams')
                        @endif

                        <li class="divider"></li>

                        <!-- Logout -->
                        <li>
                            <a href="/logout">
                                <i class="fa fa-fw fa-btn fa-sign-out"></i>Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
