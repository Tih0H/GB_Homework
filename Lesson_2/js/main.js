'use strict';

class ProductList {
    constructor(container = '.products') {
        this._container = document.querySelector(container);
        this._goods = [];
        
        this._allProducts = [];

        this._fetchGoods();
        this._render();
        // console.log('this._goods: ', this._goods);
        
        // let sumMassiv = this._goods.map(item => item.price);
        // let result = sumMassiv.reduce((sum, current) => sum + current, 0);
        let result = this._goods.map(item => item.price).reduce((sum, current) => sum + current, 0);
        console.log('result: ', result);
    }

    _fetchGoods() {
        this._goods = [
            {id: 1, title: 'Notebook', price: 20000, image: 'images/notebook.svg'},
            {id: 2, title: 'Mouse', price: 1500, image:'images/mouse.svg'},
            {id: 3, title: 'Keyboard', price: 5000, image:'images/keyboard.svg'},
            {id: 4, title: 'Gamepad', price: 4500, image:'images/gamepad.svg'},
        ];
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
    constructor(product) {
        this.id = product.id;
        this.title = product.title;
        this.price = product.price;
        this.image = product.image;
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

//добавить отслеживание клика по кнопкам
document.querySelectorAll('.buy-btn').forEach(element =>{
    element.addEventListener('click', event =>{

    });
});

//в html добавить иконку счетчика товаров перед кнопкой корзины
//в html добавить разметку для всплывающего окна корзины товаров
//не забыть в css прописать position: absolute; и position: relative;
class Basket {
    constructor(container = '.basket'){
        this._container = document.querySelector(container);
        this._product = [];//продукты которые добавили по клику
    }
    //нужно как то обработать карточку продукта и записать данные в массив
    //добавить метод определения суммы товаров в корзине
    _productSum(price){

    }
}

class BasketMap {}// ф-ция конструктор html карточки продукта