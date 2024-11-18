<?php
require 'partials/head.php';
require 'partials/header.php';
?>
<?php if (isset($_COOKIE['remembered_email'])) {
    echo "Cookie value: " . $_COOKIE['remembered_email'];
} else {
    echo "No cookie found.";
}
?>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <button id="nav-toggle-button" class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarsMain" aria-controls="navbarsExample04" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsMain">
            <ul class="container nav navbar-nav justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-account" href="#" id="navbarDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?= htmlspecialchars($email) ?>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="?logout=1">
                                <span class="container mr-1"><i
                                        class="fa-solid fa-right-from-bracket fa-lg"></i></span>Déconnexion
                            </a>

                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="row admin">
    <h1>
        <strong>Liste des items</strong>
        <a href="items-add" class="btn btn-success btn-lg">
            <span class="bi-plus"></span> Ajouter
        </a>
    </h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($items)): ?>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['item_name']) ?></td>
                        <td><?= htmlspecialchars($item['description']) ?></td>
                        <td><?= number_format($item['price'], 2) ?></td>
                        <td><?= htmlspecialchars($item['category_name']) ?></td>
                        <td width=340>
                            <form action="/items-view" method="GET" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button type="submit" class="btn btn-secondary">
                                    <span class="bi-eye"></span> Voir
                                </button>
                            </form>
                            <form action="/items-edit" method="GET" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button type="submit" class="btn btn-primary">
                                    <span class="bi-pencil"></span> Modifier
                                </button>
                            </form>
                            <form action="/items-delete" method="POST" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button type="submit" class="btn btn-danger">
                                    <span class="bi-x"></span> Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Aucun item trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require 'partials/footer.php'; ?>