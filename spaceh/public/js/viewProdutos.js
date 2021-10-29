const qS = (el)=>document.querySelector(el);

function productCards(item) {
    // Create elements dynamically
    const productDiv = document.createElement('div');
    const infoDiv = document.createElement('div');
    const linkElement = document.createElement('a');
    const img = document.createElement('img')
    const h2 = document.createElement('h2');
    const spanPrice = document.createElement('span');
    const spanCat = document.createElement('span');
    const button = document.createElement('button');

    // Add the right class
    linkElement.href = "#";
    productDiv.classList.add('product');
    infoDiv.classList.add('product__info');
    img.classList.add('product__image');
    h2.classList.add('product__name');
    spanPrice.classList.add('product__price');
    spanCat.classList.add('product__category');
    button.classList.add('product__cta');

    // fill the elements

    linkElement.href = "#";
    img.src = item.img
    h2.innerHTML = item.name;
    spanPrice.innerHTML = `R$ ${item.price.toFixed(2)}`;
    spanCat.innerHTML = item.category;
    button.innerHTML = "Ver Produto"

    // Put elements on the screen

    infoDiv.append(h2);
    infoDiv.append(spanPrice);
    infoDiv.append(spanCat);
    
    linkElement.append(img);
    linkElement.append(infoDiv);
    linkElement.append(button);
    productDiv.append(linkElement);

    qS('.showcase-area').append(productDiv)
}


/*
    Pagination
*/

const totalProducts = productsJson.length;
let perPage = 10;

// State: indicates what page i'm in
const state = {
    page: 1,
    perPage,
    totalPage: Math.ceil(totalProducts / perPage),
    maxVisibleButtons: 3
};

// Paging Control
const controls = {
    next() {
        state.page++

        if(state.page > state.totalPage) {
            state.page--;
        }
    },
    prev() {
        state.page--;
        
        if(state.page < 1) {
            state.page++
        }
    },
    goTo(page) {
        if(page < 1) {
            page = 1
        }

        state.page = +page

        if(page > state.totalPage) {
            state.page = state.totalPage
        }
    },
    createListeners() {
        qS('#paginate__first').addEventListener('click', () => {
            controls.goTo(1);
            update()
        })

        qS('#paginate__last').addEventListener('click', () => {
            controls.goTo(state.totalPage);
            update()
        })

        qS('#paginate__next').addEventListener('click', () => {
            controls.next()
            update()
        })

        qS('#paginate__prev').addEventListener('click', () => {
            controls.prev()
            update()
        })
    }
};

const productList = {
    create(item) {

        productCards(item);
        
    },
    update() {
        qS('.showcase-area').innerHTML = " ";

        // calculate what elements must be shown in each page
        let page = state.page - 1; // Arrays start on 0
        let start = page * state.perPage;
        let end = start + state.perPage;

        const paginatedItems = productsJson.slice(start, end);

        paginatedItems.forEach(productList.create)
    }
}

const buttons = {
    create(number) {
        const button = document.createElement('div')
        button.innerHTML = number;

        if(state.page == number) {
            button.classList.add('paginate--active');
        }


        button.addEventListener('click', (event) => {
            const page = event.target.innerText

            controls.goTo(page);
            update();
        })

        qS('#paginate__numbers').append(button)
    },
    update() {
        qS('#paginate__numbers').innerHTML = "";
        const {maxLeft, maxRight} = buttons.calculateButtonsVisible()

        for(let page = maxLeft; page <= maxRight; page++) {
            buttons.create(page)
        }

    },
    calculateButtonsVisible() {
        const {maxVisibleButtons} = state;
        let maxLeft = (state.page - Math.floor(maxVisibleButtons / 2));
        let maxRight = (state.page + Math.floor(maxVisibleButtons / 2));

        if(maxLeft < 1) {
            maxLeft = 1
            maxRight = maxVisibleButtons
        }

        if(maxRight > state.totalPage) {
            maxLeft = state.totalPage - (maxVisibleButtons - 1)
            maxRight = state.totalPage

            if(maxLeft < 1) maxLeft = 1
        }

        return {maxLeft, maxRight}
    }
}

function update() {
    productList.update();
    buttons.update();
}


function init() {
    update()
    controls.createListeners();
}

init();


