const cartIcon = document.querySelector("#cart-icon");
const cart = document.querySelector(".cart");
const closeCart = document.querySelector("#cart-close");

cartIcon.addEventListener("click", () => {
  cart.classList.add("active");
});

closeCart.addEventListener("click", () => {
  cart.classList.remove("active");
});

if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", start);
} else {
  start();
}

function start() {
  addEvents();
}

function update() {
  addEvents();
  updateTotal();
}

function addEvents() {
  let cartRemove_btns = document.querySelectorAll(".cart-remove");
  cartRemove_btns.forEach((btn) => {
    btn.addEventListener("click", handle_removeCartItem);
  });

  let cartQuantity_inputs = document.querySelectorAll(".cart-quantity");
  cartQuantity_inputs.forEach((input) => {
    input.addEventListener("change", handle_changeItemQuantity);
  });

  let addCart_btns = document.querySelectorAll(".add-cart");
  addCart_btns.forEach((btn) => {
    btn.addEventListener("click", handle_addCartItem);
  });

  const buy_btn = document.querySelector(".btn-buy");
  buy_btn.addEventListener("click", handle_buyOrder);
}

let itemsAdded = [];

function handle_addCartItem() {
  let product = this.parentElement;
  let imgSrc = product.querySelector(".product-img").src;
  let title = product.querySelector(".product-title").innerHTML;
  let priceText = product.querySelector(".product-price").innerHTML;
  let price = parseFloat(priceText.replace('$', ''));
  

  let newToAdd = {
    title,
    price,
    imgSrc,
  };

  if (itemsAdded.find((el) => el.title == newToAdd.title)) {
    alert("Agregado Con Exito");
    return;
  } else {
    itemsAdded.push(newToAdd);
  }

  let cartBoxElement = CartBoxComponent(title, priceText, imgSrc);
  let newNode = document.createElement("div");
  newNode.innerHTML = cartBoxElement;
  const cartContent = cart.querySelector(".cart-content");
  cartContent.appendChild(newNode);

  update();
}

function handle_removeCartItem() {
  this.parentElement.remove();
  itemsAdded = itemsAdded.filter(
    (el) =>
      el.title !=
      this.parentElement.querySelector(".cart-product-title").innerHTML
  );

  update();
}

function handle_changeItemQuantity() {
  if (isNaN(this.value) || this.value < 1) {
    this.value = 1;
  }
  this.value = Math.floor(this.value);

  update();
}

function updateTotal() {
  const cartBoxes = document.querySelectorAll(".cart-box");
  const totalElement = cart.querySelector(".total-price");
  let total = 0;

  cartBoxes.forEach((cartBox) => {
    const priceElement = cartBox.querySelector(".cart-price");
    const price = parseFloat(priceElement.innerHTML.replace("$", ""));
    const quantityElement = cartBox.querySelector(".cart-quantity");
    const quantity = parseInt(quantityElement.value);

    total += price * quantity;
  });

  total = total.toFixed(2);
  totalElement.innerHTML = "$" + total;

  // Almacenar el precio total en localStorage
  localStorage.setItem('totalPrice', total);
}

function CartBoxComponent(title, price, imgSrc) {
  return `
    <div class="cart-box">
        <img src=${imgSrc} alt="" class="cart-img">
        <div class="detail-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price}</div>
            <input type="number" value="1" class="cart-quantity">
        </div>
        <i class='bx bxs-trash-alt cart-remove'></i>
    </div>`;
}


function updatePrice(input) {
var priceElement = input.parentElement.querySelector('.cart-price');
var price = parseFloat(priceElement.innerText.replace('Precio: $', ''));
var quantity = input.value;
priceElement.innerText = 'Precio: $' + (price * quantity).toFixed(2);
updateTotal();
}

const emptyCartBtn = document.querySelector("#empty-cart");

emptyCartBtn.addEventListener("click", handle_emptyCart);

function handle_emptyCart() {
const cartContent = cart.querySelector(".cart-content");
cartContent.innerHTML = "";
itemsAdded = [];

update();
}

function handle_buyOrder() {
if (itemsAdded.length <= 0) {
  alert("¡Aún no hay ningún pedido para realizar! \nPor favor, haga un pedido primero.");
  return;
}

// Almacenar los productos del carrito en el formulario oculto
const productosSeleccionados = document.querySelector("#productosSeleccionados");
productosSeleccionados.value = JSON.stringify(itemsAdded);

// Enviar el formulario
const comprarForm = document.querySelector("#comprarForm");
comprarForm.submit();
}

// Obtén el formulario de compra
const comprarForm = document.querySelector("#comprarForm");

comprarForm.addEventListener("submit", function(event) {
// Vacía el carrito
const cartContent = cart.querySelector(".cart-content");
cartContent.innerHTML = "";
itemsAdded = [];

// Actualiza el total y el número de artículos
update();
});