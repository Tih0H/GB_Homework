Vue.component('basketpage', {
  data(){
    return {
      cartItems: [],
      showCart: false,          
    }
  },
  methods: {
      addProduct(product){
          let find = this.cartItems.find(el => el.id_product === product.id_product);
          
          if(find){
              this.$parent.putJson(`/api/cart/${find.id_product}`, {quantity: 1});
              find.quantity++;
          } else {
              let prod = Object.assign({quantity: 1}, product);
              this.$parent.postJson('/api/cart', prod)
                  .then(data => {
                      if (data.result === 1) {
                          this.cartItems.push(prod);
                      }
                  });
          }
      },
      remove(item) {
          if (item.quantity > 1) {
              this.$parent.putJson(`/api/cart/${item.id_product}`, {quantity: -1})
                  .then(data => {
                      if (data.result === 1) {
                          item.quantity--;
                      }
                  });
          } else {
              this.$parent.deleteJson(`/api/cart/${item.id_product}`)
                  .then(data => {
                      if (data.result === 1) {
                          this.cartItems.splice(this.cartItems.indexOf(item), 1);
                      }
                  });
          }
      },
      addProductCart(event){
            console.log('получаем продукт на который хотим посмотреть: ', event);
            //получаем продукт на который хотим посмотреть.
            this.$parent.postJson('/api/cartprod', event);
            setTimeout(function(){
                window.location.href = 'product.html';
              }, 500);
        },
  },
  mounted(){
      this.$parent.getJson('/api/cart')
          .then(data => {
              for(let el of data.contents){
                  this.cartItems.push(el);
              }
          });
  },
  template: `
            <div class="cart_products">
                <cart-item class="cart-item" 
                v-for="item of cartItems" 
                :key="item.id_product"
                :cart-item="item" 
                @remove="remove"
                @addProductCart="addProductCart">
                </cart-item>
            </div>
  `
});

Vue.component('cart-item', {
  props: ['cartItem'],    
  template: `
            <div class="cart_products_card">
                <a @click="$emit('addProductCart', cartItem)" class="cards_product_hover">
                    <img :src="cartItem.image" alt="Some image"  class="cart_products_card_img">
                </a>
                <div class="card_description">
                    <div class="card_title">
                        <h2 class="card_subtitle_main_item">{{cartItem.product_name}}</h2>
                        <button class="del-btn" @click="$emit('remove', cartItem)">&times;</button>
                    </div>
                    <div class="card_subtitle">
                            <p class="card_subtitle_item">Price: <span class="color_pink">$ {{cartItem.price}}</span></p>
                            <p class="card_subtitle_item">Size: XL</p>                            
                            <form action="#" class="card_quantity">
                                <p class="card_subtitle_item">Quantity:</p>
                                
                                <p class="card_quantity_in">{{cartItem.quantity}}</p>
                            </form>                            
                    </div>
                </div>
                </div>
  `
});
