<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package page modification examen 
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
	include 'BLL/Examen.php';
	if(!ISSET($_GET["Date"]) || !ISSET($_GET["Type"])){
	//cas ou la date ou le type choisis est invalide, un cas censée être impossible.
	echo "<script type=\"text/javascript\">
	alert(\"Examen inexistant.\");
	document.location.href=\"examens.php\";
	</script>";
	}
	$date = $_GET["Date"]);
	$type = $_GET["Type"];
	
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
	alert(\"Examen modifié.\");
	document.location.href=\"examens.php\";
</script>


