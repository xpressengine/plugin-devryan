const gulp = require('gulp')
const $ = require('gulp-load-plugins')()
let sourcemaps = process.env.NODE_ENV !== 'production'
const ignore = [
  '!node_modules/**'
]

if (process.env.SOURCEMAPS === 'true' || process.env.SOURCEMAPS === '1') {
  sourcemaps = true
}

// 게시판 스킨
function taskSassTheme () {
  return gulp.src(['Components/Themes/Devryan/assets/scss/*.scss', ...ignore], { sourcemaps })
    .pipe($.plumber())
    .pipe($.sass({outputStyle: 'compressed'}).on('error', $.sass.logError))
    .pipe($.autoprefixer({
      cascade: false
    }))
    .pipe(gulp.dest('Components/Themes/Devryan/assets/css', { sourcemaps }))
}
taskSassTheme.displayName = 'sass:theme'

function taskSassWidget () {
  return gulp.src(['Components/Themes/Devryan/assets/scss/*.scss', ...ignore], { sourcemaps })
    .pipe($.plumber())
    .pipe($.sass({outputStyle: 'compressed'}).on('error', $.sass.logError))
    .pipe($.autoprefixer({
      cascade: false
    }))
    .pipe(gulp.dest('Components/Themes/Devryan/assets/css', { sourcemaps }))
}
taskSassWidget.displayName = 'sass:widget'

const taskSass = gulp.parallel(taskSassTheme, taskSassWidget)
taskSass.displayName = 'sass'

function taskWatch () {
  gulp.watch('**/*.scss', taskSass)
}

// task 등록
gulp.task('default', gulp.series(taskSass))
gulp.task('build', taskSass)
gulp.task('watch', taskWatch)
// sass
gulp.task(taskSass)
gulp.task(taskSassTheme)
