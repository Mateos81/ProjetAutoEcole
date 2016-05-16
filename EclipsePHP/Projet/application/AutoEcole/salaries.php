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
	<script language="JavaScript">
		function toggle(source) {
			checkboxes = document.getElementsByName('check');
				for(var i=0, n=checkboxes.length;i<n;i++) {
				checkboxes[i].checked = source.checked;
				}
		}
	</script>

			<div class="table-container">
			<table>
				<thead>
					<tr>
						<th style="width:30px;"><input type="checkbox"  onClick="toggle(this)"></th>
						<th style="width:100px;">Id</th>
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
				<tbody>
					<?php
						include 'BLL/Salarie.php';
						$Tableau = Salarie::listeSalaries("", "", "", 0);
						$MaxTab = 10;
						$TAILLE = count($Tableau);
						for ($x = 0; $x < $TAILLE; $x++)
                        {
                            echo "<tr>
                                    <td style=\"width:30px;\">
                                        <input type='checkbox' name='check'/>
                                        <input type='hidden' name='Salarie' value='" . serialize($Tableau[$x]) . "'/>
                                    </td>
                                    <td style=\"width:100px;\">" . $Tableau[$x]->getPersonne_id() . "</td>
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

						if($TAILLE <= $MaxTab)
                        {
							for ($x = 0; $x <= ($MaxTab - $TAILLE); $x++)
                            {
								echo "<tr>
                                    <td style=\"width:30px;\">
                                        <input type='checkbox' name='check'/>
                                    </td>
                                    <td style=\"width:100px;\"></td>
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
				</tbody>
			</table>

		</div>
		<div style="margin-top:10px;">
		<form style="display: inline;" action="consulterSalarie.php" method="get">
			<input style="color:black;" type="submit" value="Consulter">
		</form>
		<form style="display: inline;" action="ajouterSalarie.php">
			<input style="color:black;" type="submit" value="Ajouter">
		</form>
		<form style="display: inline;" action="modifierSalarie.php">
			<input style="color:black;" type="submit" value="Modifier">
		</form>
		<form style="display: inline;" action="supprimerSalarie.php">
			<input style="color:black;" type="submit" value="Supprimer">
		</form>
		</div>
	<!-- Fiche -->
	</div>
	</section>
	<?php include('footer.php');?>
</body>
</html>
