var elixir = require('laravel-elixir');

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

elixir.config.resourcesPath = 'resources/assets';
elixir.config.publicPath = 'public/themes/default/assets';

elixir.config.css.sass.pluginOptions.includePaths = [
    'node_modules/bootstrap-sass/assets/stylesheets',
    'node_modules/font-awesome/scss'
];

elixir(function(mix) {
    mix.copy('node_modules/font-awesome/fonts', elixir.config.publicPath+'/fonts');

    mix.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.js', elixir.config.resourcesPath+'/js/bootstrap.js');
    mix.copy('node_modules/jquery/dist/jquery.min.js', elixir.config.resourcesPath+'/js/jquery.js');
    mix.copy('node_modules/moment/min/moment.min.js', elixir.config.resourcesPath+'/js/moment.js');

    mix.copy('node_modules/simplemde/dist/simplemde.min.css', elixir.config.resourcesPath+'/css/simplemde.css');
    mix.copy('node_modules/simplemde/dist/simplemde.min.js', elixir.config.resourcesPath+'/js/simplemde.js');

    mix.scripts([
        'jquery.js', 'bootstrap.js', 'moment.js',
        'simplemde.js', 'app.js'
    ]);
});

elixir(function(mix) {
    mix.sass('app.scss');
});

elixir(function(mix) {
    mix.sass('app2.scss');
});
