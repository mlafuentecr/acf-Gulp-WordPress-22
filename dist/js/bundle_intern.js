function internal(){if(console.log("intern "),document.querySelector("#youtubeModal")){console.log("Yuutube video detected intern.js");const e=document.querySelector("#youtubeModal");e.addEventListener("click",()=>stopVideo())}if(document.querySelector(".load-more-post")){console.log("load more is present");const t=document.querySelector(".load-more-post");t.addEventListener("click",()=>fetchPost2())}}function stopVideo(){document.querySelectorAll("iframe").forEach(e=>{e.src=e.src}),document.querySelectorAll("video").forEach(e=>{e.pause()})}function fetchPost(){var e=document.querySelector(".post-list");console.log(e);var t=e.dataset.max,e={action:"loadmore_posts",current_page:e.dataset.page,max_post:t,data:JSON.stringify(void 0)},t={ajax_url:window.location.hostname+"/wp-admin/admin-ajax.php"};let o=new XMLHttpRequest;o.onload=function(){myFunction1(o)},o.open("POST",t),o.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8"),o.send(encodeURI(e))}function fetchPost2(){document.querySelector(".post-list"),window.location.hostname;const e=new FormData;e.append("action","loadmore_posts"),fetch("/wp-admin/admin-ajax.php",{method:"POST",credentials:"same-origin",body:JSON.stringify(e),headers:{"content-type":"application/x-www-form-urlencoded; charset=UTF-8"}}).then(e=>e.json()).then(e=>{console.log(e)}).catch(e=>{console.log("ERROR"),console.error(e)})}function myFunction1(e){console.log("respuesta: ",JSON.stringify(e))}"loading"!==document.readyState?internal():document.addEventListener("DOMContentLoaded",()=>internal()),document.addEventListener("DOMContentLoaded",()=>{let e,t=10;const o=document.querySelector("#menu-top");let n=o.offsetHeight/2;var r,c,s,a;window.addEventListener("scroll",([r,c=10,s=!0]=[function(){e=window.scrollY,window.scrollY>=n&&(o.classList.add("fixed-top"),t=30),window.scrollY<=n&&o.classList.remove("fixed-top"),window.scrollY<=500&&(t=10)},t],function(){var e=this,t=arguments,o=s&&!a;clearTimeout(a),a=setTimeout(function(){a=null,s||r.apply(e,t)},c),o&&r.apply(e,t)}))}),document.addEventListener("DOMContentLoaded",()=>{if(document.querySelector("#searchform")){const e=document.querySelector(".search-icon"),t=document.querySelector(".search-input");e.addEventListener("click",()=>t.classList.toggle("extend"))}}),"loading"!==document.readyState?ourWork():document.addEventListener("DOMContentLoaded",()=>ourWork());let submenu="".submenu;function ourWork(){var e;document.querySelector("#our-work")&&(console.log("our-work"),setMenuToActive(),submenu=document.querySelector(".submenu"),document.querySelector(".our-work")&&submenu.addEventListener("click",e=>openMenu(e)),e=submenu.querySelectorAll("button"),buttonsArr=[...e],buttonsArr.forEach(e=>e.addEventListener("click",e=>sendDataToUrl(e))))}function openMenu(e){submenu.classList.contains("hide")?submenu.setAttribute("aria-expanded","true"):submenu.setAttribute("aria-expanded","false"),submenu.classList.toggle("hide")}function sendDataToUrl(e){let t,o=e.target.dataset.name;o=o.replace(" & ","-"),o=o.toLowerCase(),console.log(o,"term"),t="all"===e.target.dataset.name?"/our-work/":"?terms="+o,console.log(t,"url"),window.location.href=t}function setMenuToActive(){let t="";if(submenu=document.querySelector(".submenu"),window.location.search){t=window.location.search,t=t.replace("?terms=","");let e=document.querySelector("."+t);e.classList.add("active")}else{const e=submenu.querySelectorAll(".active");e.forEach(e=>e.classList.remove("active"))}}