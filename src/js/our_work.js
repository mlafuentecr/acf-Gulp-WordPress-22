document.readyState !== 'loading' ? ourWork() : document.addEventListener('DOMContentLoaded', () => ourWork());
let { submenu } = '';
function ourWork() {
	submenu = document.querySelector('.submenu');
	//CHeck if we are on our work
	if (document.querySelector('.our-work')) submenu.addEventListener('click', () => openMenu());

	//get buttons
	const buttons = submenu.querySelectorAll('button');
	//fron node to array
	buttonsArr = [...buttons];
	// on click items send php url to load post
	buttonsArr.forEach(item => item.addEventListener('click', e => sendDataToUrl(e)));
}
function openMenu() {
	//web accesebility
	submenu.classList.contains('hide') ? submenu.setAttribute('aria-expanded', 'true') : submenu.setAttribute('aria-expanded', 'false');
	submenu.classList.toggle('hide');
}
function sendDataToUrl(e) {
	console.log(e.target.dataset.name);
	let url = '';
	e.target.dataset.name === 'all' ? (url = '/our-work/') : (url = `?terms=${e.target.dataset.name}`);
	console.log(url, 'url');
	window.location.href = url;
}
