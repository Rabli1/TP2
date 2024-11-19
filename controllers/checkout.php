<?php
session_start();

if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['return_to_menu'])) {
    header('Location: /');
    exit;
}

require 'views/checkout.php';