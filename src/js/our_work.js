document.readyState !== 'loading' ? ourWork() : document.addEventListener('DOMContentLoaded', () => ourWork());
let { submenu } = '';
console.log('1our-work');
function ourWork() {
	if (document.querySelector('#our-work')) {
		console.log('our-work');
		setMenuToActive();
		submenu = document.querySelector('.submenu');
		//CHeck if we are on our work
		if (document.querySelector('.our-work')) submenu.addEventListener('click', e => openMenu(e));

		//get buttons
		const buttons = submenu.querySelectorAll('button');
		//fron node to array
		buttonsArr = [...buttons];
		// on click items send php url to load post
		buttonsArr.forEach(item => item.addEventListener('click', e => sendDataToUrl(e)));
	}
}
function openMenu(e) {
	//web accesebility ecommerce_consumer ecommerce-consumer
	submenu.classList.contains('hide') ? submenu.setAttribute('aria-expanded', 'true') : submenu.setAttribute('aria-expanded', 'false');
	submenu.classList.toggle('hide');
}
function sendDataToUrl(e) {
	let url = '';
	let term = e.target.dataset.name;
	term = term.replace(' & ', '-');
	term = term.toLowerCase();

	console.log(term, 'term');
	e.target.dataset.name === 'all' ? (url = '/our-work/') : (url = `?terms=${term}`);
	console.log(url, 'url');
	window.location.href = url;
}

function setMenuToActive() {
	let term = '';
	submenu = document.querySelector('.submenu');
	//If there is a term in the url
	if (window.location.search) {
		//get term from url
		term = window.location.search;
		//leave the name clean
		term = term.replace('?terms=', '');
		//select the menu item
		let menuItem = document.querySelector(`.${term}`);
		//set item to active
		menuItem.classList.add('active');
	} else {
		//get parent div
		const activeItems = submenu.querySelectorAll('.active');
		//remove active item from all
		activeItems.forEach(item => item.classList.remove('active'));
	}
}
