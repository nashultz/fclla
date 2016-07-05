module.exports = {
    props: ['user'],

    /**
     * The component's data.
     */
    data() {
        return {
            form: $.extend(true, new FlareForm({
                name: '',
                email: ''
            }), Flare.forms.updateContactInformation)
        };
    },


    /**
     * Bootstrap the component.
     */
    ready() {
        this.form.name = this.user.name;
        this.form.email = this.user.email;
    },


    methods: {
        /**
         * Update the user's contact information.
         */
        update() {
            Flare.put('/settings/contact', this.form)
                .then(() => {
                    this.$dispatch('updateUser');
                });
        }
    }
};
