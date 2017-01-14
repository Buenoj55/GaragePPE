<?php
	include('../Modele/modele.class.php');

	function Inscription()
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("Particuliers");

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

	function InscriptionEntreprise()
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("Entreprises");

		$tab = array(
				"nom_Entreprise"=>$_POST['nom_Entreprise'],
				"numSIRET_Entreprise"=>$_POST['numSIRET_Entreprise'],
				"activite_Entreprise"=>$_POST['activite_Entreprise'],
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

	function Connexion()
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("Clients");

		$tab = array(
				"mail_Client" => $_POST['mail_Client'],
				"mdp_Client"=>$_POST['mdp_Client']
			);

		$resultat = $unModele->selectCount($tab);
		
		return $resultat;
	}

	function selectInfo()
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("Particuliers");

		$champs = array("ID_Client", "nom_Particulier", "prenom_Particulier", "dateNaiss_Particulier", "adr_Client", "CP_Client", "ville_Client", "mail_Client", "tel_Client", "etat_Client");

		$tab = array(
				"mail_Client"=>$_POST['mail_Client']
			);

		$resultatID = $unModele->selectWhere($champs, $tab);

		return $resultatID;
	}
?>