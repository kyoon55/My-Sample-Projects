<?php

    session_start();
    session_destroy();
    unset($_SESSION['email']);
    header('Location: login.php?status=0');
    exit;
?>