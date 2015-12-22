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

elixir(function(mix) {
    //mix.sass('app.scss');

    //mix.scripts([
    //    'events-data.js',
    //    'functions.js',
    //    'jquery.calendario.js',
    //    'jquery.camera.js',
    //    'jquery.elastic.js',
    //    'jquery.gmap.js',
    //    'jquery.js',
    //    'jquery.vmap.js',
    //    'laravel-util.js',
    //    'plugins.js',
    //    'underscore.js',
    //    'util.js'
    //], 'public/js/app.js');

    mix.scripts([
        '/plugins/mask/jquery.maskmoney.js',
        '/plugins/maskedinput/jquery.maskedinput.min.js',
        '/plugins/datepicker/bootstrap-datepicker.js',
        '/plugins/datepicker/locales/bootstrap-datepicker.pt-BR.js',
        '/plugins/momentjs/jquery.moment.js'
    ], 'public/js/plugins.js');

    //mix.scriptsIn('assets/js/');

});
