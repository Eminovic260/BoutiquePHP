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
            "discount" => 70,
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
        <h2>Produits :</h2>
    </div>


    <div class="container4">
        <?php foreach ($products as $product) : ?>
            <div class="pdt">
                <a href="<?= $product['link'] ?>">
                    <img src="<?= $product['pictureUrl'] ?>" class="imgI" alt="<?= $product['name'] ?>">
                </a>
                <h3><?= $product['name'] ?></h3>
                <p><?= "Prix : " . $product['price'] . "€" ?></p>
                <p><?= "Poid : " . $product['weight'] . "Gr" ?></p>
                <p>
                    <?php if ($product['discount'] !== null) : ?>
                        <?= "Réduction avec le code 'Géraud' : " . $product['discount'] . "%" ?>
                    <?php else: ?>
                        <?= "Aucune réduction disponible" ?>
                    <?php endif; ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>