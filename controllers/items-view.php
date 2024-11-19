<?php
require 'src/database.php';
require 'models/items.php';
require 'models/category.php';

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

    require 'views/items-view.php';
} else {
    die('Erreur : Requête invalide.');
}
