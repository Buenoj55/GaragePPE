<?php
    session_start();
    include('AccesBDDIndex.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <?php include("head.php"); ?>

<body class="homepage">
    <?php include("header.php"); ?>

    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="item active">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Devis en ligne</h1>
                                    <h2 class="animation animated-item-2">Expliquez-nous vos besoins et nous vous fournirons un devis que vous pourrez montrer en magasin.</h2>
                                    <h3 class="animation animated-item-3">Nous cherchons à simplifiez vos transactions et vous faire ganer du temps. Alors n'hésitez pas.</h3>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <form method="post" action="Devis/Devis.php">
                                        <h2 class="animation animated-item-1">Que concerne votre demande ?</h2>

                                        <select name="libelle_Operation" class="form-control">
                                            <?php
                                                $nbOperation = nbOperation();
                                                $resultatOperation = selectOperation();


                                                for ($i = 0 ; $i < $nbOperation['nb'] ; $i++)
                                                { 
                                                    echo '<option value="'.$resultatOperation[$i]['0'].'">'.$resultatOperation[$i]['0'].'</option>';
                                                }
                                            ?>
                                        </select>

                                        <h2 class="animation animated-item-1">Quel véhicule concerne votre demande ?</h2>

                                        <div class="margin-top">
                                            <h3 class="animation animated-item-3">Connectez-vous pour utiliser un véhicule enregistré et recevoir un devis en votre nom.</h3>
                                        </div>

                                        <div id="marque" class="col-sm-6">
                                            <label>Marque</label>                     
                                            <select id="marque_Vehicule" name="marque_Vehicule" class="form-control" onchange="request(this);">
                                                <option>-- Marques --</option>
                                                <?php
                                                    $resultatMarques = selectMarque();
                                                    foreach ($resultatMarques as $resultatMarque)
                                                    {
                                                        echo '<option value="'.$resultatMarque['marque_Vehicule'].'">'.$resultatMarque['marque_Vehicule'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                            <span id="loader"><img src="images/loader.gif" alt="loading" /></span>
                                        </div>

                                        <div id="modele" class="col-sm-6">
                                            <label>Modèle</label>                     
                                            <select name="modele_Vehicule" id="modele_Vehicule" class="form-control">
                                                <option>-- Modèles --</option>
                                            </select>
                                        </div>

                                        
                                        <?php
                                            if (isset($_SESSION['ID_Client']))
                                            {
                                                $resultatVehicules = vehiculeClient($_SESSION['ID_Client']);
                                                $nbVehicules = nbVehicule();

                                                echo '<div>
                                                        <div class="col-lg-6"><h2 class="pull-right">OU</h2></div>
                                                            <label class="col-lg-12">Votre véhicule</label>';

                                                if ($nbVehicules['nb'] != 0) 
                                                {                           
                                                    echo '<select name="ID_Vehicule" class="form-control">
                                                            <option>-- Véhicules --</option>';

                                                    for ($n = 0 ; $n < $nbVehicules['0'] ; $n++)
                                                    {
                                                        echo '<option value="'.$resultatVehicules[$n]['0'].'">'.$resultatVehicules[$n]['1'].' '.$resultatVehicules[$n]['2'].' - '.$resultatVehicules[$n]['3'].'</option>';
                                                    }

                                                    echo '</select>';
                                                }
                                                else
                                                { 
                                                    echo '<h3>Vous n\'avez pas enregistré de véhicule.</h3>
                                                                <h4><span class="label label-warning">Veuillez en enresgistrer sur votre profil <a href="../Profil/Profil.php">ici</a></span></h4>'; 
                                                }
                                                echo '</div>';
                                            }
                                        ?>

                                        <button class="btn-slide animation animated-item-3 margin-top">Recevoir un devis</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Prendre rendez-vous</h1>
                                    <h2 class="animation animated-item-2">Vous pouvez prendre rendez-vous dès maintenant dans notre garage. Simplement et rapidement.</h2>
                                    <h3 class="animation animated-item-3">Toute notre équipe vous attend pour répondre à toutes vos attentes.</h3>
                                    <a class="btn-slide animation animated-item-3" href="Reservation/Reservation.php">Réserver maintenant</a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <div class="animation animated-item-2">
                                        <img src="images/slider/magasin.jpeg" width="150%" height="150%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Achetez vos pièces</h1>
                                    <h2 class="animation animated-item-2">Nous mettons à votre disposition tout un panel de pièces détachées.</h2>
                                    <h3 class="animation animated-item-3">Vous vous débrouillez en mécanique. Venez voir ici et trouvez la pièce qu'il vous faut.</h3>
                                    <a class="btn-slide animation animated-item-3" href="Contenu/shop.php">Shop</a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <?php 
                                        $nb = rand(1, 10);
                                        echo '<img src="images/Shop/full/'.$nb.'.png" class="animation animated-item-1">';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->

    <?php include('footer.php'); ?>
</body>
</html>