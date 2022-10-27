document.readyState !== 'loading' ? block_tech_stack() : document.addEventListener('DOMContentLoaded', () => block_tech_stack());

function block_tech_stack() {
	/*------------------------------------------*/
	/*   block_tech_stack
/*------------------------------------------*/
	let btns = document.querySelectorAll('.tech_stack_btn');
	//add listener when click btn mark btn active wrapper-backend
	btns.forEach(item =>
		item.addEventListener('click', e => {
			showCategory(e);
			activeBtn(e);
		})
	);

	//show new content
	function showCategory(e) {
		console.log(e.target.dataset.cat);
		//select all logos wrap and remove hide
		let divs = document.querySelectorAll('.tech_stack-logos');
		let myArray = Array.from(divs);

		//remove hide
		myArray.forEach(item => item.classList.add('d-none'));

		showDiv = document.querySelector(`.wrapper-${e.target.dataset.cat}`);
		showDiv.classList.remove('d-none');
		//showDiv.classList.remove('d-none');
	}
	function activeBtn(e) {
		//remove all active ones
		let myArray = Array.from(btns);
		myArray.forEach(item => item.classList.remove('active'));
		//add active line to the one I clicked
		let pastBtn = e.target;
		pastBtn.classList.add('active');
	}
}
