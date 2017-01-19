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

	function selectionVehicule($idv)
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
				"ID_Vehicule"=>$idv
			);

		$resultatVehicule = $unModele->selectWhere($champs, $tab);

		return $resultatVehicule;
	}

	function ValiderReservation()
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("RDV");

		$tab = array(
				"ID_Vehicule"=>$_POST['ID_Vehicule'],
				"ID_Client"=>$_SESSION['ID_Client'],
				"date_RDV"=>$_POST['date_RDV'],
				"heure_RDV"=>$_POST['heure_RDV']
			);

		$unModele->insert($tab);
	}

	function selectRDVDate()
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
				"date_RDV"=>dateFormatAAAAMMJJ($_POST['DateReservation'])
			);

		$resultatVehicule = $unModele->selectWhereAll($champs, $tab);

		return $resultatVehicule;
	}

	function nbRDVDate()
	{
		$unModele = new Modele("localhost", "Garage", "root", "");

		$unModele->renseigner("RDVClientVehicule");

		$tab = array(
				"date_RDV"=>dateFormatAAAAMMJJ($_POST['DateReservation'])
			);

		$resultat = $unModele->selectCount($tab);
		
		return $resultat;
	}
?>