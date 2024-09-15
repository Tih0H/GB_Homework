Vue.component('products', {
  data() {
    return {
      catalogUrl: '/catalogData.json',//урл товаров
      products: [],//создаем пустой массив для наших карточек товаров
      filtered: [],
      // searchLine : '',//создаем пустой обьект для поисковой строки
      imgCatalog: 'https://via.placeholder.com/200x150',
    }
  },
  methods: {
    FilterGoods() {
      let regexp = new RegExp(this.searchLine , 'i');//фильтр товара регуляркой
      this.filtered = this.products.filter(el => regexp.test(el.product_name));
    },
  },

  mounted() {//метод создания вью
    this.$parent.getJson(`${API + this.catalogUrl}`)//создаем каталог
        .then(data => {
          for (let el of data) {
            this.products.push(el);//что получили по запросу с сервера пушим в наш каталог
            this.filtered.push(el);//что получили по запросу с сервера пушим в наш поиск
          }
        });
  },
  template: `
        <div class="products">
            <product v-for="item of filtered" :key="item.id_product" :img="imgCatalog" :product="item"></product>
        </div>
    `
});
Vue.component('product', {
  props: ['product', 'img'],
  
  template: `
  <div class="product-item">
              <img :src="img" alt="Some img">
              <div class="desc">
                  <h3>{{product.product_name}}</h3>
                  <p>{{product.price}}₽</p>
                  <button class="buy-btn" @click="$root.$refs.cart.addProduct(product)">Купить</button>
              </div>
          </div>
  `
});