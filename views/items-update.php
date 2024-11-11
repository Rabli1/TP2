<?php

require 'partials/head.php';
require 'partials/header.php';

?>

        <div class="row admin">
            <div class="col-md-6">
                <h1><strong>Modifier un item</strong></h1>
                <br>
                <form class="form" role="form">
                    <input type="hidden" name="id" value="4">
                    <br>
                    <div>
                        <label class="form-label" for="name">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="Maki de saumon">
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="Saumon, concombre contenu dans une feuille d&#039;algue.">
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="price">Prix: (en $)</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value=9>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="category">Catégorie:</label>
                        <select class="form-control" id="category" name="category">
                            <option value='1' >Urumakis</option>
                            <option value='2' >Makis</option>
                            <option value='3' >Nigiris</option>
                            <option value='4' >Sashimis</option>
                            <option value='5' >Poké bols</option>
                        </select>
                    </div>
                   <br>
                    <div>
                        <input type="hidden" id="image" name="image" value=maki_saumon.jpg>
                        <label class="form-label" for="imagePath">Image:</label>
                        <p id="imagePath">maki_saumon.jpg</p>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="bi-pencil"></span> Modifier</button>
                        <a class="btn btn-primary" href="/items"><span class="bi-arrow-left"></span> Retour</a>
                    </div>
                </form>
            </div>
            <div class="col-md-6 site">
                <div class="img-thumbnail">
                    <img src=public/uploads/maki_saumon.jpg alt="...">
                    <div class="price">9.00 $</div>
                    <div class="caption">
                    <h4>Maki de saumon</h4>
                    <p>Saumon, concombre contenu dans une feuille d&#039;algue.</p>
                    <a href="#" class="btn btn-order disabled add-to-cart" role="button"><span class="bi-cart-fill"></span> Ajouter au panier</a>
                </div>
            </div>
        </div>
    </div>

<?php require 'partials/footer.php' ?>