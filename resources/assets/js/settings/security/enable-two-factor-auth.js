module.exports = {
	props: ['user'],

    /**
     * The component's data.
     */
	data() {
		return {
			form: new FlareForm({
				country_code: '',
				phone: ''
			})
		}
	},


    /**
     * Prepare the component.
     */
	ready() {
		this.form.country_code = this.user.country_code;
		this.form.phone = this.user.phone;
	},


	methods: {
		/**
		 * Enable two-factor authentication for the user.
		 */
		enable() {
			Flare.post('/settings/two-factor-auth', this.form)
				.then(code => {
					this.$dispatch('receivedTwoFactorResetCode', code);

					this.$dispatch('updateUser');
				});
		}
	}
};
