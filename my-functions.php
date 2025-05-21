<?php include('multidimensional-catalog.php'); ?>


<?php
function formatPrice($prixCent) {
    $prixEuro = $prixCent / 100;
    return number_format($prixEuro, 2, ',', ' ') . ' €';
}

// 🧩 Nouvelle fonction pour afficher une liste de produits
function renderProducts(array $products) {
    ?>
    <div class="container4">
        <?php foreach ($products as $product): ?>
            <div class="pdt">
                <a href="<?= $product['link'] ?>">
                    <img src="<?= $product['pictureUrl'] ?>" class="imgI" alt="<?= $product['name'] ?>">
                </a>
                <h3><?= $product['name'] ?></h3>
                <p>Prix : <?= formatPrice($product['price']) ?></p>
                <p>Poids : <?= $product['weight'] ?> Gr</p>
                <p>
                    <?php if ($product['discount'] !== null): ?>
                        Réduction avec le code 'Géraud' : <?= $product['discount'] ?>%
                    <?php else: ?>
                        Aucune réduction disponible
                    <?php endif; ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
}
?>
