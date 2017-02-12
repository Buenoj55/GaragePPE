<?php
    include('../Connexion/AccesBDDUser.php');

	header("Content-Type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
	echo "<list>";

	$marque = (isset($_POST["marque_Vehicule"])) ? htmlentities($_POST["marque_Vehicule"]) : NULL;

	if ($marque)
	{
		$nbModeles = selectNbModele($marque);
		$resultatModele = selectModele($marque);

		for ($n = 0 ; $n < $nbModeles['nb'] ; $n++)
		{
		    echo '<item id="'.$resultatModele[$n]['modele_Vehicule'].'" value="'.$resultatModele[$n]['modele_Vehicule'].'" />';
		}
	}

	echo "</list>";
?>