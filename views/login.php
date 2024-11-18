<?php require 'partials/head.php'; ?>
<?php require 'partials/header.php'; ?>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <button id="nav-toggle-button" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsMain" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsMain">
            <ul class="container nav nav-pills d-flex justify-content-center">
                <li class="nav-item"><a class="nav-link" href="/">Accueil</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="container mt-5">
         <?php
        require_once 'src/functions.php';

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (userLetThrough($pdo, $email, $password)) {
                header('Location: items.php');
                exit;
            } else {
                $error = 'Email ou mot de passe incorrect.';
            }
        }
        ?> 

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="" class="mt-4">
            <div class="mb-3">
                <label for="email" class="form-label">Adresse courriel</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <div class="mb-3">
                <label for="Remember" class="form-label">Se souvenir de moi</label>
                
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Se connecter</button>
        </form>
    </div>
</main>
<?php require 'partials/footer.php'; ?>
