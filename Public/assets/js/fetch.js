let mainContainer = document.querySelector("#mainContainer");
let searchBox = document.querySelector("#searchBox");
let oldContent = mainContainer.innerHTML;

searchBox.addEventListener("input", (event) => {
    if (searchBox.value !== "") {
        let value = searchBox.value;
        mainContainer.innerHTML = "";
        fetchData(value);
    } else {
        mainContainer.innerHTML = oldContent;
    }
})

function fetchData(value) {
    const options = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({value: value}),
    };
    fetch("http://localhost/wiki/home/search", options)
        .then(handleResponse)
        .then(displayResponse)
        .catch((error) => {
            console.log(error);
        })
}

function displayResponse(data) {
    console.log(data);
    let wikisData = data[0];
    let categoriesData = data[1];
    if (wikisData.length >  0) {
    mainContainer.innerHTML = '<h3 class="text-3xl font-bold my-4 mt-12 mx-auto">Result of wikies</h3>'
        wikisData.forEach((item) => {
            mainContainer.innerHTML += `
        <article class="custom-card p-4 flex flex-col md:flex-row bg-white shadow-lg rounded-lg mx-4 max-w-md md:max-w-full overflow-hidden">
                <div class="md:mr-6 h-fit">
                    <img class="w-16 h-16 md:w-24 md:h-24 rounded-full object-cover shadow" src="Storage/${item.author.userImage}" alt="avatar">
                </div>
                <div class="flex-1 flex flex-col justify-between py-6 px-4">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <h2 class="text-xl font-semibold text-gray-900">${item.author?.username}</h2>
                            <p class="text-gray-700 bg-gray-200 px-4 py-[1.5px] rounded-2xl text-sm">${item.category?.categoryName}</p>
                        </div>
                        <h2 class="font-bold text-2xl mb-2">${item.wikiTitle}</h2>
                        <p class="text-gray-700 text-sm mb-4">${item.wikiDescription}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="time font-medium text-gray-500">
                            <time datetime="${item.createdAt}">${item.createdAt}</time>
                        </div>
                        <a href="http://localhost/wiki/singleWiki/${item.wikiId}" class="w-fit px-8 text-white bg-gray-900 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-2xl text-sm px-5 py-2.5 me-2 mb-2">
                            <span>Read Wiki</span>
                        </a>
                </div>
                    </div>
                <div class="flex-shrink-0">
                    <img class="w-48 h-48 md:w-64 md:h-64 rounded-lg object-cover" src="storage/${item.wikiImage}" alt="wiki-image">
                </div>
            </article>`;
        });
    }
        mainContainer.innerHTML += "<h3 class='text-3xl font-bold my-4 mt-12 mx-auto'>Result of Categories</h3>";
    if (categoriesData.length > 0) {
        categoriesData.forEach((item) => {
            mainContainer.innerHTML += `
               <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                        <div class=" h-56 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
                            <img src="storage/${item.categoryImage}" alt="card-image" />
                        </div>
                        <div class="p-6">
                            <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                ${item.categoryName}
                            </h5>
                            <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                                ${item.categoryDescription}
                            </p>
                            <div class="p-6 pt-0">
                            </div>
                            <a href="http://localhost/wiki/wikis/category/${item.categoryId}" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none" type="button">
                                Read Article
                            </a>
                        </div>
                    </div>
         `;
        })
    }else{
        mainContainer.innerHTML += '<h3 class="text-3xl text-center font-bold my-4 mt-12 mx-auto">No data found with this name</h3>'
    }
}

function handleResponse(response) {
if (!response.ok) {
    throw new Error(`sending request error! Status: ${response.status}`);
}
return response.json();
}