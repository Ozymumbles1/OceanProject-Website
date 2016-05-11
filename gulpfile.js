var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix
    	.styles([
    		'./resources/assets/css/bootstrap.min.css',
    		'./resources/assets/css/core.css',
    		'./resources/assets/css/components.css',
    		'./resources/assets/css/icons.css',
    		'./resources/assets/css/pages.css',
    		'./resources/assets/css/menu.css',
    		'./resources/assets/css/responsive.css'
    	], 'public/css/app.css')
    	.scripts([
    		'./resources/assets/js/modernizr.min.js',
    		'./resources/assets/js/jquery.min.js',
    		'./resources/assets/js/bootstrap.min.js',
    		'./resources/assets/js/detect.js',
    		'./resources/assets/js/fastclick.js',
    		'./resources/assets/js/jquery.blockUI.js',
    		'./resources/assets/js/waves.js',
    		'./resources/assets/js/wow.min.js',
    		'./resources/assets/js/jquery.nicescroll.js',
    		'./resources/assets/js/jquery.scrollTo.min.js',
    		'./resources/assets/js/jquery.core.js',
    		'./resources/assets/js/jquery.app.js'
    	], 'public/js/app.js')
        .copy([
            './resources/assets/fonts'
        ], 'public/build/fonts')
        .copy([
            './resources/assets/plugins'
        ], 'public/build/plugins')
        .version([
            'public/css/app.css',
            'public/js/app.js'
        ]);
});
