<?php
session_start();
?>

<?php
try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=my_app;charset=utf8', 'business', 'motdepasse');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>



<?php
function trierProduits(PDO $db, $categories_id): array
{
    if ($categories_id === null || $categories_id === 'tout') {
        $statement = $db->prepare('SELECT * FROM products');
        $statement->execute();
        return $statement->fetchAll();
    } elseif ($categories_id == 1 || $categories_id === 'coquillage') {
        $statement = $db->prepare('SELECT * FROM products WHERE categories_id = 1');
        $statement->execute();
        return $statement->fetchAll();
    } elseif ($categories_id == 2 || $categories_id === 'crustacé') {
        $statement = $db->prepare('SELECT * FROM products WHERE categories_id = 2');
        $statement->execute();
        return $statement->fetchAll();
    } elseif ($categories_id == 3 || $categories_id === 'traiteur') {
        $statement = $db->prepare('SELECT * FROM products WHERE categories_id = 3');
        $statement->execute();
        return $statement->fetchAll();
    } else {
        $statement = $db->prepare('SELECT * FROM products');
        $statement->execute();
        return $statement->fetchAll();
    }
}

?>

<?php
function afficherProduits(PDO $db): array
{
    $statement  = $db->prepare('SELECT * FROM products');
    $statement->execute();
    return $statement->fetchAll();
}
?>





<?php
function afficherCommande1(PDO $db): array
{
    $statement  = $db->prepare('SELECT p.name, op.quantity, p.price FROM order_product op JOIN products p on p.id = op.product_id WHERE op.order_id = 1');
    $statement->execute();
    return $statement->fetchAll();
}
?>


<?php
function trieCommande(PDO $db): array
{
    $statement  = $db->prepare('SELECT number, total FROM orders WHERE total BETWEEN 100 AND 550');
    $statement->execute();
    return $statement->fetchAll();
}
?>


<?php
function augmenterPrix(PDO $db): int
{
    $statement  = $db->prepare('UPDATE products SET price = price * 1.05 WHERE categories_id = 2');
    $statement->execute();
    return $statement->rowCount();
}
?>


<?php
function augmenterQtt(PDO $db): int
{
    $statement = $db->prepare("UPDATE products SET quantity = 100 WHERE name = 'homard'");
    $statement->execute();
    return $statement->rowCount();}
?>