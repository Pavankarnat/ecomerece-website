document.addEventListener('DOMContentLoaded', () => {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartItemsElement = document.querySelector('.cart-items');
    const totalPriceElement = document.querySelector('.total-price');

    const checkoutButton = document.querySelector('.checkout');

    const cart = [];

    addToCartButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const productElement = event.target.closest('.product');
            const productId = productElement.getAttribute('data-id');
            const productName = productElement.getAttribute('data-name');
            const productPrice = parseFloat(productElement.getAttribute('data-price'));

            addToCart(productId, productName, productPrice);
            updateCartDisplay();
        });
    });
    
    checkoutButton.addEventListener('click', () => {
        if (cart.length > 0) {
            
            window.location.href = "payment.html";
        } else {
            alert('Your cart is empty.');
        }
    });


    function addToCart(id, name, price) {
        const existingProductIndex = cart.findIndex(item => item.id === id);

        if (existingProductIndex !== -1) {
            cart[existingProductIndex].quantity += 1;
        } else {
            cart.push({ id, name, price, quantity: 1 });
        }
    }

    function updateCartDisplay() {
        cartItemsElement.innerHTML = '';
        let totalPrice = 0;

        cart.forEach(item => {
            const cartItemElement = document.createElement('li');
            cartItemElement.classList.add('cart-item');
            cartItemElement.innerHTML = `
                ${item.name} - ${item.price} x ${item.quantity}
                <button class="remove-from-cart" data-id="{item.id}">Remove</button>  
            `;
           
            cartItemsElement.appendChild(cartItemElement);
            totalPrice += item.price * item.quantity;
            totalPrice1=((totalPrice*18)/100);
            totalPrice=totalPrice1+totalPrice;
        });
        

        totalPriceElement.textContent = totalPrice.toFixed(2);

        const removeFromCartButtons = document.querySelectorAll('.remove-from-cart');
        removeFromCartButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const productId = event.target.getAttribute('data-id');
                removeFromCart(productId);
                updateCartDisplay();
            });
        });
    }

    function removeFromCart(id) {
        const productIndex = cart.findIndex(item => item.id === id);

        if (productIndex !== -1) {
            if (cart[productIndex].quantity > 1) {
                cart[productIndex].quantity -= 1;
            } else {
                cart.splice(productIndex, 1);
            }
        }
    }
});


