<?php
session_start();

    $_SESSION['user_type'] = "";
    $_SESSION['unique_id'] = "";
    $_SESSION['login'] = false;

    unset($_SESSION['user_type']);
    unset($_SESSION['unique_id']);
    unset($_SESSION['login']);

    header("Location: login.php");

?>