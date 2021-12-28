// Defining requirements
const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass');
const prefix = require('gulp-autoprefixer'); // prefixes like -webkit and -moz
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const del = require('del');
const imagemin = require('gulp-imagemin');
sass.compiler = require('node-sass');



function homepageScss() {
	return src(['./src/sass/homepage.scss'])
		.pipe(sass().on('error', sass.logError))
		.pipe(sourcemaps.init())
		.pipe(cleanCSS())
		.pipe(prefix())
		.pipe(concat('homepage.min.css'))
		.pipe(sourcemaps.write('.'))
		.pipe(dest('./dist/css/'));
}

function internalScss() {
	return src(['./src/sass/internal.scss'])
		.pipe(sass().on('error', sass.logError))
		.pipe(sourcemaps.init())
		.pipe(prefix())
		.pipe(cleanCSS())
		.pipe(concat('internal.css'))
		.pipe(sourcemaps.write('.'))
		.pipe(dest('./dist/css/'));
}

//Js
function jsintern() {
	return src(['./src/js/internal.js', './src/js/popup-requestDemo.js', './src/js/slider-logos.js', './src/js/menu_principal.js'])
		.pipe(babel())
		.pipe(uglify())
		.pipe(concat('bundle_intern.js'))
		.pipe(dest('./dist/js/'));
}
//v2.js is for hubspot
function jshome() {
	return src(['./src/js/pwa.js','./src/js/popup-requestDemo.js', './src/js/menu_principal.js', './src/js/slider-home.js', './src/js/slider-logos.js', './src/js/tab-logos.js'])
		.pipe(babel())
		.pipe(uglify())
		.pipe(concat('bundle_home.js'))
		.pipe(dest('./dist/js/'));
}

//copy to css files from dist to src and also copy map
function copyresources() {
	return src('./dist/css/*.*').pipe(dest('./src/css/'));
}
function copyadmincss() {
	return src('./src/css/admin/*.css').pipe(dest('./dist/css/admin/'));
}

//paca vigila cuando algo cambia corre el , layoutscss
function watchtask() {
	watch('./src/sass/*.scss', internalScss);
	watch('./src/sass/*.scss', homepageScss);
	watch('./src/js/*.js', jsintern);
	watch('./src/js/*.js', jshome);
	watch('./dist/css/*.css', copyresources);
}

exports.default = series( parallel(jshome, jsintern, series(homepageScss, internalScss, copyresources, copyadmincss, watchtask)));
