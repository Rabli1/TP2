<?php

function itemsGetById(PDO $pdo, int $id):array{

    try{
        $stm = $pdo->prepare('SELECT name,description,price,image,idCategory FROM items WHERE id=:id');

        $stm->bindValue(":id", $id, PDO::PARAM_INT);

        $stm->execute();

        return $stm->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $e){

        throw new PDOException($e->getMessage(), $e->getCode());

    }

}

function UpdateItem(PDO $pdo,array $data ) : bool{
    
    try{
        $stm = $pdo->prepare('UPDATE items set name = :name, description = :description, price = :price, image = :image, idCategory = :idCategory WHERE id = :id');
        
        $stm->bindValue(":name", $data["name"], PDO::PARAM_STR);
        $stm->bindValue(":description", $data["description"], PDO::PARAM_STR);
        $stm->bindValue(":price", $data["price"], PDO::PARAM_STR);
        $stm->bindValue(":image", $data["image"], PDO::PARAM_STR);
        $stm->bindValue(":idCategory", $data["idCategory"], PDO::PARAM_STR);
        $stm->bindValue(":id", $data["id"], AM_STR);
        
        return $stm->execute();
        PDO::PAR
    } catch (PDOException $e) {
                
        throw new PDOException($e->getMessage(), $e->getCode());

    }   
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


/*function servicePictureGetAll(PDO $pdo)
{
    
    $sql = 'call get_all_pictures';

    try{
        $stm = $pdo->prepare($sql);

        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {

        throw new PDOException($e->getMessage(), $e->getCode());
        
    }   

}
CREATE TABLE IF NOT EXISTS `categories` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `items` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `description` varchar(255) NOT NULL,
    `price` float NOT NULL,
    `image` varchar(255) NOT NULL,
    `idCategory` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `IDCategory` (`idCategory`)
  ) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;*/