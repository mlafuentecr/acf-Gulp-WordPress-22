"loading"!==document.readyState?internal():document.addEventListener("DOMContentLoaded",()=>internal());let current_page="",postsDiv="";function internal(){if(console.log("intern "),document.querySelector("#youtubeModal")){console.log("Yuutube video detected intern.js");const e=document.querySelector("#youtubeModal");e.addEventListener("click",()=>stopVideo())}document.querySelector(".contactUs")&&(document.querySelector(".contactUs").innerHTML="GET STARTED")}function stopVideo(){document.querySelectorAll("iframe").forEach(e=>{e.src=e.src}),document.querySelectorAll("video").forEach(e=>{e.pause()})}
document.addEventListener("DOMContentLoaded",()=>{let e,o=10;const t=document.querySelector("#main-menu-top");let n=t.offsetHeight/2;var l,i,d,c;document.querySelector("#main-menu-top")&&window.addEventListener("scroll",([l,i=10,d=!0]=[function(){e=window.scrollY,window.scrollY>=n&&(t.classList.add("fixed-top"),o=30),window.scrollY<=n&&t.classList.remove("fixed-top"),window.scrollY<=500&&(o=10)},o],function(){var e=this,o=arguments,t=d&&!c;clearTimeout(c),c=setTimeout(function(){c=null,d||l.apply(e,o)},i),t&&l.apply(e,o)}))});
document.addEventListener("DOMContentLoaded",()=>{if(document.querySelector("#searchform")){const e=document.querySelector(".search-icon"),t=document.querySelector(".search-input");e.addEventListener("click",()=>t.classList.toggle("extend"))}});
"loading"!==document.readyState?ourWork():document.addEventListener("DOMContentLoaded",()=>ourWork());let submenu=""["submenu"];function ourWork(){var e;document.querySelector("#our-work")&&(console.log("our-work"),setMenuToActive(),submenu=document.querySelector(".submenu"),document.querySelector(".our-work")&&submenu.addEventListener("click",e=>openMenu(e)),e=submenu.querySelectorAll("button"),buttonsArr=[...e],buttonsArr.forEach(e=>e.addEventListener("click",e=>sendDataToUrl(e))))}function openMenu(e){submenu.classList.contains("hide")?submenu.setAttribute("aria-expanded","true"):submenu.setAttribute("aria-expanded","false"),submenu.classList.toggle("hide")}function sendDataToUrl(e){let t="",o=e.target.dataset.name;o=o.replace(" & ","-"),o=o.toLowerCase(),console.log(o,"term"),t="all"===e.target.dataset.name?"/our-work/":"?terms="+o,console.log(t,"url"),window.location.href=t}function setMenuToActive(){let t="";if(submenu=document.querySelector(".submenu"),window.location.search){t=window.location.search,t=t.replace("?terms=","");let e=document.querySelector("."+t);e.classList.add("active")}else{const e=submenu.querySelectorAll(".active");e.forEach(e=>e.classList.remove("active"))}}