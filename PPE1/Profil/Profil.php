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
<title>Profil</title>
<?php include("../head.php"); ?>

<body>
    <?php include("../header.php"); ?>

    <section id="feature" class="transparent-bg">
        <div class="container">
            <div class="center wow fadeInDown">
            	<h2> <?php 
            			if (isset($_SESSION['nom_Particulier'])) { echo $_SESSION['prenom_Particulier'].' '.$_SESSION['nom_Particulier']; }
            			else if (isset($_SESSION['nom_Entreprise'])) { echo $_SESSION['nom_Entreprise']; }
            		?> </h2>
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
            					<th>Date d'achat</th>
            					<th>Couleur</th>
            					<th></th>
	            			</thead>
	            			<tbody>
	        					<?php
	        						$resultatVehicules = vehiculeClient($_SESSION['ID_Client']);
	        						$nbVehicules = nbVehicule();

	        						if ($nbVehicules['nb'] != 0) 
	        						{
		        						for ($n = 0 ; $n < $nbVehicules['0'] ; $n++)
		        						{
		        							echo '<tr>';
		        										 
		        							echo '<td class="col-sm-2">'.$resultatVehicules[$n]['1'].'</td><td class="col-sm-2">'.$resultatVehicules[$n]['2'].'</td>';

		        							for ($a = 3 ; $a < 7 ; $a++)
		        							{ 
		        								echo '<td class="col-sm-2">';
		        								if (isset($resultatVehicules[$n][$a]))
		        								{
		        									if($a == 5) { echo dateFormatJJMMAAAA($resultatVehicules[$n][$a]).'</td>'; }
		        									else { echo $resultatVehicules[$n][$a].'</td>'; }
		        								}
		        							}
		        							echo '<td><button type="submit" name="Supprimer'.$n.'" class="btn btn-danger">X</button></td>';
		        						}
	        						}
	        						else
	        						{
	        							echo '<tr><td colspan="7">Vous n\'avez pas enregistré de véhicules.</td></tr>';
	        						}
	        					?>
	            			</tbody>
						</table>
					</form>

					<?php
	        			$resultatVehicules = vehiculeClient($_SESSION['ID_Client']);
						$nbVehicules = nbVehicule();

						for ($n = 0 ; $n < $nbVehicules['0'] ; $n++)
		        		{
		        			if (isset($_POST['Supprimer'.$n]))
		        			{
		        				deleteVehicule($resultatVehicules[$n]['0']);
		        			}
		        		}
					?>
            	</div>
            </div>

			<div id="AjoutVehicule" class="center wow fadeInDown col-lg-12">
			    <h3 class="lead">Ajouter un véhicule</h3>

	        	<form class="contact-form" method="post">
	        		<div id="marque" class="col-sm-2">
			            <label>Marque *</label>                     
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
						<span id="loader" style="display: none; position: absolute;"><img src="../images/loader.gif" alt="loading" /></span>
					</div>

					<div id="modele" class="col-sm-2">
						<label>Modèle *</label>                     
						<select name="modele_Vehicule" id="modele_Vehicule" class="form-control">
							<option>-- Modèles --</option>
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

			<div id="Calendrier" class="center wow fadeInDown col-lg-12">
				<h3>Vos rendez-vous</h3>

				<?php
					$nbRDV = nbRDV();
					if($nbRDV['nb'] == 0) { echo '<h4 class="col-lg-12"><span class="label label-warning">Vous n\'avez pas de rendez-vous.</span></h4>'; }
				?>

				<div id="my-calendar" class="my-calendar">
                    <!-- show date events with a modal window -->
                    <script type="application/javascript">
						$(document).ready(function () {

						/*Hide if click outside */
						    $('body').click(function(e){
						      if(!$(e.target).closest('.zabuto_calendar *,.datepicker-wrap,span[class*="glyphicon-chevron"],.calendar-month-navigation').length){
						        $('.zabuto_calendar').fadeIn('400');
						      }
						    })

						/* Set the calendar */
						    $("#my-calendar").zabuto_calendar({
						        language: "fr",
						        show_previous: true,
						        show_next:12,

						        ajax: {
							        url: "show_data1.php",
							        modal: true
							    }
						    })
						});
                    </script>
                </div>

                <?php
	                $resultatrdv = selectRDV();
				    $nbRDV = nbRDV();

				    for ($n = 0; $n < $nbRDV['nb']; $n++)
				    {
				        if(isset($_POST['Supprimer'.$resultatrdv[$n]['0']]))
				        {
				            deleteRDV($resultatrdv[$n]['0']);
				        }
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
    <script src="/PPE1/js/main.js"></script>
    <script src="/PPE1/assets/js/zabuto_calendar.jquery.json"></script>
</body>
</html>