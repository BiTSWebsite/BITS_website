var gulp = require('gulp');
var ftp = require('vinyl-ftp');
var sass = require('gulp-sass');
var git = require('gulp-git');
var shell = require('gulp-shell');
var watch = require('gulp-watch');
var rename = require("gulp-rename");
var cleanCSS = require('gulp-clean-css');
var clean = require('gulp-clean');


gulp.task('clean', function () {
    return gulp.src('./build', {read: false})
        .pipe(clean());
});

gulp.task('sass', function () {
    return gulp.src('./src/styles/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(rename({suffix: '.min'}))
        .pipe(cleanCSS())
        .pipe(gulp.dest('./build/css'));
});

gulp.task('deploy', function () {
    var conn = ftp.create({
        host: process.env.FTP_HOST,
        user: process.env.FTP_USERNAME,
        password: process.env.FTP_PASSWORD,
        parallel: 10
    });

    gulp.src(['plugins/**/*'], {base: '.', buffer: false})
        .pipe(conn.dest('/htdocs/wp-content'));

    gulp.src(['themes/**/*'], {base: '.', buffer: false})
        .pipe(conn.dest('/htdocs/wp-content'));

    gulp.src(['single_page/**/*'], {base: '.', buffer: false})
        .pipe(conn.dest('/htdocs'));

    gulp.src(['infrastructure/.htaccess'], {base: 'infrastructure', buffer: false})
        .pipe(conn.dest('/htdocs'));

    return gulp.src(['build/css/main.css'], {base: 'build/css', buffer: false})
        .pipe(conn.dest('/htdocs/wp-content/themes/bits_bcn/css'));
});

gulp.task('default', function () {
    // place code for your default task here
});

gulp.task('init-wp', function(){
  git.clone('https://github.com/Varying-Vagrant-Vagrants/VVV.git', function (err) {
    if (err) throw err;
  });
});

gulp.task('run-wp',
   shell.task([
      'cd VVV && vagrant up'
]));

gulp.task('stop-wp',
   shell.task([
      'cd VVV && vagrant halt'
]));

gulp.task('deploy-vm', function() {
   gulp.src('./plugins/**/*')
       .pipe(gulp.dest('./VVV/www/wordpress-default/wp-content/plugins'));

   gulp.src('./themes/**/*')
       .pipe(gulp.dest('./VVV/www/wordpress-default/wp-content/themes'));

    return gulp.src('./build/css/**/*')
        .pipe(gulp.dest('./VVV/www/wordpress-default/wp-content/themes/bits_bcn/css'));
});

gulp.task('stream', function () {
    return watch(['plugins/**/*.*', 'themes/**/*.*'], function() {
      gulp.start('deploy-vm')
    });
});

gulp.task('minify-css', function() {
    return gulp.src('./build/css/**/*')
        .pipe(rename({suffix: '.min'}))
        .pipe(cleanCSS())
        .pipe(gulp.dest('./build/css/**/*'));
});
