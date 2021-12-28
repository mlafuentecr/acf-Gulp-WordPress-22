/*--------------------------------------------------------*/
/*  Variables appStart()
/*--------------------------------------------------------*/
let imgSize;
let pos_carruel = 0;
let newsHomeCaruselNum = 0;

function mainApp() {
	/*-----------------------------------------------------------------------------------*/
	/*  Sticky nav NO SCROLLING ON FIREXO?
	/*-----------------------------------------------------------------------------------*/
	// Not a ton of code, but hard to
	const nav = document.querySelector('#header-top');
	let topOfNav = nav.offsetHeight;

	function fixNav() {
		if (window.scrollY >= topOfNav) document.body.classList.add('fixed-nav');
		if (window.scrollY === 0) document.body.classList.remove('fixed-nav');
	}
	window.addEventListener('scroll', fixNav);

	/*-----------------------------------------------------------------------------------*/
	/*  Home tab logos section 3
/*-----------------------------------------------------------------------------------*/
	const journey = document.querySelector('.journey');
	const tabWrap = journey.querySelector('.tabs');
	const logos = journey.querySelectorAll('.logos');
	const tabs = tabWrap.querySelectorAll('span');

	const clearTabs = () => tabs.forEach(item => item.classList.remove('active'));
	const clearLogos = () => logos.forEach(item => item.classList.remove('active'));

	tabs.forEach(item => {
		item.addEventListener('click', e => {
			clearTabs();
			e.target.classList.add('active');
			//get the number and add active to the same logo wrapper
			clearLogos();
			logos[e.target.dataset.index - 1].classList.add('active');
		});
	});

	/*-----------------------------------------------------------------------------------*/
	/*  Customer logos Banner
/*-----------------------------------------------------------------------------------*/

	const startSlider = function (divclass) {
		let timer = 2000;
		setTimeout(addActiveClass, timer);
		let movediv = '';
		let activeClass = '';
		let loopStop = true;

		const logos_carusel = document.querySelector(divclass);

		let customerLogos = '';
		let currentLogo = 0;

		function stopLoop() {
			clearTimeout(activeClass);
			clearTimeout(movediv);
		}

		function setLoop() {
			movediv = setTimeout(addActiveClass, timer);
		}

		function moveDiv(div) {
			//remove div
			div.remove();
			logos_carusel.appendChild(div);
			customerLogos.forEach(logo => logo.classList.remove('activeLogo'));
			setLoop();
		}

		function addActiveClass() {
			//get all the logos
			customerLogos = logos_carusel.querySelectorAll('li');
			currentLogo < customerLogos.length ? currentLogo++ : (currentLogo = 0);
			customerLogos[0].classList.add('activeLogo');
			activeClass = setTimeout(() => {
				moveDiv(customerLogos[0]);
			}, timer / 2);
		}

		logos_carusel.addEventListener('mouseover', () => stopLoop());
		logos_carusel.addEventListener('mouseleave', () => setLoop());
	};

	startSlider('.logos_carusel');

	//find the width of the div

	/*-----------------------------------------------------------------------------------*/
	/*  PWA pasar el worker al root
/*-----------------------------------------------------------------------------------*/
	if (navigator.serviceWorker) {
		if (window.location.hostname !== 'localhost') {
			navigator.serviceWorker
				.register('sw.js')
				.then(function (registration) {
					//console.log('ServiceWorker registration successful with scope:', registration.scope);
				})
				.catch(function (error) {
					//console.log('ServiceWorker registration failed:', error);
				});
		}
	}
}

document.readyState !== 'loading' ? //console.log('no loadit') : document.addEventListener('DOMContentLoaded', () => mainApp());
