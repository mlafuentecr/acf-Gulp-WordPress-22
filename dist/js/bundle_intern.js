function internal(){if(console.log("intern "),document.querySelector("#youtubeModal")){console.log("YOutube video detected intern.js");const e=document.querySelector("#youtubeModal");e.addEventListener("click",()=>function(){document.querySelectorAll("iframe").forEach(e=>{e.src=e.src}),document.querySelectorAll("video").forEach(e=>{e.pause()})}())}}"loading"!==document.readyState?internal():document.addEventListener("DOMContentLoaded",()=>internal()),document.addEventListener("DOMContentLoaded",()=>{let e,t=10;const o=document.querySelector("#menu-top");let n=o.offsetHeight/2;var r,c,u,l;window.addEventListener("scroll",([r,c=10,u=!0]=[function(){e=window.scrollY,window.scrollY>=n&&(o.classList.add("fixed-top"),t=30),window.scrollY<=n&&o.classList.remove("fixed-top"),window.scrollY<=500&&(t=10)},t],function(){var e=this,t=arguments,o=u&&!l;clearTimeout(l),l=setTimeout(function(){l=null,u||r.apply(e,t)},c),o&&r.apply(e,t)}))}),document.addEventListener("DOMContentLoaded",()=>{if(document.querySelector("#searchform")){const e=document.querySelector(".search-icon"),t=document.querySelector(".search-input");e.addEventListener("click",()=>t.classList.toggle("extend"))}}),"loading"!==document.readyState?ourWork():document.addEventListener("DOMContentLoaded",()=>ourWork());let submenu="".submenu;function ourWork(){var e;document.querySelector("#our-work")&&(console.log("our-work"),setMenuToActive(),submenu=document.querySelector(".submenu"),document.querySelector(".our-work")&&submenu.addEventListener("click",e=>openMenu(e)),e=submenu.querySelectorAll("button"),buttonsArr=[...e],buttonsArr.forEach(e=>e.addEventListener("click",e=>sendDataToUrl(e))))}function openMenu(e){submenu.classList.contains("hide")?submenu.setAttribute("aria-expanded","true"):submenu.setAttribute("aria-expanded","false"),submenu.classList.toggle("hide")}function sendDataToUrl(e){let t,o=e.target.dataset.name;o=o.replace(" & ","-"),o=o.toLowerCase(),console.log(o,"term"),t="all"===e.target.dataset.name?"/our-work/":"?terms="+o,console.log(t,"url"),window.location.href=t}function setMenuToActive(){let t="";if(window.location.search){t=window.location.search,t=t.replace("?terms=","");let e=document.querySelector("."+t);e.classList.add("active")}else{const e=document.querySelectorAll(".active");e.forEach(e=>e.classList.remove("active"))}}console.log("1our-work");