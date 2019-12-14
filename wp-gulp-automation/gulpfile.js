var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat'); 
var config = require('./gulp.config')();
var uglify = require('gulp-uglify');
var cssnano = require('gulp-cssnano');
var gutil = require('gulp-util');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var livereload = require('gulp-livereload');
var del = require('del')

//Error handler
var plumberErrorHandler = { errorHandler: notify.onError({
	title: 'Gulp',
	message: 'Error: <%=error.message %>'
	})
};

//Concat, convert and minify css
gulp.task('sass', function(){
	gulp.src(config.appCss)
		.pipe(plumber(plumberErrorHandler))
		.pipe(concat('styles.min.scss'))
		.pipe(sass())
		.pipe(cssnano())
		.pipe(gulp.dest('../dist/css'))
		.pipe(livereload());
});

//Concat and uglify js
gulp.task('js', function() {
	gulp.src(config.appScripts)
		.pipe(plumber(plumberErrorHandler))
		.pipe(concat('scripts.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('../dist/js'))
		.pipe(livereload());
});

gulp.task('default', ['sass','js', 'watch']);

//Clean js
gulp.task('clean-scripts', function (cb) {
  return del([
    '../dist/js/scripts.min.js',
  ],{force: true},cb);
});

//Clean css
gulp.task('clean-styles', function (cb) {
  return del([
    '../dist/css/styles.min.js',
  ],{force: true},cb);
});

//Watcher
gulp.task('watch', function(){
	livereload.listen();
	//Watch js files
	gulp.watch([config.appScripts], ['clean-scripts','js']);

	//Watch css files
	gulp.watch([config.appCss], ['clean-styles','sass']);
});