module.exports = {
    props: ['user', 'team', 'billableType'],

    /**
     * The component's data.
     */
    data() {
        return {
            form: new FlareForm({
                coupon: ''
            })
        };
    },


    methods: {
        /**
         * Redeem the given coupon code.
         */
        redeem() {
            Flare.post(this.urlForRedemption, this.form)
                .then(() => {
                    this.form.coupon = '';

                    this.$dispatch('updateDiscount');
                });
        }
    },


    computed: {
        /**
         * Get the URL for redeeming a coupon.
         */
        urlForRedemption() {
            return this.billingUser
                            ? '/settings/payment-method/coupon'
                            : `/settings/teams/${this.team.id}/payment-method/coupon`;
        }
    }
};
