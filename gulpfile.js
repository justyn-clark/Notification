///////////////
// Variables //
///////////////
var gulp         = require( 'gulp' ),
	sass         = require( 'gulp-sass' ),
	sourcemaps   = require( 'gulp-sourcemaps' ),
	autoprefixer = require( 'gulp-autoprefixer' ),
	uglify       = require( 'gulp-uglify' ),
	concat       = require( 'gulp-concat' ),
	order        = require( 'gulp-order' ),
    browserSync  = require( 'browser-sync' ),
    reload       = browserSync.reload;

var style_sources = 'assets/src/sass/**/*.scss',
	style_target  = 'assets/dist/css';

var script_sources = 'assets/src/js/**/*.js',
	script_target  = 'assets/dist/js',
	script_order   = [
		'vendor/chosen.jquery.js',
        'vendor/clipboard.js',
		'vendor/event-manager.js',
		'admin.js'
	];

///////////
// Tasks //
///////////
gulp.task( 'styles', function() {
    gulp.src( style_sources )
    	.pipe( sourcemaps.init() )
        .pipe( sass( { outputStyle: 'compressed' } ).on( 'error', sass.logError ) )
        .pipe( sourcemaps.write() )
        .pipe( autoprefixer() )
        .pipe( gulp.dest( style_target ) )
        .pipe( reload( { stream: true } ) );
} );

gulp.task( 'scripts', function() {
    gulp.src( script_sources )
        .pipe( sourcemaps.init() )
    	.pipe( order( script_order, { base: 'assets/src/js/' } ) )
		.pipe( concat( 'scripts.min.js' ) )
		.pipe( uglify() )
        .pipe( sourcemaps.write() )
        .pipe( gulp.dest( script_target ) )
        .pipe( reload( { stream: true } ) );
} );

////////////////////////////////////
// Default - Browser Sync & Watch //
////////////////////////////////////
gulp.task( 'default', function() {

    browserSync({
        proxy: 'notification.dev',
        browser: ['google chrome'],
    });

    gulp.watch( style_sources, ['styles'] );
    gulp.watch( script_sources, ['scripts'] );
    gulp.watch( ['./**/*.php', '!./node_modules'], reload );

} );
