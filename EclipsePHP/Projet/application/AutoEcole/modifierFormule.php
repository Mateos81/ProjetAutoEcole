<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package page modification formule 
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
	include 'BLL/Formule.php';
	if(!ISSET($_GET["Id"])){
	//cas ou l'id choisis est invalide, un cas censée être impossible.
	echo "<script type=\"text/javascript\">
	alert(\"Formule inexistante.\");
	document.location.href=\"formules.php\";
	</script>";
	}
	$id = $_GET["Id"];
	$nbLecon = "";
	$prix = "";
	$ticketPrix = "";
	
	if(ISSET($_GET["NbLecon"])){
	$nbLecon = $_GET["NbLecon"];
	}
	
	if(ISSET($_GET["Prix"])){
	$prix = $_GET["Prix"];
	}
	
	if(ISSET($_GET["TicketPrix"])){
	$ticketPrix = $_GET["TicketPrix"];
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
	alert(\"Formule modifiée.\");
	document.location.href=\"formules.php\";
</script>


