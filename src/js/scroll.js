document.addEventListener('DOMContentLoaded', () => {
	/*-----------------------------------------------------------------------------------*/
	/*  Sticky nav NO SCROLLING ON FIREXO?
	/*-----------------------------------------------------------------------------------*/
	let scrollY = '';
	let wait = 10;
	//Performance scroll
	function debounce(func, wait = 10, immediate = true) {
		var timeout;
		return function () {
			var context = this,
				args = arguments;
			var later = function () {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	}

	// Not a ton of code, but hard to
	const nav = document.querySelector('#menu-top');
	let topOfNav = nav.offsetHeight / 2;

	function fixNav() {
		scrollY = window.scrollY;
		if (window.scrollY >= topOfNav) {
			nav.classList.add('fixed-top');
			wait = 30;
		}
		if (window.scrollY <= topOfNav) nav.classList.remove('fixed-top');
		if (window.scrollY <= 500) wait = 10;
	}

	window.addEventListener('scroll', debounce(fixNav, wait));
});
