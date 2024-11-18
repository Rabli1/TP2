<?php

require 'partials/head.php';
require 'partials/header.php';

?>

        <div class="row admin">
            <div class="col-md-6">
                <h1><strong>Voir un item</strong></h1>
                <br>
                <form method="POST">
                    <div>
                        Nom: <?=$name?>
                    </div>
                    <br>
                    <div>
                        Description: <?=$description?>
                    </div>
                    <br>
                    <div>
                        Prix: <?=$price?>
                    </div>
                    <br>
                    <div>
                        Catégorie: <?=$categorie?>
                    </div>
                   <br>
                    <div>
                        Image: <?=$image?>
                    </div>
                    <br>
                    <p class="alert alert-danger">Êtes-vous certain de vouloir supprimer cet item ?</p>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-danger" href="/items">Oui</button>
                        <a class="btn btn-secondary" href="/items">Non</a>
                    </div>
                </form>
            </div>
            <div class="col-md-6 site">
                <div class="img-thumbnail">
                    <img src=public/uploads/<?=$image?> alt="photo de <?=$name?>">
                    <div class="price"><?=$price?> $</div>
                    <div class="caption">
                    <h4><?=$name?></h4>
                    <p><?=$description?></p>
                    <a href="#" class="btn btn-order disabled add-to-cart" role="button"><span class="bi-cart-fill"></span> Ajouter au panier</a>
                </div>
            </div>
        </div>
    </div>

<?php require 'partials/footer.php' ?>