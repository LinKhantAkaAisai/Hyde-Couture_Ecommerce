<?php 
    include './layout/login_error_message.php';
    $currentPage = "active_order.php";
    include './logInCheck.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active Order</title>
    <?php include "./layout/header.php"; ?>
</head>
<body>
    <?php
        include "nav.php";
        if($login == true) {
            echo "<div class='main-content'>";
            echo "<h1>Active Order</h1>";
            echo "</div>";
        }
    ?>
</body>
</html>