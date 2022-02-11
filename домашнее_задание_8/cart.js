'use strict';

class Product {
  constructor(nameEl, nameSum, priceEl, priceSum, dataId) {
    this.name = nameEl;
    this.nameSum = nameSum;
    this.price = priceEl;
    this.dataId = dataId;
    this.priceSum =priceSum;
  }

  getProductMarkup() {
    return `
      <tr data-filter="${this.dataId}" class="cartFieldTableRow">
        <td class="cartFeaturedName">${this.name}</td>
        <td class="cartFeaturedNameSum">${this.nameSum}</td>
        <td class="cartFeaturedPrice">${this.price}</td>
        <td class="cartFeaturedPriceSum">${this.priceSum}</td>
      </tr>
    `;
  }
}

let cartIconWrap = document.querySelector('.cartIconWrap');
// console.log('cartIconWrap: ', cartIconWrap.lastElementChild); //получили число корзины и обнулили
cartIconWrap.lastElementChild.textContent = '0';
let dataId = 0;
let products = [];
const productsEl = document.querySelector('tbody');
// получаем карточку товара. Достаем из нее кнопку, имя товара и цену
let featuredItem = document.querySelectorAll('.featuredItem');
featuredItem.forEach(elements => {
  // находим кнопки и вешаем событие
  elements.querySelector('button').addEventListener('click', event =>{
    // console.log('elements: ', elements);
    cartIconWrap.lastElementChild.textContent ++;
    
    if(elements.hasAttribute('data-filter')){
      elements.dataset.factor = 1 + parseInt(elements.dataset.factor);//Увиличеваем множитель
      products[elements.dataset.filter].nameSum = elements.dataset.factor;//по карточке товара находим нашу карточку и добовляем туда множитель
      let a = elements.dataset.factor *  parseInt((products[elements.dataset.filter].price).substring(1), 10);//создал переменную а что бы не запутаться
      products[elements.dataset.filter].priceSum = `$${a}.00`;//находим сумму и множитель нашего товара и записываем в переменную что бы вывести в нужном нам виде

    } else {
      let nameEl = elements.querySelector('.featuredName').innerText;//Получаем название продукта
      let priceEl = elements.querySelector('.featuredPrice').innerText;//Получаем цену продукта
      // let priceSum = parseInt(priceEl.substring(1), 10);//Переводим цену для подсчета суммы продуктов
      elements.dataset.filter = dataId;//добавляем уникальный dataset
      elements.dataset.factor = '1';//добовляем множитель
      let nameSum = 1;
      let priceSum = priceEl;
      products.push(new Product(nameEl, nameSum, priceEl, priceSum, dataId));
      console.log('products: ', products);
      dataId = 1 + dataId;
    };

    productsEl.innerHTML = products.map(product => product.getProductMarkup()).join("");//добавляем разметку с нашим продуктом
    let priceTotal = 0;
    products.forEach((obg) =>{
      console.log('priceSum: ', obg.priceSum);
      priceTotal = priceTotal + parseInt(obg.priceSum.substring(1), 10);
    });//перебираем нашь продукт и складываем все суммы за все товары
    document.querySelector('.cartFeaturedPriceTotal').textContent =  `Итого: $${priceTotal}.00`;//выводим итого
  });
});

let cartField = cartIconWrap.querySelector('.cartField');// всплывающее окно корзины
cartIconWrap.addEventListener('click', event => {
  cartField.classList.toggle('hidden');
});



