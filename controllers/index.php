<?php
session_start();
require 'models/category.php';
require 'models/items.php';
require 'src/database.php';

$pdo = databaseGetPDO(CONFIGURATIONS['database'],DB_PARAMS);
$item = itemsGetById(pdo: $pdo, id: 1);
$categories = getAllCategories($pdo);

$itemsByCategory = [];
foreach ($categories as $category) {
    $itemsByCategory[$category['id']] = getItemsByCategory($pdo, $category['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    addToCart();
}

$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : null;
require 'views/index.php';