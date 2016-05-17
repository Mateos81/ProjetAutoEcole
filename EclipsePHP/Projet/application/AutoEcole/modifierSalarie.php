<?php
// session_start();
// if((ISSET($_SESSION['USER']))){
	// if(( ISSET($_POST['Deco']))||
		// (time() - $_SESSION['LAST_ACTIVITY'] > 1200)){
		// session_destroy();
	// }else{
		// $_SESSION['LAST_ACTIVITY']=time();
	// }
// }
	
	if(!ISSET($_GET["Id"])){
	//cas ou l'id choisis est invalide, un cas censée être impossible.
	echo "<script type=\"text/javascript\">
	alert(\"Salarié inexistant.\");
	document.location.href=\"salaries.php\";
	</script>";
	}
	$id = $_GET["Id"];
	$nom = "";
	$prenom = "";
	$surnom = "";
	$adresse = "";
	$ville = "";
	$cp = "";
	$tel = "";
	$poste = "";
	$vehicule = "";
	
	if(ISSET($_GET["Nom"])){
	$nom = $_GET["Nom"];
	}
	
	if(ISSET($_GET["Prenom"])){
	$prenom = $_GET["Prenom"];
	}
	
	if(ISSET($_GET["Surnom"])){
	$adresse = $_GET["Surnom"];
	}
	
	if(ISSET($_GET["Adresse"])){
	$ville = $_GET["Adresse"];
	}
	
	if(ISSET($_GET["CodePostal"])){
	$cp = $_GET["CodePostal"];
	}
	
	if(ISSET($_GET["Poste"])){
	$poste = $_GET["Poste"];
	}
	
	if(ISSET($_GET["Telephone"])){
	$tel = $_GET["Telephone"];
	}
	
	if(ISSET($_GET["Vehicule"])){
	$vehicule = $_GET["Vehicule"];
	}
?>