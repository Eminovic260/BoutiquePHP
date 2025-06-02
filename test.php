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




     <?php
        // $products = array("iPhone", "iPad", "iMac");
        // sort($products);
        // echo "<p>Premier produit : " . $products[0] . "</p>";
        //  echo "<p>Dernier produit : " . $products[count($products) - 1] . "</p>";
        ?>


