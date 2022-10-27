/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/
document.readyState !== 'loading' ? internal() : document.addEventListener('DOMContentLoaded', () => internal());
let current_page = '';
let postsDiv = '';

function internal() {
	console.log('intern 1');

	//CHECK IF WE ARE IN services

	if (document.querySelector('#services')) {
		//Get menu
		const techMenu = document.querySelector('.tech_stack-menu');
		techMenu.addEventListener('click', () => toggleMenu());
		function toggleMenu() {
			console.log(techMenu);
			techMenu.classList.toggle('expand');
		}
	}

	//ABOUT
	if (document.querySelector('#youtubeModal')) {
		console.log('Yuutube video detected intern.js');
		const video = document.querySelector('#youtubeModal');
		video.addEventListener('click', () => stopVideo());
	}

	//SERVICES Change contact us name
	if (document.querySelector('.landing-pg')) {
		document.querySelector('.contactUs').innerHTML = 'Get Started';
	}
	if (document.querySelector('.block-case-study-headline')) changeHeaderColor();
}

//stop video when someone click out of the popup
function stopVideo() {
	document.querySelectorAll('iframe').forEach(v => {
		v.src = v.src;
	});
	document.querySelectorAll('video').forEach(v => {
		v.pause();
	});
}

function changeHeaderColor() {
	console.log('chage color');
	const header = document.querySelector('.block-case-study-headline');
	const bgColor = header.dataset.bgcolor;
	console.log(bgColor);

	const nav = document.querySelector('#main-menu-top');
	nav.style.backgroundColor = `${bgColor}`;
}
