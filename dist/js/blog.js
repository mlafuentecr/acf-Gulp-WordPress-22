function blog(){(document.querySelector("#blog")||document.querySelector("#blog-single"))&&(console.log("BLOG"),changeHeaderColor())}function changeHeaderColor(){const e=document.querySelector("#menu-top");var o=document.querySelector(".getColor").dataset.color;e.style.backgroundColor=""+o}"loading"!==document.readyState?blog():document.addEventListener("DOMContentLoaded",()=>blog());