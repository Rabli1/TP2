<?php

require 'src/database.php';
require 'models/items.php';

$pdo = databaseGetPDO(CONFIGURATIONS['database'],DB_PARAMS);
$item = itemsGetById($pdo,1);
$categories = CategoryGetAll($pdo);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $item['id'];
    $name = trim($_POST['name'] ?? '');
    $description = $_POST['description'] ?? '';
    $price = trim($_POST['price'] ?? '');
    $image = trim($_POST['image'] ?? ''); // non nécessaire mais disponible si modification du html
    $idCategory = trim($_POST['idCategory'] ?? '');

    $item['name'] // vérifier que au moins une donnée est différente de l'item de base

    if(!empty($id) && !empty($name) && !empty($description) && !empty($price) && !empty($image) && !empty($idCategory)){
        $itemModifie = [
            "name" => $name,
            "description" => $description,
            "price" => $price,
            "image" => $image,
            "idCategory" => $idCategory
        ];

        UpdateItem($pdo,$itemModifie);
    }
}

require 'views/items-update.php';