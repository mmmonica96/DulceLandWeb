document.addEventListener('DOMContentLoaded', () => {
    console.log("El archivo shop.js se ha cargado correctamente.");
  
    const cartIcon = document.getElementById('cart-icon');
    const cartContainer = document.getElementById('cart-container');
  
    // Mostrar/Ocultar carrito al hacer click en el icono
    cartIcon.addEventListener('click', () => {
      cartContainer.classList.toggle('show');
    });
  
    // Agregar evento a botones de comprar productos
    const buyButtons = document.querySelectorAll('.buy');
    buyButtons.forEach((button, index) => {
      button.addEventListener('click', () => {
        addToCart(index);
      });
    });
  });
  
  let cart = [];
  
  function addToCart(index) {
    const products = document.querySelectorAll('.product-card');
    const product = products[index];
    const title = product.querySelector('h3') ? product.querySelector('h3').innerText : "Producto";
    const priceText = product.querySelector('.price strong').innerText.replace('€', '').replace(' ', '').replace(',', '.');
    const price = parseFloat(priceText);
  
    const existingProduct = cart.find(item => item.title === title);
  
    if (existingProduct) {
      existingProduct.quantity++;
    } else {
      cart.push({ title, price, quantity: 1 });
    }
  
    updateCart();
  }
  
  function updateCart() {
    const cartItemsContainer = document.getElementById('cart-items');
    const totalAmount = document.getElementById('total-amount');
    cartItemsContainer.innerHTML = '';
  
    // Cabecera
    const header = document.createElement('div');
    header.classList.add('cart-row', 'cart-header');
    header.innerHTML = `
      <span class="cart-col">Nombre</span>
      <span class="cart-col">Cantidad</span>
      <span class="cart-col">Precio</span>
      <span class="cart-col"></span> <!-- Columna vacía para botón eliminar -->
    `;
    cartItemsContainer.appendChild(header);
  
    let total = 0;
  
    cart.forEach((item, index) => {
      const row = document.createElement('div');
      row.classList.add('cart-row');
      const totalPrice = (item.price * item.quantity).toFixed(2);
  
      row.innerHTML = `
        <span class="cart-col">${item.title}</span>
        <span class="cart-col">${item.quantity}</span>
        <span class="cart-col">${totalPrice}€</span>
        <span class="cart-col">
          <button class="delete-btn" onclick="removeOne(${index})">🗑️</button>
        </span>
      `;
  
      cartItemsContainer.appendChild(row);
      total += item.price * item.quantity;
    });
  
    totalAmount.innerText = total.toFixed(2) + '€';
  }
  
  // 🗑️ Función para eliminar solo 1 unidad
  function removeOne(index) {
    if (cart[index].quantity > 1) {
      cart[index].quantity--;
    } else {
      cart.splice(index, 1);
    }
    updateCart();
  }
  
  
  
  
  function checkoutCart() {
    alert('¡Gracias por su compra!');
    cart = [];
    updateCart();
  }
  
  function clearCart() {
    cart = [];
    updateCart();
  }
  
  function removeOne(index) {
    if (cart[index].quantity > 1) {
      cart[index].quantity--; // Baja cantidad
    } else {
      cart.splice(index, 1); // Si queda 0, eliminar producto
    }
    updateCart(); // Actualizar el carrito
  }
  