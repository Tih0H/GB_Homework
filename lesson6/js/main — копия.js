const API = 'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses';

const app = new Vue({
  el: '#app',//подключаем нашь вью и связываем с нашей разметкой
  data: {
    searchLine : '',//создаем пустой обьект для поисковой строки
    isVisibleCart: false,//Создаем правило для скрытия/прорисовки корзины
    cartUrl: '/getBasket.json',//урл корзины
    catalogUrl: '/catalogData.json',//урл товаров
    products: [],//создаем пустой массив для наших карточек товаров
    cartItems: [],//создаем пустой массив для корзины
    filtered: [],//создаем массив для поиска
    imgCatalog: 'https://via.placeholder.com/200x150',
    imgCart: 'https://via.placeholder.com/50x100',
  },
  methods: {
    getJson(url) {//создаем логику получения ответа с сервера
      return fetch(url)
        .then(result => result.json())
        .catch(error => {
          console.log(error);
          // error trigger
        })
    },
    addProduct(product) {//логика добавления продукта в корзину по клику на продукт
      this.getJson(`${API}/addToBasket.json`)//запрашиваем сервер на добавление в корзину
        .then(data => {
          if (data.result === 1) {
            let find = this.cartItems.find(el => el.id_product === product.id_product);//ищем продукт в массиве продуктов сравнивая с тем на который кликнули по id
            if (find) {
              find.quantity++;//увиличиваем колличество товара
            } else {//если это первый товар в корзине то
              let prod = Object.assign({quantity: 1}, product);//создаем новый массив с данными продукта + добовляем счетчик
              this.cartItems.push(prod)//пушим в массив корзины
            }
          } else {//если сервер не выдал положительного ответа - выводим ошибку
            alert('Error');
          }
        })
    },
    remove(item) {//логика удаления товара из корзины по клику
      this.getJson(`${API}/deleteFromBasket.json`)
        .then(data => {//делаем запрос на сервер об удалении
          if (data.result === 1) {
            if (item.quantity > 1) {//при положительном ответе сначала уменьшаем счетчик товара
              item.quantity--;
            } else {//если только один товар в корзине - полностью удаляем карточку методом splice из массива для корзины cartItems найдя его позицию методом indexOf
              this.cartItems.splice(this.cartItems.indexOf(item), 1)
            }
          }else {//если сервер не выдал положительного ответа - выводим ошибку
            alert('Error');
          }
        })
    },
    FilterGoods() {
      let regexp = new RegExp(this.searchLine , 'i');//фильтр товара регуляркой
      console.log('regexp: ', regexp);
      this.filtered = this.products.filter(el => regexp.test(el.product_name));
    },
  },
  created() {//метод создания вью
    this.getJson(`${API + this.catalogUrl}`)//создаем каталог
        .then(data => {
          for (let el of data) {
            this.products.push(el);//что получили по запросу с сервера пушим в наш каталог
            this.filtered.push(el);//что получили по запросу с сервера пушим в наш поиск
          }
        });
  },
});