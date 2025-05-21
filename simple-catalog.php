<?php
// Définir les valeurs spécifiques pour la page d'accueil
$title = "Catalogue";
$description = "Découvrez nos produits!";
$keywords = "Liste, Prix, Image";
?>

<?php include('header.php'); ?>
<?php include('my-functions.php'); ?>




<main>

    <div>
        <h2>Produits :</h2>
    </div>



    <div class="container4">
        <?php foreach ($products as $product) : ?>
            <div class="pdt">
                <a href="<?= $product['link'] ?>">
                    <img src="<?= $product['pictureUrl'] ?>" class="imgI" alt="<?= $product['name'] ?>">
                </a>
                <h3><?= $product['name'] ?></h3>
                <p><?= "Prix TTC : " . formatPrice($product['price']) ?></p>
                <p><?= "Prix HT : " . formatPrice(priceExcludingVAT($product['price'])) ?></p>
                <p><?= "Poid : " . $product['weight'] . "Gr" ?></p>
                <p>
                    <?php if ($product['discount'] !== null) : ?>
                <p>Prix remisé TTC : <?= discountedPrice($product['price'], $product['discount']) ?></p>
                <p> <?= "Réduction avec le code 'Géraud' : " . $product['discount'] . "%" ?></p>
            <?php else: ?>
                <?= "Aucune réduction disponible" ?>
            <?php endif; ?>
            </p>
            </div>
        <?php endforeach; ?>
    </div>

</main>



<?php include('footer.php'); ?>
</body>