<?php
session_start();
require 'partials/head.php';
require 'partials/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    addToCart(); 
}
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : null;
?>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <button id="nav-toggle-button" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsMain" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsMain">
            <ul class="container nav nav-pills d-flex justify-content-center">
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $index => $category): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $index === 0 ? 'active' : '' ?>" data-bs-toggle="pill" href="#tab<?= $category['id'] ?>">
                                <?= htmlspecialchars($category['name']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li class="nav-item"><span class="nav-link">Aucune catégorie disponible</span></li>
                <?php endif; ?>
            </ul>                        
        </div>

        <!-- Boutons à droite -->
        <ul class="container nav navbar-nav justify-content-end">
            <!-- Bouton Connexion -->
            <li class="nav-item">
                <a class="nav-link nav-menu" href="login" title="Connexion">
                    <i class="fa-solid fa-right-to-bracket fa-lg"></i> Connexion
                </a>
            </li>
            <div class="cart-wrapper">
                <li class="nav-item">
                    <a class="nav-link nav-menu" href="panier" title="Panier d'achat">
                        <i class="fa-solid fa-cart-shopping fa-lg"></i> <!-- Icône du panier -->
                        <div class="cart-counter" id="cart-counter"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></div> <!-- Compteur -->
                    </a>
                </li> 
            </div>
        </ul>
    </div>
</nav>

<main>
    <?php if ($message): ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif; ?>
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    addToCart(); 
}
?>
<div class="tab-content">
    <?php if (!empty($categories)): ?>
        <?php foreach ($categories as $index => $category): ?>
            <div class="tab-pane <?= $index === 0 ? 'active' : '' ?>" id="tab<?= $category['id'] ?>" role="tabpanel">
                <div class="row">
                    <?php if (!empty($itemsByCategory[$category['id']])): ?>
                        <?php foreach ($itemsByCategory[$category['id']] as $item): ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="img-thumbnail">
                                    <img src="public/uploads/<?= htmlspecialchars($item['image']) ?>" class="img-fluid" alt="<?= htmlspecialchars($item['name']) ?>">
                                    <div class="price"><?= number_format($item['price'], 2) ?> $</div>
                                    <div class="caption">
                                        <h4><?= htmlspecialchars($item['name']) ?></h4>
                                        <p><?= htmlspecialchars($item['description']) ?></p>
                                        <!-- Formulaire pour ajouter au panier -->
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            <button type="submit" name="add_to_cart" class="btn btn-order">
                                                <span class="bi-cart-fill"></span> Ajouter au panier
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Aucun item disponible pour cette catégorie.</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucune catégorie disponible pour le moment.</p>
    <?php endif; ?>
</div>
</main>
<?php require 'partials/footer.php'; ?>