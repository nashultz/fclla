var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.publicPath = 'public/assets';
elixir.config.resourcePath = 'resources/assets';

elixir.config.css.sass.pluginOptions.includePaths = [
    'node_modules/bootstrap-sass/assets/stylesheets',
    'node_modules/font-awesome/scss'
];

elixir(function(mix) {
    mix.less('app.less')
        .browserify('main.js', null, null, { paths: 'resources/assets/js' })
        .copy('node_modules/sweetalert/dist/sweetalert.min.js', 'public/js/sweetalert.min.js')
        .copy('node_modules/sweetalert/dist/sweetalert.css', 'public/css/sweetalert.css');

    mix.copy('node_modules/font-awesome/fonts', elixir.config.publicPath+'/fonts');

    mix.copy('node_modules/jquery/dist/jquery.min.js', elixir.config.resourcePath+'/js/jquery.js');
    mix.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', elixir.config.resourcePath+'/js/bootstrap.js');
    mix.copy('node_modules/moment/min/moment.min.js', elixir.config.resourcePath+'/js/moment.js');
    mix.copy('node_modules/simplemde/dist/simplemde.min.js', elixir.config.resourcePath+'/js/simplemde.js');
    mix.copy('node_modules/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', elixir.config.resourcePath+'/js/datepicker.js');

    mix.copy('node_modules/eonasdan-bootstrap-datetimepicker/src/sass/_bootstrap-datetimepicker.scss', elixir.config.resourcePath+'/sass/datepicker.scss');
    mix.copy('node_modules/simplemde/dist/simplemde.min.css', elixir.config.resourcePath+'/sass/simplemde.scss');


    mix.scripts([
        elixir.config.resourcePath+'/js/jquery.js',
        elixir.config.resourcePath+'/js/bootstrap.js',
        elixir.config.resourcePath+'/js/moment.js',
        elixir.config.resourcePath+'/js/simplemde.js',
        elixir.config.resourcePath+'/js/datepicker.js'
    ]);
});
