Vue.component('cart', {
  data() {
    return {
      isVisibleCart: false,//Создаем правило для скрытия/прорисовки корзины
      cartUrl: '/getBasket.json',//урл корзины
      cartItems: [],//создаем пустой массив для корзины
      imgCart: 'https://via.placeholder.com/50x100',
    }
  },

  methods: {
    addProduct(product) {//логика добавления продукта в корзину по клику на продукт
      this.$parent.getJson(`${API}/addToBasket.json`)//запрашиваем сервер на добавление в корзину
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
      this.$parent.getJson(`${API}/deleteFromBasket.json`)
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
  },

  mounted(){
    this.$parent.getJson(`${API + this.cartUrl}`)
        .then(data => {
            for(let el of data.contents){
                this.cartItems.push(el);
            }
        });
  },
  
  template: `
    <div>
    <button class="btn-cart" type="button" @click="isVisibleCart = !isVisibleCart">Корзина</button>
      <div class="cart-block" v-show="isVisibleCart">
          <div class="cart-item" v-for="item of cartItems" :key="item.id_product">
              <div class="product-bio">
                  <img :src="imgCart" alt="Some image">
                  <div class="product-desc">
                      <p class="product-title">{{item.product_name}}</p>
                      <p class="product-quantity">Количество: {{item.quantity}}</p>
                      <p class="product-single-price">{{item.price}}₽ за единицу</p>
                  </div>
              </div>
              <div class="right-block">
                  <p class="product-price">{{ item.quantity * item.price }}₽</p>
                  <button class="del-btn" @click="remove(item)">&times;</button>
              </div>
          </div>
      </div>
    </div>
  `,
});