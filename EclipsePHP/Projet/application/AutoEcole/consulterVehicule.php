<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package page consulter vehicule 
 */
session_start();
// if((ISSET($_SESSION['USER']))){
	// if(( ISSET($_POST['Deco']))||
		// (time() - $_SESSION['LAST_ACTIVITY'] > 1200)){
		// session_destroy();
	// }else{
		// $_SESSION['LAST_ACTIVITY']=time();
	// }
// }

if(!ISSET($_POST['vehicule']) && !ISSET($_POST["Ajouter"])){
	//cas ou l'id choisis est invalide, un cas censée être impossible.
	echo "<script type=\"text/javascript\">
	alert(\"aucune selection.\");
	document.location.href=\"vehicules.php\";
	</script>";
}

?> 
<!DOCTYPE html>
<html>
<body>
		<header>
			<a href="index.php"><img src="images/Logo3syl.png" height="250" width="350" alt="Jus de Box" class="float" id="banner"/></a>
		</header>
	<?php include('head.php');?>
	<?php include('menu.php');?>
	<section>
	<!-- page de consulation de la page vehicule-->
	<div Class="filter">
	<div style="color:black;" class="table-container">
	<?php
			include 'BLL/Vehicule.php';
			$id = "";
			$immatriculation = "";
			$marque = "";
			$model = "";
			$histo = "";
			IF(ISSET($_POST["Ajouter"])) 
				$button = $_POST["Ajouter"];
			IF(ISSET($_POST["Supprimer"])) 
				$button = $_POST["Supprimer"];
			IF(ISSET($_POST["Modifier"])) 
				$button = $_POST["Modifier"];
			
			if (!ISSET($_POST["Ajouter"])){
			/* Récupération des rubriques en fonctions de l'enregistrement selectioné */
			foreach($_POST['vehicule'] as $vehicule){
				$Tab = unserialize($_SESSION['Tableau'.$vehicule]);
				$id = $Tab->getVehicule_num();
				$immatriculation = $Tab->getVehicule_immatriculation();
				$marque = $Tab->getVehicule_marque();
				$model = $Tab->getVehicule_modele();
				$histo = $Tab->getVehicule_historique();
			}
			}
			
			echo "<section><h3>Consultation</h3>";
				/* Gestion button Ajouter/Supprimer/Modifier des formulaires */
				if($button="Modifier"){
					echo "<form action=\"modifierExamen.php\" method=\"GET\">";
				}Else if($button="Ajouter"){
					echo "<form action=\"ajouterExamen.php\" method=\"GET\">";	
				}
				Else if($button="Ajouter"){
					echo "<form action=\"supprimerExamen.php\" method=\"GET\">";
				}Else{
					echo "<script type=\"text/javascript\">alert(\"Vehicule inexistant.\");document.location.href=\"vehicules.php\";</script>";
				}	
				/* Rubrique */
			echo "<tr>               
               <td><label for=\"Id\"><strong>Id</strong></label></td>
               <td><input type=\"text\" name=\"Id\" id=\"id\" value=\"".$id."\" readonly/></td>               
            </tr>	
			<br>
            <tr>               
               <td><label for=\"Immatriculation\"><strong>Immatriculation</strong></label></td>
               <td><input type=\"text\" name=\"Immatriculation\" id=\"immatriculation\" value=\"".$immatriculation."\" /></td>               
            </tr>
			<br>
            <tr>               
               <td><label for=\"Marque\"><strong>Marque</strong></label></td>
               <td><input type=\"text\" name=\"Marque\" id=\"marque\" value=\"".$marque."\" /></td>               
            </tr>
			<br>
			<tr>               
               <td><label for=\"Model\"><strong>Model</strong></label></td>
               <td><input type=\"text\" name=\"Model\" id=\"model\" value=\"".$model."\" /></td>         
            </tr>
			<br>
			<tr>               
               <td><label for=\"Histo\"><strong>Histo</strong></label></td>
               <td><input type=\"text\" name=\"Histo\" id=\"histo\" value=\"".$histo."\" /></td>         
            </tr>
			<br>
		 <input type=\"submit\" value=\"Valider\">
      </form>
	</section>"
	?>
	</div>
	</div>
	</section>
	<?php include('footer.php');?>
</body>
</html>
