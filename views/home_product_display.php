<?php

if ($category_id > 0) {
    $product_query = "SELECT p.* FROM product p JOIN productxcategory px ON p.productID = px.productID WHERE px.categoryID = ".$category_id;
}
else{
    $product_query = "SELECT p.* FROM product p";
}

$stmt = $conn->prepare($product_query);
$stmt->execute();
$result_product = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Elegance Attire | Premium Clothing</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Sancreek&family=Vollkorn:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <style>
      :root {
        --rolex-green: #228b22;
        --dark-bg: #1a1a1a;
        --light-bg: #ffffff;
      }

      body {
        font-family: "Vollkorn", serif;
        background-color: var(--light-bg);
        color: #333;
        margin: 0;
        padding: 0;
      }

      /* Headings Styling */
      h1,
      h2,
      h3,
      h4,
      h5,
      h6 {
        font-family: "Cinzel", serif;
        font-weight: 600;
      }

      /* Video Banner */
      .video-banner {
        position: relative;
        height: 80vh;
        overflow: hidden;
        background-color: #000;
      }

      .video-banner video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.9;
      }

      .banner-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        width: 80%;
      }

      .banner-content h1 {
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
      }

      .banner-content p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
      }

      .btn-primary {
        background-color: var(--rolex-green);
        border: none;
        padding: 12px 30px;
        font-family: "Vollkorn", serif;
        font-weight: 600;
        transition: all 0.3s;
      }

      .btn-primary:hover {
        background-color: #1a6e1a;
        transform: translateY(-2px);
      }

      .clothing-banner {
        background-color: #f9f9f9;
        padding: 0;
        margin: 0;
      }

      .side-nav {
        background-color: white;
        height: 100%;
        padding: 2rem 1.5rem;
        box-shadow: 5px 0 15px rgba(0, 0, 0, 0.05);
        margin-right: -70px;
      }

      .side-nav h3 {
        font-family: "Cinzel", serif;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        color: var(--dark-bg);
        border-bottom: 2px solid var(--rolex-green);
        padding-bottom: 10px;
        display: inline-block;
      }

      .nav-list {
        list-style: none;
        padding: 0;
        margin: 0;
      }

      .nav-item {
        display: block;
        padding: 12px 15px;
        color: #333;
        text-decoration: none;
        font-family: "Vollkorn", serif;
        font-size: 1.1rem;
        transition: all 0.3s;
        border-radius: 6px;
        margin-bottom: 8px;
        background-color: #f9f9f9;
      }

      .nav-item:hover,
      .nav-item.active {
        color: var(--rolex-green);
        background-color: rgba(34, 139, 34, 0.1);
        transform: translateX(5px);
      }

      .banner-slider {
        position: relative;
        height: 500px;
        overflow: hidden;
        margin-left: 150px;
      }

      .banner-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 0.5s ease;
        padding: 2rem;
      }

      .banner-slide.active {
        opacity: 1;
      }

      .banner-text {
        padding: 2rem;
      }

      .banner-text h2 {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        color: var(--dark-bg);
      }

      .banner-text p {
        font-size: 1.1rem;
        margin-bottom: 2rem;
        color: #555;
        line-height: 1.6;
      }

      .banner-image {
        text-align: center;
        padding: 2rem;
      }

      .banner-image img {
        max-height: 400px;
        max-width: 100%;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      }

      /* Product Showcase */
      .product-showcase {
        padding: 5rem 0;
        background-color: #f9f9f9;
      }

      .showcase-header {
        text-align: center;
        margin-bottom: 3rem;
      }

      .showcase-header h2 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
      }

      .showcase-header p {
        color: #666;
        max-width: 600px;
        margin: 0 auto;
      }

      .category-nav {
        background-color: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        height: 100%;
      }

      .category-nav h3 {
        margin-bottom: 1.5rem;
        color: var(--dark-bg);
        border-bottom: 2px solid var(--rolex-green);
        padding-bottom: 10px;
        display: inline-block;
      }

      .category-list {
        list-style: none;
        padding: 0;
      }

      .category-list li {
        margin-bottom: 15px;
      }

      .category-list a {
        color: #333;
        text-decoration: none;
        font-size: 1.1rem;
        transition: all 0.3s;
        display: block;
        padding: 8px 0;
        border-bottom: 1px solid #eee;
      }

      .category-list a:hover {
        color: var(--rolex-green);
        padding-left: 10px;
      }

      .product-card {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s;
        height: 100%;
      }

      .product-card:hover {
        transform: translateY(-10px);
      }

      .product-img {
        height: 300px;
        overflow: hidden;
      }

      .product-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
      }

      .product-card:hover .product-img img {
        transform: scale(1.05);
      }

      .product-info {
        padding: 1.5rem;
      }

      .product-info h4 {
        margin-bottom: 10px;
        font-size: 1.3rem;
      }

      .product-info p {
        color: #666;
        margin-bottom: 15px;
      }

      .price {
        font-weight: 600;
        color: var(--rolex-green);
        font-size: 1.2rem;
      }

      /* ===== MOBILE RESPONSIVE FIXES ===== */

      /* General Mobile Adjustments */
      @media (max-width: 768px) {
        /* Video Banner */
        .video-banner {
          height: 60vh;
        }

        .banner-content h1 {
          font-size: 2rem;
          margin-bottom: 1rem;
        }

        .banner-content p {
          font-size: 1rem;
          margin-bottom: 1.5rem;
        }

        /* Side Navigation - Convert to horizontal scroll */
        .side-nav {
          margin-right: 0;
          padding: 1rem;
          height: auto;
          overflow-x: auto;
          white-space: nowrap;
          box-shadow: none;
          border-bottom: 1px solid #eee;
        }

        .side-nav h3 {
          display: none;
        }

        .nav-list {
          display: flex;
          flex-direction: row;
          gap: 10px;
        }

        .nav-item {
          display: inline-block;
          white-space: nowrap;
          margin-bottom: 0;
          padding: 8px 15px;
        }

        .nav-item:hover,
        .nav-item.active {
          transform: translateY(-2px);
        }

        /* Banner Slider */
        .banner-slider {
          margin-left: 0;
          height: auto;
          min-height: 400px;
        }

        .banner-slide {
          position: relative;
          opacity: 1;
          padding: 1rem;
        }

        .banner-slide.active {
          display: block;
        }

        .banner-slide:not(.active) {
          display: none;
        }

        .banner-text {
          padding: 1rem;
          text-align: center;
        }

        .banner-text h2 {
          font-size: 1.8rem;
          margin-bottom: 1rem;
        }

        .banner-text p {
          font-size: 1rem;
          margin-bottom: 1.5rem;
        }

        .banner-image {
          padding: 1rem;
        }

        .banner-image img {
          max-height: 300px;
        }

        /* Product Showcase */
        .product-showcase {
          padding: 3rem 0;
        }

        .showcase-header h2 {
          font-size: 2rem;
        }

        .category-nav {
          margin-bottom: 2rem;
          text-align: center;
        }

        .category-list {
          display: flex;
          flex-wrap: wrap;
          justify-content: center;
          gap: 10px;
        }

        .category-list li {
          margin-bottom: 0;
        }

        .category-list a {
          padding: 8px 15px;
          border: 1px solid #eee;
          border-radius: 25px;
          display: inline-block;
        }

        .category-list a:hover {
          padding-left: 15px;
        }

        /* Product Cards */
        .product-card {
          margin-bottom: 1.5rem;
        }

        .product-img {
          height: 250px;
        }

      }

      /* Extra Small Devices */
      @media (max-width: 576px) {
        .video-banner {
          height: 50vh;
        }

        .banner-content h1 {
          font-size: 1.5rem;
        }

        .banner-content p {
          font-size: 0.9rem;
        }

        .btn-primary {
          padding: 10px 20px;
          font-size: 0.9rem;
        }

        .product-img {
          height: 200px;
        }

        .product-info h4 {
          font-size: 1.1rem;
        }

        .price {
          font-size: 1.1rem;
        }

        /* Stack product cards in single column */
        .col-md-6.col-lg-4 {
          flex: 0 0 100%;
          max-width: 100%;
        }
      }

      /* Tablet Adjustments */
      @media (min-width: 769px) and (max-width: 1024px) {
        .side-nav {
          margin-right: 0;
        }

        .banner-slider {
          margin-left: 0;
        }

        .banner-text h2 {
          font-size: 2rem;
        }

        .product-img {
          height: 250px;
        }
      }

      /* Fix for mobile menu */
      .navbar-toggler {
        border: none;
        padding: 4px 8px;
      }

      .navbar-toggler:focus {
        box-shadow: none;
      }

      /* Improve touch targets for mobile */
      .nav-item,
      .category-list a,
      .btn {
        min-height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      /* Smooth transitions for mobile */
      * {
        -webkit-tap-highlight-color: transparent;
      }

      /* Prevent horizontal scroll */
      html,
      body {
        max-width: 100%;
        overflow-x: hidden;
      }

      /* Improve image loading for mobile */
      img {
        max-width: 100%;
        height: auto;
      }
    </style>
  </head>
  <body>
    <div class="products">
    <?php 
        if($result_product && $result_product->num_rows > 0 ){
            while ($product = $result_product->fetch_assoc()) { 
                echo "<div>";
                echo "<h3>".htmlspecialchars($product['productName'])."</h3>";
                echo "<p>".number_format($product['price'])."MMK</p>";
                echo "</div>";
             } 
        }
        else{
            echo "No Product Available yet for this category";
        }
    ?>
    <!-- Video Banner -->

</div>
    <section class="video-banner">
      <video autoplay muted loop>
        <source src="../video/Video 2.mp4" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
      <div class="banner-content">
        <h1>ELEVATE YOUR STYLE</h1>
        <p>
          Discover our premium collection of clothing designed for the modern
          individual who values quality, comfort, and timeless elegance.
        </p>
        <a href="#" class="btn btn-primary">Explore Collection</a>
      </div>
    </section>

    <section class="clothing-banner">
      <div class="container-fluid">
        <div class="row">
          <!-- Side Navigation -->
          <div class="col-lg-2 col-md-3 px-0">
            <div class="side-nav">
              <h3>Collections</h3>
              <ul class="nav-list">
                <li>
                  <a href="#" class="nav-item active" data-category="formal"
                    >Formal Wear</a
                  >
                </li>
                <li>
                  <a href="#" class="nav-item" data-category="casual"
                    >Casual Collection</a
                  >
                </li>
                <li>
                  <a href="#" class="nav-item" data-category="evening"
                    >Evening Dresses</a
                  >
                </li>
                <li>
                  <a href="#" class="nav-item" data-category="accessories"
                    >Accessories</a
                  >
                </li>
                <li>
                  <a href="#" class="nav-item" data-category="summer"
                    >Summer Collection</a
                  >
                </li>
                <li>
                  <a href="#" class="nav-item" data-category="new"
                    >New Arrivals</a
                  >
                </li>
              </ul>
            </div>
          </div>

          <!-- Banner Content -->
          <div class="col-lg-10 col-md-9 px-0">
            <div class="banner-slider">
              <!-- Formal Wear Slide -->
              <div class="banner-slide active" id="formal">
                <div class="row h-100 align-items-center">
                  <div class="col-md-6 banner-text">
                    <h2>Elegant Formal Wear</h2>
                    <p>
                      Discover our premium collection of suits and formal attire
                      crafted for the modern gentleman. Perfect for business
                      meetings, weddings, and special occasions.
                    </p>
                    <a href="#" class="btn btn-primary">Shop Formal Wear</a>
                  </div>
                  <div class="col-md-6 banner-image">
                    <img
                      src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                      alt="Formal Wear"
                    />
                  </div>
                </div>
              </div>

              <!-- Casual Collection Slide -->
              <div class="banner-slide" id="casual">
                <div class="row h-100 align-items-center">
                  <div class="col-md-6 banner-text">
                    <h2>Casual Collection</h2>
                    <p>
                      Comfort meets style in our casual collection. From
                      everyday essentials to weekend wear, find pieces that
                      reflect your personal style.
                    </p>
                    <a href="#" class="btn btn-primary">Shop Casual Wear</a>
                  </div>
                  <div class="col-md-6 banner-image">
                    <img
                      src="https://images.unsplash.com/photo-1520006403909-838d6b92c22e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                      alt="Casual Collection"
                    />
                  </div>
                </div>
              </div>

              <!-- Evening Dresses Slide -->
              <div class="banner-slide" id="evening">
                <div class="row h-100 align-items-center">
                  <div class="col-md-6 banner-text">
                    <h2>Evening Dresses</h2>
                    <p>
                      Make a statement at any event with our elegant evening
                      dresses. From cocktail parties to formal galas, find the
                      perfect dress for your special night.
                    </p>
                    <a href="#" class="btn btn-primary">Shop Evening Dresses</a>
                  </div>
                  <div class="col-md-6 banner-image">
                    <img
                      src="https://images.unsplash.com/photo-1589810635657-232948472d98?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                      alt="Evening Dresses"
                    />
                  </div>
                </div>
              </div>

              <!-- Accessories Slide -->
              <div class="banner-slide" id="accessories">
                <div class='row h-100 align-items-center'>
                  <div class="col-md-6 banner-text">
                    <h2>Premium Accessories</h2>
                    <p>
                      Complete your look with our selection of premium
                      accessories. From belts and ties to watches and jewelry,
                      find the perfect finishing touches.
                    </p>
                    <a href="#" class="btn btn-primary">Shop Accessories</a>
                  </div>
                  <div class="col-md-6 banner-image">
                    <img
                      src="https://images.unsplash.com/photo-1556821840-3a63f95609a7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                      alt="Accessories"
                    />
                  </div>
                </div>
              </div>

              <!-- Summer Collection Slide -->
              <div class="banner-slide" id="summer">
                <div class="row h-100 align-items-center">
                  <div class="col-md-6 banner-text">
                    <h2>Summer Collection</h2>
                    <p>
                      Stay cool and stylish with our lightweight summer
                      collection. Featuring breathable fabrics and vibrant
                      colors perfect for warm weather.
                    </p>
                    <a href="#" class="btn btn-primary"
                      >Shop Summer Collection</a
                    >
                  </div>
                  <div class="col-md-6 banner-image">
                    <img
                      src="https://images.unsplash.com/photo-1556821840-3a63f95609a7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                      alt="Summer Collection"
                    />
                  </div>
                </div>
              </div>

              <!-- New Arrivals Slide -->
              <div class="banner-slide" id="new">
                <div class="row h-100 align-items-center">
                  <div class="col-md-6 banner-text">
                    <h2>New Arrivals</h2>
                    <p>
                      Discover the latest additions to our collection. Featuring
                      cutting-edge designs and premium materials for the
                      fashion-forward individual.
                    </p>
                    <a href="#" class="btn btn-primary">Shop New Arrivals</a>
                  </div>
                  <div class="col-md-6 banner-image">
                    <img
                      src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                      alt="New Arrivals"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Product Showcase -->
    <section class="product-showcase">
      <div class="container">
        <div class="showcase-header">
          <h2>Featured Collections</h2>
          <p>
            Explore our handpicked selection of premium clothing items that
            combine style, comfort, and durability.
          </p>
        </div>

        <div class="row">
          <!-- Category Navigation -->
          <div class="col-lg-3 mb-4">
            <div class="category-nav">
              <h3>Categories</h3>
              <ul class="category-list">
                <li><a href="#">Men's Clothing</a></li>
                <li><a href="#">Women's Clothing</a></li>
                <li><a href="#">Casual Wear</a></li>
                <li><a href="#">Formal Attire</a></li>
                <li><a href="#">Accessories</a></li>
                <li><a href="#">Seasonal Collection</a></li>
                <li><a href="#">New Arrivals</a></li>
                <li><a href="#">Sale Items</a></li>
              </ul>
            </div>
          </div>

          <!-- Product Cards -->
          <div class="col-lg-9">
            <div class="row">
              <div class="col-md-6 col-lg-4 mb-4">
                <div class="product-card">
                  <div class="product-img">
                    <img
                    src='https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80'
                    alt='Men's Formal Suit' />
                  </div>
                  <div class="product-info">
                    <h4>Classic Men's Suit</h4>
                    <p>Premium wool blend suit for formal occasions</p>
                    <div class="price">$299.99</div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4 mb-4">
                <div class="product-card">
                  <div class="product-img">
                    <img
                    src='https://images.unsplash.com/photo-1589810635657-232948472d98?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80'
                    alt='Women's Evening Dress' />
                  </div>
                  <div class="product-info">
                    <h4>Elegant Evening Dress</h4>
                    <p>Flowing silk dress perfect for special events</p>
                    <div class="price">$189.99</div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4 mb-4">
                <div class="product-card">
                  <div class="product-img">
                    <img
                      src="https://images.unsplash.com/photo-1520006403909-838d6b92c22e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                      alt="Casual Denim Jacket"
                    />
                  </div>
                  <div class="product-info">
                    <h4>Vintage Denim Jacket</h4>
                    <p>Classic denim jacket with a modern fit</p>
                    <div class="price">$79.99</div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4 mb-4">
                <div class="product-card">
                  <div class="product-img">
                    <img
                    src='https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80'
                    alt='Men's Casual Shirt' />
                  </div>
                  <div class="product-info">
                    <h4>Premium Cotton Shirt</h4>
                    <p>Comfortable everyday shirt in multiple colors</p>
                    <div class="price">$49.99</div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4 mb-4">
                <div class="product-card">
                  <div class="product-img">
                    <img
                    src='https://images.unsplash.com/photo-1520006403909-838d6b92c22e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80'
                    alt='Women's Summer Dress' />
                  </div>
                  <div class="product-info">
                    <h4>Summer Breeze Dress</h4>
                    <p>Lightweight floral dress perfect for warm days</p>
                    <div class="price">$69.99</div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4 mb-4">
                <div class="product-card">
                  <div class="product-img">
                    <img
                    src='https://images.unsplash.com/photo-1556821840-3a63f95609a7?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80'
                    alt='Men's Accessories' />
                  </div>
                  <div class="product-info">
                    <h4>Leather Accessory Set</h4>
                    <p>Premium belt and wallet combination</p>
                    <div class="price">$89.99</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Banner slider functionality
      document.addEventListener("DOMContentLoaded", function () {
        const navItems = document.querySelectorAll(".nav-item");
        const slides = document.querySelectorAll(".banner-slide");

        navItems.forEach((item) => {
          item.addEventListener("click", function (e) {
            e.preventDefault();

            // Remove active class from all nav items and slides
            navItems.forEach((nav) => nav.classList.remove("active"));
            slides.forEach((slide) => slide.classList.remove("active"));

            // Add active class to clicked nav item
            this.classList.add("active");

            // Show corresponding slide
            const category = this.getAttribute("data-category");
            document.getElementById(category).classList.add("active");
          });
        });
      });
    </script>
  </body>
</html>