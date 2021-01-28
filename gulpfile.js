const gulp = require( 'gulp' );
const plumber = require( 'gulp-plumber' );
const sass = require( 'gulp-sass' );
const postcss = require( 'gulp-postcss' );
const sourcemaps = require( 'gulp-sourcemaps' );
const autoprefixer = require( 'autoprefixer' );
const rename = require( 'gulp-rename' );
const cleanCSS = require( 'gulp-clean-css' );


const paths = {
    sass: "./anchor/views/assets/scss",
    css: "./anchor/views/assets/css"
};

/**
 * Compiles .scss to .css files.
 *
 * Run: gulp sass
 */
gulp.task( 'sass', function() {
	return gulp
		.src( paths.sass + '/admin.scss' )
		.pipe(
			plumber( {
				errorHandler( err ) {
					console.log( err );
					this.emit( 'end' );
				},
			} )
		)
		.pipe( sass( { errLogToConsole: true } ) )
        .pipe( postcss( [ autoprefixer() ] ) )
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
		.pipe( gulp.dest( paths.css ) );
} );

/**
 * Compiles .scss to .css minifies css files.
 *
 * Run: gulp styles
 */
gulp.task( 'styles', function( callback ) {
	gulp.series( 'sass' )( callback );
} );


gulp.task( 'default', () => {
	gulp.watch(
		[ paths.sass + '/**/*.scss', paths.sass + '/*.scss' ],
		gulp.series( 'styles' )
	);
})