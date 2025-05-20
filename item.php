<?php
// Définir les valeurs spécifiques pour la page d'accueil
$title = "Poisson Rouge";
$description = "Découvrez nos produits!";
$keywords = "Poisson, Prix, Image";
?>


<?php include('header.php'); ?>


<body style="background-color: #2e2e2e;">






    <main>
        <?php
        $Nom = "Rouge Poisson";
        $Prix = "10€";
        $URL = "images/Poisson.jpg";

        echo "Nom : <h2>$Nom</h2><br>";
        echo "Prix : $Prix<br>";
        echo "Image : <img src='$URL' alt='$Nom'>";
        ?>

    </main>
    <?php include('footer.php'); ?>




</body>