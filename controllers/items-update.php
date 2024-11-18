<?php

require 'src/database.php';
require 'models/items.php';
require 'models/category.php';
session_start();
$pdo = databaseGetPDO(CONFIGURATIONS['database'],DB_PARAMS);
$item = itemsGetById($pdo,1);
$categories = CategoryGetAll($pdo);

$id = 1;
$name = $item['name'];
$description = $item['description'];
$price = $item['price'];
$image = $item['image']; 
$idCategory = $item['idCategory'];

$message = '';
$class = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = trim($_POST['name']) ?? '';
    $description = trim($_POST['description']) ?? '';
    $price = trim($_POST['price']) ?? '';
    $image = trim($_POST['image']) ?? ''; // non nécessaire mais disponible si modification du html
    $idCategory = $_POST['category'] ?? '';
    $message = 'La modification doit prendre de nouvelles valeurs';
    $class = 'alert alert-danger';

    if($item['name'] != $name|| $item['description'] != $description || $item['price'] != $price || $item['image'] != $image || $item['idCategory'] != $idCategory){
        
        $message = 'Tous les champs doivent être remplis';
        $class = 'alert alert-danger';

        if(!empty($name) && !empty($description) && !empty($price) && !empty($image)){
            $itemModifie = [
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "image" => $image,
                "idCategory" => $idCategory,
                "id" => $id
            ];

            $class = 'alert alert-success';
            $message = 'modification réussi';
    
            UpdateItem($pdo,$itemModifie);

        } // vérifier que tous les champs soient remplis


    } // vérifier que au moins une donnée est différente de l'item de base


}

require 'views/items-update.php';