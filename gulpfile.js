// npm install --save-dev deprecated gulp gulp-autoprefixer gulp-concat gulp-minify gulp-minify-css gulp-sass gulp-util vinyl-fs

var gulp = require('gulp');
var autoprefix = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var minifyCSS = require('gulp-minify-css');
var sass = require('gulp-sass');

gulp.task('styles', function() {
    return gulp.src([
        'resources/css/pure-min.css',
        'resources/css/grids-responsive-min.css',
        'resources/css/fonts.css',
        'resources/scss/style.scss'
    ])
        .pipe(sass({ style: "expanded" }))
        .pipe(concat('all.css'))
        .pipe(autoprefix('last 2 versions'))
        .pipe(minifyCSS({ aggressiveMerging: false }))
        .pipe(gulp.dest('./public/css/'))
});
