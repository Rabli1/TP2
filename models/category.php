<?php
     function getAllCategories(PDO $pdo) {
        $stmt = $pdo->query('SELECT * FROM categories');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }



function CategoryGetById(PDO $pdo, int $id):array{

    try{
        $stm = $pdo->prepare('SELECT name FROM categories WHERE id=:id');

        $stm->bindValue(":id", $id, PDO::PARAM_INT);

        $stm->execute();

        return $stm->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $e){

        throw new PDOException($e->getMessage(), $e->getCode());

    }

}

function CategoryGetAll(PDO $pdo):array{

    try{
        $stm = $pdo->prepare('SELECT id,name FROM categories');

        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $e){

        throw new PDOException($e->getMessage(), $e->getCode());

    }

}

