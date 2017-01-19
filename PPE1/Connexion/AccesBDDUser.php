<?php
	include('../Modele/modele.class.php');

	function dateFormatJJMMAAAA($date)
	{
	    list($year, $month, $day) = explode('-', $date);

	    return "$day / $month / $year";
	}

	function dateFormatAAAAMMJJ($date)
	{
	    list($day, $month, $year) = explode('/', $date);

	    return "$year-$month-$day";
	}

	function timeFormatNh($heure)
	{
		list($h, $min, $s) = explode(':', $heure);

		return "$h";
	}

/* CONNEXION */

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

		$tab = array("mail_Client"=>$_POST['mail_Client']);

		$resultatID = $unModele->selectWhere($champs, $tab);

		return $resultatID;
	}

/* CONNEXION AND PROFIL */

	function selectMarque()
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("TypeVehicules");

		$resultatMarque = $unModele->selectDistinct("marque_Vehicule");

		return $resultatMarque;
	}

	function selectModele()
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("TypeVehicules");

		$resultatModele = $unModele->selectDistinct("modele_Vehicule");

		return $resultatModele;
	}

	function selectTypeVehicule()
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("TypeVehicules");

		$champs = array("ID_TypeVehicule");
 
		$tab = array(
			"marque_Vehicule"=>$_POST['marque_Vehicule'], 
			"modele_Vehicule"=>$_POST['modele_Vehicule']
			);

		$resultatTypeVehicule = $unModele->selectWhere($champs, $tab);

		return $resultatTypeVehicule;
	}

	function selectIDClient()
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("Clients");

		$champs = array("ID_Client");
 
		$tab = array(
			"mail_Client"=>$_POST['mail_Client']
			);

		$resultatIDClient = $unModele->selectWhere($champs, $tab);

		return $resultatIDClient;
	}

	function ajoutVehicule($idtv, $idc)
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("Vehicules");

		$tab = array(
				"ID_TypeVehicule"=>$idtv,
				"ID_Client"=>$idc,
				"immat_Vehicule"=>$_POST['immat_Vehicule'],
				"dateachat_Vehicule"=>$_POST['dateachat_Vehicule'],
				"km_Vehicule"=>$_POST['km_Vehicule'],
				"couleur_Vehicule"=>$_POST['couleur_Vehicule']
			);

		$unModele->insert($tab);
	}

	function ajoutVehicule2($idtv, $idc)
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("Vehicules");

		$tab = array(
				"ID_TypeVehicule"=>$idtv,
				"ID_Client"=>$idc
			);

		$unModele->insert($tab);
	}

	function vehiculeClient($idc)
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("ClientAndVehicule");

		$champs = array(
				"ID_Vehicule",
				"marque_Vehicule",
				"modele_Vehicule",
				"immat_Vehicule",
				"km_Vehicule",
				"dateachat_Vehicule",
				"couleur_Vehicule"
			);
 
		$tab = array(
				"ID_Client"=>$idc
			);

		$resultatVehicule = $unModele->selectWhereAll($champs, $tab);

		return $resultatVehicule;
	}

	function nbVehicule()
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("Vehicules");

		$tab = array(
				"ID_Client" => $_SESSION['ID_Client']
			);

		$resultat = $unModele->selectCount($tab);
		
		return $resultat;
	}

/* PROFIL */

	function selectRDV()
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("RDVClientVehicule");

		$champs = array(
				"ID_RDV",
				"ID_Vehicule",
				"marque_Vehicule",
				"modele_Vehicule",
				"immat_Vehicule",
				"date_RDV",
				"heure_RDV"
			);
 
		$tab = array(
				"ID_Client"=>$_SESSION['ID_Client']
			);

		$resultatVehicule = $unModele->selectWhereAll($champs, $tab);

		return $resultatVehicule;
	}

	function nbRDV()
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("RDVClientVehicule");

		$tab = array(
				"ID_Client" => $_SESSION['ID_Client']
			);

		$resultat = $unModele->selectCount($tab);
		
		return $resultat;
	}

	function deleteVehicule()
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("Vehicules");

		$tab = array(
				"ID_Vehicule" => $_POST['ID_Vehicule']
			);

		$resultat = $unModele->delete($tab);
	}
?>