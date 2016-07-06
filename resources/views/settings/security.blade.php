<flare-security :user="user" inline-template>
	<div>
	    <!-- Update Password -->
	    @include('flare::settings.security.update-password')

	    <!-- Two-Factor Authentication -->
	    @if (Flare::usesTwoFactorAuth())
	    	<div v-if="user && ! user.uses_two_factor_auth">
	    		@include('flare::settings.security.enable-two-factor-auth')
	    	</div>

	    	<div v-if="user && user.uses_two_factor_auth">
	    		@include('flare::settings.security.disable-two-factor-auth')
	    	</div>

			<!-- Two-Factor Reset Code Modal -->
	    	@include('flare::settings.security.modals.two-factor-reset-code')
	    @endif
    </div>
</flare-security>
