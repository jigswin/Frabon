<?php
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_type']);
    unset($_SESSION['picture']);
    header("Location: login");
?>