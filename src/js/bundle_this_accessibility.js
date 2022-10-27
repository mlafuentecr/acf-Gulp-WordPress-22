document.readyState !== 'loading' ? accessibility() : document.addEventListener('DOMContentLoaded', () => accessibility());

function accessibility() {
	console.log('accessibility ON');

	//If read-this
	const readDiv = document.querySelectorAll('.read-this');
	readDiv.forEach(item => {
		item.setAttribute('tabindex', '0');
	});

	//If read-this
	const readDiv2 = document.querySelectorAll('.readThis');
	readDiv2.forEach(item => {
		item.setAttribute('tabindex', '0');
	});

	//Page services
	if (document.querySelector('#services')) {
		document.onkeydown = tabListener;
	}
}
function tabListener(evt) {
	var evt = evt ? evt : event ? event : null;
	var tabKey = 9;
	if (evt.keyCode == tabKey) {
		//if(evt.target.classList.contains('col-service'))
	}
}
