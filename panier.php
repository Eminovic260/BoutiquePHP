<?php
session_start();
include('header.php');
include('my-functions.php');

$title = "Panier";
$description = "Découvrez votre commande !";
$keywords = "Liste, Prix, récapitulatif";

// vider panier
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['panier']);
    header('Location: panier.php');
    exit();
}

// ajout produit au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['quantity'])) {
    $productId = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    if (isset($_SESSION['panier'][$productId])) {
        $_SESSION['panier'][$productId] += $quantity;
    } else {
        $_SESSION['panier'][$productId] = $quantity;
    }

    header('Location: catalogue.php');
    exit();
}

// Récupérer les détails des produits dans le panier
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

// validation commande
if (isset($_POST['envoi_Commande']) && !empty($cartItems)) {
    $totalWeight = 0;
    $totalOrder = 0;

    foreach ($cartItems as $item) {
        $totalWeight += $item['product']['weight'] * $item['quantity'];
        $totalOrder += $item['line_total'];
    }

    $date = date('Y-m-d');
    $number = date('Ymd'); // Numéro unique commande
    $shippingCost = 3;        // Fixe ou calculé
    $carrierId = 1;           // À adapter
    $customerId = 1;          // À adapter (session ou autre)

    // Insérer commande
    $stmt = $mysqlClient->prepare("
        INSERT INTO orders (number, total, date, total_weight, shipping_cost, carrier_id, customer_id)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([$number, $totalOrder, $date, $totalWeight, $shippingCost, $carrierId, $customerId]);
    $orderId = $mysqlClient->lastInsertId();

    // Insérer produits commandés
    $stmtItem = $mysqlClient->prepare("
        INSERT INTO order_product (order_id, product_id, quantity, total_weight)
        VALUES (?, ?, ?, ?)
    ");

    foreach ($cartItems as $item) {
        $weight = $item['product']['weight'] * $item['quantity'];
        $stmtItem->execute([$orderId, $item['product']['id'], $item['quantity'], $weight]);
    }

    unset($_SESSION['panier']);
    header("Location: index.php?order_id=" . $orderId);
    exit();
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

    <?php if (!empty($cartItems)) : ?>
    <form method="post" action="panier.php" class="btnEnvoiCommande">
        <button type="submit" name="envoi_Commande">Valider la composition</button>
    </form>
    <?php endif; ?>
</main>

<?php include('footer.php'); ?>
</body>
