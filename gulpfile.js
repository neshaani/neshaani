var gulp 	= require('gulp');
var jade 	= require('gulp-jade');
// var browserify 	= require('gulp-browserify');

/*
 |--------------------------------------------------------------------------
 | Neshaani Task Runner
 |--------------------------------------------------------------------------
 |
 | This task runner is to facilitate the build process for Neshaani.
 |
*/

gulp.task('jade', function() {
	return gulp.src('src/templates/**/*.jade')
	.pipe(jade())
	.pipe(gulp.dest('builds/dev/'))
});

// gulp.task('js', function() {
// 	return gulp.src('src/js/main.js')
// 	.pipe(browserify({ debug: true }))
// 	.pipe(gulp.dest('builds/development/js'));
// });

gulp.task('default', ['jade']);