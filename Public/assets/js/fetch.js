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
            "content-type": "application/x-www-form-urlencoded",
        },
        body:`value=${value}`
    }
    fetch("http://localhost/wiki/home/search", options)
        .then(handleResponse)
        .then(displayResponse)
        .catch((error) => {
            console.log(error);
        })
}
function displayResponse(data){
    console.log(data);

}

function handleResponse(response) {
    if (!response.ok) {
        throw new Error(`sending request error! Status: ${response.status}`);
    }
    return response.text();
}