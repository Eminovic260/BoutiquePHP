<?php
$title = "Crevette";
include('my-functions.php');

$category = "Crevette";
$filteredProducts = array_filter($products, function ($product) use ($category) {
    return $product['category'] === $category;
});
?>


    <?php include('header.php'); ?>

    <?php renderProducts($filteredProducts); ?>
    <?php include('footer.php'); ?>
</body>
