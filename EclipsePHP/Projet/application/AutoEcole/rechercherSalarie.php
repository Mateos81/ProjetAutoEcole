<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package page modification salarie
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

	$nom = "";
	$prenom = "";
	$surnom = "";
	$poste = "";

	if (ISSET($_GET["Nom"])){
        $nom = $_GET["Nom"];
	}

	if (ISSET($_GET["Prenom"])){
        $prenom = $_GET["Prenom"];
	}

	if(ISSET($_GET["Surnom"])){
        $surnom = $_GET["Surnom"];
	}

	if (ISSET($_GET["Poste"])){
        $poste = $_GET["Poste"];
	}

    echo "<script type=\"text/javascript\">
            document.location.href=\"salaries.php?Nom=$nom&Prenom=$prenom&Surnom=$surnom&Poste=$poste\";
        </script>";

?>
