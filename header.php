<?php
require_once 'database.php';
?>
<?php
// Définir des valeurs par défaut
$title = isset($title) ? $title : "Mon Site Web";  // Valeur par défaut pour le titre
$description = isset($description) ? $description : "Bienvenue sur notre site web.";  // Valeur par défaut pour la description
$keywords = isset($keywords) ? $keywords : "accueil, site web, produits";  // Valeur par défaut pour les mots-clés
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $keywords ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title><?= $title ?></title>
</head>

<body>



    <header>
        <nav class="navbar navbar-expand-lg bg-custom-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="image/logo.png" alt="Logo Maison Emin" class="logo me-2">
                    <div>
                        <div>Maison Emin</div>
                        <small class="text-white-50 fs-5">Salaison et Coquillage</small>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="catalogue.php">Catalogue</a></li>
                        <li class="nav-item"><a class="nav-link" href="panier.php">Panier</a></li>
                        <li class="nav-item"><a class="nav-link" href="commande.php">Commande</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>