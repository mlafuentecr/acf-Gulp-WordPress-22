function internal(){if(document.querySelector(".faq")){const e=document.querySelector(".faq"),t=e.querySelectorAll(".question"),o=e.querySelectorAll(".drop-list__item");t.forEach(e=>e.addEventListener("click",e=>function(e){const t=e.target.closest("li");t.classList.contains("active")?o.forEach(e=>e.classList.remove("active")):t.classList.add("active")}(e)))}}if("loading"!==document.readyState?internal():document.addEventListener("DOMContentLoaded",()=>internal()),document.querySelector("#blog-pg")){const k=document.querySelector(".menu"),l=document.querySelector(".labelMenu"),m=e=>{e.target.classList.contains("btnClose")&&k.classList.toggle("searchActive")},n=e=>{k.classList.toggle("active")};l.addEventListener("click",e=>n(e)),k.addEventListener("click",e=>m(e))}if(document.querySelector("#glossary-page")){const s=document.querySelector(".glossary-info__categories"),t=s.querySelectorAll(".glossary-info__category"),u=document.querySelector(".glossary-info__col-right"),v=function(e){if(e.preventDefault(),e.target.classList.contains("glossary-info__post-link")){var t=e.target.getAttribute("post-index");document.querySelector("#desk-content-"+t);"none"===window.getComputedStyle(u).display?glossaryPageScrollTo(document.querySelector("#mob-content-"+t)):glossaryPageScrollTo(document.querySelector("#desk-content-"+t))}else{const o=e.target.closest(".glossary-info__category");o.classList.toggle("glossary-info__category_active")}};function glossaryPageScrollTo(e){e.scrollIntoView({behavior:"smooth",block:"start"})}t.forEach(e=>e.addEventListener("click",e=>v(e)))}if(document.querySelector("#university-intern")){const D=document.querySelectorAll(".p-university-post-sec-4__link"),E=document.querySelectorAll(".p-university-post-sec-4__card-container");if(null!==D&&0<D.length)for(let e of D)e.addEventListener("mouseenter",e=>{const t=e.target;for(var o of D)o.classList.remove("p-university-post-sec-4__link_active");for(var c of E)c.classList.remove("p-university-post-sec-4__card-container_active");t.classList.add("p-university-post-sec-4__link_active"),document.getElementById(""+t.dataset.chapter).classList.add("p-university-post-sec-4__card-container_active")});function AccordionOpen(e,t){e.nextElementSibling;e.closest(".p-university-post-sec-4__accordion-row").classList.add("accordion_opened")}function AccordionClose(e,t){e.nextElementSibling;e.closest(".p-university-post-sec-4__accordion-row").classList.remove("accordion_opened")}function Accordion(e){const{itemClass:t,padding:o,singleOpen:c}=e,n=document.querySelectorAll("."+t);null!==n&&0<n.length&&(n.forEach(e=>{e.addEventListener("click",e=>{window.innerWidth<1024&&(c&&n.forEach(e=>{AccordionClose(e)}),(e.target.classList.contains("accordion_opened")?AccordionClose:AccordionOpen)(e.target,o))})}),n[0].click())}Accordion({itemClass:"p-university-post-sec-4__accordion-title",padding:45,singleOpen:!0})}if(document.querySelector(".partner_pg")){let e=document.querySelectorAll(".accordion-item"),o=document.querySelector(".slide-thumb").querySelectorAll("img"),t=document.querySelectorAll(".acc_title");const _=()=>{e.forEach(e=>e.classList.remove("active"))},aa=()=>{o.forEach(e=>e.classList.remove("active"))},ba=function(){o[0].classList.add("active"),e[0].classList.add("active")};ba(),t.forEach(e=>{e.addEventListener("click",e=>ca(e))});const ca=function(e){_(),aa();const t=e.target.closest(".accordion-item");e=Number(t.dataset.index);o[e].classList.add("active"),t.classList.add("active")}}if(document.querySelector(".random-img")){const ka=document.querySelectorAll(".random-img");ka.forEach(e=>setRandomImage(e))}function setRandomImage(e){var t=()=>Math.floor(67*Math.random())+1;let o=t();67<o?o=t():o<10?o="0"+o:o,e.style.backgroundImage=`url('/wp-content/themes/heylaika_vr5/inc/images/team-social/laika-${o}.jpg')`}
document.addEventListener("DOMContentLoaded",()=>{const o=document.querySelector("#menu-top");let e=o.offsetHeight/2;var n,l,s,i;window.addEventListener("scroll",(n=function(){console.log("scroll",window.scrollY," ",e),window.scrollY>=e&&o.classList.add("fixed-top"),window.scrollY<=e&&o.classList.remove("fixed-top")},l=20,s=!0,function(){var o=this,e=arguments,t=s&&!i;clearTimeout(i),i=setTimeout(function(){i=null,s||n.apply(o,e)},l),t&&n.apply(o,e)}))});
document.addEventListener("DOMContentLoaded",()=>{if(document.querySelector("#searchform")){const e=document.querySelector(".search-icon"),t=document.querySelector(".search-input");e.addEventListener("click",()=>t.classList.toggle("extend"))}});