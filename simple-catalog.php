<?php
// Définir les valeurs spécifiques pour la page d'accueil
$title = "Catalogue";
$description = "Découvrez nos produits!";
$keywords = "Liste, Prix, Image";
?>

<?php include('header.php'); ?>



<body style="background-color: #2e2e2e;">
    <main>
        <?php
        // $products = array("iPhone", "iPad", "iMac");
        // sort($products);
        // echo "<p>Premier produit : " . $products[0] . "</p>";
        //  echo "<p>Dernier produit : " . $products[count($products) - 1] . "</p>";
        ?>
        <?php include('multidimensional-catalog.php'); ?>
    </main>

    <?php include('footer.php'); ?>
</body>