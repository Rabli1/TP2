<?php

require 'partials/head.php';
require 'partials/header.php';

?>

        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <button id="nav-toggle-button" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsMain" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsMain">          
                    <ul class="container nav navbar-nav justify-content-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-account" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                pascal@clg.qc.ca                    
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout-form-modal"><span class="container mr-1"><i class="fa-solid fa-right-from-bracket fa-lg"></i></span>Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>    

        <div class="row admin">
            <h1><strong>Liste des items   </strong><a href="#" class="btn btn-success btn-lg"><span class="bi-plus"></span> Ajouter</a></h1>
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
                    <tr>
                        <td>Maki de saumon</td>
                        <td>Saumon, concombre contenu dans une feuille d&#039;algue.</td>
                        <td>9.00</td>
                        <td>Makis</td>
                        <td width=340>
                            <form style="display: inline;">
                                <input type="hidden" name="id" value="4">
                                <button type="submit" class="btn btn-secondary"><span class="bi-eye"></span> Voir</button>
                            </form>
                            <form style="display: inline;">
                                <input type="hidden" name="id" value="4">
                                <button type="submit" class="btn btn-primary"><span class="bi-pencil"></span> Modifier</button>
                            </form>
                            <form style="display: inline;">
                                <input type="hidden" name="id" value="4">
                                <button type="submit" class="btn btn-danger"><span class="bi-x"></span> Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>Maki de saumon et thon</td>
                        <td>Saumon, thon, oeuf, tobiko (caviar) et riz contenu dans une feuille d&#039;algue.</td>
                        <td>10.90</td>
                        <td>Makis</td>
                        <td width=340>
                            <form style="display: inline;">
                                <input type="hidden" name="id" value="5">
                                <button type="submit" class="btn btn-secondary"><span class="bi-eye"></span> Voir</button>
                            </form>
                            <form style="display: inline;">
                                <input type="hidden" name="id" value="5">
                                <button type="submit" class="btn btn-primary"><span class="bi-pencil"></span> Modifier</button>
                            </form>
                            <form style="display: inline;">
                                <input type="hidden" name="id" value="5">
                                <button type="submit" class="btn btn-danger"><span class="bi-x"></span> Supprimer</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php require 'partials/footer.php' ?>
