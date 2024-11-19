<?php
require 'partials/head.php';
require 'partials/header.php';
?>

<div class="row admin">
    <div class="col-md-6">
        <h1><strong>Supprimer un item</strong></h1>
        <br>
        <div>
            <label class="form-label">Nom:</label>
            <p><?= htmlspecialchars($name) ?></p>
        </div>
        <br>
        <div>
            <label class="form-label">Description:</label>
            <p><?= htmlspecialchars($description) ?></p>
        </div>
        <br>
        <div>
            <label class="form-label">Prix:</label>
            <p><?= htmlspecialchars($price) ?> $</p>
        </div>
        <br>
        <div>
            <label class="form-label">Catégorie:</label>
            <p><?= htmlspecialchars($categorie) ?></p>
        </div>
        <br>
        <div>
            <label class="form-label">Image:</label>
            <p><?= htmlspecialchars($image) ?></p>
        </div>
        <br>
        <p class="alert alert-danger">Êtes-vous sûr de vouloir supprimer cet item ? Cette action est irréversible.</p>
        <form method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
            <button type="submit" name="confirm_delete" value="yes" class="btn btn-danger">
                Oui, Supprimer
            </button>
            <button type="submit" name="confirm_delete" value="no" class="btn btn-secondary">
                Non, Retour
            </button>
        </form>
    </div>
    <div class="col-md-6 site">
        <div class="img-thumbnail">
            <img src="public/uploads/<?= htmlspecialchars($image) ?>" alt="photo de <?= htmlspecialchars($name) ?>">
            <div class="price"><?= htmlspecialchars($price) ?> $</div>
            <div class="caption">
                <h4><?= htmlspecialchars($name) ?></h4>
                <p><?= htmlspecialchars($description) ?></p>
                <a href="#" class="btn btn-order disabled add-to-cart" role="button">
                    <span class="bi-cart-fill"></span> Ajouter au panier
                </a>
            </div>
        </div>
    </div>
</div>

<?php require 'partials/footer.php'; ?>
