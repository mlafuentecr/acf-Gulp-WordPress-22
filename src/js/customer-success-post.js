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
			//console.log(jsonData.data.customers.edges);
			//add the array to a variable
			const posts = jsonData.data.customers.edges;

			//get the box 1 where I have to put max 3 post and then get box 2 where I can put the rest
			const box1 = document.querySelector('#customers-1');
			const box2 = document.querySelector('#customers-2');
			posts.forEach((item, i) => {
				const info = item.node.pageCustomerPreview.previewCustomerPost;
				const post_data = item.node.costumerSinglePost.companyDescr.applicationForm;
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
		})
		.catch(console.error);
}
