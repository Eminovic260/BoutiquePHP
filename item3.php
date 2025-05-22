<?php
$title = "Bulot";
include('my-functions.php');

$category = "Bulot";
$filteredProducts = array_filter($products, function ($product) use ($category) {
    return $product['category'] === $category;
});
?>



    <?php include('header.php'); ?>

    <?php renderProducts($filteredProducts); ?>
    <?php include('footer.php'); ?>
</body>
