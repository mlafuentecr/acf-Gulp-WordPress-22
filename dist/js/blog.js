function blog(){if((document.querySelector("#blog")||document.querySelector("#blog-single"))&&(console.log("BLOG"),changeHeaderColor()),document.querySelector(".load-more-post")){postsDiv=document.querySelector(".post-list"),console.log("load more is present",postsDiv),current_page=postsDiv.dataset.currentpg,max_pos="";const e=document.querySelector(".load-more-post");e.addEventListener("click",()=>fetchPost())}}function changeHeaderColor(){const e=document.querySelector("#main-menu-top");var t=document.querySelector(".getColor").dataset.color;e.style.backgroundColor=""+t}function fetchPost(){current_page++,max_post=postsDiv.dataset.max,offset=postsDiv.dataset.offset,posts_per_page=postsDiv.dataset.posts_per_page;fetchingRequest("/wp-admin/admin-ajax.php?action=loadmore_posts",{current_page:current_page,offset:offset,posts_per_page:posts_per_page})}function fetchingRequest(e,t){console.log(e,t,postsDiv),max_post<=current_page?console.log("NO more post remove load more btn",max_post):(console.log("Keep going",max_post),fetch(e,{method:"POST",headers:{"Content-Type":"application/x-www-form-urlencoded"},body:JSON.stringify(t)}).then(e=>e.text()).then(e=>{e=JSON.parse(e);postsDiv.insertAdjacentHTML("beforeend",e.data)}).catch(e=>{console.error("Error:",e)}))}function startHttpRequest(e,t){if(window.XMLHttpRequest){console.log("html",t);const o=new XMLHttpRequest;o.addEventListener("load",reqListener),o.addEventListener("error",transferFailed),o.open("POST",e,!0),o.setRequestHeader("Content-type","application/x-www-form-urlencoded"),o.send(t)}else alert("Your browser does not support the native XMLHttpRequest object.")}function reqListener(){var e=JSON.parse(this.responseText);console.log(e.data),postsDiv.insertAdjacentHTML("beforeend",e.data)}function transferFailed(e){console.log("An error occurred while transferring the file.")}"loading"!==document.readyState?blog():document.addEventListener("DOMContentLoaded",()=>blog());