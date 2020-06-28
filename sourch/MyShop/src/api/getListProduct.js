const getListProduct = (idType, page) => {
    let url;
    if (idType !== 'COLLECTION') {
        url = `http://192.168.45.2/api/product_by_type.php?id_type=${idType}&page=${page}`;
    } else {
        url = `http://192.168.45.2/api/get_collection.php?page=${page}`;
    }
    return fetch(url)
    .then(res => res.json());
};

export default getListProduct;
