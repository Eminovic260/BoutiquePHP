<?php
session_start();
include('multidimensional-catalog.php');
include('my-functions.php');

// Vider le panier si demandé
if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = [];
    header('Location: cart.php?cleared=1');
    exit();
}

// Initialiser le panier s’il n’existe pas
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Traitement du formulaire d’ajout
if (isset($_POST['product_id'], $_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $quantity = max(1, intval($_POST['quantity']));

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }
}

// Fonction pour retrouver un produit par son ID
function findProductById($id, $products)
{
    foreach ($products as $product) {
        if ($product['id'] == $id) return $product;
    }
    return null;
}
?>

<?php include('header.php'); ?>

<main>

    <h1 class="titrePanier">Votre composition</h1>

    <?php if (empty($_SESSION['cart'])): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>
        <table class="tabPanier">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire TTC</th>
                    <th>Prix TTC</th>
                    <th>TVA (5.5%)</th>
                    <th>Poid (Gr)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalTTC = 0;
                $totalTVA = 0;
                $totalPoids = 0;

                foreach ($_SESSION['cart'] as $productId => $quantity):
                    $product = findProductById($productId, $products);
                    if (!$product) continue;

                    $prixUnitaireTTC = $product['price'];
                    $totalProduitTTC = $prixUnitaireTTC * $quantity;
                    $tvaProduit = $totalProduitTTC - priceExcludingVAT($totalProduitTTC);
                    $poidPdt = $product['weight'] * $quantity;
                    $totalPoids += $poidPdt;

                    $totalTTC += $totalProduitTTC;
                    $totalTVA += $tvaProduit;
                ?>
                    <tr>
                        <td><?= $product['name'] ?></td>
                        <td><?= $quantity ?></td>
                        <td><?= formatPrice($prixUnitaireTTC) ?></td>
                        <td><?= formatPrice($totalProduitTTC) ?></td>
                        <td><?= formatPrice($tvaProduit) ?></td>
                        <td><?= $poidPdt ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <table class="tabPanier1">
            <tr>
                <th colspan="3">Total TTC</th>
                <td colspan="2"><?= formatPrice($totalTTC) ?></td>
            </tr>
            <tr>
                <th colspan="3">Total TVA</th>
                <td colspan="2"><?= formatPrice($totalTVA) ?></td>
            </tr>
            <tr>
                <th colspan="3">Poids Total</th>
                <td colspan="2"><?= $totalPoids ?></td>
            </tr>
        </table>
    <?php endif; ?>

    <form method="post" action="cart.php" class="btnSupPanier">
        <button type="submit" name="clear_cart" onclick="return confirm('Voulez-vous vraiment vider le panier ?');">
            Vider le panier
        </button>
    </form>

</main>

<?php include('footer.php'); ?>