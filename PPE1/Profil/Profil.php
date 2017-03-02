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

    <section id="Profil" class="transparent-bg">
        <div class="container">
            <div class="center wow fadeInDown">
            	<h2> <?php 
            			if (isset($_SESSION['nom_Client'])) { echo $_SESSION['prenom_Particulier'].' '.$_SESSION['nom_Client']; }
            			else if (isset($_SESSION['nom_Client'])) { echo $_SESSION['nom_Client']; }
            		?> </h2>
        		<h3 class="pull-right"><a href="#">Informations personnelles</a></h3>
            </div>

            <div>
            	<div class="col-lg-3 center"><a class="btn btn-secondary" href="#Vehicule">Véhicule</a></div>
            	<div class="col-lg-3 center"><a class="btn btn-secondary" href="#AjoutVehicule">Ajouter un véhicule</a></div>
            	<div class="col-lg-3 center"><a class="btn btn-secondary" href="#Calendrier">Rendez-vous</a></div>
            	<div class="col-lg-3 center"><a class="btn btn-secondary" href="#Devis">Devis</a></div>
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

		        				echo '<script language="Javascript">
                                <!--
                                document.location.replace("Profil.php");
                                // -->
                                </script>';
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
	                    $typeVehicule = selectIDTypeVehicule();
	                    AjoutVehicule($typeVehicule['0'], $_SESSION['ID_Client']);

        				echo '<script language="Javascript">
                        <!--
                        document.location.replace("Profil.php");
                        // -->
                        </script>';
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

            <div id="Devis" class="center wow fadeInDown col-lg-12">
				<h3>Vos devis</h3>

				<div class="table-responsive col-lg-11">
					<table class="table table-striped table-hover">
						<thead>
							<th class="col-lg-1">N°</th>
							<th class="col-lg-2">Date</th>
							<th class="col-lg-3">Véhicule</th>
							<th class="col-lg-4">Opération</th>
							<th class="col-lg-1">Lien</th>
							<th class="col-lg-1"></th>
						</thead>
					</table>
					
					<?php
						$nbDevis = selectNbDevis();
						$resultatDevis = selectDevis();

						for ($i = 0; $i < $nbDevis['nb'] ; $i++)
						{ 
                			$resultatVehicule = vehiculeDevis($resultatDevis[$i]['1']);
                			$resultatOperation = operationDevis($resultatDevis[$i]['2']);
							
							echo '<form method="post" action="showDevis.php">
									<table class="table table-hover">
										<tbody>
											<tr>
												<td class="col-lg-1">'.$resultatDevis[$i]['0'].'</td>
												<td class="col-lg-2">'.dateFormatJJMMAAAA($resultatDevis[$i]['3']).'</td>
												<td class="col-lg-3"><strong>'.$resultatVehicule['marque_Vehicule'].' '.$resultatVehicule['modele_Vehicule'].'</strong> - '.$resultatVehicule['immat_Vehicule'].'</td>
												<td class="col-lg-4">'.$resultatOperation['libelle_Operation'].'</td>
												<td class="col-lg-1"><button type="submit" name="link'.$i.'" class="btn btn-danger">Devis n°'.$resultatDevis[$i]['0'].'
													<input type="hidden" name="NUM_Devis" value="'.$resultatDevis[$i]['0'].'">
													<input type="hidden" name="ID_Vehicule" value="'.$resultatDevis[$i]['1'].'">
													<input type="hidden" name="ID_Operation" value="'.$resultatDevis[$i]['2'].'">
												</td>
											</tr>
										</tbody>
									</table>
								</form>';
						}
					?>				
				</div>

				<div class="table-responsive col-lg-1">
					<table class="table table-hover">
						<thead>
							<th> - </th>
						</thead>

						<?php
							$nbDevis = selectNbDevis();
							$resultatDevis = selectDevis();

							for ($i = 0; $i < $nbDevis['nb'] ; $i++)
							{
								echo '<form method="post">
										<table class="table table-hover">
											<tbody>
												<tr>
													<td><button type="submit" name="Delete'.$i.'" class="btn btn-danger">X</button></td>
												</tr>
											</tbody>
										</table>
									</form>';
							}
						?>
					</table>
				</div>

				<?php
					$nbDevis = selectNbDevis();
					$resultatDevis = selectDevis();

					for ($i = 0; $i < $nbDevis['nb'] ; $i++)
					{
	        			if (isset($_POST['Delete'.$i]))
	        			{
	        				deleteDevis($resultatDevis[$i]['0']);

	        				echo '<script language="Javascript">
	                        <!--
	                        document.location.replace("Profil.php");
	                        // -->
	                        </script>';
	        			}
	        		}
        		?>

            </div>
        </div><!--/.container-->
    </section><!--/#contact-page--> 

    <?php include('../footer.php'); ?>
</body>
</html>