function block_jobs(){let[s,i,t,n,a,c,r,,,d,p,b,_]="";var e;document.querySelector(".block_jobs")&&(s=document.querySelector(".block_jobs"),i=document.querySelector(".block_jobs_rows"),t=s.dataset.jobs,t=t||7,(e=new Headers).append("Cookie","incap_ses_7241_2167377=waKMBIJNh0g4u/dWNTN9ZHylAWIAAAAAU+tiVC0NhKxNzIEPK1n0UQ==; nlbi_2167377=BexSMz4nOAj6q3V2ktkhowAAAAByq9DxD9oXxFuG+3oPjrw5; visid_incap_2167377=AXi+iOUbQhmmy2+WLq6qZXulAWIAAAAAQUIPAAAAAABa9wcrkYrUWWNSbFp2O0ZJ"),fetch("https://www.comeet.co/careers-api/2.0/company/46.003/positions?token=6432592643C86190C12C93218385B0385B",{method:"GET",headers:e,redirect:"follow"}).then(e=>e.text()).then(e=>e?function(e){let o=JSON.parse(e);n=`<section class='jobstable col-12' >
		<div class=''>
			<div class='row row-cols-1 row-cols-md-2'>`,a="",c="",o.forEach((e,o)=>{r=e.department||"",e.location&&(d=e.location.is_remote||"--",p=e.location.name||"--"),b=e.name||"--",_=e.position_url?e.url_active_page:"--",30<b.length&&(positionArr=b.split("-"),b=positionArr[0]),o<t?a+=`<div class='col jobDiv pe-5 mb-5'>
        <div class='jobstable_positions  col-12'>${b}</div>
        <div class='info d-flex'>
          <div class='jobstable_location flex-grow-1 col-9 gap-2 '>${p}</div>
          <a target="_blank" rel="noopener noreferrer nofollow"  href='${_}' class='btn_applyNow rs_link_underline'>Apply Now </a>
        </div>
      </div>`:c+=`<div class='col mb-5 jobDiv pe-5 jobs2 minimize'>
        <div class='jobstable_positions col-12'>${b}</div>
        <div class='info d-flex'>
          <div class='jobstable_location flex-grow-1 col-9 gap-2 '>${p}</div>
          <a target="_blank" href='${_}' class='btn_applyNow rs_link_underline'>Apply Now </a>
        </div>
      </div>`}),n+=a+c,n+=`<div class="loadmore_wrap"> <div class="loadmore rs_link_underline my-5 mx-auto  text-center">See all open opportunities</div></div>
    
		</div>
    </section>
    `,i.innerHTML=n,s.classList.remove("minimize");const l=document.querySelector(".loadmore");l.addEventListener("click",()=>{const e=document.querySelectorAll(".jobs2");e.forEach(e=>e.classList.toggle("minimize")),l.classList.toggle("expanded"),l.classList.contains("expanded")?l.innerHTML="See Less":l.innerHTML="See all open opportunities"})}(e):"").catch(e=>console.log("error",e)))}"loading"!==document.readyState?block_jobs():document.addEventListener("DOMContentLoaded",()=>block_jobs());