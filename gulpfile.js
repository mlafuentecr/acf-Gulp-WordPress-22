// Defining requirements
const { series, parallel, src, dest, watch } = require('gulp');

const prefix = require('gulp-autoprefixer'); // prefixes like -webkit and -moz
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass')(require('sass'));

function homepageScss() {
	return src(['./src/sass/homepage.scss'])
		.pipe(sass().on('error', sass.logError))
		.pipe(sourcemaps.init())
		.pipe(cleanCSS())
		.pipe(prefix())
		.pipe(concat('homepage.min.css'))
		.pipe(sourcemaps.write('.'))
		.pipe(dest('./src/css/'));
}

function internalScss() {
	return src(['./src/sass/internal.scss'])
		.pipe(sass().on('error', sass.logError))
		.pipe(sourcemaps.init())
		.pipe(prefix())
		.pipe(cleanCSS())
		.pipe(concat('internal.css'))
		.pipe(sourcemaps.write('.'))
		.pipe(dest('./src/css/'));
}

//Js
function js_bundle_Intern() {
	return src(['./src/js/internal.js', './src/js/menu_principal.js']).pipe(babel()).pipe(uglify()).pipe(concat('bundle_intern.js')).pipe(dest('./src/js/'));
}

function js_bundle_home() {
	return src(['./src/js/pwa.js', './src/js/menu_principal.js']).pipe(babel()).pipe(uglify()).pipe(concat('bundle_home.js')).pipe(dest('./src/js/'));
}

//copy to css files from dist to src and also copy map
function copyresources() {
	return src('./src/css/*.*').pipe(dest('./dist/css/'));
}
function copyJs() {
	return src('./src/js/bootstrap.bundle.min.js', './src/js/bundle_intern.js', './src/js/bundle_home.js').pipe(dest('./dist/js/'));
}
function copyadmincss() {
	return src('./src/css/admin/*.css').pipe(dest('./dist/css/admin/'));
}

//paca vigila cuando algo cambia corre el , layoutscss
function watchtask() {
	watch('./src/sass/*.scss', internalScss);
	watch('./src/sass/*.scss', homepageScss);
	watch('./dist/css/*.css', copyresources);
	watch('./src/js/*.js', js_bundle_Intern);
	watch('./src/js/*.js', js_bundle_home);
}

exports.default = series(parallel(js_bundle_home, js_bundle_Intern, series(homepageScss, internalScss, copyresources, copyadmincss, copyJs, watchtask)));
