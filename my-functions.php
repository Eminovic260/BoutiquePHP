<?php
include('multidimensional-catalog.php');

function formatPrice($prixCent)
{
    $prixEuro = $prixCent / 100;
    return number_format($prixEuro, 2, ',', ' ') . ' €';
}

function priceExcludingVAT($priceCents, $vatRate = 5.5)
{
    $prixHT = ($priceCents * 100) / (100 + $vatRate);
    return $prixHT;
}

function discountedPrice($priceCents, $discountPercent)
{
    $discounted = $priceCents * (1 - ($discountPercent / 100));
    return formatPrice($discounted);
}

function renderProducts(array $products)
{
?>
    <div>
        <?php foreach ($products as $product): ?>
            <div class="fichepdt">
                <a href="<?= $product['link'] ?>">
                    <img src="<?= $product['pictureUrl'] ?>" class="imgFiche" alt="<?= $product['name'] ?>">
                </a>
                <div class="infopdt">
                    <h3><?= $product['name'] ?></h3>

                    <p>Prix TTC : <?= formatPrice($product['price']) ?></p>
                    <p>Prix HT : <?= formatPrice(priceExcludingVAT($product['price'])) ?></p>
                    <?php if ($product['discount'] !== null): ?>
                        <p>Prix remisé TTC : <?= discountedPrice($product['price'], $product['discount']) ?></p>
                        <p>Réduction avec le code 'Léa' : <?= $product['discount'] ?>%</p>
                    <?php else: ?>
                        <p>Aucune réduction disponible</p>
                    <?php endif; ?>

                    <p>Poids : <?= $product['weight'] ?> Gr</p>

                    <div class="btnFichePdt">
                        <form method="post" action="cart.php">
                            <label class="qtt" for="quantity_<?= $product['id'] ?>">Quantité :</label>
                            <input class="inputQuantity" type="number" name="quantity" id="quantity_<?= $product['id'] ?>" value="1" min="1">

                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <button class="ajoutPanierbtn" type="submit">Ajouter à la composition</button>
                        </form>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
<?php
}
?>