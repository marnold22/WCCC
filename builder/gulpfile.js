//
// ─── DEPENDENCIES ───────────────────────────────────────────────────────────────
//
var gulp = require('gulp');
var _ = require('lodash');
var path = require('path');
var fs = require('fs');
var pug = require('gulp-pug');
var data = require('gulp-data');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var php = require('gulp-connect-php');
var babel = require('gulp-babel');
var concat = require('gulp-concat');
var prefix = require('gulp-autoprefixer');
var imagemin = require('gulp-imagemin');
var rename = require('gulp-rename');
var argv = require('yargs').argv;
var filter = require('gulp-filter');
var runSequence = require('run-sequence');
// ────────────────────────────────────────────────────────────────────────────────

//
// ─── GULP PARAMETERS ────────────────────────────────────────────────────────────
//
var statics = {
    wordpress: (argv.regular == undefined) ? true : false,
    isPHP: (argv.html == undefined) ? true : false
}
// ────────────────────────────────────────────────────────────────────────────────

//
// ─── DIRECTORIES ────────────────────────────────────────────────────────────────
//
var paths = {
    build: {
        root: '../',
        baseCSS: '../',
        css: '../assets/css/',
        js: '../assets/js/',
        forms: '../assets/php/forms/',
        images: '../assets/images/',
        partials: '../assets/partials/',
        util: '../assets/util/',
    },
    dev: {
        root: './src/',
        pages: './src/pages/',
        components: './src/components/',
        images: './src/resources/images/',
        forms: './src/resources/php/forms/',
        phpFunctions: './src/resources/php/',
        data: './src/resources/data/data.json',
        util: './src/util/',
    }
}
// ────────────────────────────────────────────────────────────────────────────────

//
// ─── TASKS ──────────────────────────────────────────────────────────────────────
//
//Create the html from the pug template files.
//File names will match --> index.pug == index.php
gulp.task('pug-pages', ()=>{
    return gulp.src(paths.dev.pages + '**/*.pug')
    .pipe(data(()=>{
        let jsonFile = JSON.parse(fs.readFileSync(paths.dev.data));
        var data = _.assign({}, jsonFile, statics);
        return data;
    }))
    .pipe(pug({
        pretty: true,
    }))
    .pipe(rename({
        extname: statics.isPHP ? '.php' : '.html'
    }))
    .pipe(gulp.dest(paths.build.root));
});

//Generate the pug partials and place them in a directory in the build folder
// called 'partials'
gulp.task('pug-components', ()=>{
    return gulp.src(paths.dev.components + '**/*.pug')
    .pipe(data(()=>{
        let jsonFile = JSON.parse(fs.readFileSync(paths.dev.data));
        var data = _.assign({}, jsonFile, statics);
        return data;
    }))
    .pipe(pug({
        pretty: true
    }))
    .pipe(rename({
        dirname: '',
        extname: statics.isPHP ? '.php' : '.html'
    }))
    .pipe(gulp.dest(paths.build.partials));
});

// gulp.task('pug', ['pug-pages', 'pug-components'],()=>{});
gulp.task('pug', ['pug-pages'],()=>{});

//Compile the sass into CSS
gulp.task('sass', ()=>{
    const wpStylesheetFilter = filter('**/wordpress_theme_info.scss', {restore: true});

    return gulp.src(paths.dev.root + '**/*.scss')

    //we treat the wordpress_theme_info file differently --> it needs to be in the root folder
    //  and called style.css
    .pipe(wpStylesheetFilter)
    .pipe(sass())
    .pipe(rename({
        basename: 'style',
        dirname: ''
    }))
    .pipe(gulp.dest(paths.build.baseCSS))
    .pipe(wpStylesheetFilter.restore)
    //end wordpress_theme_info

    //begin regular scss files
    .pipe(sass({
        // outputStyle: 'compressed'
    }))
    .on('error', sass.logError)
    .pipe(prefix(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], {
      cascade: true
    }))
    .pipe(concat('styles.css'))
    .pipe(gulp.dest(paths.build.css));
});

//Transpile ES6 Javascript
gulp.task('js', ()=>{
    return gulp.src(paths.dev.root + '**/*.js')
    .pipe(babel({
        presets: ['es2015']
    }))
    .pipe(rename({
        dirname: ''
    }))
    .pipe(gulp.dest(paths.build.js));
});

//Adds files to process forms
gulp.task('php-files', ()=>{
    let formsPath = paths.dev.forms;
    formsPath = formsPath.replace(paths.dev.root, '**/') + '*.php';
    const phpForms = filter(formsPath, {restore: true});

    let pagesPath = paths.dev.pages;
    pagesPath = pagesPath.replace(paths.dev.root, '**/') + '*.php';
    const phpPages = filter(pagesPath, {restore: true});

    let componentsPath = paths.dev.components;
    componentsPath = componentsPath.replace(paths.dev.root, '**/') + '**/*.php';
    const phpComponents = filter(componentsPath, {restore: true});

    let functionPath = paths.dev.phpFunctions;
    functionPath = functionPath.replace(paths.dev.root, '**/') + '*.php';
    const phpFunctions = filter(functionPath, {restore: true});

    let utilitiesPath = paths.dev.util;
    utilitiesPath = utilitiesPath.replace(paths.dev.root, '**/') + '**/*.php';
    const phpUtils = filter(utilitiesPath, {restore: true});

    return gulp.src(paths.dev.root + '**/*.php')
    //PHP form processing files
    .pipe(phpForms)
    .pipe(rename({
        dirname: ''
    }))
    .pipe(gulp.dest(paths.build.forms))
    .pipe(phpForms.restore)
    //end PHP forms

    //PHP pages
    .pipe(phpPages)
    .pipe(rename({
        dirname: ''
    }))
    .pipe(gulp.dest(paths.build.root))
    .pipe(phpPages.restore)
    //end PHP pages

    //PHP components
    .pipe(phpComponents)
    .pipe(rename({
      dirname: ''
    }))
    .pipe(gulp.dest(paths.build.partials))
    .pipe(phpComponents.restore)
    //end PHP components

    //PHP utilities
    .pipe(phpUtils)
    .pipe(rename({
      dirname: ''
    }))
    .pipe(gulp.dest(paths.build.util))
    .pipe(phpUtils.restore)
    //end PHP utilities

    //PHP function files
    .pipe(phpFunctions)
    .pipe(rename({
        dirname: ''
    }))
    .pipe(gulp.dest(paths.build.root))
    .pipe(phpFunctions.restore)
    //end PHP function files
});

//Optimize images
gulp.task('images', ()=>{
    return gulp.src(paths.dev.images+'**/*')
    .pipe(imagemin())
    .pipe(gulp.dest(paths.build.images));
});

//Start a php server so we can look at our generated php files
gulp.task('php-serve', ()=>{
    php.server({base: paths.build.root, port: 8888, keepalive: true});
});

//Set up browser-sync server
gulp.task('browser-sync', ['php-files', 'sass', 'pug', 'js', 'images'], ()=>{
    browserSync.init({
        proxy: 'wordpress.localhost',
        port: 8080,
        open: true,
    });
});

//Set up browser-sync server (html)
gulp.task('browser-sync-html', ['php-files', 'sass', 'pug', 'js', 'images'], ()=>{
    browserSync.init({
        server: {
            baseDir: paths.build.root
        },
        notify: false,
        watchOptions:{
            ignored: 'node_modules/*'
        }
    });
});

//Watch for changes
gulp.task('watch',()=>{
    gulp.watch([paths.dev.root + '**/*.scss'], ()=>{
      runSequence('sass', browserSync.reload);
    });
    gulp.watch([paths.dev.root + '**/*.js'], ()=>{
      runSequence('js', browserSync.reload);
    });
    gulp.watch([paths.dev.root + '**/*.pug'], ()=>{
      runSequence('pug', browserSync.reload);
    });
    gulp.watch([paths.dev.root + '**/*.[png | PNG | jpe?g | JPE?G]'], ()=>{
      runSequence('images', browserSync.reload);
    });
    gulp.watch([paths.dev.root + '**/*.php'], ()=>{
      runSequence('php-files', browserSync.reload);
    });
});

//Build and compile everything
gulp.task('build', ['php-files', 'sass', 'pug', 'js', 'images']);

//Default task
if(statics.isPHP && statics.wordpress){
    gulp.task('default', ['browser-sync', 'watch']);
}else if(statics.isPHP && !statics.wordpress){
    gulp.task('default', ['php-serve', 'browser-sync', 'watch']);
}else{
    gulp.task('default', ['browser-sync-html', 'watch']);
}
