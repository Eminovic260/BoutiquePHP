<?php
session_start(); // Important pour utiliser $_SESSION

// Traitement de l'ajout au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['product_id'] ?? null;
    $quantity = intval($_POST['quantity'] ?? 1);

    if ($productId !== null && $quantity > 0) {
        // Initialiser le panier s'il n'existe pas
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Ajouter ou mettre à jour la quantité dans le panier
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = $quantity;
        }

        // Redirection vers soi-même ou une confirmation
        header("Location: panier.php"); 
        exit;
    }
}
?>
<?php
include('header.php');
include('my-functions.php');

$cart = $_SESSION['cart'] ?? [];
?>

<main>
    <h1>Votre panier</h1>

    <?php if (empty($cart)): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($cart as $productId => $quantity): ?>
                <?php $product = $products[$productId]; ?>
                <li>
                    <?= $product['name'] ?> — Quantité : <?= $quantity ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</main>

<?php include('footer.php'); ?>
