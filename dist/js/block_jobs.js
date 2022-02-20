function block_jobs(){let[s,i,n,t,c,a,r,,,d,b,p,_]="";var o;document.querySelector(".block_jobs")&&(console.log("block_jobs2"),s=document.querySelector(".block_jobs"),i=document.querySelector(".block_jobs_rows"),n=s.dataset.jobs,console.log(s,"number_jobs"),n=n||7,(o=new Headers).append("Cookie","incap_ses_7241_2167377=waKMBIJNh0g4u/dWNTN9ZHylAWIAAAAAU+tiVC0NhKxNzIEPK1n0UQ==; nlbi_2167377=BexSMz4nOAj6q3V2ktkhowAAAAByq9DxD9oXxFuG+3oPjrw5; visid_incap_2167377=AXi+iOUbQhmmy2+WLq6qZXulAWIAAAAAQUIPAAAAAABa9wcrkYrUWWNSbFp2O0ZJ"),fetch("https://www.comeet.co/careers-api/2.0/company/46.003/positions?token=6432592643C86190C12C93218385B0385B",{method:"GET",headers:o,redirect:"follow"}).then(o=>o.text()).then(o=>o?function(o){let e=JSON.parse(o);t=`<section class='jobstable col-12' >
		<div class='container'>
			<div class='row row-cols-1 row-cols-md-2'>`,c="",a="",e.forEach((o,e)=>{r=o.department||"",o.location&&(d=o.location.is_remote||"--",b=o.location.name||"--"),p=o.name||"--",_=o.position_url?o.url_active_page:"--",30<p.length&&(positionArr=p.split("-"),p=positionArr[0]),e<n?c+=`<div class='col jobDiv mb-5'>
        <div class='jobstable_positions  col-12'>${p}</div>
        <div class='info d-flex'>
          <div class='jobstable_location flex-grow-1 col-9 gap-2 '>${b}</div>
          <a target="_blank" rel="noopener noreferrer nofollow"  href='${_}' class='btn_applyNow rs_link_underline'>Apply Now </a>
        </div>
      </div>`:a+=`<div class='col mb-5 jobDiv  jobs2 minimize'>
        <div class='jobstable_positions col-12'>${p}</div>
        <div class='info d-flex'>
          <div class='jobstable_location flex-grow-1 col-9 gap-2 '>${b}</div>
          <a target="_blank" href='${_}' class='btn_applyNow rs_link_underline'>Apply Now </a>
        </div>
      </div>`}),t+=c+a,t+=`<div class="loadmore rs_link_underline my-5 mx-auto col-1 text-center">See all open opportunities</div>
    
		</div>
    </section>
    `,i.innerHTML=t,s.classList.remove("minimize");const l=document.querySelector(".loadmore");l.addEventListener("click",()=>{const o=document.querySelectorAll(".jobs2");o.forEach(o=>o.classList.toggle("minimize")),l.classList.toggle("expanded"),l.classList.contains("expanded")?l.innerHTML="See Less":l.innerHTML="See all open opportunities"})}(o):"").catch(o=>console.log("error",o)))}"loading"!==document.readyState?block_jobs():document.addEventListener("DOMContentLoaded",()=>block_jobs());