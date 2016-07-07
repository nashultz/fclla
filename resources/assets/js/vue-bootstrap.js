/*
 * Load Vue & Vue-Resource.
 *
 * Vue is the JavaScript framework used by Flare.
 */
if (window.Vue === undefined) {
    window.Vue = require('vue');
}

require('vue-resource');

Vue.config.debug = true;

/**
 * Load Vue HTTP Interceptors.
 */
Vue.http.interceptors.push(() => {
    return require('./interceptors');
});

/**
 * Load Vue Global Mixin.
 */
Vue.mixin(require('./mixin'));

/**
 * Define the Vue filters.
 */
require('./filters');

/**
 * Load the Flare form utilities.
 */
require('./forms/bootstrap');