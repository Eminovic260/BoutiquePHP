<?php
// Définir les valeurs spécifiques pour la page d'accueil
$title = "Crevette";
$description = "Découvrez nos produits!";
$keywords = "Crevette, Prix, Image";
?>


<?php include('header.php'); ?>

<body style="background-color: #2e2e2e;">

    <main>
        <?php
        $Nom = "Crevette";
        $Prix = "20€";
        $URL = "images/Crevette.jpg";

        echo "Nom : <h2>$Nom</h2><br>";
        echo "Prix : $Prix<br>";
        echo "Image : <img src='$URL' alt='$Nom'>";
        ?>

    </main>
    <?php include('footer.php'); ?>
</body>

</html>