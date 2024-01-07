function deleteCategory(id){
    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
            body: `deleteId=${id}`
    }
    fetch ('http://localhost/wiki/categories/delete', options)
        .then(response =>{
            if (response.ok){
                console.log("deleted successfully");
            }else {
                console.log("failed")
            }
        })
        .catch(error => {
            console.error(error)
        });
}
