document.addEventListener('DOMContentLoaded', () => {
	/*-----------------------------------------------------------------------------------*/
	/*  Menu Search
	/*-----------------------------------------------------------------------------------*/
	if (document.querySelector('#searchformtop')) {
		const searchformBtn = document.querySelector('.searchform__btn');
		const searchinput = document.querySelector('.searchform__input');

		searchformBtn.addEventListener('click', e => {
			e.preventDefault();
			console.log(searchinput, 'searchinput');
			searchinput.classList.toggle('extend');
			console.log(searchinput.value, 'value');
			//accesibility
			if (searchinput.classList.contains('extend')) {
				searchinput.setAttribute('tabindex', '0');
			} else {
				searchinput.setAttribute('tabindex', '-1');
			}
			//Search
			if (searchinput.value) {
				window.location.href = `/?s=${searchinput.value}`;
				searchinput.value = '';
			} else {
				searchinput.value = '';
			}
		});
	}
});
