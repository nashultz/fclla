/*
 * Load various JavaScript modules that assist Flare.
 */
window.URI = require('urijs');
window._ = require('underscore');
window.moment = require('moment');
window.Promise = require('promise');
window.Cookies = require('js-cookie');

/*
 * Load jQuery and Bootstrap jQuery, used for front-end interaction.
 */
if (window.$ === undefined || window.jQuery === undefined) {
    window.$ = window.jQuery = require('jquery');
}

require('bootstrap/dist/js/npm');

/**
 * Load Vue if this application is using Vue as its framework.
 */
if ($('#flare-app').length > 0) {
    require('vue-bootstrap');
}
