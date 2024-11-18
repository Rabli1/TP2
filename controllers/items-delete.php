<?php

require 'src/database.php';
require 'models/items.php';
require 'models/category.php';

$pdo = databaseGetPDO(CONFIGURATIONS['database'],DB_PARAMS);
$item = itemsGetById($pdo,2);

$id = 2;
$name = $item['name'];
$description = $item['description'];
$price = $item['price'];
$categorie = CategoryGetById($pdo,$item['idCategory'])['name'];
$image = $item['image']; 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    DeleteItem($pdo,1);
    header('Location: /items');
}

require 'views/items-delete.php';