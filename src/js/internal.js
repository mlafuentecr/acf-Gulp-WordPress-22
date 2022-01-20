/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/
document.readyState !== 'loading' ? internal() : document.addEventListener('DOMContentLoaded', () => internal());

function internal() {
	/*-----------------------------------------------------------------------------------*/
	/*  Internal
/*-----------------------------------------------------------------------------------*/
	//console.log('intern header');

	/*-----------------------------------------------------------------------------------*/
	/*  pg integrations Logos FAQ
/*-----------------------------------------------------------------------------------*/
	if (document.querySelector('.faq')) {
		const faq = document.querySelector('.faq');
		const questions = faq.querySelectorAll('.question');
		const liQuestion = faq.querySelectorAll('.drop-list__item');

		const openQuestion = function (e) {
			const removeAll = () => liQuestion.forEach(item => item.classList.remove('active'));
			const parent = e.target.closest('li');
			parent.classList.contains('active') ? removeAll() : parent.classList.add('active');
		};
		//click question
		questions.forEach(item => item.addEventListener('click', e => openQuestion(e)));
	}
}

/*----------------------------------------*/
/*  Menu Blog
/*----------------------------------------*/
//searchActive
if (document.querySelector('#blog-pg')) {
	const menu = document.querySelector('.menu');
	const labelMenu = document.querySelector('.labelMenu');

	const openSearch = e => {
		//console.log('close');
		if (e.target.classList.contains('btnClose')) menu.classList.toggle('searchActive');
	};
	const openMenu = e => {
		//console.log('open');
		menu.classList.toggle('active');
	};

	labelMenu.addEventListener('click', e => openMenu(e));
	menu.addEventListener('click', e => openSearch(e));
}

/*----------------------------------------*/
/*   glossary
/*----------------------------------------*/

if (document.querySelector('#glossary-page')) {
	const cat_wrap = document.querySelector('.glossary-info__categories');
	const catItems = cat_wrap.querySelectorAll('.glossary-info__category');
	const colRight = document.querySelector('.glossary-info__col-right');

	const openCat = function (e) {
		e.preventDefault();

		if (!e.target.classList.contains('glossary-info__post-link')) {
			//Si no es link entonces es categoria abrala
			const cat = e.target.closest('.glossary-info__category');
			cat.classList.toggle('glossary-info__category_active');
		} else {
			//busca link
			let postIndex = e.target.getAttribute('post-index');
			let item = document.querySelector(`#desk-content-${postIndex}`);
			//console.log('este ', item);

			if (window.getComputedStyle(colRight).display === 'none') {
				//console.log('mobile');
				glossaryPageScrollTo(document.querySelector(`#mob-content-${postIndex}`));
			} else {
				//console.log('desk');
				glossaryPageScrollTo(document.querySelector(`#desk-content-${postIndex}`));
			}
		}
	};

	function glossaryPageScrollTo(elem) {
		elem.scrollIntoView({
			behavior: 'smooth',
			block: 'start',
		});
	}

	catItems.forEach(item => item.addEventListener('click', e => openCat(e)));
}

/*----------------------------------------*/
/*   university
/*----------------------------------------*/
if (document.querySelector('#university-intern')) {
	const chapterLinks = document.querySelectorAll('.p-university-post-sec-4__link');
	const chapterCards = document.querySelectorAll('.p-university-post-sec-4__card-container');

	if (chapterLinks !== null && chapterLinks.length > 0) {
		for (let chapter of chapterLinks) {
			chapter.addEventListener('mouseenter', event => {
				const target = event.target;

				for (let link of chapterLinks) {
					link.classList.remove('p-university-post-sec-4__link_active');
				}
				for (let card of chapterCards) {
					card.classList.remove('p-university-post-sec-4__card-container_active');
				}

				target.classList.add('p-university-post-sec-4__link_active');
				document.getElementById(`${target.dataset.chapter}`).classList.add('p-university-post-sec-4__card-container_active');
			});
		}
	}

	function AccordionOpen(el, padding) {
		const content = el.nextElementSibling;
		el.closest('.p-university-post-sec-4__accordion-row').classList.add('accordion_opened');
		// el.classList.add('accordion_opened');
		// content.classList.add('accordion_opened');
		//content.style.height = content.children[0].offsetHeight + padding + 'px';
	}
	function AccordionClose(el, padding) {
		const content = el.nextElementSibling;
		el.closest('.p-university-post-sec-4__accordion-row').classList.remove('accordion_opened');
		// //console.log('xxxx', el.closest('.p-university-post-sec-4__accordion-row'));
		// el.classList.remove('accordion_opened');
		// content.classList.remove('accordion_opened');
		// content.style.height = '0px';
	}

	function Accordion(obj) {
		const { itemClass, padding, singleOpen } = obj;

		const items = document.querySelectorAll(`.${itemClass}`);

		if (items !== null && items.length > 0) {
			items.forEach(el => {
				el.addEventListener('click', e => {
					if (window.innerWidth < 1024) {
						if (singleOpen) {
							items.forEach(el => {
								AccordionClose(el);
							});
						}

						if (e.target.classList.contains('accordion_opened')) {
							AccordionClose(e.target, padding);
						} else {
							AccordionOpen(e.target, padding);
						}
					}
				});
			});

			items[0].click();
		}
	}

	Accordion({
		itemClass: 'p-university-post-sec-4__accordion-title',
		padding: 45,
		singleOpen: true,
	});
}

/*----------------------------------------*/
/*   LANDING PAG PARTNERS
/*----------------------------------------*/

if (document.querySelector('.partner_pg')) {
	let allAccordion = document.querySelectorAll('.accordion-item');
	let imagesWrap = document.querySelector('.slide-thumb').querySelectorAll('img');
	let tabs = document.querySelectorAll('.acc_title');

	const clearTabs = () => {
		//console.log('clear tab');
		allAccordion.forEach(item => item.classList.remove('active'));
	};
	const clearImgs = () => {
		//console.log('clear images');
		imagesWrap.forEach(item => item.classList.remove('active'));
	};

	//At start add active to first tab and img
	const addActiveFirtTime = function () {
		imagesWrap[0].classList.add('active');
		allAccordion[0].classList.add('active');
	};
	addActiveFirtTime();

	//on Click Tab OPen
	tabs.forEach(item => {
		item.addEventListener('click', e => opentab(e));
	});
	//Open tabs
	const opentab = function (e) {
		clearTabs();
		clearImgs();
		const accord = e.target.closest('.accordion-item');
		const index = Number(accord.dataset.index);
		imagesWrap[index].classList.add('active');
		accord.classList.add('active');
	};
}

/*----------------------------------------*/
/*  About
/*----------------------------------------*/

if (document.querySelector('.random-img')) {
	//select how many ramdom Images I have
	const images = document.querySelectorAll('.random-img');
	//each time page is reload remplace images from the folder url
	images.forEach(image => setRandomImage(image));
}

function setRandomImage(image) {
	///buscar o poner style

	const totalOfImages = 67;
	let randomNumber = () => Math.floor(Math.random() * totalOfImages) + 1;
	let number = randomNumber();

	if (number > totalOfImages) {
		number = randomNumber();
	} else {
		number < 10 ? (number = `0${number}`) : number;
	}

	image.style.backgroundImage = `url('/wp-content/themes/heylaika_vr5/inc/images/team-social/laika-${number}.jpg')`;
}
