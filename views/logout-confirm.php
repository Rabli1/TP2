<?php
require 'partials/head.php';
require 'partials/header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Déconnexion</h5>
                    </div>
                    <div class="card-body text-center">
                        <p>Quitter la section 'administration' du site ?</p>
                        <form method="POST" action="">
                            <button type="submit" name="confirm_logout" class="btn btn-primary">Oui</button>
                            <a href="/items" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php require 'partials/footer.php'; ?>