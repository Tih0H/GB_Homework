const products = [
  {id: 1, title: 'Notebook', price: 1000, image: 'images/notebook.svg'},
  {id: 2, title: 'Mouse', price: 100, image:'images/mouse.svg'},
  {id: 3, title: 'Keyboard', price: 250, image:'images/keyboard.svg'},
  {id: 4, title: 'Gamepad', price: 150, image:'images/gamepad.svg'},
];

const renderProduct = (title, price, image) => {
  return `<div class="product-item">
            <h3>${title}</h3>
            <p>${price}</p>
            <img src="${image}"></img>
            <button class="by-btn">Добавить</button>
          </div>`;
};

const renderProducts = list => {
  const productList = list.map(item => renderProduct(item.title, item.price, item.image));
  // console.log(productList);
  document.querySelector('.products').innerHTML = productList.join(" ");
};

renderProducts(products);
