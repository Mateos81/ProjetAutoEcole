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
		<form  style="color:white;" action="action_eleves.php">
			<fieldset>
				<legend>Filtres eleves :</legend>
				Nom eleve  <input style="color:black;" type="text" name="eleveNom">
				prénom eleve <input style="color:black;"type="text" name="elevePrenom">
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
						<th>Id Eleve</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Adresse</th>
						<th>Ville</th>
						<th>Code Postal</th>
						<th>telephone</th>
						<th>Date Naissance</th>
						<th>Salarie</th>
						<th>Client</th>
					</tr>
				</thead>
				<tbody>
					<?php
						include 'BLL/Eleve.php';
						$Tableau = Eleve::listeEleves("", "", "");
						$MaxTab = 10;
						$TAILLE = count($Tableau);
						for ($x = 0; $x < $TAILLE; $x++) {
						  echo "<tr>
                                    <td style=\"width:30px;\">
                                        <input type='checkbox' name='check'/>
                                        <input type='hidden' name='Eleve' value='" . serialize($Tableau[$x]) . "'/>
                                    </td>
                                    <td style=\"width:30px;\">" . $Tableau[$x]->getPersonne_id() . "</td>
                                    <td>" . $Tableau[$x]->getPersonne_nom() . "</td>
                                    <td>" . $Tableau[$x]->getPersonne_prenom() . "</td>
                                    <td style=\"width:200px;\">" . $Tableau[$x]->getPersonne_adr() . "</td>
                                    <td>" . $Tableau[$x]->getPersonne_ville()->getVille_nom() . "</td>
                                    <td>" . $Tableau[$x]->getPersonne_ville()->getVille_cp() . "</td>
                                    <td style=\"width:100px;\">" . $Tableau[$x]->getPersonne_tel() . "</td>
                                    <td>" . $Tableau[$x]->getEleve_dateNaiss() . "</td>
									<td>" . $Tableau[$x]->getEleve_salarie() . "</td>
									<td>" . $Tableau[$x]->getEleve_client() . "</td>
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
                                    <td style=\"width:30px;\"></td>
                                    <td></td>
                                    <td></td>
                                    <td style=\"width:200px;\"></td>
                                    <td></td>
                                    <td></td>
                                    <td style=\"width:100px;\"></td>
                                    <td></td>
									<td></td>
									<td></td>
                                </tr>";
							}
						}
					?>
				</tbody>
			</table>

		</div>
		<div style="margin-top:10px;">
		<form style="display: inline;" action="action_consulter_lecon.php">
			<input style="color:black;" type="submit" value="Consulter">
		</form>
		<form style="display: inline;" action="action_ajouter_lecon.php">
			<input style="color:black;" type="submit" value="Ajouter">
		</form>
		<form style="display: inline;" action="action_modifier_lecon.php">
			<input style="color:black;" type="submit" value="Modifier">
		</form>
		<form style="display: inline;" action="action_supprimer_lecon.php">
			<input style="color:black;" type="submit" value="Supprimer">
		</form>
		</div>
	<!-- Fiche -->
	</div>
	</section>
	<?php include('footer.php');?>
</body>
</html>
