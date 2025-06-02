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
function afficherProduits(PDO $db): array
{
$statement  = $db -> prepare ('SELECT * FROM products');
$statement -> execute();
return $statement -> fetchAll();
}
?>