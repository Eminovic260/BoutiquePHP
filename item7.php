<?php
$title = "Pince de Tourteau";
include('my-functions.php');

$category = "Pince de Tourteau";
$filteredProducts = array_filter($products, function ($product) use ($category) {
    return $product['category'] === $category;
});
?>



    <?php include('header.php'); ?>

<div class=container5>
    <?php renderProducts($filteredProducts); ?>
</div>

    <?php include('footer.php'); ?>
</body>