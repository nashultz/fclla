
/*
 |--------------------------------------------------------------------------
 | Laravel Flare Bootstrap
 |--------------------------------------------------------------------------
 |
 | First, we will load all of the "core" dependencies for Flare which are
 | libraries such as Vue and jQuery. This also loads the Flare helpers
 | for things such as HTTP calls, forms, and form validation errors.
 |
 | Next, we'll create the root Vue application for Flare. This will start
 | the entire application and attach it to the DOM. Of course, you may
 | customize this script as you desire and load your own components.
 |
 */

require('flare-bootstrap');

require('./components/bootstrap');

var app = new Vue({
    mixins: [require('flare')]
});