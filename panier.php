<?php
session_start();
include('header.php');
include('my-functions.php');

// Définir les valeurs spécifiques pour la page d'accueil
$title = "Panier";
$description = "Découvrez votre commande !";
$keywords = "Liste, Prix, récapitulatif";
?>

<?php

if (isset($_POST['clear_cart'])) {
    unset($_SESSION['panier']);
    header('Location: panier.php');
    exit();
}

// Ajouter produit au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['quantity'])) {
    $productId = (int) $_POST['product_id'];
    $quantity = (int) $_POST['quantity'];

    // Vérifie si le panier existe
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    // Si le produit est déjà dans le panier, on ajoute la quantité
    if (isset($_SESSION['panier'][$productId])) {
        $_SESSION['panier'][$productId] += $quantity;
    } else {
        $_SESSION['panier'][$productId] = $quantity;
    }

   
    header('Location: catalogue.php');
    exit();
}

// Récupération des détails produits depuis la base
$cartItems = [];
$total = 0;

if (!empty($_SESSION['panier'])) {
    $ids = array_keys($_SESSION['panier']);
    $placeholders = implode(',', array_fill(0, count($ids), '?'));

    $query = $mysqlClient->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
    $query->execute($ids);
    $products = $query->fetchAll();

    foreach ($products as $product) {
        $quantity = $_SESSION['panier'][$product['id']];
        $priceTTC = $product['price'];
        $lineTotal = $priceTTC * $quantity;
        $total += $lineTotal;

        $cartItems[] = [
            'product' => $product,
            'quantity' => $quantity,
            'line_total' => $lineTotal
        ];
    }
}
?>

<main>
    <h1 class='titrePanier'>Votre composition</h1>

    <?php if (empty($cartItems)) : ?>
        <p>Votre panier est vide.</p>
    <?php else : ?>
        <table class="tabPanier">
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire TTC</th>
                <th>Total</th>
            </tr>
            <?php foreach ($cartItems as $item) : ?>
                <tr>
                    <td><?= htmlspecialchars($item['product']['name']) ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= formatPrice($item['product']['price']) ?></td>
                    <td><?= formatPrice($item['line_total']) ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Total général</strong></td>
                <td><strong><?= formatPrice($total) ?></strong></td>
            </tr>
        </table>
    <?php endif; ?>

    <form method="post" action="panier.php" class="btnSupPanier">
        <button type="submit" name="clear_cart">Vider la composition</button>
    </form>



</main>
<?php include('footer.php'); ?>
</body>