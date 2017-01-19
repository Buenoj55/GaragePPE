<?php
    include('AccesBDDUser.php');
?>

<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Inscription</title>
<?php include("../head.php"); ?>

<body>
    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/PPE1/index.php"><img src="/PPE1/images/logo.png" alt="logo" width="35%" height="35%"></a>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
    
    <section id="feature" class="transparent-bg">
        <div class="container">
            <div class="center wow fadeInDown">      
                <h2>Inscription</h2>
                <p class="lead">Remplir avec sincérité toutes les informations demandées.</p>
            </div>
            <div class="col-sm-12">
                <ul class="pagination pull-right">
                    <li id="Particulier" class="active"><a href="Inscription.php">Particulier</a></li>
                    <li id="Entreprise"><a href="InscriptionEntreprise.php">Entreprise</a></li>
                </ul>
            </div>
            <div class="row contact-wrap wow fadeInDown"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post">
                    <div id="Infos">
                        <div class="col-sm-12 col-sm-offset-1">
                            <div class="form-group">
                                <div class="col-sm-1 col-sm-offset-1"><label>Civilité *</label></div>
                                <div class="col-sm-1"><input type="radio" name="civilite_Particulier" value="Homme">Homme</div>
                                <div class="col-sm-1"><input type="radio" name="civilite_Particulier" value="Femme">Femme</div>
                            </div>
                        </div>
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group">
                                <label>Nom *</label>
                                <input type="text" name="nom_Particulier" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label>Prénom *</label>
                                <input type="text" name="prenom_Particulier" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label>Date de naissance *</label>
                                <input type="date" name="dateNaiss_Particulier" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label>Téléphone *</label>
                                <input type="number" name="tel_Client" class="form-control" required="required">
                            </div>    
                        </div>
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group">
                                <label>Adresse *</label>
                                <input type="text" name="adr_Client" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label>Code postal *</label>
                                <input type="text" name="CP_Client" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label>Ville *</label>
                                <input type="text" name="ville_Client" class="form-control" required="required">
                            </div>         
                        </div>
                    </div>

                    <div id="Mdp" class="center wow fadeInDown col-sm-12">
                        <h3 class="lead">Identifiant et Mot de passe :</h3>

                        <div class="col-sm-offset-1">
                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" name="mail_Client" class="form-control" required="required">
                            </div> 
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-5 col-sm-offset-1">                      
                                <div class="form-group">
                                    <label>Mot de passe *</label>
                                    <input type="password" name="mdp_Client" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-sm-5 col-sm-offset-1">                      
                                <div class="form-group">
                                    <label>Confirmer mot de passe *</label>
                                    <input type="password" name="confMdp_Client" class="form-control" required="required">
                                </div>
                            </div>
                        </div>   
                    </div>

                    <div id="Vehicule" class="center wow fadeInDown col-lg-12">
                        <h3 class="lead">Ajouter un véhicule :</h3>

                        <div class="col-sm-5 col-sm-offset-1">
                            <label>Marque *</label>                     
                            <select name="marque_Vehicule" class="form-control">
                                <?php
                                    $resultatMarques = selectMarque();
                                    foreach ($resultatMarques as $resultatMarque)
                                    {
                                        echo '<option value="'.$resultatMarque['marque_Vehicule'].'">'.$resultatMarque['marque_Vehicule'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-5 col-sm-offset-1">                      
                            <label>Modèle *</label>                     
                            <select name="modele_Vehicule" class="form-control">
                                <?php
                                    $resultatModeles = selectModele();
                                    foreach ($resultatModeles as $resultatModele)
                                    {
                                        echo '<option value="'.$resultatModele['modele_Vehicule'].'">'.$resultatModele['modele_Vehicule'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="etat_Client" value="1">

                    <button type="submit" name="Valider" id="Valider" class="btn btn-primary btn-lg">Valider le formulaire</button>

                    <div class="container">
                        <div class="col-sm-12">
                            <ul class="pagination pull-right">
                                <li id="Etape1" class="active"><a>Etape 1</a></li>
                                <li id="Etape2"><a>Etape 2</a></li>
                                <li id="Etape3"><a>Etape 3</a></li>
                            </ul>
                        </div>
                    </div>
                </form>

                <?php
                    if(isset($_POST['Valider']) && isset($_POST['confMdp_Client']))
                    {
                        if ($_POST['mdp_Client'] != $_POST['confMdp_Client'])
                        {
                            echo "Les mot de passe ne correspondent pas";
                        }
                        else
                        {
                            Inscription();
                            $typeVehicule = selectTypeVehicule();
                            $IDClient = selectIDClient();
                            AjoutVehicule($typeVehicule['0'], $IDClient['0']);
                        }
                    }
                ?>

                <script type="text/javascript">
                    document.getElementById('Mdp').style.display = "none";
                    document.getElementById('Vehicule').style.display = "none";
                    document.getElementById('Valider').style.display = "none";

                    $('#Etape1').click(function() {
                        document.getElementById('Infos').style.display = "";
                        $('#Etape1').addClass('active');
                        document.getElementById('Mdp').style.display = "none";
                        $('#Etape2').removeClass('active');
                        document.getElementById('Vehicule').style.display = "none";
                        $('#Etape3').removeClass('active');
                        document.getElementById('Valider').style.display = "none";
                    }); 

                    $('#Etape2').click(function() {
                        document.getElementById('Infos').style.display = "none";
                        $('#Etape1').removeClass('active');
                        document.getElementById('Mdp').style.display = "";
                        $('#Etape2').addClass('active');
                        document.getElementById('Vehicule').style.display = "none";
                        $('#Etape3').removeClass('active');
                        document.getElementById('Valider').style.display = "none";
                    });

                    $('#Etape3').click(function() {
                        document.getElementById('Infos').style.display = "none";
                        $('#Etape1').removeClass('active');
                        document.getElementById('Mdp').style.display = "none";
                        $('#Etape2').removeClass('active');
                        document.getElementById('Vehicule').style.display = "";
                        $('#Etape3').addClass('active');
                        document.getElementById('Valider').style.display = "";
                    });
                </script>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->

    <script src="js/jquery.js"></script>
    <script src="/PPE1/js/bootstrap.min.js"></script>
    <script src="/PPE1/js/jquery.prettyPhoto.js"></script>
    <script src="/PPE1/js/jquery.isotope.min.js"></script>
    <script src="/PPE1/js/wow.min.js"></script>
</body>
</html>