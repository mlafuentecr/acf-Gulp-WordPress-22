function internal(){if(document.querySelector(".faq")){const e=document.querySelector(".faq"),t=e.querySelectorAll(".question"),o=e.querySelectorAll(".drop-list__item");t.forEach(e=>e.addEventListener("click",e=>function(e){const t=e.target.closest("li");t.classList.contains("active")?o.forEach(e=>e.classList.remove("active")):t.classList.add("active")}(e)))}}if("loading"!==document.readyState?internal():document.addEventListener("DOMContentLoaded",()=>internal()),document.querySelector("#blog-pg")){const k=document.querySelector(".menu"),l=document.querySelector(".labelMenu"),m=e=>{e.target.classList.contains("btnClose")&&k.classList.toggle("searchActive")},n=e=>{k.classList.toggle("active")};l.addEventListener("click",e=>n(e)),k.addEventListener("click",e=>m(e))}if(document.querySelector("#glossary-page")){const s=document.querySelector(".glossary-info__categories"),t=s.querySelectorAll(".glossary-info__category"),u=document.querySelector(".glossary-info__col-right"),v=function(e){if(e.preventDefault(),e.target.classList.contains("glossary-info__post-link")){var t=e.target.getAttribute("post-index");document.querySelector(`#desk-content-${t}`);"none"===window.getComputedStyle(u).display?glossaryPageScrollTo(document.querySelector(`#mob-content-${t}`)):glossaryPageScrollTo(document.querySelector(`#desk-content-${t}`))}else{const o=e.target.closest(".glossary-info__category");o.classList.toggle("glossary-info__category_active")}};function glossaryPageScrollTo(e){e.scrollIntoView({behavior:"smooth",block:"start"})}t.forEach(e=>e.addEventListener("click",e=>v(e)))}if(document.querySelector("#university-intern")){const D=document.querySelectorAll(".p-university-post-sec-4__link"),E=document.querySelectorAll(".p-university-post-sec-4__card-container");if(null!==D&&0<D.length)for(let e of D)e.addEventListener("mouseenter",e=>{const t=e.target;for(var o of D)o.classList.remove("p-university-post-sec-4__link_active");for(var c of E)c.classList.remove("p-university-post-sec-4__card-container_active");t.classList.add("p-university-post-sec-4__link_active"),document.getElementById(`${t.dataset.chapter}`).classList.add("p-university-post-sec-4__card-container_active")});function AccordionOpen(e,t){e.nextElementSibling;e.closest(".p-university-post-sec-4__accordion-row").classList.add("accordion_opened")}function AccordionClose(e,t){e.nextElementSibling;e.closest(".p-university-post-sec-4__accordion-row").classList.remove("accordion_opened")}function Accordion(e){const{itemClass:t,padding:o,singleOpen:c}=e,n=document.querySelectorAll(`.${t}`);null!==n&&0<n.length&&(n.forEach(e=>{e.addEventListener("click",e=>{window.innerWidth<1024&&(c&&n.forEach(e=>{AccordionClose(e)}),(e.target.classList.contains("accordion_opened")?AccordionClose:AccordionOpen)(e.target,o))})}),n[0].click())}Accordion({itemClass:"p-university-post-sec-4__accordion-title",padding:45,singleOpen:!0})}if(document.querySelector(".partner_pg")){let e=document.querySelectorAll(".accordion-item"),o=document.querySelector(".slide-thumb").querySelectorAll("img"),t=document.querySelectorAll(".acc_title");const _=()=>{e.forEach(e=>e.classList.remove("active"))},aa=()=>{o.forEach(e=>e.classList.remove("active"))},ba=function(){o[0].classList.add("active"),e[0].classList.add("active")};ba(),t.forEach(e=>{e.addEventListener("click",e=>ca(e))});const ca=function(e){_(),aa();const t=e.target.closest(".accordion-item");e=Number(t.dataset.index);o[e].classList.add("active"),t.classList.add("active")}}if(document.querySelector(".random-img")){const ka=document.querySelectorAll(".random-img");ka.forEach(e=>setRandomImage(e))}function setRandomImage(e){var t=()=>Math.floor(67*Math.random())+1;let o=t();67<o?o=t():o<10?o=`0${o}`:o,e.style.backgroundImage=`url('/wp-content/themes/heylaika_vr5/inc/images/team-social/laika-${o}.jpg')`}
let decVar=PURL=null;function customerInit(){protoCol="http:"===location.protocol?"http://":"https://",PURL=`${protoCol}${window.location.hostname}/`,startFetching()}function startFetching(){fetch("http://heylaikadev.local/graphql",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({query:`{
      customers(first: 40) {
        edges {
          node {
            costumerSinglePost {
              companyDescr {
                applicationForm {
                  description
                }
              }
            }
            uri
           pageCustomerPreview {
                  previewCustomerPost {
                    logo {
                      sourceUrl
                    }
                    label {
                      labelText
                    }
                    content
                    link
                  }
                }
          }
        }
      }
    }    
    `})}).then(e=>e.json()).then(e=>{addHtml(e)}).catch(console.error)}function addHtml(e){const o=e.data.customers.edges,s=document.querySelector("#customers-1"),a=document.querySelector("#customers-2");let[d,u,m]=[[],[],[],[]];o.forEach((e,o)=>{var t,n,r,l,c=e.node.pageCustomerPreview.previewCustomerPost,i=e.node.costumerSinglePost.companyDescr.applicationForm;i&&([t,n,r,i,l]=i,d.push(n.description),u.push(r.description),m.push(i.description),d.filter((e,o)=>d.indexOf(e)==o),u.filter((e,o)=>u.indexOf(e)==o),m.filter((e,o)=>m.indexOf(e)==o)),o<3?s.innerHTML+=`
            <div class="col-12 col-md-4 mb-3 ">
            <div class="box d-flex align-content-start rounded p-3 border">

            <figure class="col-12 d-flex justify-content-center align-center mb-3">
            <img class='lazyload m-auto' src='${c.logo.sourceUrl}'/>
            </figure>
            
            <div class="content">
              <div class="description text-left">${c.content}</div>
            </div>

            ${null!==c.link?`<a href="${e.node.uri}" class="w-arrow">${c.link}</a>`:""}

            <div class="tag d-flex justify-content-center col-12">${c.label.labelText}</div>
          </div>
          
        </div>`:a.innerHTML+=`
          <div class="col-12 col-md-4 mb-3 ">
          <div class="box d-flex  align-content-start rounded p-3 border">

            <figure class="col-12 d-flex justify-content-center align-center mb-3">
            <img class='lazyload m-auto' src='${c.logo.sourceUrl}'/>
            </figure>
            
            <div class="content">
              <div class="description text-left">${c.content}</div>
            </div>

            ${null!==c.link?`<a href="${e.node.uri}" class="w-arrow">${c.link}</a>`:""}

            <div class="tag d-flex justify-content-center col-12">${c.label.labelText}</div>
          </div>
          
        </div>`}),d=Array.from(new Set(d)),u=Array.from(new Set(u)),m=Array.from(new Set(m)),console.log(d,"industriesArr"),console.log(u,"sizesArr"),console.log(m,"locationsArr");const t=document.querySelector("#select1"),n=document.querySelector("#select2"),r=document.querySelector("#select3");d.forEach(e=>t.innerHTML+=`<option value="${e.toLowerCase().replaceAll(" ","_")}<"> ${e}</option>`),u.forEach(e=>n.innerHTML+=`<option value="${e.toLowerCase().replaceAll(" ","_")}<"> ${e}</option>`),m.forEach(e=>r.innerHTML+=`<option value="${e.toLowerCase().replaceAll(" ","_")}<"> ${e}</option>`)}"loading"!==document.readyState?customerInit():document.addEventListener("DOMContentLoaded",()=>customerInit());

function customerg2Init(){console.log("g2");fetch("/wp-content/themes/heylaika_vr5/inc/parts/fetchingG2.php").then(e=>e.json()).then(e=>{var t=e.data.attributes.category_averages,o=t.ease_of_use,e=t.quality_of_support,t=t.ease_of_setup;console.log("ease_of_use:",o),console.log("quality_of_support:",e),console.log("ease_of_setup:",t);const n=document.querySelector(".circle-1-center"),c=document.querySelector(".circle-2-center"),r=document.querySelector(".circle-3-center");n.innerHTML=o,c.innerHTML=e,r.innerHTML=t}).catch(e=>{console.error("Error:",e)})}"loading"!==document.readyState?customerg2Init():document.addEventListener("DOMContentLoaded",()=>customerg2Init());
function logo_slider(){document.querySelector(".logos_carusel")&&function(e){let t=2e3;setTimeout(L,t);let o="",l="";let c=document.querySelector(".logos_carusel"),i=document.querySelectorAll(".slick-prev"),s=document.querySelectorAll(".slick-next");const r=document.querySelector(e);let n="",a=0,u=!0;function d(){clearTimeout(l),clearTimeout(o)}function m(){o=setTimeout(L,t)}function v(e){e.remove(),r.appendChild(e),n.forEach(e=>e.classList.remove("activeLogo")),u=!0,m()}function L(){n=r.querySelectorAll("li"),a<n.length?a++:a=0;let e=n[0];e.classList.add("activeLogo"),d(),l=setTimeout(()=>v(e),t/2)}function g(e){if(u){if(d(),u=!1,"right"===e)if(n=r.querySelectorAll("li"),document.querySelector(".activeLogo"))n.forEach(e=>e.classList.remove("activeLogo"));else{let e=n[n.length-1];e.classList.add("activeLogo"),e.remove(),c.prepend(e),setTimeout(()=>e.classList.remove("activeLogo"),1e3)}else{let e=n[0];e.classList.contains("activeLogo")&&(v(e),e.remove(),r.appendChild(e),n.forEach(e=>e.classList.remove("activeLogo"))),L()}setTimeout(()=>u=!0,1e3)}}i=i[0],s=s[0],c.addEventListener("mouseover",()=>d()),c.addEventListener("mouseleave",()=>m()),s.addEventListener("click",()=>g("right")),i.addEventListener("click",()=>g("left"))}(".logos_carusel")}"loading"!==document.readyState?logo_slider():document.addEventListener("DOMContentLoaded",()=>logo_slider());
document.addEventListener("DOMContentLoaded",()=>{let e=document.querySelector("#header-top").offsetHeight;if(window.addEventListener("scroll",function(){window.scrollY>=e&&document.body.classList.add("fixed-nav"),0===window.scrollY&&document.body.classList.remove("fixed-nav")}),document.querySelector(".mobile-menu")){const s=document.querySelector(".mobile-menu"),n=s.querySelectorAll(".menu-item-has-children");n.forEach(e=>{e.addEventListener("click",e=>{e.target.offsetParent.classList.contains("show")||e.preventDefault();let t=e.target.closest("li").classList;t.toggle("show"),"#"!==e.target.attributes.href.value&&(document.body.classList.toggle("show-menu"),window.open(e.target.attributes.href.value,"_self")),1<s.querySelectorAll(".show").length&&(n.forEach(e=>e.classList.remove("show")),t.toggle("show"))})})}const t=document.getElementById("menu-button"),o=document.querySelector(".closeMenu");if(t.addEventListener("click",()=>document.body.classList.toggle("show-menu")),o.addEventListener("click",()=>document.body.classList.toggle("show-menu")),document.querySelector("#header-top")){const l=document.querySelector("#header-top"),c=l.querySelectorAll(".navigation-main>li");let t="";const r=()=>c.forEach(e=>{t=setTimeout(e.classList.remove("show"),3e3)});c.forEach(e=>{e.addEventListener("mouseenter",e=>{e.stopPropagation(),r(),clearTimeout(t),e.target.closest("li").classList.add("show")})}),l.addEventListener("mouseleave",e=>r())}});