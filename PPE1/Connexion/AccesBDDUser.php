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

	function getBrowser() {

	    global $user_agent;

	    $browser        =   "Unknown Browser";

	    $browser_array  =   array(
	                            '/msie/i'       =>  'Internet Explorer',
	                            '/firefox/i'    =>  'Firefox',
	                            '/safari/i'     =>  'Safari',
	                            '/chrome/i'     =>  'Chrome',
	                            '/edge/i'       =>  'Edge',
	                            '/opera/i'      =>  'Opera',
	                            '/netscape/i'   =>  'Netscape',
	                            '/maxthon/i'    =>  'Maxthon',
	                            '/konqueror/i'  =>  'Konqueror',
	                            '/mobile/i'     =>  'Handheld Browser'
	                        );

	    foreach ($browser_array as $regex => $value) { 

	        if (preg_match($regex, $user_agent)) {
	            $browser    =   $value;
	        }

	    }

	    return $browser;

	}


	$user_os        =   getOS();
	$user_browser   =   getBrowser();

/* General */

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
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

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
				"mdp_Client"=> sha1(sha1($_POST['mdp_Client'])),
				"etat_Client"=>$_POST['etat_Client']
			);

		$unModele->insert($tab);
	}

	function InscriptionEntreprise()
	{
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

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
				"mdp_Client"=> sha1(sha1($_POST['mdp_Client'])),
				"etat_Client"=>$_POST['etat_Client']
			);

		$unModele->insert($tab);
	}

	function Connexion()
	{
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

		$unModele->renseigner("Particuliers");

		$tab = array(
				"mail_Client" => $_POST['mail_Client'],
				"mdp_Client"=>$_POST['mdp_Client']
			);

		$resultat = $unModele->selectCount($tab);
		
		return $resultat;
	}

	function ConnexionEntreprise()
	{
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

		$unModele->renseigner("Entreprises");

		$tab = array(
				"mail_Client" => $_POST['mail_Client'],
				"mdp_Client"=> sha1(sha1($_POST['mdp_Client'])),
			);

		$resultat = $unModele->selectCount($tab);
		
		return $resultat;
	}

	function selectInfo()
	{
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

		$unModele->renseigner("Particuliers");

		$champs = array("ID_Client", "nom_Particulier", "prenom_Particulier", "civilite_Particulier", "dateNaiss_Particulier", "adr_Client", "CP_Client", "ville_Client", "mail_Client", "tel_Client", "etat_Client");

		$tab = array("mail_Client"=>$_POST['mail_Client']);

		$resultatID = $unModele->selectWhere($champs, $tab);

		return $resultatID;
	}

	function selectInfoEnt()
	{
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

		$unModele->renseigner("Entreprises");

		$champs = array("ID_Client", "nom_Entreprise", "numSIRET_Entreprise", "activite_Entreprise", "adr_Client", "CP_Client", "ville_Client", "mail_Client", "tel_Client", "etat_Client");

		$tab = array("mail_Client"=>$_POST['mail_Client']);

		$resultatID = $unModele->selectWhere($champs, $tab);

		return $resultatID;
	}
	
	function verifInscription()
	{
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

		$unModele->renseigner("Clients");

		$tab = array(
				"mail_Client" => $_POST['mail_Client']
			);

		$resultat = $unModele->selectCount($tab);

		return $resultat;
	}

/* PROFIL */

	function selectMarque()
	{
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

		$unModele->renseigner("TypeVehicules");

		$resultatMarque = $unModele->selectDistinct("marque_Vehicule");

		return $resultatMarque;
	}

	function selectModele()
	{
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

		$unModele->renseigner("TypeVehicules");

		$resultatModele = $unModele->selectDistinct("modele_Vehicule");

		return $resultatModele;
	}

	function selectTypeVehicule()
	{
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

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
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

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
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

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
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

		$unModele->renseigner("Vehicules");

		$tab = array(
				"ID_TypeVehicule"=>$idtv,
				"ID_Client"=>$idc
			);

		$unModele->insert($tab);
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

	function selectRDV()
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
				"ID_Client"=>$_SESSION['ID_Client']
			);

		$resultatVehicule = $unModele->selectWhereAll($champs, $tab);

		return $resultatVehicule;
	}

	function nbRDV()
	{
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

		$unModele->renseigner("RDVClientVehicule");

		$tab = array(
				"ID_Client" => $_SESSION['ID_Client']
			);

		$resultat = $unModele->selectCount($tab);
		
		return $resultat;
	}

	function deleteVehicule()
	{
		$user_os = getOS();

		if ($user_os != 'Mac OS X') { $unModele = new Modele("localhost", "Garage", "root", ""); }
		else { $unModele = new Modele("localhost", "Garage", "root", "root"); }

		$unModele->renseigner("Vehicules");

		$tab = array(
				"ID_Vehicule" => $_POST['ID_Vehicule']
			);

		$resultat = $unModele->delete($tab);
	}
?>