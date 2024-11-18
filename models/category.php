<?php
class Category {
    public static function getAllCategories(PDO $pdo) {
        $stmt = $pdo->query('SELECT * FROM categories');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
