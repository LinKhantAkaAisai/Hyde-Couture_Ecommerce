<?php
    $accountID = isset($_GET['accountID']) ? intval($_GET['accountID']) : 0;
    $login = isset($_GET['login']) ? $_GET['login'] : false;
    if (is_null($accountID) || $accountID <= 0) {
        include './log_in_modal.php';
    }
?>
       