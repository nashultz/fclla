function kioskAddDiscountForm () {
    return {
        type: 'amount',
        value: null,
        duration: 'once',
        months: null
    };
}

module.exports = {
    mixins: [require('./../mixins/discounts')],


    /**
     * The component's data.
     */
    data() {
        return {
            loadingCurrentDiscount: false,
            currentDiscount: null,

            discountingUser: null,
            form: new FlareForm(kioskAddDiscountForm())
        };
    },


    events: {
        /**
         * Confirm the discount for the given user.
         */
        addDiscount(user) {
            this.form = new FlareForm(kioskAddDiscountForm());

            this.setUser(user);

            $('#modal-add-discount').modal('show');
        }
    },


    methods: {
        /**
         * Set the user receiving teh discount.
         */
        setUser(user) {
            this.discountingUser = user;

            this.getCurrentDiscountForUser(user);
        },


        /**
         * Apply the discount to the user.
         */
        applyDiscount() {
            Flare.post('/flare/kiosk/users/discount/' + this.discountingUser.id, this.form)
                .then(() => {
                    $('#modal-add-discount').modal('hide');
                });
        },
    }
};
