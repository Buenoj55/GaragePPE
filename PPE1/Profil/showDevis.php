<?php
	session_start();
	include('../Devis/AccesBDDOperation.php');
?>

<!DOCTYPE html>
<html lang="fr">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Devis</title>
<?php include("../head.php"); ?>

<body>
    <section id="Devis">
        <div class="container">
        	<div class="col-lg-12">
                <div class="pull-right">
        			<img src="../Images/imageSpeedy.png">
        		</div>
        		<div class="col-lg-3">
        			<h3><strong>Speedy</strong></h3>
        			<h3>75, avenue des Champs Elysées</h3>
        			<h3>75008 PARIS</h3>
        			<h3>Garage automobile</h3>
        		</div>
        		<div class="col-lg-6 center">
        			<h1>Devis n° <?php echo $_POST['NUM_Devis']; ?> </h1>
        		</div>
        		<div class="col-lg-12">
                    <?php 
                        $resultatLibOperation = selectLibelleOperation();
                        echo '<h3>La demande concerne l\'opération suivante : <strong>'.$resultatLibOperation['libelle_Operation'].'</strong></h3>';
        				
                        $marque = '';
        				$modele = '';

                        if (isset($_SESSION['ID_Client']))
        				{
	        				if (isset($_POST['ID_Vehicule']) && $_POST['ID_Vehicule'] != '-- Véhicules --')
	        				{
                                $resultatTypeVehicule = selectTypeVehicule();

	        					echo '<h3>A l\'attention de <strong>'.$_SESSION['nom_Client'].' '.$_SESSION['prenom_Particulier'].'</strong></h3>';
	        					echo '<h3>Pour le véhicule : <strong>'.$resultatTypeVehicule['marque_Vehicule'].' '.$resultatTypeVehicule['modele_Vehicule'].' - '.$resultatTypeVehicule['immat_Vehicule'].'</strong></h3>';

	        					$marque = $resultatTypeVehicule['marque_Vehicule'];
	        					$modele = $resultatTypeVehicule['modele_Vehicule'];
	        				}
	        			}
	        			if ($marque != '' && $modele != '')
	        			{
	        				echo '</div>
			        			<div class="col-lg-12 margin-top">
			        			<h2>Coût de l\'opération :</h2>';


	        				$resultatCoeff = selectCoeffVehicule($marque, $modele);
	        				$resultatPrix = selectPrixOperation();

	        				echo '<table class="table table-bordered">
			        				<thead>
			        					<th class="col-lg-8" colspan="2">Description</th>
			        					<th class="col-lg-4">Prix</th>
			        				</thead>
			        				<tbody>
			        					<tr>
			        						<td colspan="2">
			        							<h3>Main d\'oeuvre</h3>
			        							<h3>Produits</h3>
			        						</td>
			        						<td>
			        							<h3>'.$resultatPrix['prix_Operation'] * (float)($resultatCoeff['coeff_Vehicule']) * 0.4.' €</h3>
			        							<h3>'.$resultatPrix['prix_Operation'] * (float)($resultatCoeff['coeff_Vehicule']) * 0.6.' €</h3>
			        						</td>
			        					</tr>
			        				</tbody>
				        			<tfoot>
				        				<th>Prix HT : '.(float)($resultatPrix['prix_Operation']) * 0.8 * (float)($resultatCoeff['coeff_Vehicule']).' €</th>
				        				<th>TVA : '.(float)($resultatPrix['prix_Operation']) * 0.2 * (float)($resultatCoeff['coeff_Vehicule']).' €</th>
				        				<th>Prix TTC : '.$resultatPrix['prix_Operation'] * (float)($resultatCoeff['coeff_Vehicule']).' €</th>
				        			</tfoot>
			        			</table>';
	        			}
	        			else
	        			{	        				
        					echo '<h2><span class="label label-warning">Veuillez sélectionner un véhicule pour obtenir votre devis. <a href="../index.php">Recommencer</a></span></h2>';
	        			}
	        		?>
        			
        		</div>
        		<div class="col-lg-12 margin-top">
        			<h3>Merci d'avoir choisi <strong>Speedy</strong> pour réaliser cette préstation.</h3>
        			
                    <div>
        				<h3 class="pull-right">Fait à Paris, le <?php if(date('j') < 10) { echo '0'; } echo date('j \/ m \/ Y'); ?></h3>
        			</div>
        		</div>
        	</div>
        </div><!--/.container-->
    </section><!--/#Devis-->

    <footer>
        
    </footer>
</html>