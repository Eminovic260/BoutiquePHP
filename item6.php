<?php
$title = "Langoustine";
include('my-functions.php');

$category = "Langoustine";
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