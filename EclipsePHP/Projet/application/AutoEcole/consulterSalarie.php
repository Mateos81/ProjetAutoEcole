<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package page consulter salarie 
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


if(!ISSET($_POST['salarie']) && !ISSET($_POST["Ajouter"])){
	//cas ou l'id choisis est invalide, un cas censée être impossible.
	echo "<script type=\"text/javascript\">
	alert(\"aucune selection.\");
	document.location.href=\"salaries.php\";
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
	<!-- page de consulation de la page salarie-->
	<div Class="filter">
	<div style="color:black;" class="table-container">
	<?php
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
			/* Récupération des rubriques en fonctions de l'enregistrement selectionné */
            IF(ISSET($_POST["Ajouter"])) {    
				$button = $_POST["Ajouter"];
                $id = "";
            }
			else IF(ISSET($_POST["Modifier"])) 
				$button = $_POST["Modifier"];
			else IF(ISSET($_POST["Supprimer"])) 
				$button = $_POST["Supprimer"];
            
            if (!ISSET($_POST["Ajouter"]))
            {
                foreach ($_POST['salarie'] as $salarie){
                    $Tab = unserialize($_SESSION['Tableau'.$salarie]);
                    $id = $Tab->getPersonne_id();
                    $nom = $Tab->getPersonne_nom();
                    $prenom = $Tab->getPersonne_prenom();
                    $surnom = $Tab->getSalarie_surnom();
                    $ville = $Tab->getPersonne_ville()->getVille_nom();
                    $cp = $Tab->getPersonne_ville()->getVille_cp();
                    $adresse = $Tab->getPersonne_adr();
                    $tel = $Tab->getPersonne_tel();
                    $poste = $Tab->getSalarie_poste();
                    $vehicule = $Tab->getSalarie_vehicule()->getVehicule_num();
                }
			}
			
			echo "<section><h3>Consultation</h3>";
				/* Gestion button Ajouter/Supprimer/Modifier des formulaires */
				if($button=="Modifier"){
					echo "<form action=\"modifierSalarie.php\" method=\"GET\">";
				}Else if($button=="Ajouter"){
					echo "<form action=\"ajouterSalarie.php\" method=\"GET\">";	
				}
				Else if($button=="Supprimer"){
					echo "<form action=\"supprimerSalarie.php\" method=\"GET\">";
				}Else{
					echo "<script type=\"text/javascript\">alert(\"Salarié inexistant.\");document.location.href=\"salaries.php\";</script>";
				}	
			/* Rubrique */
            if(!ISSET($_POST["Ajouter"])) {
			echo "<tr>               
               <td><label for=\"Id\"><strong>Id</strong></label></td>
               <td><input type=\"text\" name=\"Id\" id=\"id\" value=\"".$id."\" readonly/></td>               
            </tr>";
            }
            
			echo "<br>
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
               <td><label for=\"Surnom\"><strong>Surnom</strong></label></td>
               <td><input type=\"text\" name=\"Surnom\" id=\"surnom\" value=\"".$surnom."\" /></td>         
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
               <td><label for=\"Poste\"><strong>Poste</strong></label></td>
               <td><input type=\"text\" name=\"Poste\" id=\"Poste\" value=\"".$poste."\" /></td>         
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
