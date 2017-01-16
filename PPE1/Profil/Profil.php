<?php
    include('../Connexion/AccesBDDUser.php');
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
            	<h2> <?php echo $_SESSION['prenom_Particulier'].' '.$_SESSION['nom_Particulier'] ; ?> </h2>
            </div>

            <div id="Vehicule" class="center wow fadeInDown col-lg-6">
            	<h3>Vos véhicules</h3>

            	<div class="table-responsive">
            		<table class="table table-stripped table-bordered">
            			<thead>
            				<tr>
            					<td>Marque</td>
            					<td>Modèle</td>
            				</tr>
            			</thead>
            			<tbody>
        					<?php
        						$resultatVehicules = vehiculeClient($_SESSION['ID_Client']);

        						for ($n = 0 ; $n < 6 ; $n=$n+2)
        						{
        							echo '<tr><td>'.$resultatVehicules[$n].'</td><td>'.$resultatVehicules[$n+1].'</td></tr>';
        						}
        					?>
            			</tbody>
					</table>
            	</div>
            </div>

			<div id="AjoutVehicule" class="center wow fadeInDown col-lg-6">
			    <h3 class="lead">Ajouter un véhicule :</h3>

	        	<form id="main-contact-form" class="contact-form" name="contact-form" method="post"	>
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

			        <button type="submit" class="btn btn-primary btn-lg" id="Ajouter" name="Ajouter">Ajouter</button>
		    	</form>

	            <?php
	                if(isset($_POST['Ajouter']))
	                {
	                    $typeVehicule = selectTypeVehicule();
	                    AjoutVehicule($typeVehicule['0'], $_SESSION['ID_Client']);
	                }
	            ?>
			</div>
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