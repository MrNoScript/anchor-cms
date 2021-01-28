const gulp = require( 'gulp' );
const plumber = require( 'gulp-plumber' );
const sass = require( 'gulp-sass' );
const postcss = require( 'gulp-postcss' );
const sourcemaps = require( 'gulp-sourcemaps' );
const autoprefixer = require( 'autoprefixer' );
const rename = require( 'gulp-rename' );
const cleanCSS = require( 'gulp-clean-css' );


const paths = {
    sass: "./src/scss",
    css: "./css"
};

/**
 * Compiles .scss to .css files.
 *
 * Run: gulp sass
 */
gulp.task( 'sass', function() {
	return gulp
		.src( paths.sass + '/*.scss' )
		.pipe(
			plumber( {
				errorHandler( err ) {
					console.log( err );
					this.emit( 'end' );
				},
			} )
		)
		.pipe( sourcemaps.init( { loadMaps: true } ) )
		.pipe( sass( { errLogToConsole: true } ) )
		.pipe( postcss( [ autoprefixer() ] ) )
		.pipe( sourcemaps.write( undefined, { sourceRoot: null } ) )
		.pipe( gulp.dest( paths.css ) );
} );

/**
 * Compiles .scss to .css minifies css files.
 *
 * Run: gulp styles
 */
gulp.task( 'styles', function( callback ) {
	gulp.series( 'sass', 'minifycss' )( callback );
} );

/**
 * Minifies css files.
 *
 * Run: gulp minifycss
 */
gulp.task( 'minifycss', function() {
	return gulp
		.src( [
			paths.css + '/theme.css',
		] )
		.pipe(
			sourcemaps.init( {
				loadMaps: true,
			} )
		)
		.pipe(
			cleanCSS( {
				compatibility: '*',
			} )
		)
		.pipe(
			plumber( {
				errorHandler( err ) {
					console.log( err );
					this.emit( 'end' );
				},
			} )
		)
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( sourcemaps.write( './' ) )
		.pipe( gulp.dest( paths.css ) );
} );


gulp.task( 'default', () => {
	gulp.watch(
		[ paths.sass + '/**/*.scss', paths.sass + '/*.scss' ],
		gulp.series( 'styles' )
	);
})