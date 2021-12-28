/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/
// let imgSize;
// let pos_carruel = 0;
// let newsHomeCaruselNum= 0;

document.readyState !== 'loading' ? appStart() : document.addEventListener('DOMContentLoaded', ()=>appStart());


function appStart() {

/*-----------------------------------------------------------------------------------*/
/*  Home tab logos section 3  Security and Risk Privacy 
/*-----------------------------------------------------------------------------------*/
const journey = document.querySelector('.journey');
const tabWrap = journey.querySelector('.tabs');
const logos 	= journey.querySelectorAll('.logos');
const tabs 		= tabWrap.querySelectorAll('span');

const clearTabs=()=>tabs.forEach(item => item.classList.remove('active'));
const clearLogos=()=>logos.forEach(item => item.classList.remove('active'));

tabs.forEach(item => {
	item.addEventListener('click',(e)=>	{
		clearTabs();
		e.target.classList.add('active');
		//get the number and add active to the same logo wrapper
		clearLogos();
		logos[e.target.dataset.index-1].classList.add('active');
	})

});






}