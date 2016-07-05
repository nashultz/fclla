module.exports = {
	props: ['user'],

    /**
     * The component's data.
     */
	data() {
		return {
			form: new FlareForm({})
		}
	},


	methods: {
		/**
		 * Disable two-factor authentication for the user.
		 */
		disable() {
			Flare.delete('/settings/two-factor-auth', this.form)
				.then(() => {
					this.$dispatch('updateUser');
				});
		}
	}
};
