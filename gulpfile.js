/*
 |--------------------------------------------------------------------------
 | Setup
 |--------------------------------------------------------------------------
 |
 | Require gulp and all of our employed plugins.
 | We use both LESS and SASS, for Bootstrap and app styles respectively.
 |
 */

var gulp = require('gulp');
var less = require('gulp-less');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

/*
 |--------------------------------------------------------------------------
 | Development Tasks
 |--------------------------------------------------------------------------
 |
 | These are tasks we define and set up a watch for to facilitate
 | app development.
 |
 | We concatenate some things for fast page refreshing while testing
 | and to eliminate the need to manage styles and scripts in the HTML head.
 |
 */

// Compile our Bootstrap LESS.
//gulp.task('less', function() {
//	return gulp.src(['front/bootstrap/less/bootstrap.less'])
//		.pipe(less())
//		.pipe(gulp.dest('public/css'));
//});

// Compile our app layout and BEM blocks written in SCSS.
//gulp.task('sass', function() {
//	return gulp.src(['front/blocks/*.scss', 'front/layout/*.scss'])
//		.pipe(sass())
//		.pipe(concat('dashboard.css'))
//		.pipe(gulp.dest('public/css'));
//});

// Combine processed CSS files into one.
gulp.task('combine', function() {
	return gulp.src(['assets/css/agile/*.css'])
        .pipe(minifyCss())
		.pipe(concat('style.css'))
		.pipe(gulp.dest('video/agile/prod'));
});

// Compile our Angular app.
gulp.task('scripts', function() {
	return gulp.src('video/agile/js/*.js')
        .pipe(uglify())
		.pipe(concat('scripts.js'))
		.pipe(gulp.dest('video/agile/prod'));
});

// Watch files for changes. Run "gulp" on the command-line to start watching.
//gulp.task('watch', function() {
//	gulp.watch('front/bootstrap/**/*.less', ['less', 'combine']);
//	gulp.watch(['front/blocks/*.scss', 'front/layout/*.scss'], ['sass', 'combine']);
//	gulp.watch('public/app/**/*.js', ['scripts']);
//});

// Set the default task for when running Gulp.
gulp.task('default', ['less', 'sass', 'combine', 'scripts', 'watch']);

/*
 |--------------------------------------------------------------------------
 | Production Tasks
 |--------------------------------------------------------------------------
 |
 | These are tasks we should only run when making a production build.
 | Otherwise, we make debugging and inspection difficult while developing.
 |
 | Annoying notes:
 | - DELETE styles.css and scripts.js before running.
 | - Stylesheets are concatenated in alphabetical order.
 |
 */

// Minify our CSS. Everything should already be concatenated into style.css.
gulp.task('minifyCss', function(){
	return gulp.src('public/css/*.css')
		.pipe(minifyCss())
		.pipe(concat('styles.css'))
		.pipe(gulp.dest('public/css'));
});

// Uglify and concatenate our JS.
gulp.task('uglify', function(){
	return gulp.src('public/js/*.js')
		.pipe(uglify())
		.pipe(concat('scripts.js'))
		.pipe(gulp.dest('public/js'));
});

// Define the production task. Run "gulp production" on the command-line to build.
gulp.task('production', ['combine', 'scripts']);


