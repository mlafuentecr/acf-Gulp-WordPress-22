function pwa(){"serviceWorker"in navigator&&navigator.serviceWorker.register("sw.js").then(function(e){}).catch(function(e){})}"loading"!==document.readyState?pwa():document.addEventListener("DOMContentLoaded",()=>pwa());

document.addEventListener("DOMContentLoaded",()=>{let e=document.querySelector("#header-top").offsetHeight;if(window.addEventListener("scroll",function(){window.scrollY>=e&&document.body.classList.add("fixed-nav"),0===window.scrollY&&document.body.classList.remove("fixed-nav")}),document.querySelector(".mobile-menu")){const s=document.querySelector(".mobile-menu"),n=s.querySelectorAll(".menu-item-has-children");n.forEach(e=>{e.addEventListener("click",e=>{e.target.offsetParent.classList.contains("show")||e.preventDefault();let t=e.target.closest("li").classList;t.toggle("show"),"#"!==e.target.attributes.href.value&&(document.body.classList.toggle("show-menu"),window.open(e.target.attributes.href.value,"_self")),1<s.querySelectorAll(".show").length&&(n.forEach(e=>e.classList.remove("show")),t.toggle("show"))})})}const t=document.getElementById("menu-button"),o=document.querySelector(".closeMenu");if(t.addEventListener("click",()=>document.body.classList.toggle("show-menu")),o.addEventListener("click",()=>document.body.classList.toggle("show-menu")),document.querySelector("#header-top")){const l=document.querySelector("#header-top"),c=l.querySelectorAll(".navigation-main>li");let t="";const r=()=>c.forEach(e=>{t=setTimeout(e.classList.remove("show"),3e3)});c.forEach(e=>{e.addEventListener("mouseenter",e=>{e.stopPropagation(),r(),clearTimeout(t),e.target.closest("li").classList.add("show")})}),l.addEventListener("mouseleave",e=>r())}});
let[actualSlider,anteriorSlider,sliders,slidersLength,buttons,sliderInterval,btnPos]="";actualSlider=0,anteriorSlider=0,"loading"!==document.readyState?slider():document.addEventListener("DOMContentLoaded",()=>slider());const removeBtn=()=>buttons.forEach(e=>e.classList.remove("btn_active"));function clearSlider(){sliders.forEach(e=>e.classList.remove("slide_active")),sliders.forEach(e=>e.classList.remove("slide_hidden")),buttons.forEach(e=>e.classList.remove("btn_active"))}function moveSliderTimer(){clearSlider(),actualSlider<slidersLength-1?actualSlider++:actualSlider=0,sliders[actualSlider].classList.add("slide_active"),(0<actualSlider?sliders[actualSlider-1]:sliders[slidersLength-1]).classList.add("slide_hidden"),btnPos=actualSlider-1,0<=btnPos&&buttons[btnPos].classList.add("btn_active")}function buttonCLick(e){e=e.target.closest("div");clearInterval(sliderInterval),clearSlider(),actualSlider=e.dataset.index,anteriorSlider=actualSlider-1,btnPos=actualSlider-1,sliders[actualSlider].classList.add("slide_active"),buttons[btnPos].classList.add("btn_active"),setSliderInterVal()}function slider(){document.querySelectorAll(".home-hero__slide")&&(sliders=document.querySelectorAll(".home-hero__slide"),buttons=document.querySelectorAll(".home-hero__criteria"),buttons.forEach(e=>e.addEventListener("click",e=>buttonCLick(e))),slidersLength=sliders.length,setSliderInterVal())}function setSliderInterVal(){sliderInterval=setInterval(moveSliderTimer,4e3)}
function logo_slider(){document.querySelector(".logos_carusel")&&function(e){let t=2e3;setTimeout(L,t);let o="",l="";let c=document.querySelector(".logos_carusel"),i=document.querySelectorAll(".slick-prev"),s=document.querySelectorAll(".slick-next");const r=document.querySelector(e);let n="",a=0,u=!0;function d(){clearTimeout(l),clearTimeout(o)}function m(){o=setTimeout(L,t)}function v(e){e.remove(),r.appendChild(e),n.forEach(e=>e.classList.remove("activeLogo")),u=!0,m()}function L(){n=r.querySelectorAll("li"),a<n.length?a++:a=0;let e=n[0];e.classList.add("activeLogo"),d(),l=setTimeout(()=>v(e),t/2)}function g(e){if(u){if(d(),u=!1,"right"===e)if(n=r.querySelectorAll("li"),document.querySelector(".activeLogo"))n.forEach(e=>e.classList.remove("activeLogo"));else{let e=n[n.length-1];e.classList.add("activeLogo"),e.remove(),c.prepend(e),setTimeout(()=>e.classList.remove("activeLogo"),1e3)}else{let e=n[0];e.classList.contains("activeLogo")&&(v(e),e.remove(),r.appendChild(e),n.forEach(e=>e.classList.remove("activeLogo"))),L()}setTimeout(()=>u=!0,1e3)}}i=i[0],s=s[0],c.addEventListener("mouseover",()=>d()),c.addEventListener("mouseleave",()=>m()),s.addEventListener("click",()=>g("right")),i.addEventListener("click",()=>g("left"))}(".logos_carusel")}"loading"!==document.readyState?logo_slider():document.addEventListener("DOMContentLoaded",()=>logo_slider());
function appStart(){const e=document.querySelector(".journey"),t=e.querySelector(".tabs"),a=e.querySelectorAll(".logos"),c=t.querySelectorAll("span");c.forEach(e=>{e.addEventListener("click",e=>{c.forEach(e=>e.classList.remove("active")),e.target.classList.add("active"),a.forEach(e=>e.classList.remove("active")),a[e.target.dataset.index-1].classList.add("active")})})}"loading"!==document.readyState?appStart():document.addEventListener("DOMContentLoaded",()=>appStart());