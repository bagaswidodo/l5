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
elixir.config.sourcemaps = false;
elixir(function(mix) {
    // mix.sass('app.scss');
    

    mix.scripts([
    	'app.js'
    ],'public/elixir/js/app.js');

    mix.scripts([
    	'controllers/userController.js',
        'controllers/globalController.js',
        'controllers/navController.js'
    ],'public/elixir/js/controller.js');

    mix.scripts([
    	'models/userModel.js'
    ],'public/elixir/js/models.js');
});
