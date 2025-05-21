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
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title><?= $title ?></title>
</head>





<header>
    <nav class="navbar navbar-expand-lg bg-black " data-bs-theme="dark">
        <div class="container-fluid">
            <img src="images/logo.png" alt="logo A.E.K" class="logo">
            <a class="navbar-brand">A.K.E</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="simple-catalog.php">Catalogue</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
</header>
<body style="background-color:rgb(46, 46, 46); color: white;">