module.exports = {
    props: ['user', 'team'],

    /**
     * The component's data.
     */
    data() {
        return {
            form: new FlareForm({
                email: ''
            })
        };
    },


    methods: {
        /**
         * Send a team invitation.
         */
        send() {
            Flare.post(`/settings/teams/${this.team.id}/invitations`, this.form)
                .then(() => {
                    this.form.email = '';

                    this.$dispatch('updateInvitations');
                });
        }
    }
};
