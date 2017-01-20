<?php
	include('../Modele/modele.class.php');

	/* GetOS */

	$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

	function getOS() { 

	    global $user_agent;

	    $os_platform    =   "Unknown OS Platform";

	    $os_array       =   array(
	                            '/windows nt 10/i'     =>  'Windows 10',
	                            '/windows nt 6.3/i'     =>  'Windows 8.1',
	                            '/windows nt 6.2/i'     =>  'Windows 8',
	                            '/windows nt 6.1/i'     =>  'Windows 7',
	                            '/windows nt 6.0/i'     =>  'Windows Vista',
	                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
	                            '/windows nt 5.1/i'     =>  'Windows XP',
	                            '/windows xp/i'         =>  'Windows XP',
	                            '/windows nt 5.0/i'     =>  'Windows 2000',
	                            '/windows me/i'         =>  'Windows ME',
	                            '/win98/i'              =>  'Windows 98',
	                            '/win95/i'              =>  'Windows 95',
	                            '/win16/i'              =>  'Windows 3.11',
	                            '/macintosh|mac os x/i' =>  'Mac OS X',
	                            '/mac_powerpc/i'        =>  'Mac OS 9',
	                            '/linux/i'              =>  'Linux',
	                            '/ubuntu/i'             =>  'Ubuntu',
	                            '/iphone/i'             =>  'iPhone',
	                            '/ipod/i'               =>  'iPod',
	                            '/ipad/i'               =>  'iPad',
	                            '/android/i'            =>  'Android',
	                            '/blackberry/i'         =>  'BlackBerry',
	                            '/webos/i'              =>  'Mobile'
	                        );

	    foreach ($os_array as $regex => $value) { 

	        if (preg_match($regex, $user_agent)) {
	            $os_platform    =   $value;
	        }

	    }   

	    return $os_platform;

	}

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
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

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
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

		$unModele->renseigner("Vehicules");

		$tab = array(
				"ID_Client" => $_SESSION['ID_Client']
			);

		$resultat = $unModele->selectCount($tab);
		
		return $resultat;
	}

	function selectionVehicule($idv)
	{
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

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
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

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
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

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
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

		$unModele->renseigner("RDVClientVehicule");

		$tab = array(
				"date_RDV"=>dateFormatAAAAMMJJ($_POST['DateReservation'])
			);

		$resultat = $unModele->selectCount($tab);
		
		return $resultat;
	}
?>