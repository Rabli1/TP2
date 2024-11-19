<?php
require 'models/items.php';
require 'src/database.php';

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_quantity']) && !empty($_POST['id']) && !empty($_POST['quantity'])) {
        $id = intval($_POST['id']);
        $quantity = intval($_POST['quantity']);

        $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($cartId) use ($id) {
            return $cartId !== $id; 
        });

        for ($i = 0; $i < $quantity; $i++) {
            $_SESSION['cart'][] = $id;
        }

        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    if (isset($_POST['remove_item']) && !empty($_POST['id'])) {
        $id = intval($_POST['id']);

        $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($cartId) use ($id) {
            return $cartId !== $id;
        });

        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }
}

$cartItems = [];
if (!empty($_SESSION['cart'])) {
    $quantities = array_count_values($_SESSION['cart']);

    foreach ($quantities as $id => $quantity) {
        $item = itemsGetById($pdo, $id);
        if ($item) {
            $item['quantity'] = $quantity; 
            $cartItems[] = $item;
        }
    }
}

$subTotal = array_reduce($cartItems, function ($carry, $item) {
    return $carry + $item['price'] * $item['quantity'];
}, 0);

require 'views/panier-achat.php';
