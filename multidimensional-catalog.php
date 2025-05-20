    <?php
    $products = [
        "Poisson" => [
            "name" => "Poisson Rouge",
            "price" => 100,
            "weight" => 30,
            "discount" => 10,
            "pictureUrl" => "images/Poisson.jpg",
        ],
        "Crevette" => [
            "name" => "Crevette",
            "price" => 200,
            "weight" => 10,
            "discount" => 10,
            "pictureUrl" => "images/Crevette.jpg",
        ],
        "Sardine" => [
            "name" => "Sardine",
            "price" => 300,
            "weight" => 200,
            "discount" => null,
            "pictureUrl" => "images/Sardine.jpg",
        ]
    ];
    ?>


    <div>
        <p>
        <h2>Produits :</h2>
        </p>
    </div>
<div class="container4">
    <div class="pdt">
        <a href="item.php"><img src="<?= $products["Poisson"]["pictureUrl"] ?>" class="imgI" alt="<?= $products["name"] ?>"></a>
        <h3><?= $products["Poisson"]["name"] ?></h3>
        <p><?= "Prix : " . $products["Poisson"]["price"] . "€" ?></p>
        <p><?= "Poid : " . $products["Poisson"]["weight"] . "Gr" ?></p>
        <p><?= "Réduction avec le code 'Géraud' : " . $products["Poisson"]["discount"] . "%" ?></p>
        
    </div>
    <div class="pdt">
        <a href="item2.php"><img src="<?= $products["Crevette"]["pictureUrl"] ?>" class="imgI" alt="<?= $products["name"] ?>"></a>
        <h3><?= $products["Crevette"]["name"] ?></h3>
        <p><?= "Prix : " . $products["Crevette"]["price"] . "€" ?></p>
        <p><?= "Poid : " . $products["Crevette"]["weight"] . "Gr" ?></p>
        <p><?= "Réduction avec le code 'Géraud' : " . $products["Crevette"]["discount"] . "%" ?></p>
    </div>
    <div class="pdt">
        <a href="item3.php"><img src="<?= $products["Sardine"]["pictureUrl"] ?>" class="imgI" alt="<?= $products["name"] ?>"></a>
        <h3><?= $products["Sardine"]["name"] ?></h3>
        <p><?= "Prix : " . $products["Sardine"]["price"] . "€" ?></p>
        <p><?= "Poid : " . $products["Sardine"]["weight"] . "Gr" ?></p>
        <p><?= "Réduction avec le code 'Géraud' : " . $products["Sardine"]["discount"] . "%" ?></p>
    </div>
    </div>