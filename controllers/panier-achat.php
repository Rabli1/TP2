<?php
session_start();
require_once 'src/database.php';
require_once 'src/functions.php';

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : null;

$categories = [];
$itemsByCategory = [];

try {
    $categoriesQuery = $pdo->query("SELECT * FROM categories");
    $categories = $categoriesQuery->fetchAll(PDO::FETCH_ASSOC);

    foreach ($categories as $category) {
        $stmt = $pdo->prepare("SELECT * FROM items WHERE idCategory = :idCategory");
        $stmt->execute(['idCategory' => $category['id']]);
        $itemsByCategory[$category['id']] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

require 'views/panier-achat.php';