module.exports = {
    computed: {
        /**
         * Get the billable entity.
         */
        billable() {
            if (this.billableType) {
                return this.billableType == 'user' ? this.user : this.team;
            } else {
                return this.user;
            }
        },


        /**
         * Determine if the current billable entity is a user.
         */
        billingUser() {
            return this.billableType && this.billableType == 'user';
        },


        /**
         * Access the global Flare object.
         */
        flare() {
            return window.Flare;
        }
    }
};
