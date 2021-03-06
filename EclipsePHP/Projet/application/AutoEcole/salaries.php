﻿<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package page salaries 
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
	<!-- Filter -->
	<div Class="filter">
		<form  style="color:white;" action="action_salaries.php">
			<fieldset>
				<legend>Filtres salariés :</legend>
				surnom salarie<input style="color:black;"type="text" name="salarieSurnom">
				nom salarie <input style="color:black;" type="text" name="salarieNom">
				prenom salarie <input style="color:black;"type="text" name="salariePrenom">
				<br><input type="radio" name="typeSalarie" value="0" Checked> All
				<input type="radio" name="typeSalarie" value="1"> Moniteur
				<input type="radio" name="typeSalarie" value="2"> Secretaire
				<br><input style="color:black;" type="submit" value="Rechercher">
			</fieldset>
		</form>
	<br>
	<!-- /Filter -->
	<!-- Fiche -->
			<div class="table-container">
			<table>
			<!-- Entête première ligne du tableau de recherche de la page-->
				<thead>
					<tr>
						<th style="width:30px;"></th>
						<th style="width:30px;">Id</th>
						<th style="width:100px;">Nom</th>
						<th style="width:100px;">Prénom</th>
						<th style="width:100px;">Surnom</th>
						<th style="width:200px;">Adresse</th>
						<th style="width:100px;">Ville</th>
						<th style="width:100px;">Code Postal</th>
						<th style="width:100px;">Poste</th>
						<th style="width:100px;">Telephone</th>
						<th style="width:100px;">Vehicule</th>
					</tr>
				</thead>
				<!-- Corp du tableau de recherche de la page-->
				<tbody>
				<!-- Fonction de gestion de la checkBox pour ne pouvoir qu'en sélectionner qu'un seul-->
				<script language="JavaScript">
					var nbCheck = 0;
					function isChecked(elmt)
					{
						if( elmt.checked )
						{
							return true;
						}
						else
						{
							return false;
						}
					}
					 
					function clickCheck(elmt)
					{
						if( (nbCheck < 1) || (isChecked(elmt) == false) )
						{
							if( isChecked(elmt) == true )
							{
								nbCheck += 1;
							}
							else
							{
								nbCheck -= 1;
							}
						}
						else
						{
							elmt.checked = '';
						}
					}
				</script>
					<?php
						/* include du BLL correspondant à la page*/
						include 'BLL/Salarie.php';
						$Tableau = Salarie::listeSalaries("", "", "", 0);
						$MaxTab = 10;
						$TAILLE = count($Tableau);
						echo "<form action=\"consulterSalarie.php\" method=\"post\">";
						/* Boucle affichage du tableau de la page*/
						for ($x = 0; $x < $TAILLE; $x++)
                        {
							$_SESSION['Tableau'.$x] = serialize($Tableau[$x]);
                            echo "<tr>
                                    <td style=\"width:30px;\">
                                        <input type=\"checkbox\" name=\"salarie[]\" id=\"salarie\" value=\"" . $x . "\" onclick=\"clickCheck(this);\" />
                                    </td>
                                    <td style=\"width:30px;\">" . $Tableau[$x]->getPersonne_id() . "</td>
                                    <td style=\"width:100px;\">" . $Tableau[$x]->getPersonne_nom() . "</td>
                                    <td style=\"width:100px;\">" . $Tableau[$x]->getPersonne_prenom() . "</td>
                                    <td style=\"width:100px;\">" . $Tableau[$x]->getSalarie_surnom() . "</td>
                                    <td style=\"width:200px;\">" . $Tableau[$x]->getPersonne_adr() . "</td>
                                    <td style=\"width:100px;\">" . $Tableau[$x]->getPersonne_ville()->getVille_nom() . "</td>
                                    <td style=\"width:100px;\">" . $Tableau[$x]->getPersonne_ville()->getVille_cp() . "</td>
                                    <td style=\"width:100px;\">" . $Tableau[$x]->getSalarie_poste() . "</td>
                                    <td style=\"width:100px;\">" . $Tableau[$x]->getPersonne_tel() . "</td>
                                    <td style=\"width:100px;\">" . $Tableau[$x]->getSalarie_vehicule()->getVehicule_num() . "</td>
                                </tr>";
						}
						/* Boucle d'affichage de ligne vide pour beauté graphique si peu d'enregistrement*/
						if($TAILLE <= $MaxTab)
                        {
							for ($x = 0; $x <= ($MaxTab - $TAILLE); $x++)
                            {
								echo "<tr>
                                    <td style=\"width:30px;\">
                                        <input type='checkbox' name='check' disabled/>
                                    </td>
                                    <td style=\"width:30px;\"></td>
                                    <td style=\"width:100px;\"></td>
                                    <td style=\"width:100px;\"></td>
                                    <td style=\"width:100px;\"></td>
                                    <td style=\"width:200px;\"></td>
                                    <td style=\"width:100px;\"></td>
                                    <td style=\"width:100px;\"></td>
                                    <td style=\"width:100px;\"></td>
                                    <td style=\"width:100px;\"></td>
                                    <td style=\"width:100px;\"></td>
                                </tr>";
							}
						}
					?>
					    <input type="submit" name="Modifier" value="Modifier"> 
						<input type="submit" name="Ajouter" value="Ajouter"> 
						<input type="submit" name="Supprimer" value="Supprimer">
					</form>
				</tbody>
			</table>
		</div>
	<!-- Fiche -->
	</div>
	</section>
	<?php include('footer.php');?>
</body>
</html>
