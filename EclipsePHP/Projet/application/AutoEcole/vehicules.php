<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package page vehicules
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
		<form  style="color:white;" action="action_vehicules.php">
			<fieldset>
				<legend>Filtres vehicules :</legend>
				Modèle <input style="color:black;" type="text" name="model">
				Marque<input style="color:black;"type="text" name="marque">
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
						<th style="width:100px;">Immatriculation</th>
						<th style="width:100px;">Marque</th>
						<th style="width:100px;">Model</th>
						<th style="width:100px;">HistoKm</th>
					</tr>
				</thead>
				<!-- Corp du tableau de recherche de la page-->
				<tbody
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
						include 'BLL/Vehicule.php';
						$Tableau = Vehicule::listeVehicules("", "");
						$MaxTab = 10;
						$TAILLE = count($Tableau);
						echo "<form action=\"consulterVehicule.php\" method=\"post\">";
						/* Boucle affichage du tableau de la page*/
						for ($x = 0; $x < $TAILLE; $x++)
                        {
							$_SESSION['Tableau'.$x] = serialize($Tableau[$x]);
                            echo "<tr>
										<td style=\"width:30px;\">
											<input type=\"checkbox\" name=\"vehicule[]\" id=\"vehicule\" value=\"" . $x . "\" onclick=\"clickCheck(this);\" />
										</td>
                                        <td style=\"width:30px;\">" . $Tableau[$x]->getVehicule_num() . "</td>
                                        <td style=\"width:100px;\">" . $Tableau[$x]->getVehicule_immatriculation() . "</td>
                                        <td style=\"width:100px;\">" . $Tableau[$x]->getVehicule_marque() . "</td>
                                        <td style=\"width:100px;\">" . $Tableau[$x]->getVehicule_modele() . "</td>
										<td style=\"width:100px;\">" . $Tableau[$x]->getVehicule_dernierHistorique()->getHistoKm_nbKm() . "</td>
									</tr>";
						}
						/* Boucle d'affichage de ligne vide pour beauté graphique si peu d'enregistrement*/
						if ($TAILLE < $MaxTab)
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
