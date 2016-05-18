<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package page modification client 
 */
// session_start();
// if((ISSET($_SESSION['USER']))){
	// if(( ISSET($_POST['Deco']))||
		// (time() - $_SESSION['LAST_ACTIVITY'] > 1200)){
		// session_destroy();
	// }else{
		// $_SESSION['LAST_ACTIVITY']=time();
	// }
// }
	include 'BLL/Client.php';
	if(!ISSET($_GET["Id"])){
	//cas ou l'id choisis est invalide, un cas censée être impossible.
	echo "<script type=\"text/javascript\">
	alert(\"client inexistant.\");
	document.location.href=\"clients.php\";
	</script>";
	}
	$id = $_GET["Id"];
	$nom = "";
	$prenom = "";
	$adresse = "";
	$ville = "";
	$cp = "";
	$tel = "";
	$dateNaissance = "";
	$eleve = "";
	
	if(ISSET($_GET["Nom"])){
	$nom = $_GET["Nom"];
	}
	
	if(ISSET($_GET["Prenom"])){
	$prenom = $_GET["Prenom"];
	}
	
	if(ISSET($_GET["DateNaissance"])){
	$dateNaissance = $_GET["DateNaissance"];
	}
	
	if(ISSET($_GET["Adresse"])){
	$adresse = $_GET["Adresse"];
	}
	
	if(ISSET($_GET["CodePostal"])){
	$cp = $_GET["CodePostal"];
	}
	
	if(ISSET($_GET["Ville"])){
	$ville = $_GET["Ville"];
	}
	
	if(ISSET($_GET["Eleve"])){
	$eleve = $_GET["Eleve"];
	}
	
	if(ISSET($_GET["Telephone"])){
	$tel = $_GET["Telephone"];
	}
	
	$ville2 = new Ville();
	$ville2->Ville($ville,$cp);
	$ville2->setVille_nom($ville);
	$ville2->setVille_cp($cp);
	$vehicule2 = new Vehicule();
	$vehicule2->VehiculeNum($vehicule);
	/*$salarie = new Salarie();
	$salarie->Salarie(
    		$id,
    		$nom,
    		$prenom,
    		$adresse,
    		$ville2,
    		$tel,
    		$poste,
    		$surnom,
			$vehicule2
    		);
	$salarie->modifierSalarie();*/
?>

<script type=\"text/javascript\">
	alert(\"Client modifié.\");
	document.location.href=\"clients.php\";
</script>


