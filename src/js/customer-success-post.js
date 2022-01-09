/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/
let decVar = (PURL = null);

document.readyState !== 'loading' ? customerInit() : document.addEventListener('DOMContentLoaded', () => customerInit());
//FILL THE *SELECT IN HTML
let select1 = (select2 = select3 = search_customer = '');

function customerInit() {
	//FILL THE *SELECT IN HTML
	select1 = document.querySelector('#select1');
	select2 = document.querySelector('#select2');
	select3 = document.querySelector('#select3');
	search_customer = document.querySelector('.search_customer');
	select1.disabled = true;
	select2.disabled = true;
	select3.disabled = true;

	//GET URL
	location.protocol === 'http:' ? (protoCol = `http://`) : (protoCol = `https://`);
	//ADD PUL
	PURL = `${protoCol}${window.location.hostname}/`;
	//startFetching
	startFetching();
}

function startFetching() {
	//console.log(`${PURL}graphql`);

	const WPQL_QUERY = {
		query: `{
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
    `,
	};

	fetch('http://heylaikadev.local/graphql', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json',
		},
		body: JSON.stringify(WPQL_QUERY),
	})
		.then(res => res.json())
		.then(jsonData => {
			addHtml(jsonData);
		})
		.catch(console.error);
}

function addHtml(jsonData) {
	//console.log(jsonData.data.customers.edges);
	//add the array to a variable
	const posts = jsonData.data.customers.edges;

	let [industriesArr, sizesArr, locationsArr] = [[], [], [], []];

	posts.forEach((item, i) => {
		//get categories for sort BY seccion
		const post_data = item.node.costumerSinglePost.companyDescr.applicationForm;
		let [architect, industry, size, location, certification] = '';

		if (post_data) {
			[architect, industry, size, location, certification] = post_data;
			//Push the Array *SELECT IN HTML
			industriesArr.push(industry.description);
			sizesArr.push(size.description);
			if (location.description !== 'SOC 2 Type 1') locationsArr.push(location.description);

			//Fill the Array *SELECT IN HTML
			industriesArr.filter((value, index) => industriesArr.indexOf(value) == index);
			sizesArr.filter((value, index) => sizesArr.indexOf(value) == index);
			locationsArr.filter((value, index) => locationsArr.indexOf(value) == index);
		}
	});

	//Check for repaeat Items
	industriesArr = Array.from(new Set(industriesArr));
	sizesArr = Array.from(new Set(sizesArr));
	locationsArr = Array.from(new Set(locationsArr));

	console.log(industriesArr, 'industriesArr');
	console.log(sizesArr, 'sizesArr');
	console.log(locationsArr, 'locationsArr');

	industriesArr.forEach(item => (select1.innerHTML += `<option value="${item.toLowerCase()}"> ${item}</option>`));
	sizesArr.forEach(item => (select2.innerHTML += `<option value="${item.toLowerCase()}"> ${item}</option>`));
	locationsArr.forEach(item => (select3.innerHTML += `<option value="${item.toLowerCase()}"> ${item}</option>`));
	//Set the selector on
	select1.disabled = false;
	select2.disabled = false;
	select3.disabled = false;

	//CHECK LOCAL STORAGE
	let customerStorage = localStorage.getItem('customerSearch').split('_');
	console.log('customerStorage.length', customerStorage.length, customerStorage);
	if (customerStorage.length > 1) {
		let [localIndustry, localSize, location] = customerStorage;

		localIndustry = localIndustry.split('=');
		localIndustry = localIndustry[1];
		localIndustry != '' ? (select1.value = localIndustry) : '';

		localSize = localSize.split('=');
		localSize = localSize[1];
		localSize != '' ? (select2.value = localSize) : '';

		location = location.split('=');
		location = location[1];
		location != '' ? (select3.value = location) : '';

		if (localIndustry || localSize || location) {
			console.log('alguien tiene info', localIndustry, localSize, location);
		}
	}
	search_customer.addEventListener('click', () => search());
}

function search() {
	console.log('search');
	const sel1 = select1.value;
	const sel2 = select2.value;
	const sel3 = select3.value;

	//get the values is they are not null
	if (sel1 === '' && sel2 === '' && sel3 === '') {
		console.log('Nothing here');
		document.cookie = `customerSearch=; sameSite=Lax; path=/;`;
		localStorage.setItem('customerSearch', ``);
		location.reload();
	} else {
		console.log('start searching');
		//Save cookie for fetching
		document.cookie = `customerSearch=industry=${select1.value}_size=${select2.value}_location=${select3.value};sameSite=Lax; path=/;`;
		localStorage.setItem('customerSearch', `industry=${select1.value}_size=${select2.value}_location=${select3.value}`);
		location.reload();
	}
}
