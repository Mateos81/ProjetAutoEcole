<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package page consulter lecon 
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


if(!ISSET($_POST['lecon']) && !ISSET($_POST["Ajouter"])){
	//cas ou l'id choisis est invalide, un cas censée être impossible.
	echo "<script type=\"text/javascript\">
	alert(\"aucune selection.\");
	document.location.href=\"lecons.php\";
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
	<!-- page de consulation de la page lecon-->
	<div Class="filter">
	<div style="color:black;" class="table-container">
	<?php
			include 'BLL/Lecon.php';
			$id = "";
			$date = "";
			$eleve = "";
			$salarie = "";
			$vehicule = "";
			$type = "";
			IF(ISSET($_POST["Ajouter"])) 
				$button = $_POST["Ajouter"];
			IF(ISSET($_POST["Supprimer"])) 
				$button = $_POST["Supprimer"];
			IF(ISSET($_POST["Modifier"])) 
				$button = $_POST["Modifier"];
			if (!ISSET($_POST["Ajouter"])){
			/* Récupération des rubriques en fonctions de l'enregistrement selectioné */
			foreach($_POST['lecon'] as $lecon){
				$Tab = unserialize($_SESSION['Tableau'.$lecon]);
				$id = $Tab->getLecon_num();
				$date = $Tab->getLecon_date();
				$vehicule = $Tab->getLecon_vehicule();
				$salarie = $Tab->getLecon_salarie();
				$eleve = $Tab->getLecon_eleve();
				$type = $Tab->getLecon_type();
			}
			}
		
			
			echo "<section><h3>Consultation</h3>";
				/* Gestion button Ajouter/Supprimer/Modifier des formulaires */
				if($button="Modifier"){
					echo "<form action=\"modifierSalarie.php\" method=\"GET\">";
				}Else if($button="Ajouter"){
					echo "<form action=\"ajouterSalarie.php\" method=\"GET\">";	
				}
				Else if($button="Ajouter"){
					echo "<form action=\"supprimerSalarie.php\" method=\"GET\">";
				}Else{
					echo "<script type=\"text/javascript\">alert(\"lecon inexistant.\");document.location.href=\"lecons.php\";</script>";
				}
			/* Rubrique */
			echo "<tr>               
               <td><label for=\"Id\"><strong>Id</strong></label></td>
               <td><input type=\"text\" name=\"Id\" id=\"id\" value=\"".$id."\" readonly/></td>               
            </tr>	
			<br>
            <tr>               
               <td><label for=\"Date\"><strong>Date</strong></label></td>
               <td><input type=\"text\" name=\"Date\" id=\"date\" value=\"".$date."\" /></td>               
            </tr>
			<br>
            <tr>               
               <td><label for=\"Salarie\"><strong>Salarie</strong></label></td>
               <td><input type=\"text\" name=\"Salarie\" id=\"salarie\" value=\"".$salarie."\" /></td>               
            </tr>
			<br>
			<tr>               
               <td><label for=\"Eleve\"><strong>Eleve</strong></label></td>
               <td><input type=\"text\" name=\"Eleve\" id=\"eleve\" value=\"".$eleve."\" /></td>         
            </tr>
			<br>
			<tr>               
               <td><label for=\"Type\"><strong>Type</strong></label></td>
               <td><input type=\"text\" name=\"Type\" id=\"ytpe\" value=\"".$type."\" /></td>         
            </tr>
			<br>
			<tr>               
               <td><label for=\"Vehicule\"><strong>Vehicule</strong></label></td>
               <td><input type=\"text\" name=\"Vehicule\" id=\"Vehicule\" value=\"".$vehicule."\" /></td>         
            </tr>
		 </br>
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
