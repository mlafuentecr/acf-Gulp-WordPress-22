function pwa(){"serviceWorker"in navigator&&navigator.serviceWorker.register("sw.js").then(function(e){}).catch(function(e){})}document.addEventListener("DOMContentLoaded",()=>{document.querySelector("iframe")&&console.log("iframe-----")}),"loading"!==document.readyState?pwa():document.addEventListener("DOMContentLoaded",()=>pwa()),document.addEventListener("DOMContentLoaded",()=>{let e,t=10;const n=document.querySelector("#menu-top");let o=n.offsetHeight/2;var c,d,r,i;window.addEventListener("scroll",([c,d=10,r=!0]=[function(){e=window.scrollY,window.scrollY>=o&&(n.classList.add("fixed-top"),t=30),window.scrollY<=o&&n.classList.remove("fixed-top"),window.scrollY<=500&&(t=10)},t],function(){var e=this,t=arguments,n=r&&!i;clearTimeout(i),i=setTimeout(function(){i=null,r||c.apply(e,t)},d),n&&c.apply(e,t)}))}),document.addEventListener("DOMContentLoaded",()=>{if(document.querySelector("#searchform")){const e=document.querySelector(".search-icon"),t=document.querySelector(".search-input");e.addEventListener("click",()=>t.classList.toggle("extend"))}});