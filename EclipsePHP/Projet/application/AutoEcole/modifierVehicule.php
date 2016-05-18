<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package page modification vehicule 
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
	include 'BLL/Vehicule.php';
	if(!ISSET($_GET["Id"])){
	//cas ou l'id choisis est invalide, un cas censée être impossible.
	echo "<script type=\"text/javascript\">
	alert(\"vehicule inexistant.\");
	document.location.href=\"vehicules.php\";
	</script>";
	}
	$id = $_GET["Id"];
	$immatriculation = "";
	$marque = "";
	$model = "";
	$histo = "";
	
	if(ISSET($_GET["Immatriculation"])){
	$immatriculation = $_GET["Immatriculation"];
	}
	
	if(ISSET($_GET["Marque"])){
	$marque = $_GET["Marque"];
	}
	
	if(ISSET($_GET["Model"])){
	$model = $_GET["Model"];
	}
	
	if(ISSET($_GET["Histo"])){
	$histo = $_GET["Histo"];
	}

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
	alert(\"vehicule modifié.\");
	document.location.href=\"vehicules.php\";
</script>


