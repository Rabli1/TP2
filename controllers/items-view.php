<?php

require 'src/database.php';
require 'models/items.php';

$pdo = databaseGetPDO(CONFIGURATIONS['database'],DB_PARAMS);
$item = itemsGetById($pdo,1);

require 'views/items-view.php';