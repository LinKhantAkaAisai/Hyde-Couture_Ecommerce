<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shopping Cart | HYDE COUTURE</title>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Vollkorn:wght@400;500;600&family=Cinzel:wght@400;700&family=Sancreek&display=swap" rel="stylesheet">

<!-- Icons (using Font Awesome CDN) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
/* Font assignments */
body {
  margin: 0;
  font-family: 'Vollkorn', serif; /* default for texts/paragraphs */
  background-color: #fff;
  color: #111;
}

.brand-name {
  font-family: 'Sancreek', cursive;
  font-size: 2rem;
  font-weight: normal;
}

h1, h2, h3, h4, h5, h6 {
  font-family: 'Cinzel', serif;
  margin: 0;
}

/* Cart container */
.cart-container {
  max-width: 900px;
  margin: 2rem auto;
  padding: 0 1rem;
}

.cart-item {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 1rem 0;
  border-bottom: 1px solid #ddd;
}

.cart-item img {
  width: 120px;
  height: 150px;
  object-fit: cover;
  border-radius: 6px;
}

.item-details {
  flex: 1;
}

.item-title {
  font-family: 'Cinzel', serif; /* headings for product titles */
  font-weight: 600;
  font-size: 1rem;
  margin: 0;
}

.item-variation {
  font-family: 'Vollkorn', serif; /* paragraph text */
  font-size: 0.9rem;
  color: #555;
  margin-top: 2px;
}

.item-actions {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.5rem;
}

.item-actions i {
  cursor: pointer;
  font-size: 1.1rem;
  color: #111;
  transition: color 0.3s;
}

.item-actions i:hover {
  color: var(--rolex-green, #005A2B);
}

.quantity {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 1.1rem;
}

.quantity button {
  width: 28px;
  height: 28px;
  border: 1px solid #ddd;
  background: #fff;
  cursor: pointer;
  font-size: 1rem;
}

.item-price {
  width: 80px;
  text-align: right;
  font-weight: 600;
  font-family: 'Cinzel', serif; /* price as heading style */
}

/* Subtotal and Buttons */
.cart-summary {
  margin-top: 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-weight: 600;
  font-size: 1.1rem;
  font-family: 'Cinzel', serif; /* heading style */
}

.cart-buttons {
  margin-top: 1rem;
  display: flex;
  flex-direction: column;
  gap: 0.7rem;
}

.checkout-btn {
  background-color: #005A2B; /* Rolex green */
  color: #fff;
  border: none;
  padding: 12px;
  font-weight: 600;
  font-size: 1rem;
  cursor: pointer;
  transition: opacity 0.3s;
  font-family: 'Cinzel', serif;
}

.checkout-btn:hover {
  opacity: 0.85;
}

.continue-btn {
  background-color: #fff;
  border: 2px solid #005A2B; /* Rolex green border */
  color: #005A2B;
  padding: 12px;
  font-weight: 600;
  font-size: 1rem;
  cursor: pointer;
  transition: opacity 0.3s, background-color 0.3s;
  font-family: 'Cinzel', serif;
}

.continue-btn:hover {
  background-color: #005A2B;
  color: #fff;
  opacity: 0.85;
}

/* Responsive */
@media (max-width: 768px) {
  .cart-item {
    flex-direction: column;
    align-items: flex-start;
  }
  .item-actions {
    flex-direction: row;
    gap: 1rem;
  }
  .item-price {
    width: 100%;
    text-align: left;
    margin-top: 0.5rem;
  }
}
</style>
</head>
<body>
<?php include "../layout/nav.php"; ?>

<form method="post" action="./checkout.php">
<div class="cart-container">

  <!-- Item -->
  <div class="cart-item">
    <img src="../image/p4_i1.jpg" alt="Boxy Jacket">
    <div class="item-details">
      <p class="item-title">BOXY JACKET : BLACK</p>
      <p class="item-variation">M - BLACK</p>
      <div class="quantity">
        <button class="decrease" type="none">-</button>
        <span class="qty">1</span>
        <button class="increase" type="none">+</button>
      </div>
    </div>
    
    <div class="item-actions">
      <i class="fa-regular fa-heart"></i>
      <i class="fa-regular fa-trash-can"></i>
    </div>
    <div class="item-price">123 USD</div>
  </div>

  <div class="cart-summary">
    <span>SUBTOTAL</span>
    <span id="subtotal">123 USD</span>
  </div>

  <div class="cart-buttons">
    <button class="checkout-btn" type="submit">CHECK OUT</button>
    <button class="continue-btn"><a href="./index.php">CONTINUE SHOPPING</a></button>
  </div>

</div>
</form>

<script>

const decreaseBtns = document.querySelectorAll('.decrease');
const increaseBtns = document.querySelectorAll('.increase');
const qtySpans = document.querySelectorAll('.qty');
const itemPrices = document.querySelectorAll('.item-price');
const subtotalSpan = document.getElementById('subtotal');

decreaseBtns.forEach((btn, index) => {
  btn.addEventListener('click', () => {
    let qty = parseInt(qtySpans[index].textContent);
    if (qty > 1) qty--;
    qtySpans[index].textContent = qty;
    updateSubtotal();
  });
});

increaseBtns.forEach((btn, index) => {
  btn.addEventListener('click', () => {
    let qty = parseInt(qtySpans[index].textContent);
    qty++;
    qtySpans[index].textContent = qty;
    updateSubtotal();
  });
});

function updateSubtotal() {
  let total = 0;
  itemPrices.forEach((priceEl, index) => {
    const price = parseFloat(priceEl.textContent);
    const qty = parseInt(qtySpans[index].textContent);
    total += price * qty;
  });
  subtotalSpan.textContent = total + ' USD';
}
</script>

<?php include "../layout/footer.php"; ?>
</body>
</html>