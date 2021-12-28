/*----------------------------------------*/
/*  integrations
/*----------------------------------------*/

if (document.querySelector('.integrations')) {
	//console.log('integration');
	let [divLogos, tabs, menu, label] = '';

	function showLogos(e) {
		menuAction(e);
		let name = e.target.dataset.name;

		const logos = document.querySelectorAll('.card');
		const divs = document.querySelectorAll(`[data-type='${name}']`);

		//si es igual a all remove hide sino pongalo
		name === 'All' ? logos.forEach(item => item.classList.remove('hide')) : logos.forEach(item => item.classList.add('hide'));
		// //remove hide from the one I click
		setTimeout(() => {
			//console.log('remove hide');
			divs.forEach(item => item.classList.remove('hide'));
		}, 100);
	}

	function menuAction(e) {
		let menuItems = document.querySelectorAll('.post-cat__item');
		//remove all active
		menuItems.forEach(item => item.classList.remove('active'));
		//add active just the one i click
		setTimeout(() => e.target.closest('li').classList.add('active'), 100);
	}

	function openMenu(e) {
		if (e.target.dataset.name) {
			label.textContent = `Category: ${e.target.dataset.name}`;
		}

		menu.classList.toggle('active');
	}

	divLogos = document.querySelector('.hooks');
	tabs = divLogos.querySelectorAll('.tab');
	menu = document.querySelector('.hookMobile');
	label = menu.querySelector('label');

	//on click tab
	tabs.forEach(item => item.addEventListener('click', e => showLogos(e)));
	menu.addEventListener('click', e => openMenu(e));
}
