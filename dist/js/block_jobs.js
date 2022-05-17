function block_jobs(){let[s,c,n,t,a,i,r,,,d,p,b,m]="";var o;async function l(){console.log("%c 2 Fetching","color:red");var o=new Headers;return o.append("Cookie","incap_ses_7241_2167377=waKMBIJNh0g4u/dWNTN9ZHylAWIAAAAAU+tiVC0NhKxNzIEPK1n0UQ==; nlbi_2167377=BexSMz4nOAj6q3V2ktkhowAAAAByq9DxD9oXxFuG+3oPjrw5; visid_incap_2167377=AXi+iOUbQhmmy2+WLq6qZXulAWIAAAAAQUIPAAAAAABa9wcrkYrUWWNSbFp2O0ZJ"),fetch("https://www.comeet.co/careers-api/2.0/company/46.003/positions?token=6432592643C86190C12C93218385B0385B",{method:"GET",headers:o,redirect:"follow"}).then(o=>o.text()).then(o=>o).catch(o=>console.log("error",o))}function v(o){localStorage.setItem("jobs",JSON.stringify(o))}function A(o){let e=JSON.parse(o);console.log("%c 2 fill_div_jobs ","color:red"),console.log("data",e),t=`<section class='jobstable col-12' >
		<div class=''>
			<div class='row row-cols-1 row-cols-md-2'>`,a="",i="",e.forEach((o,e)=>{r=o.department||"",o.location&&(d=o.location.is_remote||"--",p=o.location.name||"--"),b=o.name||"--",m=o.position_url?o.url_active_page:"--",30<b.length&&(positionArr=b.split("-"),b=positionArr[0]),e<n?a+=`<div class='col jobDiv pe-5 mb-5'>
        <div class='jobstable_positions col-12 col-md-9'>${b}</div>
        <div class='info d-flex flex-wrap'>
          <div class='jobstable_location flex-grow-1 col-12 col-md-9 gap-2 '>${p}</div>
          <a target="_blank" rel="noopener noreferrer nofollow"  href='${m}' class='btn_applyNow rs_link_underline col-xs-12 '>Apply Now </a>
        </div>
      </div>`:i+=`<div class='col mb-5 jobDiv pe-5 jobs2 minimize'>
        <div class='jobstable_positions col-12 col-md-9'>${b}</div>
        <div class='info d-flex  flex-wrap'>
          <div class='jobstable_location flex-grow-1 col-9 gap-2 '>${p}</div>
          <a target="_blank" href='${m}' class='btn_applyNow rs_link_underline col-xs-12 '>Apply Now </a>
        </div>
      </div>`}),t+=a+i,t+=`<div class="loadmore_wrap"> <div class="loadmore rs_link_underline my-5 mx-auto  text-center">See all open opportunities</div></div>
    
		</div>
    </section>
    `,c.innerHTML=t,s.classList.remove("minimize");const l=document.querySelector(".loadmore");l.addEventListener("click",()=>{const o=document.querySelectorAll(".jobs2");o.forEach(o=>o.classList.toggle("minimize")),l.classList.toggle("expanded"),l.classList.contains("expanded")?l.innerHTML="See Less":l.innerHTML="See all open opportunities"})}document.querySelector(".block_jobs")&&(s=document.querySelector(".block_jobs"),c=document.querySelector(".block_jobs_rows"),n=s.dataset.jobs,n=n||7,localStorage.getItem("jobs")?(console.log("1GETTING STORAGE JOBS"),o=localStorage.getItem("jobs"),o=JSON.parse(o),console.log("2GETTING STORAGE JOBS",o),A(o),async function(o){console.log("compareLocalStorageAndFetch");var e=await l();e!==o?(console.log("%c fetchJobs Y savedJobs son DIFFERENTES","color:red"),v(e),A(e)):console.log("%c All is updated","color:yellow")}(o)):async function(){var o=await l();console.log("%c 1 fetchAndSave","color:red"),console.log(o,"result"),A(o),v(o)}())}"loading"!==document.readyState?block_jobs():document.addEventListener("DOMContentLoaded",()=>block_jobs());