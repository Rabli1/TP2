<?php
require 'partials/head.php';
require 'partials/header.php';
?>

<div class="row admin">
    <div class="col-md-6">
        <h1><strong>Ajouter un item</strong></h1>
        <br>
        <form class="form" role="form" method="POST" enctype="multipart/form-data">
            <br>
            <div>
                <label class="form-label" for="name">Nom:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?= htmlspecialchars($name) ?>" required>
            </div>
            <br>
            <div>
                <label class="form-label" for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?= htmlspecialchars($description) ?>" required>
            </div>
            <br>
            <div>
                <label class="form-label" for="price">Prix: (en $)</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?= htmlspecialchars($price) ?>" required>
            </div>
            <br>
            <div>
                <label class="form-label" for="category">Catégorie:</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="">Sélectionnez une catégorie</option>
                    <?php foreach ($categories as $categorie): ?>
                        <option value="<?= $categorie['id'] ?>" <?= ($categorie['id'] == $idCategory) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($categorie['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <div>
                <label class="form-label" for="image">Image:</label>
                <input type="file" id="image" name="image" class="form-control" required>
            </div>
            <br>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">
                    <span class="bi-plus"></span> Ajouter
                </button>
                <a class="btn btn-primary" href="/items">
                    <span class="bi-arrow-left"></span> Retour
                </a>
            </div>
        </form>
    </div>
</div>

<?php if ($itemAdded): ?>
<script>
    alert('Item ajouté!');
</script>
<?php endif; ?>

<?php require 'partials/footer.php'; ?>
