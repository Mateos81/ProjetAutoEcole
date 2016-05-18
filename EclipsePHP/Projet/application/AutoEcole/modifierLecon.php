<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package page modification lecon 
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
	include 'BLL/Lecon.php';
	if(!ISSET($_GET["Id"])){
	//cas ou l'id choisis est invalide, un cas censée être impossible.
	echo "<script type=\"text/javascript\">
	alert(\"Lecon inexistant.\");
	document.location.href=\"lecons.php\";
	</script>";
	}
	$id = $_GET["Id"];
	$date = "";
	$eleve = "";
	$salarie = "";
	$vehicule = "";
	$type = "";
	
	if(ISSET($_GET["Date"])){
	$date = $_GET["Date"];
	}
	
	if(ISSET($_GET["Eleve"])){
	$eleve = $_GET["Eleve"];
	}
	
	if(ISSET($_GET["Salarie"])){
	$salarie = $_GET["Salarie"];
	}
	
	if(ISSET($_GET["Vehicule"])){
	$vehicule = $_GET["Vehicule"];
	}
	
	if(ISSET($_GET["Type"])){
	$type = $_GET["Type"];
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
	alert(\"Lecon modifié.\");
	document.location.href=\"lecons.php\";
</script>


