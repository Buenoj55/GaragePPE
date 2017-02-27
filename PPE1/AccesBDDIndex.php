<?php
	include('Modele/modele.class.php');

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

	function nbOperation()
	{
		$unModele = connexionBDD();

		$unModele->renseigner("Operations");

		$nbOperation = $unModele->selectCountOnly();
		
		return $nbOperation;
	}

	function selectOperation()
	{
		$unModele = connexionBDD();

		$unModele->renseigner("Operations");

		$resultatOperation = $unModele->selectDistinct("libelle_Operation");

		return $resultatOperation;
	}

	function selectMarque()
	{
		$unModele = connexionBDD();

		$unModele->renseigner("TypeVehicules");

		$resultatMarque = $unModele->selectDistinct("marque_Vehicule");

		return $resultatMarque;
	}

	function selectModele($marque)
	{
		$unModele = connexionBDD();

		$unModele->renseigner("TypeVehicules");

		$champs = array("modele_Vehicule");
 
		$tab = array( 
			"marque_Vehicule"=>$marque
			);

		$resultatModele = $unModele->selectWhereAll($champs, $tab);

		return $resultatModele;
	}

	function vehiculeClient($idc)
	{
		$unModele = connexionBDD();

		$unModele->renseigner("v_ClientAndVehicule");

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
		$unModele = connexionBDD();

		$unModele->renseigner("Vehicules");

		$tab = array(
				"ID_Client" => $_SESSION['ID_Client']
			);

		$resultat = $unModele->selectCount($tab);
		
		return $resultat;
	}

	function selectionVehicule($idv)
	{
		$unModele = connexionBDD();

		$unModele->renseigner("v_ClientAndVehicule");

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
?>