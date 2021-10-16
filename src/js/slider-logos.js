/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/
document.readyState !== 'loading' ? logo_slider() :	document.addEventListener('DOMContentLoaded', ()=>logo_slider());


function logo_slider() {


	/*-----------------------------------------------------------------------------------*/
	/*  Customer logos Banner
	/*-----------------------------------------------------------------------------------*/

	const start_logos_slider = function(divclass){
		
		let timer = 2000;
		setTimeout(movefoward, timer);
		let movediv ='';
		let activeClass ='';
		let loopStop = true;

		let wrapCarusel=	document.querySelector('.logos_carusel')
		let leftIcon  = document.querySelectorAll('.slick-prev');
		let nextIcon  = document.querySelectorAll('.slick-next');
		const logos_carusel 		= document.querySelector(divclass);
		let customerLogos = '';
		let currentLogo = 0;
		let allowClicks = true;
		

		leftIcon = leftIcon[0];
		nextIcon = nextIcon[0];



	function stopLoop(){
		clearTimeout(activeClass);
		clearTimeout(movediv);
	}

	function setLoop(){
		movediv = setTimeout(movefoward, timer);
	}


	function removeDivFromLeft(activeLogo){
			//remove div 
			activeLogo.remove();
			logos_carusel.appendChild(activeLogo);
			customerLogos.forEach(logo => logo.classList.remove('activeLogo'));
			allowClicks= true 
			setLoop();
	}



	function movefoward(){

		//get all the logos
	
		customerLogos 		= logos_carusel.querySelectorAll('li');
		currentLogo < customerLogos.length ? currentLogo++ : currentLogo=0;
		let activeLogo = customerLogos[0];
		//make logo small o with or move to next one
		activeLogo.classList.add('activeLogo');
		stopLoop();
		//remplace logo position
		activeClass = setTimeout( ()=>removeDivFromLeft(activeLogo) , timer/2);

	}



	function handlecClick(dir){
	

		if(allowClicks){

			stopLoop()
			allowClicks=false;



				if(dir==='right'){

					customerLogos 		= logos_carusel.querySelectorAll('li');
					if(document.querySelector('.activeLogo') ){
						customerLogos.forEach(logo => logo.classList.remove('activeLogo'));
					}else{
						//Get the last logo
						let activeLogo = customerLogos[customerLogos.length-1];
						activeLogo.classList.add('activeLogo');
						activeLogo.remove();
						wrapCarusel.prepend(activeLogo);
						setTimeout(() => activeLogo.classList.remove('activeLogo') , 1000);
					  
					}

				}else{

					///if CLick Left
					let activeLogo = customerLogos[0];
					if(activeLogo.classList.contains('activeLogo') ){
						removeDivFromLeft(activeLogo) 
						activeLogo.remove();
						logos_carusel.appendChild(activeLogo);
						customerLogos.forEach(logo => logo.classList.remove('activeLogo'));
						movefoward()
					}else{
					movefoward()
					}
				}
					setTimeout(() => allowClicks=true , 1000);


			}else{	console.log('no yet')	}


	}



	wrapCarusel.addEventListener('mouseover', ()=>stopLoop());
	wrapCarusel.addEventListener('mouseleave', ()=>setLoop());

	nextIcon.addEventListener('click', ()=>handlecClick('right'));
	leftIcon.addEventListener('click', ()=>handlecClick('left'));


}


//start if I find caruselk
if(document.querySelector('.logos_carusel')){start_logos_slider('.logos_carusel');}




}