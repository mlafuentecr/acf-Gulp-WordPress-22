document.addEventListener("DOMContentLoaded",()=>{if(document.querySelector("iframe"))console.log("iframe-----")});
function sliderHome(){console.log("Check video desktop or mobile");let{divVideo:e,videoUrl:o}="";e=document.querySelector("#video-desktop")?document.querySelector("#video-desktop"):document.querySelector("#video-mobile"),console.log(e,"divVideo"),o=e.dataset.video,console.log(o),e.innerHTML=`<source src="${o}" type="video/mp4" />`}"loading"!==document.readyState?sliderHome():document.addEventListener("DOMContentLoaded",()=>sliderHome()),console.log("VIDEO*******************");
function pwa(){"serviceWorker"in navigator&&navigator.serviceWorker.register("sw.js").then(function(e){}).catch(function(e){})}"loading"!==document.readyState?pwa():document.addEventListener("DOMContentLoaded",()=>pwa());
document.addEventListener("DOMContentLoaded",()=>{let o,t=10;if(document.querySelector("#main-menu-top")){const d=document.querySelector("#main-menu-top");let e=d.offsetHeight/2;document.querySelector("#main-menu-top")&&window.addEventListener("scroll",([n,i=10,l=!0]=[function(){o=window.scrollY,window.scrollY>=e&&(d.classList.add("fixed-top"),t=30),window.scrollY<=e&&d.classList.remove("fixed-top"),window.scrollY<=500&&(t=10)},t],function(){var e=this,o=arguments,t=l&&!c;clearTimeout(c),c=setTimeout(function(){c=null,l||n.apply(e,o)},i),t&&n.apply(e,o)}))}var n,i,l,c});
document.addEventListener("DOMContentLoaded",()=>{if(document.querySelector("#searchform")){const e=document.querySelector(".search-icon"),t=document.querySelector(".search-input");console.log(e),e.addEventListener("click",()=>{t.classList.toggle("extend"),t.classList.contains("extend")?t.setAttribute("tabindex","0"):t.setAttribute("tabindex","-1")})}});