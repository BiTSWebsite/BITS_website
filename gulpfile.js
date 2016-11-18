var gulp = require('gulp');
var ftp = require('vinyl-ftp');
var sass = require('gulp-sass');
var git = require('gulp-git');
var shell = require('gulp-shell')


gulp.task('sass', function () {
    return gulp.src('./src/styles/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./build/css'));
});

gulp.task('deploy', function () {

    var conn = ftp.create({
        host: process.env.FTP_HOST,
        user: process.env.FTP_USERNAME,
        password: process.env.FTP_PASSWORD,
        parallel: 10
    });

    return gulp.src(['build/css/main.css'], {base: '.', buffer: false})
        .pipe(conn.dest('/stylesheets'));
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
