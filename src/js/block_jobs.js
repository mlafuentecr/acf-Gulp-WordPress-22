/*-----------------------------------------------------------------------------------*/
/*  Get commet  JOB CAREER
/*-----------------------------------------------------------------------------------*/
document.readyState !== 'loading' ? block_jobs() : document.addEventListener('DOMContentLoaded', () => setTimeout(block_jobs(), 3000));

function block_jobs() {
	/*------------------------------------------*/
	/*  JOBS POSITION
/*------------------------------------------*/
	let [jobsDiv, jobs_rows, number_jobs, jobsholder, jobstable, jobstable2, department, employment_type, experience, remote, location, position, position_url] = '';
	if (document.querySelector('.block_jobs')) {
		jobsDiv = document.querySelector('.block_jobs');
		jobs_rows = document.querySelector('.block_jobs_rows');
		number_jobs = jobsDiv.dataset.jobs;
		number_jobs ? number_jobs : (number_jobs = 7);

		/*
		 Look Local Storage and fill data, then comapre agains fetching
		 if they are different  fetch and save data
		*/

		if (localStorage.getItem('jobs')) {
			//console.log('1GETTING STORAGE JOBS');
			let savedJobs = localStorage.getItem('jobs');

			savedJobs = JSON.parse(savedJobs);
			//console.log('2GETTING STORAGE JOBS', savedJobs);

			fill_div_jobs(savedJobs);
			//Now Compare old stoarege with fetch
			compareLocalStorageAndFetch(savedJobs);
		} else {
			fetchAndSave();
		}
	}

	async function compareLocalStorageAndFetch(savedJobs) {
		//console.log('compareLocalStorageAndFetch');
		const fetchJobs = await startFetching();
		let jobsInfo = '';

		/// 2. now fetch an compare with local
		if (fetchJobs !== savedJobs) {
			//console.log('%c fetchJobs Y savedJobs son DIFFERENTES', 'color:red');
			saveJobs(fetchJobs);
			fill_div_jobs(fetchJobs);
		} else {
			//console.log('%c All is updated', 'color:yellow');
		}
	}

	async function fetchAndSave() {
		const result = await startFetching();
		//console.log('%c 1 fetchAndSave', 'color:red');
		//console.log(result, 'result');
		fill_div_jobs(result);
		saveJobs(result);
	}

	async function startFetching() {
		//console.log('%c 2 Fetching', 'color:red');
		var myHeaders = new Headers();
		myHeaders.append(
			'Cookie',
			'incap_ses_7241_2167377=waKMBIJNh0g4u/dWNTN9ZHylAWIAAAAAU+tiVC0NhKxNzIEPK1n0UQ==; nlbi_2167377=BexSMz4nOAj6q3V2ktkhowAAAAByq9DxD9oXxFuG+3oPjrw5; visid_incap_2167377=AXi+iOUbQhmmy2+WLq6qZXulAWIAAAAAQUIPAAAAAABa9wcrkYrUWWNSbFp2O0ZJ'
		);

		var requestOptions = {
			method: 'GET',
			headers: myHeaders,
			redirect: 'follow',
		};

		//2 try to fetch data and compare with the one I saved if is differente save it a load id
		return fetch('https://www.comeet.co/careers-api/2.0/company/46.003/positions?token=6432592643C86190C12C93218385B0385B', requestOptions)
			.then(response => response.text())
			.then(fetchJobs => fetchJobs)
			.catch(error => console.log('error', error));
	}

	function saveJobs(result) {
		localStorage.setItem('jobs', JSON.stringify(result));
	}

	function fill_div_jobs(result) {
		let data = JSON.parse(result);
		//let data = result;
		//console.log('%c 2 fill_div_jobs ', 'color:red');
		//console.log('data', data);

		jobsholder = `<section class='jobstable col-12' >
		<div class=''>
			<div class='row row-cols-1 row-cols-md-2'>`;
		jobstable = '';
		jobstable2 = '';

		data.forEach((item, index) => {
			////console.log(item.department);
			item.department ? (department = item.department) : (department = '');

			if (item.location) {
				item.location.is_remote ? (remote = item.location.is_remote) : (remote = '--');
				item.location.name ? (location = item.location.name) : (location = '--');
			}

			item.name ? (position = item.name) : (position = '--');
			item.position_url ? (position_url = item.url_active_page) : (position_url = '--');

			if (position.length > 30) {
				positionArr = position.split('-');
				position = positionArr[0];
			}

			if (index < number_jobs) {
				jobstable += `<div class='col jobDiv pe-5 mb-5'>
        <div class='jobstable_positions col-12 col-md-9'>${position}</div>
        <div class='info d-flex flex-wrap'>
          <div class='jobstable_location flex-grow-1 col-12 col-md-9 gap-2 '>${location}</div>
          <a target="_blank" rel="noopener noreferrer nofollow"  href='${position_url}' class='btn_applyNow rs_link_underline col-xs-12 '>Apply Now </a>
        </div>
      </div>`;
			} else {
				jobstable2 += `<div class='col mb-5 jobDiv pe-5 jobs2 minimize'>
        <div class='jobstable_positions col-12 col-md-9'>${position}</div>
        <div class='info d-flex  flex-wrap'>
          <div class='jobstable_location flex-grow-1 col-9 gap-2 '>${location}</div>
          <a target="_blank" href='${position_url}' class='btn_applyNow rs_link_underline col-xs-12 '>Apply Now </a>
        </div>
      </div>`;
			}
		});
		//make div table for jobs jobstable2
		jobsholder += jobstable + jobstable2;
		jobsholder += `<div class="loadmore_wrap"> <div class="loadmore rs_link_underline my-5 mx-auto  text-center">See all open opportunities</div></div>
    
		</div>
    </section>
    `;

		jobs_rows.innerHTML = jobsholder;
		jobsDiv.classList.remove('minimize');

		//add expand
		const btnExapnd = document.querySelector('.loadmore');

		btnExapnd.addEventListener('click', () => {
			const positions = document.querySelectorAll('.jobs2');
			positions.forEach(item => item.classList.toggle('minimize'));

			btnExapnd.classList.toggle('expanded');
			if (btnExapnd.classList.contains('expanded')) {
				btnExapnd.innerHTML = 'See Less';
			} else {
				btnExapnd.innerHTML = 'See all open opportunities';
			}
		});
	}
}
