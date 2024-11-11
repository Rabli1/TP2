
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
    <link rel="stylesheet" href="/public/css/styles.css">
</head>

<body>
    <div class="container-fluid ">

        <header class="text-center my-3">
            <h1 class="text-logo"><span class="bi-shop"></span> Fast-food Sushi <span class="bi-shop"></span></h1> 
        </header>

        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <button id="nav-toggle-button" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsMain" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsMain">
                    <ul class="container nav navbar-nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link nav-menu" href="/" title="Retour au menu"><span class="container mr-1"><i class="fa-solid fa-left-long fa-lg"></i></span>Retour au menu</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>    

        <div class="container-fluid row align-items-start">
            <div class="col-8"> <!-- Liste des items du panier -->
                <div class="container row admin">
                    <div class="row align-items-end">
                        <div class="col-11">
                            <h1><strong>Panier d'achats   </strong></h1>
                        </div>
                        <div class="col-1">
                            <h6>Prix unitaire</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-11">
                                <div class="container row">
                                    <div class="col-4 cart-detail-image">
                                        <img src="/public/uploads/uramaki_thon.jpg" alt="Image de l'article" class="cart-detail-image">
                                    </div>                        
                                    <div class="col-7 mt-4" cart-detail-text>
                                        <h4>Urumaki au thon</h4>
                                        <p>Thon et crème sure entourés d'une feuille d'algue et de riz vinaigré ainsi que de graines de sésame grillées.</p>

                                        <div class="d-inline-flex align-items-center">
                                            <form class="item-quantity-selected">
                                                <input type="hidden" class="item-id" name="idItem" value="1">
                                                <input type="hidden" class="item-unite-price" value="8.9">
                                                <div class="d-inline-flex align-items-center">
                                                    <label class="container mr-1" for="quantities">Quantité: </label>
                                                    <select class="form-select quantities">; 
                                                        <option selected value='1'>1</option>
                                                        <option  value='2'>2</option>
                                                        <option  value='3'>3</option>
                                                        <option  value='4'>4</option>
                                                        <option  value='5'>5</option>
                                                        <option  value='6'>6</option>
                                                        <option  value='7'>7</option>
                                                        <option  value='8'>8</option>
                                                        <option  value='9'>9</option>
                                                        <option  value='10'>10</option>
                                                    </select> 
                                                    <input class="btn btn-outline-secondary" type="submit" value="MAJ" />
                                                </div>
                                            </form>
                                            <form class="item-quantity-selected">
                                                <input type="hidden" class="item-id" name="idItem" value="1">
                                                <input type="hidden" class="item-unite-price" value="8.9">
                                                <div class="d-inline-flex align-items-center">
                                                    <input class="btn btn-outline-secondary" type="submit" value="Supprimer" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 mt-4">
                                <span id="item-unite-price-formatted-{$id}">8.90 $</span>
                            </div>                                
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-4"> <!-- Passer à la caisse -->
                <div class="row admin">
                    <h3>Résumé de la commande</h3>
                    <hr>
                    <input type="hidden" id="sub-total-amount" value="8.9">
                    <h4>Sous-total (<span id="sub-total-items-count">1</span> items): <strong><span id="sub-total-amount-formatted">8.90 $</span></strong></h4>
                    <a href="/checkout" id="cart-proceed-to-checkout" class="btn cart-proceed-to-checkout">Passer à la caisse</a>
                </div>
            </div>                    
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/public/js/cart/modified-quantities.js"></script>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
