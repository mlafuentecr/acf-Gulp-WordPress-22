/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/

document.readyState !== 'loading' ? customerg2Init() : document.addEventListener('DOMContentLoaded', () => customerg2Init());

function customerg2Init() {
	console.log('g2');

	const URL2 = '/wp-content/themes/heylaika_vr5/inc/parts/fetchingG2.php';

	fetch(URL2)
		//.then(response => console.log(response))
		.then(response => response.json())
		.then(response => {
			const averages = response.data.attributes.category_averages;
			const ease_of_use = averages.ease_of_use;
			const quality_of_support = averages.quality_of_support;
			const ease_of_setup = averages.ease_of_setup;

			// console.log(averages);
			console.log('ease_of_use:', ease_of_use);
			console.log('quality_of_support:', quality_of_support);
			console.log('ease_of_setup:', ease_of_setup);

			//Select circles on the html
			const div_ease_of_use = document.querySelector('.circle-1-center');
			const div_quality_of_support = document.querySelector('.circle-2-center');
			const div_ease_of_setup = document.querySelector('.circle-3-center');

			div_ease_of_use.innerHTML = ease_of_use;
			div_quality_of_support.innerHTML = quality_of_support;
			div_ease_of_setup.innerHTML = ease_of_setup;
		})
		.catch(error => {
			console.error('Error:', error);
		});
}
