<?php
require_once 'src/database.php';
require_once 'src/functions.php';
$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (userLetThrough($pdo, $email, $password)) {
        session_start();
        header('Location: items');
        exit;
    } else {
        $error = 'Email ou mot de passe incorrect.';
    }
}

require 'views/login.php';
