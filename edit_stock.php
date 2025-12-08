<?php 

include "../connection/connectdb.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include './layout/login_error_message.php';
$currentPage = "product.php";
include './logInCheck.php'; 

// Query to fetch all products for display
$query_products = "SELECT * FROM product ORDER BY productID DESC";
$result_products = $conn->query($query_products);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <?php include "./layout/header.php"; ?>
    <?php include "./layout/nav.php"; ?>
    <link rel="stylesheet" href="style.css"> <style>
        /* Product Specific Styles (Based on your Green Theme) */
        .page-header {
            background: linear-gradient(135deg, #004d00, #002600);
            color: white;
            padding: 20px 25px;
            margin: 0 0 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-add-product {
            background: rgba(255,255,255,0.15);
            border: none;
            color: white;
            padding: 8px 14px;
            border-radius: 0;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .btn-add-product:hover {
            background: rgba(255,255,255,0.25);
            transform: translateY(-1px);
        }

        .product-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        
        .product-table th, .product-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }

        .product-table thead th {
            background: #f8f9fa;
            color: #004d00;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .product-table tbody tr:hover {
            background-color: #f8fff8;
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .badge-preorder {
            background-color: #ffeb3b; /* Yellow */
            color: #333;
        }

        .badge-available {
            background-color: #e6f7e6; /* Light green */
            color: #004d00;
        }

        .main-content {
            /* Ensures main-content padding is applied */
            padding: 20px; 
        }

        /* --- Modal Backdrop for Add New Product (Similar to your other styles) --- */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1050; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.6); 
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 5% from the top and centered */
            padding: 30px;
            border: 1px solid #888;
            width: 90%; 
            max-width: 800px; /* Max width for the form */
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            border-radius: 0; /* Keep sharp edges */
        }
        
        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <?php
        $login = $_SESSION['login'] ?? false;
        if($login == true) {
            echo "<div class='main-content'>";

            echo "<div class='page-header'>";
            echo "<h1>Product Management</h1>";
            echo "<div class='header-actions'>";
            echo "<button id='openAddProductModal' class='btn-add-product'><i class='bi bi-plus'></i> Add New Product</button>";
            echo "</div>";
            echo "</div>";

            if ($result_products && $result_products->num_rows > 0) {
                echo "<table class='product-table'>";
                echo "<thead><tr><th>ID</th><th>Product Name</th><th>Price (MMK)</th><th>Discounted Price</th><th>Preorder</th><th>Actions</th></tr></thead>";
                echo "<tbody>";
                while ($row = $result_products->fetch_assoc()) {
                    $status_text = $row['preorder'] ? 'Preorder' : 'Available';
                    $status_class = $row['preorder'] ? 'badge-preorder' : 'badge-available';
                    
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['productID']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['productName']) . "</td>";
                    echo "<td>" . number_format($row['price']) . "</td>";
                    echo "<td>" . ($row['discountedPrice'] ? number_format($row['discountedPrice']) : '-') . "</td>";
                    echo "<td><span class='status-badge $status_class'>$status_text</span></td>";
                    echo "<td>";
                    echo "<a href='edit_product.php?productID=".$row['productID']."' class='btn-edit'>Edit</a>";
                    echo "<a href='delete_product.php?productID=".$row['productID']."' class='btn-delete'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<div class='no-items'>No products found. Click 'Add New Product' to create one.</div>";
            }

            echo "</div>"; // End main-content
            
            // Include the modal definition
            include "add_new_product_modal.php";

        }
    ?>
    <script>
        // Modal JavaScript Logic
        var modal = document.getElementById('addProductModal');
        var btn = document.getElementById('openAddProductModal');
        var span = document.getElementsByClassName("close-btn")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>