function block_jobs(){let[l,s,n,t,a,c,r,,,d,p,b,_]="";var o;document.querySelector(".block_jobs")&&(l=document.querySelector(".block_jobs"),s=document.querySelector(".block_jobs_rows"),n=l.dataset.jobs,n=n||7,(o=new Headers).append("Cookie","incap_ses_7241_2167377=waKMBIJNh0g4u/dWNTN9ZHylAWIAAAAAU+tiVC0NhKxNzIEPK1n0UQ==; nlbi_2167377=BexSMz4nOAj6q3V2ktkhowAAAAByq9DxD9oXxFuG+3oPjrw5; visid_incap_2167377=AXi+iOUbQhmmy2+WLq6qZXulAWIAAAAAQUIPAAAAAABa9wcrkYrUWWNSbFp2O0ZJ"),fetch("https://www.comeet.co/careers-api/2.0/company/46.003/positions?token=6432592643C86190C12C93218385B0385B",{method:"GET",headers:o,redirect:"follow"}).then(o=>o.text()).then(o=>o?function(o){let e=JSON.parse(o);t=`<section class='jobstable col-12' >
		<div class='container'>
			<div class='row row-cols-1 row-cols-md-2'>`,a="",c="",e.forEach((o,e)=>{r=o.department||"",o.location&&(d=o.location.is_remote||"--",p=o.location.name||"--"),b=o.name||"--",_=o.position_url?o.url_active_page:"--",30<b.length&&(positionArr=b.split("-"),b=positionArr[0]),e<n?a+=`<div class='col jobDiv mb-5'>
        <div class='jobstable_positions  col-12'>${b}</div>
        <div class='info d-flex'>
          <div class='jobstable_location flex-grow-1 col-9 gap-2 '>${p}</div>
          <a target="_blank" rel="noopener noreferrer nofollow"  href='${_}' class='btn_applyNow rs_link_underline'>Apply Now </a>
        </div>
      </div>`:c+=`<div class='col mb-5 jobDiv  jobs2 minimize'>
        <div class='jobstable_positions col-12'>${b}</div>
        <div class='info d-flex'>
          <div class='jobstable_location flex-grow-1 col-9 gap-2 '>${p}</div>
          <a target="_blank" href='${_}' class='btn_applyNow rs_link_underline'>Apply Now </a>
        </div>
      </div>`}),t+=a+c,t+=`<div class="loadmore_wrap"> <div class="loadmore rs_link_underline my-5 mx-auto  text-center">See all open opportunities</div></div>
    
		</div>
    </section>
    `,s.innerHTML=t,l.classList.remove("minimize");const i=document.querySelector(".loadmore");i.addEventListener("click",()=>{const o=document.querySelectorAll(".jobs2");o.forEach(o=>o.classList.toggle("minimize")),i.classList.toggle("expanded"),i.classList.contains("expanded")?i.innerHTML="See Less":i.innerHTML="See all open opportunities"})}(o):"").catch(o=>console.log("error",o)))}"loading"!==document.readyState?block_jobs():document.addEventListener("DOMContentLoaded",()=>block_jobs());