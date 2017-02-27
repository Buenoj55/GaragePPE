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

	function connexionBDD()
	{
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { return $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { return $unModele = new Modele("localhost", "Garage", "root", "root"); }
	}

	function selectCoeffVehicule($marque, $modele)
	{
		$unModele = connexionBDD();

		$unModele->renseigner("TypeVehicules");

		$champs = array("coeff_Vehicule");
 
		$tab = array(
			"marque_Vehicule"=>$marque, 
			"modele_Vehicule"=>$modele
			);

		$resultatCoeff = $unModele->selectWhere($champs, $tab);

		return $resultatCoeff;
	}

	function selectPrixOperation()
	{
		$unModele = connexionBDD();

		$unModele->renseigner("Operations");

		$champs = array("prix_Operation");
 
		$tab = array(
			"libelle_Operation"=>$_POST['libelle_Operation']
			);

		$resultatPrixOp = $unModele->selectWhere($champs, $tab);

		return $resultatPrixOp;
	}

	function selectTypeVehicule()
	{
		$unModele = connexionBDD();

		$unModele->renseigner("v_ClientAndVehicule");

		$champs = array("marque_Vehicule",
						"modele_Vehicule",
						"immat_Vehicule");
 
		$tab = array(
			"ID_Vehicule"=>$_POST['ID_Vehicule']
			);

		$resultatTypeVehicule = $unModele->selectWhere($champs, $tab);

		return $resultatTypeVehicule;
	}
?>