<?php

const ROUTES = [
    '/' => 'index', // Fichier : controllers/index.php
    '/items-update' => 'items-update', // Fichier : controllers/items-update.php
    '/items-view' => 'items-view', // Fichier : controllers/items-view.php
    '/items-delete' => 'items-delete', // Fichier : controllers/items-delete.php
    '/items-add' => 'items-add', // Fichier : controllers/items-add.php
    '/items' => 'list-items', // Fichier : controllers/list-items.php
    '/panier' => 'panier-achat', // Fichier : controllers/panier-achat.php
    '/login' => 'login', // Fichier : controllers/login.php
    '/checkout' => 'checkout',  // Fichier : controllers/checkout.php
    '/logout' => 'logout-confirm', // Fichier : controllers/logout-confirm.php
];


const DB_PARAMS = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_CASE => PDO::CASE_NATURAL,
    PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING,        
];

define('CONFIGURATIONS', parse_ini_file("configurations.ini", true));