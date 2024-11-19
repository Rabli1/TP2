<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_logout'])) {
    session_destroy();
    header('Location: /');
    exit;
}

require 'views/logout-confirm.php';
