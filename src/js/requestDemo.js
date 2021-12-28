function popUpJs() {
	/*-----------------------------------------------------------------------------------*/
	/*  POPUP
	/*-----------------------------------------------------------------------------------*/
	const btnRequesDemo = document.querySelectorAll('.reques-demo');
	console.log(btnRequesDemo, 'btnRequesDemo');
	btnRequesDemo.forEach(btn => btn.addEventListener('click', e => openPopup(e)));
}
function openPopup(e) {
	e.preventDefault();
	const popUp = document.getElementById('requestDemo');
	const popUpClose = document.querySelector('.close');
	popUpClose.addEventListener('click', () => popUp.classList.remove('show'));
	console.log(popUp, 'popUp');
	popUp.classList.add('show');
}

document.readyState !== 'loading' ? console.log('no loadit') : document.addEventListener('DOMContentLoaded', () => popUpJs());
