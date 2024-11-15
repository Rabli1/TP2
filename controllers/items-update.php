<?php

require 'src/database.php';
require 'models/items.php';

$pdo = databaseGetPDO(CONFIGURATIONS['database'],DB_PARAMS);
$item = itemsGetById($pdo,1);
$categories = CategoryGetAll($pdo);

$id = $item['id'];
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
    $idCategory = $_POST['idCategory'] ?? '';
    $message = 'La modification doit prendre de nouvelle valeur';

    if($item['name'] != $name || $item['description'] != $description || $item['price'] != $price || $item['image'] != $image || $item['idCategory'] != $idCategory){
        
        $message = 'Tous les champs doivent être remplis';

        if(!empty($id) && !empty($name) && !empty($description) && !empty($price) && !empty($image) && !empty($idCategory)){
            $itemModifie = [
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "image" => $image,
                "idCategory" => $idCategory
            ];

            $message = '';
    
            //UpdateItem($pdo,$itemModifie);

        } // vérifier que tous les champs soient remplis


    } // vérifier que au moins une donnée est différente de l'item de base


}

require 'views/items-update.php';