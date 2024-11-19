<?php

require 'partials/head.php';
require 'partials/header.php';

?>

<div class="row admin">
    <div class="col-md-6">
        <h1><strong>Modifier un item</strong></h1>
        <?php if (!empty($message)): ?>
            <p class="<?= htmlspecialchars($class) ?>"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <br>
        <form class="form" role="form" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">
    <br>
    <div>
        <label class="form-label" for="name">Nom:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?= htmlspecialchars($name) ?>">
    </div>
    <br>
    <div>
        <label class="form-label" for="description">Description:</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?= htmlspecialchars($description) ?>">
    </div>
    <br>
    <div>
        <label class="form-label" for="price">Prix: (en $)</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?= htmlspecialchars($price) ?>">
    </div>
    <br>
    <div>
        <label class="form-label" for="category">Catégorie:</label>
        <select class="form-control" id="category" name="category">
            <?php foreach ($categories as $categorie): ?>
                <option value="<?= $categorie['id'] ?>" <?= ($categorie['id'] == $idCategory) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($categorie['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <br>
    <div>
        <input type="hidden" id="image" name="image" value="<?= htmlspecialchars($image) ?>">
        <label class="form-label" for="imagePath">Image:</label>
        <p id="imagePath"><?= htmlspecialchars($image) ?></p>
    </div>
    <br>
    <div class="form-actions">
        <button type="submit" name="update_item" class="btn btn-success">
            <span class="bi-pencil"></span> Modifier
        </button>
        <a class="btn btn-primary" href="/items">
            <span class="bi-arrow-left"></span> Retour
        </a>
    </div>
</form>

    </div>
    <div class="col-md-6 site">
        <div class="img-thumbnail">
            <img src="public/uploads/<?= htmlspecialchars($image) ?>" alt="photo de <?= htmlspecialchars($name) ?>">
            <div class="price"><?= htmlspecialchars($price) ?> $</div>
            <div class="caption">
                <h4><?= htmlspecialchars($name) ?></h4>
                <p><?= htmlspecialchars($description) ?></p>
                <a href="#" class="btn btn-order disabled add-to-cart" role="button"><span class="bi-cart-fill"></span> Ajouter au panier</a>
            </div>
        </div>
    </div>
</div>

<?php require 'partials/footer.php'; ?>
