<?php
    include('../Connexion/AccesBDDUser.php');

	header("Content-Type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
	echo "<list>";

	$resultatModeles = selectModele();
	foreach ($resultatModeles as $resultatModele)
	{
	    echo '<item id="0" value="'.$resultatModele['modele_Vehicule'].'" />';
	}

	echo "</list>";
?>