<?php

session_start();

if (isset($_SESSION['show_alert']) && isset($_SESSION['alert'])) {
    $msg = addslashes($_SESSION['alert']);
    echo "<script>alert('$msg');</script>";
    ($_SESSION['alert']);
    unset($_SESSION['show_alert']);
}

?>