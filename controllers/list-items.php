<?php

require 'src/database.php';
$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);
session_start();
$email = $_SESSION['email'];
if (!isset($email)) {
    session_destroy();
    header('Location: /'); //Check si le email de la session est set, sinon rapporte l'index. Bloque d'accéder à la partie admin par l'url (sans se connecter)
}

if (isset($_GET['logout'])) {

    header('Location: /logout-confirm');
    exit;
}

if (!isset($pdo)) {
    die('Erreur : La connexion à la base de données est mal configurée.');
}

try {
    $query = $pdo->query("
        SELECT 
            items.id, 
            items.name AS item_name, 
            items.description, 
            items.price, 
            categories.name AS category_name
        FROM items
        JOIN categories ON items.idCategory = categories.id
    ");

    $items = $query->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die('Erreur de récupération des items : ' . $e->getMessage());
}

require_once 'views/list-items.php';
