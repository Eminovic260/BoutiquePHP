<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>





<a href="index.php">Acceuil</a>


    <?php
    $Nom = "Poisson";
    $Prix = "10€";
    $URL = "images/Poisson.jpg";

    echo "Nom : <h1>$Nom</h1><br>";
    echo "Prix : $Prix<br>";
    echo "Image : <img src='$URL' alt='$Nom'>";
    ?>




</body>

</html>