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

            <div id="Vehicule" class="center wow fadeInDown col-lg-12">
            	<h3>Vos véhicules</h3>

            	<div class="table-responsive">
            		<form class="contact-form" method="post">
	            		<table class="table table-striped table-hover">
	            			<thead>
            					<th>Marque</th>
            					<th>Modèle</th>
            					<th>Immatriculation</th>
            					<th>Kilométrage</th>
            					<th>Couleur</th>
            					<th>Date d'achat</th>
	            			</thead>
	            			<tbody>
	        					<?php
	        						$resultatVehicules = vehiculeClient($_SESSION['ID_Client']);
	        						$nbVehicules = nbVehicule();

	        						var_dump($nbVehicules);

	        						if ($nbVehicules['nb'] != 0) 
	        						{
		        						for ($n = 0 ; $n < $nbVehicules['0'] ; $n++)
		        						{
		        							echo '<tr><td class="col-sm-2">'.$resultatVehicules[$n]['1'].'</td><td class="col-sm-2">'.$resultatVehicules[$n]['2'].'</td><td class="col-sm-2">'.$resultatVehicules[$n]['3'].'</td>';

		        							for ($a = 4 ; $a < 7 ; $a++)
		        							{ 
		        								echo '<td class="col-sm-2">';
		        								if (isset($resultatVehicules[$n][$a])) { echo $resultatVehicules[$n][$a]; }
		        								else { echo '<input class="col-sm-10" name="input'.$n.''.$a.'">'; }
		        								echo '<a type="submit" name="Modif'.$n.''.$a.'" class="pull-right"><span class="glyphicon glyphicon-ok-sign"></span></a></td>';

		        								if (isset($_POST['Modif'.$n.''.$a])) {
		        									echo 'Unicorn';
		        								}
		        							}
		        						}
	        						}
	        						else
	        						{
	        							echo '<tr><td colspan="6">Vous n\'avez pas enregistré de véhicules.</td></tr>';
	        						}
	        					?>
	            			</tbody>
						</table>
					</form>
            	</div>
            </div>

			<div id="AjoutVehicule" class="center wow fadeInDown col-lg-12">
			    <h3 class="lead">Ajouter un véhicule :</h3>

	        	<form class="contact-form" method="post"	>
	        		<div class="col-sm-2">
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
			        <div class="col-sm-2">                      
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

			        <div class="col-sm-2 form-group">
				        <label>Immatriculation</label>
				        <input type="text" name="immat_Vehicule" class="form-control"/>
				    </div>

				    <div class="col-sm-2 form-group">
				        <label>Kilométrage</label>
				        <input type="number" class="form-control" name="km_Vehicule" />
				    </div>

			        <div class="col-sm-2">
			        	<div class="form-group">
					        <label>Couleur</label>
					        <input type="text" class="form-control" name="couleur_Vehicule" />
					    </div>
				    </div>

			        <div class="col-sm-2 form-group">
				        <label>Date d'achat</label>
				        <input type="date" class="form-control" name="dateachat_Vehicule" />
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