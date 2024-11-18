<?php

require 'src/database.php';
require 'models/items.php';
require 'models/category.php';

$pdo = databaseGetPDO(CONFIGURATIONS['database'],DB_PARAMS);
$item = itemsGetById($pdo,1);

$name = '';
$description = '';
$price = '';
$image = ''; 
$idCategory = 1;
require 'views/items-add.php';