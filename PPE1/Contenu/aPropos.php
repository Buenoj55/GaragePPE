<?php
    include('../Connexion/AccesBDDUser.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Contact</title>
<?php include("../head.php"); ?>

<body>
    <?php include("../header.php"); ?>

    <section class="aPropos">
        <div class="row">
            <div class="center">
                <h2>Speedy</h2>
                <p class="lead">A propos.</p>
            </div>

            <div class="col-lg-3">
                <img src="../images/centreSpeedy.jpg" alt="centre_Speedy" width="25%" height="25%">
            </div>    
            <div class="col-lg-6">
                <p>Speedy est une entreprise française d'entretien et réparation rapide automobile. Speedy est dirigé par Jacques Le Foll qui est également (depuis 2011) le principal actionnaire de l'entreprise1.</p>
                <p>Le groupe compte 488 centres en France (dont 335 en propre) et 56 à l'étranger, avec un total de 2 500 salariés. Il réalise un chiffre d'affaires de 200 millions d'euros.</p>
            </div>
        </div>
    </section>

    <?php include('../footer.php'); ?>
</body>
</html>