"loading"!==document.readyState?internal():document.addEventListener("DOMContentLoaded",()=>internal());let current_page="",postsDiv="";function internal(){if(console.log("intern "),document.querySelector("#youtubeModal")){console.log("Yuutube video detected intern.js");const e=document.querySelector("#youtubeModal");e.addEventListener("click",()=>stopVideo())}}function stopVideo(){document.querySelectorAll("iframe").forEach(e=>{e.src=e.src}),document.querySelectorAll("video").forEach(e=>{e.pause()})}document.addEventListener("DOMContentLoaded",()=>{let e,t=10;const o=document.querySelector("#main-menu-top");let n=o.offsetHeight/2;var r,u,c,s;window.addEventListener("scroll",([r,u=10,c=!0]=[function(){e=window.scrollY,window.scrollY>=n&&(o.classList.add("fixed-top"),t=30),window.scrollY<=n&&o.classList.remove("fixed-top"),window.scrollY<=500&&(t=10)},t],function(){var e=this,t=arguments,o=c&&!s;clearTimeout(s),s=setTimeout(function(){s=null,c||r.apply(e,t)},u),o&&r.apply(e,t)}))}),document.addEventListener("DOMContentLoaded",()=>{if(document.querySelector("#searchform")){const e=document.querySelector(".search-icon"),t=document.querySelector(".search-input");e.addEventListener("click",()=>t.classList.toggle("extend"))}}),"loading"!==document.readyState?ourWork():document.addEventListener("DOMContentLoaded",()=>ourWork());let submenu="".submenu;function ourWork(){var e;document.querySelector("#our-work")&&(console.log("our-work"),setMenuToActive(),submenu=document.querySelector(".submenu"),document.querySelector(".our-work")&&submenu.addEventListener("click",e=>openMenu(e)),e=submenu.querySelectorAll("button"),buttonsArr=[...e],buttonsArr.forEach(e=>e.addEventListener("click",e=>sendDataToUrl(e))))}function openMenu(e){submenu.classList.contains("hide")?submenu.setAttribute("aria-expanded","true"):submenu.setAttribute("aria-expanded","false"),submenu.classList.toggle("hide")}function sendDataToUrl(e){let t,o=e.target.dataset.name;o=o.replace(" & ","-"),o=o.toLowerCase(),console.log(o,"term"),t="all"===e.target.dataset.name?"/our-work/":"?terms="+o,console.log(t,"url"),window.location.href=t}function setMenuToActive(){let t="";if(submenu=document.querySelector(".submenu"),window.location.search){t=window.location.search,t=t.replace("?terms=","");let e=document.querySelector("."+t);e.classList.add("active")}else{const e=submenu.querySelectorAll(".active");e.forEach(e=>e.classList.remove("active"))}}