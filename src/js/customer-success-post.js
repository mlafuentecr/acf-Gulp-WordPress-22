/*-----------------------------------------------------------------------------------*/
/*  Variables
/*-----------------------------------------------------------------------------------*/
let decVar = (PURL = null);

document.readyState !== 'loading' ? customerInit() : document.addEventListener('DOMContentLoaded', () => customerInit());

function customerInit() {
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
	const box1 = document.querySelector('#customers-1');
	const box2 = document.querySelector('#customers-2');
	let [industriesArr, sizesArr, locationsArr] = [[], [], [], []];

	posts.forEach((item, i) => {
		const info = item.node.pageCustomerPreview.previewCustomerPost;
		//get categories for sort BY seccion
		const post_data = item.node.costumerSinglePost.companyDescr.applicationForm;

		if (post_data) {
			const [architect, industry, size, location, certification] = post_data;

			//Push the Array *SELECT IN HTML
			industriesArr.push(industry.description);
			sizesArr.push(size.description);
			locationsArr.push(location.description);

			//Fill the Array *SELECT IN HTML
			industriesArr.filter((value, index) => industriesArr.indexOf(value) == index);
			sizesArr.filter((value, index) => sizesArr.indexOf(value) == index);
			locationsArr.filter((value, index) => locationsArr.indexOf(value) == index);
		}

		//Cuento 3 post y los meto en box1
		if (i < 3) {
			box1.innerHTML += `
            <div class="col-12 col-md-4 mb-3 ">
            <div class="box d-flex align-content-start rounded p-3 border">

            <figure class="col-12 d-flex justify-content-center align-center mb-3">
            <img class='lazyload m-auto' src='${info.logo.sourceUrl}'/>
            </figure>
            
            <div class="content">
              <div class="description text-left">${info.content}</div>
            </div>

            ${info.link !== null ? `<a href="${item.node.uri}" class="w-arrow">${info.link}</a>` : ''}

            <div class="tag d-flex justify-content-center col-12">${info.label.labelText}</div>
          </div>
          
        </div>`;
		} else {
			box2.innerHTML += `
          <div class="col-12 col-md-4 mb-3 ">
          <div class="box d-flex  align-content-start rounded p-3 border">

            <figure class="col-12 d-flex justify-content-center align-center mb-3">
            <img class='lazyload m-auto' src='${info.logo.sourceUrl}'/>
            </figure>
            
            <div class="content">
              <div class="description text-left">${info.content}</div>
            </div>

            ${info.link !== null ? `<a href="${item.node.uri}" class="w-arrow">${info.link}</a>` : ''}

            <div class="tag d-flex justify-content-center col-12">${info.label.labelText}</div>
          </div>
          
        </div>`;
		}
	});

	industriesArr = Array.from(new Set(industriesArr));
	sizesArr = Array.from(new Set(sizesArr));
	locationsArr = Array.from(new Set(locationsArr));

	console.log(industriesArr, 'industriesArr');
	console.log(sizesArr, 'sizesArr');
	console.log(locationsArr, 'locationsArr');

	//FILL THE *SELECT IN HTML
	const select1 = document.querySelector('#select1');
	const select2 = document.querySelector('#select2');
	const select3 = document.querySelector('#select3');

	industriesArr.forEach(item => (select1.innerHTML += `<option value="${item.toLowerCase().replaceAll(' ', '_')}<"> ${item}</option>`));
	sizesArr.forEach(item => (select2.innerHTML += `<option value="${item.toLowerCase().replaceAll(' ', '_')}<"> ${item}</option>`));
	locationsArr.forEach(item => (select3.innerHTML += `<option value="${item.toLowerCase().replaceAll(' ', '_')}<"> ${item}</option>`));
}
