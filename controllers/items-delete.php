<?php
require 'src/database.php';
require 'models/items.php';
require 'models/category.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);
    $item = itemsGetById($pdo, $id);
    if (!$item) {
        die('Erreur : Item inexistant.');
    }

        $name = $item['name'];
    $description = $item['description'];
    $price = $item['price'];
    $image = $item['image'];
    $categorie = CategoryGetById($pdo, $item['idCategory'])['name'];

    if (isset($_POST['confirm_delete']) && $_POST['confirm_delete'] === 'yes') {
        DeleteItem($pdo, $id);
        header('Location: /items');
        exit;
    } elseif (isset($_POST['confirm_delete']) && $_POST['confirm_delete'] === 'no') {
        header('Location: /items');
        exit;
    }
} else {
    die('Erreur : Requête invalide.');
}

require "views/items-delete.php";
