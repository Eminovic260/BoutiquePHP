<?php
// Définir les valeurs spécifiques pour la page d'accueil
$title = "Catalogue";
$description = "Découvrez nos produits!";
$keywords = "Liste, Prix, Image";
?>

<?php include('header.php'); ?>
<?php include('my-functions.php'); ?>




<main>

    <div class="banner1">
        <h1 class="titreAcceuil">COMPOSITION DE PLATEAU ET TRAITEUR</h1>
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

                <?php if ($product['discount'] !== null) : ?>
                    <p>Prix remisé TTC : <?= discountedPrice($product['price'], $product['discount']) ?></p>
                    <p> <?= "Réduction avec le code 'Géraud' : " . $product['discount'] . "%" ?></p>
                <?php else: ?>
                    <p><?= "Aucune réduction disponible" ?></p>
                <?php endif; ?>

                <form method="post" action="panier.php">
                    <label class="qtt" for="quantity_<?= $product['id'] ?>">Quantité :</label>
                    <input class="inputQuantity" type="number" name="quantity" id="quantity_<?= $product['id'] ?>" value="1" min="1">

                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <button class="ajoutPanierbtn" type="submit">Ajouter à la composition</button>
                </form>

            </div>
        <?php endforeach; ?>
    </div>
</main>



<?php include('footer.php'); ?>
</body>