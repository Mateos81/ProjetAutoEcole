<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package page consulter examen 
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
	<!-- page de consulation de la page examen-->
	<div Class="filter">
	<div style="color:black;" class="table-container">
	<?php
			include 'BLL/Examen.php';
			$date = "";
			$type = "";
			
			/* Récupération des rubriques en fonctions de l'enregistrement selectioné */
			foreach($_POST['examen'] as $examen){
				$Tab = unserialize($_SESSION['Tableau'.$examen]);
				$date = $Tab->getExamen_date();
				$type = $Tab->getExamen_type();
			}
			IF(ISSET($_POST["Ajouter"])) 
				$button = $_POST["Ajouter"];
			IF(ISSET($_POST["Supprimer"])) 
				$button = $_POST["Supprimer"];
			IF(ISSET($_POST["Modifier"])) 
				$button = $_POST["Modifier"];
			
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
					echo "<script type=\"text/javascript\">alert(\"Examen inexistant.\");document.location.href=\"examen.php\";</script>";
				}
			/* Rubrique */
			echo "<tr>               
               <td><label for=\"Date\"><strong>Date</strong></label></td>
               <td><input type=\"text\" name=\"Date\" id=\"date\" value=\"".$date."\" readonly/></td>               
            </tr>	
			<br>
            <tr>               
               <td><label for=\"Type\"><strong>Type</strong></label></td>
               <td><input type=\"text\" name=\"Type\" id=\"type\" value=\"".$type."\" /></td>               
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
