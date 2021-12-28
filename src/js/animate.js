
/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/
document.readyState !== 'loading' ? startanimate() :	document.addEventListener('DOMContentLoaded', ()=>startanimate());

function startanimate() {
 
/*-----------------------------------------------------------------------------------*/
/*  StartAnimate
/*-----------------------------------------------------------------------------------*/
  //if there is no animate div then dont excure
  if(!document.querySelectorAll('.animate')) return;
  //Look for all animate or stop
  console.log('animate is present')

  function debounce(func, wait = 20, immediate = true) {
    var timeout;
    return function() {
      var context = this, args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  };

  const sliderImages = document.querySelectorAll('.animate');

  function checkVisible() {
    sliderImages.forEach((elm, i) => {
    var rect = elm.getBoundingClientRect();
    var viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);
    if ( !(rect.bottom < 0 || rect.top - viewHeight >= 0)) {
      setTimeout( elm.classList.add('active') , 2000);
      
    } else {
      elm.classList.remove('active');
    }
    })
  }



  window.addEventListener('scroll', debounce(checkVisible));

}

