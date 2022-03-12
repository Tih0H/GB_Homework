Vue.component('filters', {
  
  data() {
    return {
      searchLine : '',//создаем пустой обьект для поисковой строки
    }
  },
  // methods: {  
  //   FilterGoods() {
  //     let regexp = new RegExp(this.searchLine , 'i');//фильтр товара регуляркой
  //     // console.log('regexp: ', regexp);
  //     this.filtered = this.products.filter(el => regexp.test(el.product_name));
  //   },
  // },
  
  template: `
    <form action="#" class="search-form" @submit.prevent="$root.$refs.products.FilterGoods(searchLine)">
      <input type="text" class="search-field" v-model="searchLine">
      <button class="btn-search" type="submit">
          <i class="fas fa-search"></i>
      </button>
    </form>
  `
});