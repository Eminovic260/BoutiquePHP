<?php
$title = "Poisson Rouge";
include('my-functions.php');

$category = "Poisson Rouge";
$filteredProducts = array_filter($products, function ($product) use ($category) {
    return $product['category'] === $category;
});
?>



    <?php include('header.php'); ?>

    <h2>Produits : <?= $title ?></h2>

    <?php renderProducts($filteredProducts); ?>


    <?php include('footer.php'); ?>
</body>