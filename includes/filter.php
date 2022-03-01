<?php
    @ob_start();
    if (! isset($_SESSION))
        session_start();
    if ($_SESSION['username'] == null || $_SESSION['user_type'] == null) {
        header("Location:login.php");
    }
    $username = $_SESSION['username'];
    $user_type = $_SESSION['user_type'];
?>