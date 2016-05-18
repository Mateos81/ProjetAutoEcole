<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package page consulter eleve 
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
	<!-- page de consulation de la page eleve-->
	<div Class="filter">
	<div style="color:black;" class="table-container">
	<?php
			include 'BLL/Eleve.php';
			$nom = "";
			$prenom = "";
			$surnom = "";
			$adresse = "";
			$ville = "";
			$cp = "";
			$tel = "";
			$dateNaissance = "";
			$salarie = "";
			$client = "";
			
			/* Récupération des rubriques en fonctions de l'enregistrement selectioné */
			foreach($_POST['eleve'] as $eleve){
				$Tab = unserialize($_SESSION['Tableau'.$eleve]);
				$id = $Tab->getPersonne_id();
				$nom = $Tab->getPersonne_nom();
				$prenom = $Tab->getPersonne_prenom();
				$ville = $Tab->getPersonne_ville()->getVille_nom();
				$cp = $Tab->getPersonne_ville()->getVille_cp();
				$adresse = $Tab->getPersonne_adr();
				$tel = $Tab->getPersonne_tel();
				$dateNaissance = $Tab->getSalarie_poste();
				$salarie = $Tab->getSalarie_poste();
				$client = $Tab->getSalarie_vehicule();
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
					echo "<script type=\"text/javascript\">alert(\"eleves inexistant.\");document.location.href=\"eleves.php\";</script>";
				}	
			/* Rubrique */
			echo "<tr>               
               <td><label for=\"Id\"><strong>Id</strong></label></td>
               <td><input type=\"text\" name=\"Id\" id=\"id\" value=\"".$id."\" readonly/></td>               
            </tr>	
			<br>
            <tr>               
               <td><label for=\"Nom\"><strong>Nom</strong></label></td>
               <td><input type=\"text\" name=\"Nom\" id=\"nom\" value=\"".$nom."\" /></td>               
            </tr>
			<br>
            <tr>               
               <td><label for=\"Prenom\"><strong>Prenom</strong></label></td>
               <td><input type=\"text\" name=\"Prenom\" id=\"Prenom\" value=\"".$prenom."\" /></td>               
            </tr>
			<br>
			<tr>               
               <td><label for=\"DateNaissance\"><strong>DateNaissance</strong></label></td>
               <td><input type=\"text\" name=\"DateNaissance\" id=\"dateNaissance\" value=\"".$dateNaissance."\" /></td>         
            </tr>
			<br>
			<tr>               
               <td><label for=\"Adresse\"><strong>Adresse</strong></label></td>
               <td><input type=\"text\" name=\"Adresse\" id=\"Adresse\" value=\"".$adresse."\" /></td>         
            </tr>
			<br>
			<tr>               
               <td><label for=\"Ville\"><strong>Ville</strong></label></td>
               <td><input type=\"text\" name=\"Ville\" id=\"Ville\" value=\"".$ville."\" /></td>         
            </tr>
			<br>
			<tr>               
               <td><label for=\"CodePostal\"><strong>CodePostal</strong></label></td>
               <td><input type=\"text\" name=\"CodePostal\" id=\"CodePostal\" value=\"".$cp."\" /></td>         
            </tr>
			<br>
			<tr>               
               <td><label for=\"Telephone\"><strong>Telephone</strong></label></td>
               <td><input type=\"text\" name=\"Telephone\" id=\"Telephone\" value=\"".$tel."\" /></td>         
            </tr>
			<br>
			<tr>               
               <td><label for=\"Salarie\"><strong>Salarie</strong></label></td>
               <td><input type=\"text\" name=\"Salarie\" id=\"salarie\" value=\"".$salarie."\" /></td>         
            </tr>
			<br>
			<tr>               
               <td><label for=\"Client\"><strong>Client</strong></label></td>
               <td><input type=\"text\" name=\"Client\" id=\"client\" value=\"".$client."\" /></td>         
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
