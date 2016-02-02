/*
 |--------------------------------------------------------------------------
 | Setup
 |--------------------------------------------------------------------------
 |
 | Require gulp and all of our employed plugins.
 | We use both LESS and SASS, for Bootstrap and app styles respectively.
 |
 */

/*
 |--------------------------------------------------------------------------
 | Dependencies
 |--------------------------------------------------------------------------
 |
 | These are the node modules required to run the tasks
 | defined in this file.
 |
 */
var gulp = require('gulp');
var rimraf = require('gulp-rimraf');
var minifyCss = require('gulp-minify-css');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

/*
 |--------------------------------------------------------------------------
 | Configuration
 |--------------------------------------------------------------------------
 |
 | All configuration data for reading and manipulating assets
 | are defined here.
 |
 */

// The "agile" pages of this website.
var pages = ["video", "letter", "checkout", "oto"];

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

// Clean out CSS and JS for fresh batch.
gulp.task('clean', function() {
    gulp.src('assets/css/prod/**.css', { read: false })
        .pipe(rimraf());
    for (var i = 0; i < pages.length; i++) {
        var page = pages[i];
        gulp.src('assets/js/prod/**.js', { read: false })
            .pipe(rimraf());
    }
});

// Combine processed CSS files into one.
gulp.task('combine', function() {
    for (var i = 0; i < pages.length; i++) {
        var page = pages[i];
        gulp.src(['assets/css/agile/*.css', 'assets/css/agile/pages/styles-' + page + '.css'])
            .pipe(minifyCss())
            .pipe(concat('styles-' + page + '.css'))
            .pipe(gulp.dest('assets/css/prod'));
    }
});

// Compile our JS.
gulp.task('scripts', function() {
    for (var i = 0; i < pages.length; i++) {
        var page = pages[i];
        gulp.src(['assets/js/' + page + '/**/*.js', 'assets/js/common/**/*.js'])
            .pipe(uglify())
            .pipe(concat('scripts-' + page + '.js'))
            .pipe(gulp.dest('assets/js/prod'));
    }
});

// Define the production task. Run "gulp production" on the command-line to build.
gulp.task('production', ['clean', 'combine', 'scripts']);


