
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast-food Sushi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/44720d3ccc.js" crossorigin="anonymous"></script>  
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+CA:wght@100..400&family=Playwrite+MX:wght@100..400&family=Playwrite+US+Trad:wght@100..400&display=swap" rel="stylesheet">        
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
    <div class="container-fluid ">
        <header class="text-center my-3">
            <h1 class="text-logo"><span class="bi-shop"></span> Fast-food Sushi <span class="bi-shop"></span></h1> 
        </header>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
