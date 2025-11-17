<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Specific Product | HYDE COUTURE</title>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Sancreek&family=Vollkorn:wght@400;500;600&display=swap" rel="stylesheet">

<style>
:root {
  --rolex-green: #005A2B;
  --text-dark: #111;
  --text-light: #555;
  --border-gray: #ddd;
}

body {
  margin: 0;
  font-family: 'Vollkorn', serif;
  background-color: #fff;
  color: var(--text-dark);
}

/* ====== Product Section ====== */
.product-section {
  display: flex;
  flex-direction: column; /* always vertical */
  align-items: center;
  padding: 2rem 1rem;
  gap: 1.5rem; /* spacing between gallery, dots, and info */
}

/* ====== Gallery ====== */
.product-gallery {
  width: 1000px;        /* bigger width */
  height: 500px;       /* bigger height */
  overflow: hidden;
  flex-shrink: 0;
}

.product-gallery img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: none;
  opacity: 0;
  transition: opacity 0.6s ease-in-out;
  border-radius: 6px;
}

.product-gallery img.active {
  display: block;
  opacity: 1;
}

/* ====== Dots below gallery ====== */
.dots {
  display: flex;
  justify-content: center;
  gap: 10px;
  margin-top: 12px;   /* space below gallery */
}

.dots span {
  display: inline-block;
  height: 12px;
  width: 12px;
  border-radius: 50%;
  background-color: #ccc;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.dots span.active {
  background-color: var(--rolex-green);
}

/* ====== Product Info ====== */
.product-info {
  max-width: 600px;
  width: 100%;
  text-align: center;
  position: relative;
  z-index: 2; /* ensures buttons are clickable */
}

.product-title {
  font-family: 'Cinzel', serif;
  font-weight: 600;
  font-size: 1.6rem;
  letter-spacing: 0.5px;
  text-transform: uppercase;
}

.product-price {
  font-family: 'Vollkorn', serif;
  font-size: 1.2rem;
  margin-top: 0.3rem;
  color: var(--text-dark);
  text-decoration : line-through;
}

.discount-price{
  font-family: 'Vollkorn', serif;
  font-size: 1.2rem;
  margin-top: 0.3rem;
  color: var(--text-dark);
}

.size-selector {
  margin-top: 1.2rem;
}

.size-selector button {
  border: 1px solid var(--border-gray);
  background: transparent;
  font-family: 'Vollkorn', serif;
  font-size: 0.95rem;
  margin: 0 6px;
  padding: 6px 14px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.size-selector button:hover,
.size-selector button.active {
  border-color: var(--rolex-green);
  color: #fff;
  background-color: var(--rolex-green);
}

/* Add to Cart & Out of Stock Buttons */
.add-to-cart,
.out-of-stock {
  display: inline-block;
  margin-top: 1.5rem;
  padding: 10px 24px;
  border: none;
  font-size: 1rem;
  letter-spacing: 0.8px;
  cursor: pointer;
  transition: opacity 0.3s ease;
}

.add-to-cart {
  background-color: var(--rolex-green);
  color: #fff;
}

.add-to-cart:hover {
  opacity: 0.8;
}

.out-of-stock {
  background-color: #aaa;
  color: #fff;
  cursor: not-allowed;
}

/* Description */
.product-description {
  margin-top: 2rem;
  font-size: 0.95rem;
  color: var(--text-light);
  line-height: 1.6;
  max-width: 600px;
}

/* ====== Responsive ====== */
@media (max-width: 768px) {
  .product-gallery {
    width: 350px;
    height: 350px;
  }
  .dots span {
    height: 10px;
    width: 10px;
  }
}
</style>
</head>

<body>
<?php 
    include "../layout/nav.php";
?>

<section class="product-section">

  <!-- Gallery -->
  <div class="product-gallery">
    <img src="../image/big_p4_i1.jpg" class="active" alt="Product Image 1">
    <img src="../image/big_p4_i2.jpg" alt="Product Image 2">
    <img src="../image/big_p4_i1.jpg" alt="Product Image 3">
    <img src="../image/big_p4_i2.jpg" alt="Product Image 4">
  </div>

  <!-- Dots below gallery -->
  <div class="dots">
    <span class="active"></span>
    <span></span>
    <span></span>
    <span></span>
  </div>

  <!-- Product Info -->
  <div class="product-info">
    <h2 class="product-title">Classic Cargo Shorts</h2>
    <p class="product-price">$85.00 USD</p>
    <p class="discount-price">$74.00 USD</p>



    <div class="size-selector">
      <button data-size="S">S</button>
      <button class="active" data-size="M">M</button>
      <button data-size="L">L</button>
      <button data-size="XL">XL</button>
    </div>

    <button class="add-to-cart">ADD TO CART</button>
    <button class="out-of-stock" style="display:none;" disabled>OUT OF STOCK</button>

    <div class="product-description">
      <p>
        Crafted from premium cotton with a relaxed silhouette, these shorts combine comfort and utility. 
        Featuring multiple pockets and signature detailing, perfect for versatile styling across seasons.
      </p>
    </div>
  </div>

</section>

<!-- JS -->
<script>
// ===== Gallery Image Switching =====
const images = document.querySelectorAll('.product-gallery img');
const dots = document.querySelectorAll('.dots span');

dots.forEach((dot, index) => {
  dot.addEventListener('click', () => {
    images.forEach(img => img.classList.remove('active'));
    dots.forEach(d => d.classList.remove('active'));
    images[index].classList.add('active');
    dot.classList.add('active');
  });
});

// ===== Stock Logic =====
const stock = {
  S: false,
  M: true,
  L: false,
  XL: false
};

const sizeButtons = document.querySelectorAll('.size-selector button');
const addToCartBtn = document.querySelector('.add-to-cart');
const outOfStockBtn = document.querySelector('.out-of-stock');

sizeButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    // remove active from all buttons
    sizeButtons.forEach(b => b.classList.remove('active'));
    // set active for clicked
    btn.classList.add('active');

    const selectedSize = btn.dataset.size;

    if (stock[selectedSize]) {
      addToCartBtn.style.display = 'inline-block';
      outOfStockBtn.style.display = 'none';
    } else {
      addToCartBtn.style.display = 'none';
      outOfStockBtn.style.display = 'inline-block';
    }
  });
});

// Initialize default active size on page load
document.addEventListener('DOMContentLoaded', () => {
  const activeBtn = document.querySelector('.size-selector button.active');
  if (activeBtn) activeBtn.click();
});
</script>

</body>
</html>