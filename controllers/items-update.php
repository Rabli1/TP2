<?php

require 'src/database.php';
require 'models/items.php';
require 'models/category.php';
session_start();

$pdo = databaseGetPDO(CONFIGURATIONS['database'],DB_PARAMS);

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
    die('Erreur : Item inexistant.');
}

$categories = CategoryGetAll($pdo);

var_dump($item);

$name = $item['name'];
$description = $item['description'];
$price = $item['price'];
$image = $item['image']; 
$idCategory = $item['idCategory'];
$message = '';
$class = '';
var_dump($name);
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = trim(string: $_POST['name']) ?? '';
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