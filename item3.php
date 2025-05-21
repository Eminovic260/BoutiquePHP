<?php
$title = "Sardine";
include('my-functions.php');

$category = "Sardine";
$filteredProducts = array_filter($products, function ($product) use ($category) {
    return $product['category'] === $category;
});
?>



    <?php include('header.php'); ?>
    <h2>Produits : <?= $title ?></h2>

    <?php renderProducts($filteredProducts); ?>
    <?php include('footer.php'); ?>
</body>
