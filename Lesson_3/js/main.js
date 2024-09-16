'use strict';

const API = 'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses';

//-----------------------функция запроса---------------------------------------
// let getRequest = (url, cb) => {
  
//     let xhr = new XMLHttpRequest();
//     xhr.open('GET', url, true);
//     xhr.onreadystatechange = () => {
//       if (xhr.readyState === 4) {
//         if (xhr.status !== 200) {
//           console.log('Error');
//         } else {
//           cb(xhr.responseText);
//         }
//       }
//     };
//     xhr.send();
// };

let getRequest = (url, cb) => {
    return new Promise(function(resolve, reject) {
  
        let xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = () => {
          if (xhr.readyState === 4) {
            if (xhr.status !== 200) {
              console.log('Error');
            } else {
              cb(xhr.responseText);
            }
          }
        };
        xhr.send();
    });
}

//------------------------------------------------------------------------------

class ProductList {
    constructor(container = '.products') {
        this._container = document.querySelector(container);
        this._goods = [];
        this._allProducts = [];

        this._fetchGoods();
        this._render();
    }
    //---------------------- здесь работаем с каталогом-------------------------
    _fetchGoods() {
        // console.log('fetching data...')
        getRequest(`${API}/catalogData.json`, (data) => {
        //   console.log('request complete');
        //   console.log(data);
        this._goods = JSON.parse(data);
        this._render();
        //   console.log(this._goods);
        });
    }
    //--------------------------------------------------------------------------
    sum() {
        return this._allProducts.reduce((sum, { price }) => sum + price, 0);
      }

    _render() {
        for (const product of this._goods) {
            const productObject = new ProductItem(product);

            this._allProducts.push(productObject);
            this._container.insertAdjacentHTML('beforeend', productObject.getHTMLString());
        }
    }
}

class ProductItem {
    constructor(product, img = 'https://via.placeholder.com/200x150') {
    this.id = product.id_product;
    this.title = product.product_name;
    this.price = product.price;
    this.img = img;
  }

    getHTMLString() {
        return `<div class="product-item" data-id="${this.id}">
              <img src="${this.image}" alt="Some img">
              <div class="desc">
                  <h3>${this.title}</h3>
                  <p>${this.price} \u20bd</p>
                  <button class="buy-btn">Купить</button>
              </div>
          </div>`;
    }
}

new ProductList();

//--------------------------добовляем товар в корзину---------------------------

document.querySelector('.products').addEventListener('click', event => {
    // console.log(event.target);
    if(event.target.className == 'buy-btn'){
        fetch(`${API}/addToBasket.json`)
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            // console.log(data.result);//надо проверить есть ли товар в наличии
            if(data.result === 1){
                console.log('добавляем товар в корзину');
                new BascetList();//добовляем продукт в корзину на сервере.
            } else {alert('Товара нет, Сарямба =,(')};            
        })
        .catch((err) => {
            console.log(err);
        });
    }
});

//---------------------------добавляем товар в корзину----------------------------------

class BascetList {
    constructor (){
        
        this.getBascet().then((data) => {
           
            for (const product of data.contents) {
                const bascetObject = new BascetItem(product);
                basket.children[1].insertAdjacentHTML('beforeend', bascetObject.getHTMLString());
            }
        });
    }

    getBascet() {
        return fetch(`${API}/getBasket.json`)
        .then((response) => response.json())
        .catch((err) => console.log(err));
    }
};

class BascetItem {
    constructor(product) {
    this.id = product.id_product;
    this.title = product.product_name;
    this.price = product.price;
    this.quantity = product.quantity;
  }

    getHTMLString() {
        return `<div class="bascet-item" data-id="${this.id}">
                    <p>${this.title} - колличество: ${this.quantity}</p>
                    <p>Цена: ${this.price} \u20bd</p>
                    <button class="product-remove">x</button>
                </div>`;
    }
}
//---------------------------открываем корзину----------------------------------
let basket = document.querySelector('.basket');
basket.querySelector('.btn-cart').addEventListener('click', event =>{
    
    basket.children[1].classList.toggle('hidden');
});

//----------------------- удаляем торав из корзины ---------------------------
basket.addEventListener('click', event => {
    if(event.target.className == 'product-remove'){
        // console.log('event.target: ', event.target.parentNode);
        // event.target.parentNode.classList.add('hidden');
        // event.target.parentNode.style.display = 'none';
        event.target.parentNode.remove();
    }
});

