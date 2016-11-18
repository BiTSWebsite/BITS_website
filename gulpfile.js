var gulp = require('gulp');
var ftp = require('vinyl-ftp');
var sass = require('gulp-sass');

gulp.task('sass', function () {
    return gulp.src('./src/styles/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./build/css'));
});

gulp.task('deploy', function () {
    var conn = ftp.create({
        host: process.env.HOST,
        user: process.env.USERNAME,
        password: process.env.PASSWORD,
        parallel: 10
    });

    return gulp.src(['build/css/main.css'], {base: '.', buffer: false})
        .pipe(conn.dest('/stylesheets'));
});

gulp.task('default', function () {
    // place code for your default task here
});
