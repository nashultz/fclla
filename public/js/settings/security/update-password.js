module.exports = {
    /**
     * The component's data.
     */
    data() {
        return {
            form: new FlareForm({
                current_password: '',
                password: '',
                password_confirmation: ''
            })
        };
    },


    methods: {
        /**
         * Update the user's password.
         */
        update() {
            Flare.put('/settings/password', this.form);
        }
    }
};
