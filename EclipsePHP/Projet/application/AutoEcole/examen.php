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
		<form  style="color:white;" action="action_examen.php">
			<fieldset>
				<legend>Filtres examens :</legend>
				<input type="radio" name="typeLecon" value="0" checked> All
				<input type="radio" name="typeLecon" value="1"> Code
				<input type="radio" name="typeLecon" value="2"> Conduite
				<input style="color:black;" type="submit" value="Rechercher">
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
						<th>Date</th>
						<th>Type</th>
						<th>Leçon salarié</th>
						<th>Leçon eleves</th>
					</tr>
				</thead>
				<tbody>
					<?php
						include 'BLL/Examen.php';
						$Tableau = Examen::listeExamens(0);
						$MaxTab = 10;
						$TAILLE = count($Tableau);
						for ($x = 0; $x < $TAILLE; $x++) {
						echo "<tr>
                                    <td style=\"width:30px;\">
                                        <input type='checkbox' name='check'/>
                                        <input type='hidden' name='Examen' value='" . serialize($Tableau[$x]) . "'/>
                                    </td>
                                    <td>" . $Tableau[$x]->getExamen_date() . "</td>
                                    <td>" . $Tableau[$x]->getExamenTypeToString() . "</td>
                                    <td></td>
                                    <td></td>
                                </tr>";
						}

						if ($TAILLE <= $MaxTab)
                        {
							for ($x = 0; $x <= ($MaxTab - $TAILLE); $x++)
                            {
								echo "<tr>
                                    <td style=\"width:30px;\">
                                        <input type='checkbox' name='check'/>
                                    </td>
                                    <td></td>
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
