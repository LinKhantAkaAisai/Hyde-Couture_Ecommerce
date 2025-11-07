<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
        session_destroy();  // Destroy all session data
        header("Location: profile.php");  // Redirect after logout
        exit();
    } else {
        // If no, redirect back to profile or previous page
        header("Location: profile.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
    <?php include "./layout/header.php"; ?>
</head>
<body>
    <?php include "nav.php"; ?>
    
    <div class="main-content d-flex justify-content-center align-items-center flex-column vh-100">
        <h2>Are you sure you want to log out?</h2>
        <form method="POST" action="log_out.php" class="d-flex gap-3">
            <button type="submit" name="confirm" value="yes" class="btn btn-danger">Yes</button>
            <button type="submit" name="confirm" value="no" class="btn btn-secondary">No</button>
        </form>
    </div>
</body>
</html>