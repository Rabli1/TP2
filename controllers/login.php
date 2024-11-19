<?php
require 'src/database.php';
require_once 'src/functions.php';

$pdo = databaseGetPDO(CONFIGURATIONS['database'], DB_PARAMS);

$emailFromCookie = $_COOKIE['email'] ?? '';
$rememberMeChecked = isset($_COOKIE['remember_me']) && $_COOKIE['remember_me'] === '1';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $rememberMe = isset($_POST['remember_me']) ? '1' : '0';

    if ($rememberMe === '1') {
        $expire = new DateTime("+3 months");
        setcookie("email", $email, $expire->getTimestamp(), "/", "", isset($_SERVER['HTTPS']), true);
        setcookie("remember_me", $rememberMe, $expire->getTimestamp(), "/", "", isset($_SERVER['HTTPS']), true);
    } else {
        setcookie("email", "", time() - 1, "/"); //Cookie mis à un temps passé pour le supprimer
        setcookie("remember_me", "", time() - 1, "/");
    }

    if (userLetThrough($pdo, $email, $password)) {
        session_start();
        header('Location: items');
        exit;
    } else {
        $error = 'Email ou mot de passe incorrect.';
    }
}

require 'views/login.php';
