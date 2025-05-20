<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name = "item2" content ="Crevette à deguster">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Crevette</title>
</head>

<body class="text-white" style="background-color: #2e2e2e;">
    <?php include('header.php'); ?>
       <main>
       <?php
    $Nom = "Crevette";
    $Prix = "20€";
    $URL = "images/Crevette.jpg";

    echo "Nom : <h2>$Nom</h2><br>";
    echo "Prix : $Prix<br>";
    echo "Image : <img src='$URL' alt='$Nom'>";
    ?>

</main>
    <?php include('footer.php'); ?>
</body>

</html>