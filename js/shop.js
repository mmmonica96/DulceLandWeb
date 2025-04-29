document.addEventListener('DOMContentLoaded', () => {
    const cartIcon = document.getElementById('cart-icon');
    const cartContainer = document.getElementById('cart-container');

    cartIcon.addEventListener('click', () => {
        cartContainer.classList.toggle('show');
    });

    const productCards = document.querySelectorAll('.product-card');

    productCards.forEach((card, index) => {
        const minusBtn = card.querySelector('.actions button:nth-child(1)');
        const input = card.querySelector('.actions input');
        const plusBtn = card.querySelector('.actions button:nth-child(3)');
        const buyBtn = card.querySelector('.buy');

        minusBtn.addEventListener('click', () => {
            let qty = parseInt(input.value);
            if (qty > 1) {
                input.value = qty - 1;
            }
        });

        plusBtn.addEventListener('click', () => {
            let qty = parseInt(input.value);
            if (qty < 20) {
                input.value = qty + 1;
            }
        });

        buyBtn.addEventListener('click', () => {
            addToCart(index);
        });
    });
});

let cart = [];

function addToCart(index) {
    const products = document.querySelectorAll('.product-card');
    const product = products[index];
    const title = product.querySelector('h3')?.innerText ?? "Producto";
    const priceText = product.querySelector('.price strong').innerText.replace('€', '').replace(' ', '').replace(',', '.');
    const price = parseFloat(priceText);
    const quantity = parseInt(product.querySelector('.actions input').value) || 1;

    const existingProduct = cart.find(item => item.title === title);
    if (existingProduct) {
        existingProduct.quantity += quantity;
    } else {
        cart.push({ title, price, quantity });
    }

    updateCart();
}

function updateCart() {
    const cartItemsContainer = document.getElementById('cart-items');
    const totalAmount = document.getElementById('total-amount');
    cartItemsContainer.innerHTML = '';

    const header = document.createElement('div');
    header.classList.add('cart-row', 'cart-header');
    header.innerHTML = `
        <span class="cart-col">Nombre</span>
        <span class="cart-col">Cantidad</span>
        <span class="cart-col">Precio</span>
        <span class="cart-col"></span>
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

function removeOne(index) {
    if (cart[index].quantity > 1) {
        cart[index].quantity--;
    } else {
        cart.splice(index, 1);
    }
    updateCart();
}

function clearCart() {
    cart = [];
    updateCart();
}

function checkoutCart() {
    if (cart.length === 0) {
        alert("El carrito está vacío.");
        return;
    }

    const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0).toFixed(2);
    const detail = cart.map(item => `${item.title} x${item.quantity}`).join(', ');

    fetch('../connection/order.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ detail, total })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Compra realizada con éxito");
            clearCart();
        } else {
            alert("Error al procesar la compra.");
        }
    })
    .catch(() => alert("Error al conectar con el servidor."));
}
