<?php
// Définir les valeurs spécifiques pour la page d'accueil
$title = "Commande";
$description = "Retrouvez vos commandes";
$keywords = "commandes, produits, livraison";
?>



<?php include('header.php'); ?>
<?php include('my-functions.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['augmenter_prix'])) {
    $affectedRows = augmenterPrix($mysqlClient);
    echo "<p>Prix augmentés pour $affectedRows produit de la catégorie Crustacés</p>";
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['augmenter_quantité'])) {
    $affectedRows = augmenterQtt($mysqlClient);
    echo "<p>Quantité mise à jour du $nb produit 'homard'</p>";
}
?>

<main>
    <h1>Commande n°1</h1>

    <?php
    $orders = afficherCommande1($mysqlClient);
    ?>
    <?php if (empty($orders)): ?>
        <p>Aucune commande trouvée.</p>
    <?php else: ?>
        <?php foreach ($orders as $order): ?>
            <div class="orderItem">
                <h3><?= htmlspecialchars($order['name']) ?></h3>
                <p>Quantité : <?= $order['quantity'] ?></p>
                <p>Prix unitaire : <?= formatPrice($order['price']) ?></p>
                <p>Total : <?= formatPrice($order['price'] * $order['quantity']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <hr>


    <?php
    $orders = trieCommande($mysqlClient);
    ?>
    <?php if (empty($orders)): ?>
        <p>Aucune commande trouvée</p>
    <?php else: ?>
        <h1>Commandes entre 1€ et 5.5€</h1>
        <?php foreach ($orders as $order): ?>
            <div class="orderItem">
                <h3><?= htmlspecialchars($order['number']) ?></h3>
                <p>Total : <?= formatPrice($order['total']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>



    <hr>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <button type="submit" name="augmenter_prix">Augmenter les prix de 5% (Catégorie Crustacés)</button>
    </form>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <button type="submit" name="augmenter_quantité">Remettre la quantité de Homard à 100</button>
    </form>




</main>

<?php include('footer.php'); ?>