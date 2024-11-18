<?php
 function getItemsByCategory(PDO $pdo, int $categoryId): array {
        try {
            $stmt = $pdo->prepare('SELECT * FROM items WHERE idCategory = :idCategory');
            $stmt->bindValue(':idCategory', $categoryId, PDO::PARAM_INT);

            $stmt->execute();

            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($items)) {
                throw new Exception("Aucun item trouvé pour la catégorie ID $categoryId.", 404);
            }

            return $items;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des items : " . $e->getMessage(), (int) $e->getCode());
        }
    }


    function itemsGetById(PDO $pdo, int $id): ?array
    {
        $stmt = $pdo->prepare("SELECT * FROM items WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    

function UpdateItem(PDO $pdo,array $data ) : bool{
    
    try{
        $stm = $pdo->prepare('UPDATE items set name = :name, description = :description, price = :price, image = :image, idCategory = :idCategory WHERE id = :id');
        
        $stm->bindValue(":name", $data["name"], PDO::PARAM_STR);
        $stm->bindValue(":description", $data["description"], PDO::PARAM_STR);
        $stm->bindValue(":price", $data["price"], PDO::PARAM_STR);
        $stm->bindValue(":image", $data["image"], PDO::PARAM_STR);
        $stm->bindValue(":idCategory", $data["idCategory"], PDO::PARAM_STR);
        $stm->bindValue(":id", $data["id"], PDO::PARAM_STR);
        
        return $stm->execute();
        
    } catch (PDOException $e) {
                
        throw new PDOException($e->getMessage(), $e->getCode());

    }   
}

function DeleteItem(PDO $pdo,int $id ) : bool{
    
    try{
        $stm = $pdo->prepare('DELETE from items WHERE id = :id');
        
        $stm->bindValue(":id", $id, PDO::PARAM_INT);

        return $stm->execute();
        
    } catch (PDOException $e) {
                
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