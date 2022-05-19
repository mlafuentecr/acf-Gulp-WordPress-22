function block_jobs(){let[s,t,i,n,a,c,r,,,d,p,b,m]="";var o;async function l(){var o=new Headers;return o.append("Cookie","incap_ses_7241_2167377=waKMBIJNh0g4u/dWNTN9ZHylAWIAAAAAU+tiVC0NhKxNzIEPK1n0UQ==; nlbi_2167377=BexSMz4nOAj6q3V2ktkhowAAAAByq9DxD9oXxFuG+3oPjrw5; visid_incap_2167377=AXi+iOUbQhmmy2+WLq6qZXulAWIAAAAAQUIPAAAAAABa9wcrkYrUWWNSbFp2O0ZJ"),fetch("https://www.comeet.co/careers-api/2.0/company/46.003/positions?token=6432592643C86190C12C93218385B0385B",{method:"GET",headers:o,redirect:"follow"}).then(o=>o.text()).then(o=>o).catch(o=>console.log("error",o))}function v(o){localStorage.setItem("jobs",JSON.stringify(o))}function _(o){let e=JSON.parse(o);n=`<section class='jobstable col-12' >
		<div class=''>
			<div class='row row-cols-1 row-cols-md-2'>`,a="",c="",e.forEach((o,e)=>{r=o.department||"",o.location&&(d=o.location.is_remote||"--",p=o.location.name||"--"),b=o.name||"--",m=o.position_url?o.url_active_page:"--",30<b.length&&(positionArr=b.split("-"),b=positionArr[0]),e<i?a+=`<div class='col jobDiv pe-5 mb-5'>
        <div class='jobstable_positions col-12 col-md-9'>${b}</div>
        <div class='info d-flex flex-wrap'>
          <div class='jobstable_location flex-grow-1 col-12 col-md-9 gap-2 '>${p}</div>
          <a target="_blank" rel="noopener noreferrer nofollow"  href='${m}' class='btn_applyNow rs_link_underline col-xs-12 '>Apply Now </a>
        </div>
      </div>`:c+=`<div class='col mb-5 jobDiv pe-5 jobs2 minimize'>
        <div class='jobstable_positions col-12 col-md-9'>${b}</div>
        <div class='info d-flex  flex-wrap'>
          <div class='jobstable_location flex-grow-1 col-9 gap-2 '>${p}</div>
          <a target="_blank" href='${m}' class='btn_applyNow rs_link_underline col-xs-12 '>Apply Now </a>
        </div>
      </div>`}),n+=a+c,n+=`<div class="loadmore_wrap"> <div class="loadmore rs_link_underline my-5 mx-auto  text-center">See all open opportunities</div></div>
    
		</div>
    </section>
    `,t.innerHTML=n,s.classList.remove("minimize");const l=document.querySelector(".loadmore");l.addEventListener("click",()=>{const o=document.querySelectorAll(".jobs2");o.forEach(o=>o.classList.toggle("minimize")),l.classList.toggle("expanded"),l.classList.contains("expanded")?l.innerHTML="See Less":l.innerHTML="See all open opportunities"})}document.querySelector(".block_jobs")&&(s=document.querySelector(".block_jobs"),t=document.querySelector(".block_jobs_rows"),i=s.dataset.jobs,i=i||7,localStorage.getItem("jobs")?(o=localStorage.getItem("jobs"),_(o=JSON.parse(o)),async function(o){var e=await l();e!==o&&(v(e),_(e))}(o)):async function(){var o=await l();_(o),v(o)}())}"loading"!==document.readyState?block_jobs():document.addEventListener("DOMContentLoaded",()=>setTimeout(block_jobs(),3e3));