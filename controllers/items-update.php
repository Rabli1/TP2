<?php
require 'src/database.php';
require 'models/items.php';
require 'models/category.php';

session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $_SESSION['selected_item_id'] = (int)$_POST['id'];
}

if (isset($_SESSION['selected_item_id'])) {
    $id = $_SESSION['selected_item_id'];
} else {
    die('Erreur : ID invalide.');
}

$item = itemsGetById($pdo, $id);
if (!$item) {
    die('Erreur : ID introuvable');
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
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $image = trim($_POST['image']);
    $idCategory = $_POST['category'];

    if (
        $item['name'] !== $name ||
        $item['description'] !== $description ||
        $item['price'] !== $price ||
        $item['image'] !== $image ||
        $item['idCategory'] !== $idCategory
    ) {
        if (!empty($name) && !empty($description) && !empty($price) && !empty($image) && !empty($idCategory)) {
            $updatedItem = [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'idCategory' => $idCategory,
            ];

            UpdateItem($pdo, $updatedItem);

            $message = 'Modification réussie.';
            $class = 'alert alert-success';
        } else {
            $message = 'Tous les champs doivent être remplis.';
            $class = 'alert alert-danger';
        }
    } else {
        $message = 'Aucune modification détectée.';
        $class = 'alert alert-warning';
    }
}

require 'views/items-update.php';
