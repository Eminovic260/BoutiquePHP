<?php
session_start();
?>

<?php
// Définir les valeurs spécifiques pour la page d'accueil
$title = "Accueil";
$description = "Bienvenue sur notre page d'accueil";
$keywords = "accueil, produits, offres spéciales";
?>


<?php include('header.php'); ?>




<main>
    <div class="banner">
        <h1 class="titreAcceuil">PLATEAU DE FRUITS DE MER ET TRAITEUR</h1>
    


    <div class="avis">
        <img class="avisClients" src="image/avis1.png" alt="avis">
        <img class="avisClients" src="image/avis2.png" alt="avis">
        <img class="avisClients" src="image/avis3.png" alt="avis">
        <img class="avisClients" src="image/avis4.png" alt="avis">
    </div>
</div>

</main>


<?php include('footer.php'); ?>
</body>

</html>