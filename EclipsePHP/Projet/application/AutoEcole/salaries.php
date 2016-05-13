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
				<br><input type="radio" name="typeSalarie" value="all" Checked> All 
				<input type="radio" name="typeSalarie" value="moniteur"> Moniteur 
				<input type="radio" name="typeSalarie" value="secretaire"> Secretaire
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
			<table >
				<thead>
					<tr>
						<th style="width:30px;"><input type="checkbox"  onClick="toggle(this)"></th>
						<th style="width:30px;">Id</th>
						<th>Nom</th>		
						<th>Prénom</th>
						<th>Surnom</th>
						<th style="width:200px;">Adresse</th>
						<th>Ville</th>
						<th>Code Postal</th>
						<th>Poste</th>
						<th style="width:100px;">Telephone</th>
						<th>Vehicule</th>
					</tr>
				</thead>
				<tbody>
					<?php
						/*include 'BLL/Salarie.php';
						$Tableau = Salarie::listeSalaries();
						$MaxTab = 10;
						$TAILLE = count($Tableau['salarie_id']);;
						for ($x = 0; $x <= $TAILLE; $x++){
						echo "<tr>
								<td style=\"width:30px;\"><input type='checkbox' name='check'</td>
								<td style="width:30px;">$Tableau[$x]['salarie_id']</td>	
								<td>$Tableau[$x]['salarie_nom']</td>									
								<td>$Tableau[$x]['salarie_prenom']</td>
								<td>$Tableau[$x]['salarie_surnom']</td>
								<td style="width:200px;">$Tableau[$x]['salarie_adr']</td>		
								<td>$Tableau[$x]['salarie_ville']</td>
								<td>$Tableau[$x]['salarie_cp']</td>
								<td>$Tableau[$x]['salarie_poste']</td>
								<td>$Tableau[$x]['salarie_tel']</td>	
								<td>$Tableau[$x]['salarie_vehicule']</td>
							</tr>";
						}
						
						if($TAILLE <= $MaxTab){
							for ($x = 0; $x <= ($MaxTab - $TAILLE); $x++){
								echo "<tr>
										<td style=\"width:30px;\"><input type='checkbox' name='check'</td>
										<td style="width:30px;"></td>	
										<td></td>									
										<td></td>
										<td></td>
										<td style="width:200px;"></td>		
										<td></td>
										<td></td>
										<td></td>
										<td></td>	
										<td></td>
									</tr>";
								}	
						}*/
						
						echo "<tr>
										<td style=\"width:30px;\"><input type='checkbox' name='check'</td>
										<td style=\"width:30px;\">1</td>
										<td>Roux</td>									
										<td>victor</td>
										<td>Rourou</td>
										<td style=\"width:200px;\">12 rue de je me la pète</td>		
										<td>Rutardi</td>
										<td>12000</td>
										<td>Chieur</td>
										<td style=\"width:100px;\">0620541564</td>	
										<td>Citroën C5</td>
									</tr>";
					?>  
				</tbody>
			</table>
			
		</div>
		<div style="margin-top:10px;">
		<form style="display: inline;" action="consulterSalarie.php">
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