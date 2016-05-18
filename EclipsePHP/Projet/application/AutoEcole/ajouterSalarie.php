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
	include 'BLL/Salarie.php';

	$nom = "";
	$prenom = "";
	$surnom = "";
	$adresse = "";
	$ville = "";
	$cp = "";
	$tel = "";
	$poste = "";
	$vehicule = "";

	if (ISSET($_GET["Nom"])){
        $nom = $_GET["Nom"];
	}

	if (ISSET($_GET["Prenom"])){
        $prenom = $_GET["Prenom"];
	}

	if(ISSET($_GET["Surnom"])){
        $surnom = $_GET["Surnom"];
	}

	if (ISSET($_GET["Adresse"])){
        $adresse = $_GET["Adresse"];
	}

	if (ISSET($_GET["CodePostal"])){
        $cp = $_GET["CodePostal"];
	}

	if (ISSET($_GET["Ville"])){
        $ville = $_GET["Ville"];
	}

	if (ISSET($_GET["Poste"])){
        $poste = $_GET["Poste"];
	}

	if (ISSET($_GET["Telephone"])){
        $tel = $_GET["Telephone"];
	}

	if (ISSET($_GET["Vehicule"])){
        $vehicule = $_GET["Vehicule"];
	}

	$ville2 = new Ville();
	$ville2->Ville($ville,$cp);
	$ville2->setVille_nom($ville);
	$ville2->setVille_cp($cp);
	$vehicule2 = new Vehicule();
	$vehicule2->VehiculeNum($vehicule);
	$salarie = new Salarie();
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

	$salarie->creerSalarie();
    echo "<script type=\"text/javascript\">
            alert(\"Salarie ajoute.\");
            document.location.href=\"salaries.php\";
        </script>";
?>
