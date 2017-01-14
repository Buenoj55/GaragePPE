<?php
	include('../Modele/modele.class.php');

	validerReservation()
	{
		$unModele->renseigner("RDV");
		
		$tab = array(
				"civilite_Particulier"=>$_POST['civilite_Particulier'],
				"nom_Particulier"=>$_POST['nom_Particulier'],
				"prenom_Particulier"=>$_POST['prenom_Particulier'],
				"dateNaiss_Particulier"=>$_POST['dateNaiss_Particulier'],
				"adr_Client"=>$_POST['adr_Client'],
				"CP_Client"=>$_POST['CP_Client'],
				"ville_Client"=>$_POST['ville_Client'],
				"mail_Client"=>$_POST['mail_Client'],
				"tel_Client"=>$_POST['tel_Client'],
				"mdp_Client"=>$_POST['mdp_Client'],
				"etat_Client"=>$_POST['etat_Client']
			);

		$unModele->insert($tab);
	}
?>