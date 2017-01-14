<?php
    session_start();
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
    <?php include("../header.php"); ?>

    <section id="feature" class="transparent-bg">
        <div class="container">
            <div class="center wow fadeInDown">      
                <h2>Inscription</h2>
                <p class="lead">Remplir avec sincérité toutes les informations demandées.</p>
            </div> 
            <div class="col-sm-12">
                <ul class="pagination pull-right">
                    <li id="Particulier"><a href="Inscription.php">Particulier</a></li>
                    <li id="Entreprise" class="active"><a href="InscriptionEntreprise.php">Entreprise</a></li>
                </ul>
            </div>
            <div class="row contact-wrap wow fadeInDown"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post">
                    <div id="Infos">
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group">
                                <label>Nom *</label>
                                <input type="text" name="nom_Entreprise" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label>Numéro SIRET *</label>
                                <input type="number" name="numSIRET_Entreprise" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label>Activité *</label>
                                <input type="text" name="activite_Entreprise" class="form-control" required="required">
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
                                    <input type="password" class="form-control" required="required">
                                </div>
                            </div>
                        </div>   
                    </div>

                    <div id="Vehicule" class="center wow fadeInDown col-sm-12">
                        <h3 class="lead">Véhicule :</h3>
                        <h4>Vous pourrez rajouter d'autres véhicules plus tard si vous le souhaitez</h4>

                         <div class="col-sm-12">
                            <div class="col-sm-5 col-sm-offset-1"> 
                                <label>Marque *</label>                     
                                <select class="form-group">
                                    <option name="marque_Vehicule" value="Audi" class="form-control" required="required">Audi</option>
                                </select>
                            </div>
                            <div class="col-sm-5 col-sm-offset-1">                      
                                <label>Modèle *</label>                     
                                <select class="form-group">
                                    <option name="modele_Vehicule" value="A4" class="form-control" required="required">A4</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="etat_Client" value="1">

                    <button type="submit" name="Valider" id="Valider" class="btn btn-primary btn-lg pull-right">Valider le formulaire</button>

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
                    if(isset($_POST['Valider']))
                    {
                        include("AccesBDDUser.php");
                        InscriptionEntreprise();
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

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; Speedy
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="/PPE1/js/bootstrap.min.js"></script>
    <script src="/PPE1/js/jquery.prettyPhoto.js"></script>
    <script src="/PPE1/js/jquery.isotope.min.js"></script>
    <script src="/PPE1/js/wow.min.js"></script>
</body>
</html>