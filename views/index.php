

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
    <div class="container-fluid site">
        <header class="text-center my-3">
            <h1 class="text-logo"><span class="bi-shop"></span> Fast-food Sushi <span class="bi-shop"></span></h1> 
        </header>

        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <button id="nav-toggle-button" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsMain" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsMain">
                    <ul class="container nav nav-pills">
                        <li class='nav-item'><a class='nav-link active' data-bs-toggle='pill' href='#tab1'>Urumakis</a></li>
                        <li class='nav-item'><a class='nav-link ' data-bs-toggle='pill' href='#tab2'>Makis</a></li>
                        <li class='nav-item'><a class='nav-link ' data-bs-toggle='pill' href='#tab3'>Nigiris</a></li>
                        <li class='nav-item'><a class='nav-link ' data-bs-toggle='pill' href='#tab4'>Sashimis</a></li>
                        <li class='nav-item'><a class='nav-link ' data-bs-toggle='pill' href='#tab5'>Poké bols</a></li>
                    </ul>                        
                </div>
            </div>
            <ul class="container nav navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link nav-menu" data-bs-toggle="modal" data-bs-target="#login-form-modal" title="Connexion">
                        <i class="fa-solid fa-right-to-bracket fa-lg"></i>
                    </a>
                </li>
                <div class="cart-wrapper">
                    <li class="nav-item">
                        <a class="nav-link nav-menu" href="#" title="Panier d'achat">
                            <i class="fa-solid fa-cart-shopping fa-lg"></i> <!-- Icone du panier -->
                            <div class="cart-counter" id="cart-counter">0</div> <!-- Compteur du panier -->
                        </a>
                    </li> 
                </div>
            </ul>
        </nav>    

        <main>
            <div class="tab-content">
                <div class='tab-pane active' id='tab1' role='tabpanel'>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="public/uploads/uramaki_thon.jpg" class="img-fluid" alt="...">
                                <div class="price">8.90 $</div>
                                <div class="caption">
                                    <h4>Urumaki au thon</h4>
                                    <p>Thon et crème sure entourés d'une feuille d'algue et de riz vinaigré ainsi que de graines de sésame grillées.</p>
                                    <a href="#" class="btn btn-order add-to-cart" role="button" onclick="incrementCounter(1)"><span class="bi-cart-fill"></span> Ajouter au panier</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="public/uploads/urumaki_thon_goberge.jpg" class="img-fluid" alt="...">
                                <div class="price">6.50 $</div>
                                <div class="caption">
                                    <h4>Urumaki de thon et goberge</h4>
                                    <p>Thon et goberge ainsi que bâtonnets de concombre entouré d'une feuille d'algue et riz.  Pour terminer des graines de sésame grillées.</p>
                                    <a href="#" class="btn btn-order add-to-cart" role="button" onclick="incrementCounter(2)"><span class="bi-cart-fill"></span> Ajouter au panier</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="public/uploads/urumaki_saumon.jpg" class="img-fluid" alt="...">
                                <div class="price">10.00 $</div>
                                <div class="caption">
                                    <h4>Urumaki de saumon</h4>
                                    <p>Saumon et fromage à la crème entouré d'une feuille d'algue, de riz vinaigré, d'un peu de saumon et une sauce sucrée.</p>
                                    <a href="#" class="btn btn-order add-to-cart" role="button" onclick="incrementCounter(3)"><span class="bi-cart-fill"></span> Ajouter au panier</a>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class='tab-pane ' id='tab2' role='tabpanel'>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="public/uploads/maki_saumon.jpg" class="img-fluid" alt="...">
                                <div class="price">9.00 $</div>
                                <div class="caption">
                                    <h4>Maki de saumon</h4>
                                    <p>Saumon, concombre contenu dans une feuille d'algue.</p>
                                    <a href="#" class="btn btn-order add-to-cart" role="button" onclick="incrementCounter(4)"><span class="bi-cart-fill"></span> Ajouter au panier</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="public/uploads/maki_saumon_thon.webp" class="img-fluid" alt="...">
                                <div class="price">10.90 $</div>
                                <div class="caption">
                                    <h4>Maki de saumon et thon</h4>
                                    <p>Saumon, thon, oeuf, tobiko (caviar) et riz contenu dans une feuille d'algue.</p>
                                    <a href="#" class="btn btn-order add-to-cart" role="button" onclick="incrementCounter(5)"><span class="bi-cart-fill"></span> Ajouter au panier</a>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class='tab-pane ' id='tab3' role='tabpanel'>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="public/uploads/nigiri_saumon_1.jpg" class="img-fluid" alt="...">
                                <div class="price">9.70 $</div>
                                <div class="caption">
                                    <h4>Nigiri de saumon</h4>
                                    <p>Saumon crue sur une boule de riz.</p>
                                    <a href="#" class="btn btn-order add-to-cart" role="button" onclick="incrementCounter(6)"><span class="bi-cart-fill"></span> Ajouter au panier</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="public/uploads/nigiri_thon.jpg" class="img-fluid" alt="...">
                                <div class="price">11.40 $</div>
                                <div class="caption">
                                    <h4>Nigiri de thon</h4>
                                    <p>Thon crue sur une boule de riz surmonté de caviar.</p>
                                    <a href="#" class="btn btn-order add-to-cart" role="button" onclick="incrementCounter(7)"><span class="bi-cart-fill"></span> Ajouter au panier</a>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </main>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </div>
</body>

</html>
