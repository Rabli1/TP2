<?php

require 'src/database.php';
require 'models/items.php';
require 'models/category.php';
require_once 'src/functions.php'; #Ne peut pas definir une des fonction deux fois, donc require_once
$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$categories = getAllCategories($pdo);

$name = '';
$description = '';
$price = '';
$image = '';
$idCategory = null;
$itemAdded = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = (float) $_POST['price'];
    $idCategory = (int) $_POST['category'];

    if ($name && $description && $price > 0 && $idCategory) {
        $uploadedImage = moveUploadedPicture('public/uploads/');
        if ($uploadedImage) {
            $image = $uploadedImage;
        }

        $newItem = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'image' => $image,
            'idCategory' => $idCategory,
        ];

        if (addItem($pdo, $newItem)) {
            $itemAdded = true;
            $name = $description = $price = $image = '';
            $idCategory = null;
        }
    }
}

require 'views/items-add.php';
