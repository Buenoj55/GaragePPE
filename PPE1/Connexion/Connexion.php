<!DOCTYPE html>
<html lang="fr">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Connexion</title>
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
                <h2>Connexion</h2>
            </div> 
            <div class="row contact-wrap wow fadeInDown"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="text" name="mail_Client" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Mot de passe :</label>
                            <input type="password" name="mdp_Client" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="col-sm-5">                       
                        <div class="form-group">
                            <button type="submit" name="Connexion" class="btn btn-primary btn-lg pull-right" required="required">Connexion</button>
                        </div>
                    </div>
                </form> 

                <?php
                    if (isset($_POST["Connexion"]))
                    {
                        include("AccesBDDUser.php");
                        $resultat = Connexion();
                        $resultatEnt = ConnexionEntreprise();


                        if (!isset($_POST['mail_Client'])) 
                        {
                            echo '<p><span class="label label-danger">Entrer une adresse mail.</span></p>';
                        }
                        else if(!isset($_POST['mdp_Client']))
                        {
                            echo '<p><span class="label label-danger">Entrer un mot de passe</span></p>';
                        }
                        else
                        {
                            if ($resultat['nb'] == 1)
                            {
                                session_start();

                                $resultatID = selectInfo();

                                $_SESSION['ID_Client'] = $resultatID['ID_Client'];
                                $_SESSION['adr_Client'] = $resultatID['adr_Client'];
                                $_SESSION['CP_Client'] = $resultatID['CP_Client'];
                                $_SESSION['ville_Client'] = $resultatID['ville_Client'];
                                $_SESSION['mail_Client'] = $resultatID['mail_Client'];
                                $_SESSION['tel_Client'] = $resultatID['tel_Client'];
                                $_SESSION['etat_Client'] = $resultatID['etat_Client'];
                                $_SESSION['nom_Particulier'] = $resultatID['nom_Particulier'];
                                $_SESSION['prenom_Particulier'] = $resultatID['prenom_Particulier'];
                                $_SESSION['civilite_Particulier'] = $resultatID['civilite_Particulier'];
                                $_SESSION['dateNaiss_Particulier'] = $resultatID['dateNaiss_Particulier'];
                            
                                header('Location: ../index.php');
                            }
                            else if($resultatEnt['nb'] == 1)
                            {
                                session_start();
                                
                                $resultatIDEnt = selectInfoEnt();

                                $_SESSION['ID_Client'] = $resultatIDEnt['ID_Client'];
                                $_SESSION['adr_Client'] = $resultatIDEnt['adr_Client'];
                                $_SESSION['CP_Client'] = $resultatIDEnt['CP_Client'];
                                $_SESSION['ville_Client'] = $resultatIDEnt['ville_Client'];
                                $_SESSION['mail_Client'] = $resultatIDEnt['mail_Client'];
                                $_SESSION['tel_Client'] = $resultatIDEnt['tel_Client'];
                                $_SESSION['etat_Client'] = $resultatIDEnt['etat_Client'];
                                $_SESSION['nom_Entreprise'] = $resultatIDEnt['nom_Entreprise'];
                                $_SESSION['numSIRET_Entreprise'] = $resultatIDEnt['numSIRET_Entreprise'];
                                $_SESSION['activite_Entreprise'] = $resultatIDEnt['activite_Entreprise'];
                            
                                header('Location: ../index.php');
                            }
                            else
                            {
                                echo '<h2 class="col-lg-12"><span class="label label-danger">Erreur sur l\'identifiant ou le mot de passe</span></h2>';
                            }
                        }
                    }
                ?>
            </div>
        </div><!--/.container-->
    </section><!--/#feature-->

    <script src="js/jquery.js"></script>
    <script src="/PPE1/js/bootstrap.min.js"></script>
    <script src="/PPE1/js/jquery.prettyPhoto.js"></script>
    <script src="/PPE1/js/jquery.isotope.min.js"></script>
    <script src="/PPE1/js/main.js"></script>
    <script src="/PPE1/js/wow.min.js"></script>
</body>
</html>