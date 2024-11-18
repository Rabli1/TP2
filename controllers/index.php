<?php
require 'models/category.php';
require 'models/items.php';
require 'src/database.php';
$pdo = databaseGetPDO(CONFIGURATIONS['database'],DB_PARAMS);
$item = itemsGetById($pdo,1);
$categories = getAllCategories($pdo);

$itemsByCategory = [];
foreach ($categories as $category) {
    $itemsByCategory[$category['id']] = getItemsByCategory($pdo, $category['id']);
}

require 'views/index.php';