
var gulp = require('gulp');
var gif = require('gulp-if');
var merge = require('merge-stream');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');

var gulp = require('gulp');
var gutil = require('gulp-util');
var minimist = require('minimist');
var sourcemaps = require('gulp-sourcemaps');

var pkg = require('./package.json');
var paths = pkg.paths;
var opts = minimist(process.argv.slice(2));

gulp.task('styles', function() {
    gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./css/'))
});

//Watch task
//gulp.task('default',function() {
//    gulp.watch('sass/**/*.scss',['styles']);
//});

gulp.task('css', function () {
	var streams = merge();
	paths.css.forEach(function (path) {
		streams.add(gulp.src(path.src + '*.scss')
			.pipe(gif(gutil.env.sourcemaps, sourcemaps.init()))
			.pipe(sass())
			.pipe(prefix({cascade: true}))
			.pipe(gif(gutil.env.sourcemaps, sourcemaps.write('./')))
			.pipe(gulp.dest(path.dest)));
	});
	return streams;
});

var watching = false;
gulp.task('enable-watch-mode', function () {watching = true;});

gulp.task('build', ['css']);
gulp.task('lint', ['jscs']);

gulp.task('default', ['enable-watch-mode', 'css'], function () {
	gulp.watch(paths.css.map(function (path) {
		return path.src + '**/*.scss';
	}), ['css']);
});
