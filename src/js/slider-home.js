//slide_active
	/*-----------------------------------------------------------------------------------*/
	/*  Varibles
	/*-----------------------------------------------------------------------------------*/
let [actualSlider, anteriorSlider, sliders, slidersLength, buttons, sliderInterval, btnPos] = '';
actualSlider   = 0;
anteriorSlider = 0;

//Start slider 
document.readyState !== 'loading' ? slider() : document.addEventListener('DOMContentLoaded', ()=>slider());

const removeBtn = ()=> buttons.forEach(item => item.classList.remove('btn_active')); 


function clearSlider(){
  sliders.forEach(item => item.classList.remove('slide_active')); 
  sliders.forEach(item => item.classList.remove('slide_hidden')); 
  buttons.forEach(item => item.classList.remove('btn_active')); 
}

function moveSliderTimer() {
  //clear classes from slider
  clearSlider();
  //SLIDES
  actualSlider < slidersLength-1 ? actualSlider++ : actualSlider=0;
  sliders[actualSlider].classList.add('slide_active');
  actualSlider > 0 ?  sliders[actualSlider-1].classList.add('slide_hidden') : sliders[slidersLength-1].classList.add('slide_hidden') ;
  //Make btn auto spin
  btnPos= actualSlider-1;
  btnPos >= 0 ? buttons[btnPos].classList.add('btn_active') : '' ;
} 

function buttonCLick(e){
  let btn = e.target.closest('div');
  clearInterval(sliderInterval);
  clearSlider();

  actualSlider= btn.dataset.index;
  anteriorSlider = actualSlider-1;
  btnPos= actualSlider-1;

  //Activate btn
  sliders[actualSlider].classList.add('slide_active');
  buttons[btnPos].classList.add('btn_active');
  
  setSliderInterVal();
}

function slider() {
  if(document.querySelectorAll('.home-hero__slide')){
      sliders = document.querySelectorAll('.home-hero__slide');
      buttons = document.querySelectorAll('.home-hero__criteria');
      buttons.forEach(item => item.addEventListener('click', (e)=>buttonCLick(e)));
      slidersLength = sliders.length;
      setSliderInterVal();
  }

}

function setSliderInterVal(){
  //darle un tiempo y epezar ciclo
  sliderInterval = setInterval(moveSliderTimer, 4000);
}
