<?php
// delete_photo.php
include "../connection/connectdb.php";
if (session_status() === PHP_SESSION_NONE) session_start();
include './logInCheck.php';

if (isset($_GET['id'])) {
    $photoID = (int)$_GET['id'];

    // 1. Get the photoName for file deletion
    $result = $conn->query("SELECT photoName FROM photo WHERE photoID = $photoID");
    if ($result && $photo = $result->fetch_assoc()) {
        $filename = $photo['photoName'];
        $filepath = "../image/$filename"; 

        // 2. Delete the file from the server's disk
        if (file_exists($filepath)) {
            unlink($filepath);
        }

        // 3. Delete the record from the database
        $conn->query("DELETE FROM photo WHERE photoID = $photoID");
        // Output a successful response for the AJAX call
        http_response_code(200); 
        echo "Photo deleted.";
    } else {
        http_response_code(404);
        echo "Photo not found.";
    }
} else {
    http_response_code(400);
    echo "Invalid ID.";
}
?>