<?php
require 'models/items.php';
require 'src/database.php';

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);
session_start();

// Initialiser le panier
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Traitement des actions du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mise à jour de la quantité
    if (isset($_POST['update_quantity']) && !empty($_POST['id']) && !empty($_POST['quantity'])) {
        $id = intval($_POST['id']);
        $quantity = intval($_POST['quantity']);

        // Mettre à jour les quantités dans la session
        $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($cartId) use ($id) {
            return $cartId !== $id; // Supprime tous les articles avec cet ID
        });

        // Ajouter la nouvelle quantité d'articles
        for ($i = 0; $i < $quantity; $i++) {
            $_SESSION['cart'][] = $id;
        }

        // Redirection pour éviter une nouvelle soumission
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    // Suppression d'un article
    if (isset($_POST['remove_item']) && !empty($_POST['id'])) {
        $id = intval($_POST['id']);

        // Supprimer tous les articles correspondant à l'ID
        $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($cartId) use ($id) {
            return $cartId !== $id;
        });

        // Redirection pour éviter une nouvelle soumission
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }
}

// Regrouper les articles du panier
$cartItems = [];
if (!empty($_SESSION['cart'])) {
    // Compter les quantités pour chaque ID
    $quantities = array_count_values($_SESSION['cart']);

    foreach ($quantities as $id => $quantity) {
        $item = itemsGetById($pdo, $id); // Récupérer les détails de l'article depuis la base de données
        if ($item) {
            $item['quantity'] = $quantity; // Ajouter la quantité calculée
            $cartItems[] = $item;
        }
    }
}

// Calculer le sous-total
$subTotal = array_reduce($cartItems, function ($carry, $item) {
    return $carry + $item['price'] * $item['quantity'];
}, 0);

// Charger la vue
require 'views/panier-achat.php';
