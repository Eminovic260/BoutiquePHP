<?php
$title = "Saumon Fumé";
include('my-functions.php');

$category = "Saumon";
$filteredProducts = array_filter($products, function ($product) use ($category) {
    return $product['category'] === $category;
});
?>



    <?php include('header.php'); ?>

    <?php renderProducts($filteredProducts); ?>
    <?php include('footer.php'); ?>
</body>