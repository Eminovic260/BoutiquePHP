<?php
$title = "iPhone";
$description = "catalog-with-keys.php";
$keywords = "Liste, Prix, Image";
?>


<?php
$iphone = [
    "name" => "iPhone",
    "price" => 45000,
    "weight" => 200,
    "discount" => 10,
    "picture_url" => "images/iPhone.jpg",
];
?>

<div class="container py-4">
    <img src="<?= $iphone["picture_url"] ?>" class="imgIphone" alt="<?= $iphone["name"] ?>">
    <div>
        <p>
        <h2>Caractéristiques :</h2>
        </p>
        <h3><?= $iphone["name"] ?></h3>
        <p><?= "Prix : " . $iphone["price"] . "€" ?></p>
        <p><?= "Poid : " . $iphone["weight"] . "Gr" ?></p>
        <p><?= "Réduction avec le code 'Géraud' : " . $iphone["discount"] . "%" ?></p>
    </div>
</div>


</main>