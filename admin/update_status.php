<?php
include "../connection/connectdb.php";
session_start();
if (!($_SESSION['login'] ?? false)) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['orderID'])) {
    $orderID = (int)$_POST['orderID'];
    $paymentStatus = (int)$_POST['paymentStatus'];
    $orderStatus = (int)$_POST['orderStatus'];
    $trackingStatus = (int)$_POST['trackingStatus'];
    $paymentValid = (int)$_POST['paymentValid'];

    $stmt = $conn->prepare("UPDATE orderr SET paymentStatus = ?, orderStatus = ?, trackingStatus = ?, paymentValid = ? WHERE orderID = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("iiiii", $paymentStatus, $orderStatus, $trackingStatus, $paymentValid, $orderID);
    
    if ($stmt->execute()) {
        header("Location: specific_order.php?orderID=$orderID&success=1");
    } else {
        header("Location: specific_order.php?orderID=$orderID&error=1");
    }
    $stmt->close();
}
$conn->close();
?>