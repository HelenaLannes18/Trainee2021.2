const c = (el)=>document.querySelector(el);

produtosJson.map((item, index)=>{
    let product = c(".product").cloneNode(true);
    
    // Fill in the information
    product.style.display = 'block';
    product.querySelector('.product__image').src = item.img;
    product.querySelector('.product__name').innerHTML = item.name;
    product.querySelector('.product__price').innerHTML = `R$ ${item.price.toFixed(2)}`;
    product.querySelector('.product__category').innerHTML = item.category;

    c(".showcase-area").append(product);

});




