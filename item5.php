<?php
$title = "Sushi";
include('my-functions.php');

$category = "Sushi";
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