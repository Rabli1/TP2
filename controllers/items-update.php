<?php
require 'src/database.php';
require 'models/items.php';
require 'models/category.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $_SESSION['selected_item_id'] = (int) $_POST['id'];
}

if (isset($_SESSION['selected_item_id'])) {
    $id = $_SESSION['selected_item_id'];
} else {
    die('ID invalide.');
}

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);
$item = itemsGetById($pdo, $id);
if (!$item) {
    die('Item inexistant.');
}

$categories = CategoryGetAll($pdo);

$name = $item['name'];
$description = $item['description'];
$price = $item['price'];
$image = $item['image'];
$idCategory = $item['idCategory'];

$message = '';
$class = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_item'])) {
    $name = trim($_POST['name']) ?? '';
    $description = trim($_POST['description']) ?? '';
    $price = trim($_POST['price']) ?? '';
    $image = trim($_POST['image']) ?? '';
    $idCategory = $_POST['category'] ?? '';

    if (
        $item['name'] != $name ||
        $item['description'] != $description ||
        $item['price'] != $price ||
        $item['image'] != $image ||
        $item['idCategory'] != $idCategory
    ) {
        if (!empty($name) && !empty($description) && !empty($price) && !empty($image)) {
            $itemModifie = [
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "image" => $image,
                "idCategory" => $idCategory,
                "id" => $id
            ];

            UpdateItem($pdo, $itemModifie);

            $class = 'alert alert-success';
            $message = 'Modification réussie.';

            unset($_SESSION['selected_item_id']);
        } else {
            $class = 'alert alert-danger';
            $message = 'Tous les champs doivent être remplis.';
        }
    } else {
        $class = 'alert alert-warning';
        $message = 'Aucune modification détectée.';
    }
}

require 'views/items-update.php';
