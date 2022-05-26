<?php
session_start();
unset($_SESSION['IS_LOGIN']);
setcookie('id', '', time() + 60 * 60 * 24 * 365, '/');
header('location:../index.php');
die();
?>