<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package page consulter formule 
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
	<!-- page de consulation de la page formule-->
	<div Class="filter">
	<div style="color:black;" class="table-container">
	<?php
			include 'BLL/Formule.php';
			$nbLecon = "";
			$prix = "";
			$ticketPrix = "";
			
			/* Récupération des rubriques en fonctions de l'enregistrement selectioné */
			foreach($_POST['formule'] as $formule){
				$Tab = unserialize($_SESSION['Tableau'.$formule]);
				$id = $Tab->getFormule_num();
				$nbLecon = $Tab->getFormule_nbLeconConduite();
				$prix = $Tab->getFormule_prix();
				$ticketPrix = $Tab->getFormule_ticketPrix();
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
					echo "<script type=\"text/javascript\">alert(\"Formule inexistante.\");document.location.href=\"formules.php\";</script>";
				}	
			/* Rubrique */
			echo "<tr>               
               <td><label for=\"Id\"><strong>Id</strong></label></td>
               <td><input type=\"text\" name=\"Id\" id=\"id\" value=\"".$id."\" readonly/></td>               
            </tr>	
			<br>
            <tr>               
               <td><label for=\"NbLecon\"><strong>Nombre de lecon</strong></label></td>
               <td><input type=\"text\" name=\"NbLecon\" id=\"nbLecon\" value=\"".$nbLecon."\" /></td>               
            </tr>
			<br>
            <tr>               
               <td><label for=\"Prix\"><strong>Prix</strong></label></td>
               <td><input type=\"text\" name=\"Prenom\" id=\"prix\" value=\"".$prix."\" /></td>               
            </tr>
			<br>
			<tr>               
               <td><label for=\"TicketPrix\"><strong>Ticket prix</strong></label></td>
               <td><input type=\"text\" name=\"TicketPrix\" id=\"ticketPrix\" value=\"".$ticketPrix."\" /></td>         
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
