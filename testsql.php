<?php
require_once 'config/databaseconnect.php';

$sqlQuery = 'SELECT * FROM products';
$productsStatement = $mysqlClient->prepare($sqlQuery);
$productsStatement->execute();
$products = $productsStatement->fetchAll();
?>

<h1>Liste des produits</h1>
<ul>
<?php foreach ($products as $product): ?>
    <li>
        <?= htmlspecialchars($product['name']) ?> - <?= $product['price'] ?> €
    </li>
<?php endforeach; ?>
</ul>
