var gulp          = require('gulp'),
    sass          = require('gulp-sass'),
    sourcemaps    = require('gulp-sourcemaps'),
    rename        = require('gulp-rename'),
    concat        = require('gulp-concat'),
    uglify        = require('gulp-uglify');
 
gulp.task('styles', function () {
  return gulp.src('assets/styles/style.scss')
  .pipe(sourcemaps.init())
  .pipe(sass({
    errLogToConsole: true,
    outputStyle: 'expanded' // compiles SASS to CSS
  }))
  .pipe(rename('style.min.css')) // not yet minified at this point, just compiled [optional]
  .pipe(gulp.dest('assets/styles')) // tells task which directory to output compiled CSS [optional]
  .pipe(sass({
    errLogToConsole: true,
    outputStyle: 'compressed' // minifies style.min.css
  }))
  .pipe(sourcemaps.write('/', { // write style.min.css.map to same directory as style.min.css
    includeContent: false,
    sourceRoot: '../../assets/styles' // relative to minified output location
  }))
  .pipe(gulp.dest('public/build/css/')) // tells task which directory to output minified CSS
});

gulp.task('scripts', function(){
  return gulp.src([ // The order that you list the files in this array IS IMPORTANT!!
      'assets/scripts/vendor/**.*',
      'assets/scripts/**.*',
    ])
  .pipe(concat('scripts.min.js')) // concatenates the JS files listed above into one file called scripts.min.js
  .pipe(uglify({
      output: {
          comments: /^\!/ // keep comments that start with "/*!"
      }
  })) // minifies scripts.min.js
  .pipe(gulp.dest('public/build/js/')) // tells task which directory to outputs uglified (minified) scripts.min.js
});

gulp.task('default', gulp.series('styles', 'scripts'), function() {  // include array of tasks to run them upon initial running of 'gulp' in the terminal
});

gulp.task('watch', function(){
  gulp.watch('assets/styles/**/*.scss', gulp.series('styles')); // Watch the sass files for changes
  gulp.watch('assets/scripts/**.*', gulp.series('scripts')); // Watch the JS files for changes
});
