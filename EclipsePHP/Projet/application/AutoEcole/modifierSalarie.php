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
	<!-- 
	Formulaire de modification de news
	-->
	<?php
	
	if(!ISSET($_GET["salarie_id"])){
	//cas ou l'id choisis est invalide, un cas censée être impossible.
	echo "<script type=\"text/javascript\">
	alert(\"Salarié inexistant.\");
	document.location.href=\"salaries.php\";
	</script>";
	}
	$id = $_GET["salarie_id"];
	$nom = "";
	$prenom = "";
	$surnom = "";
	$adresse = "";
	$ville = "";
	$cp = "";
	$tel = "";
	$poste = "";
	$vehicule = "";
	
	if(ISSET($_GET["salarie_nom"])){
	$nom = $_GET["salarie_nom"];
	}
	
	if(ISSET($_GET["salarie_prenom"])){
	$prenom = $_GET["salarie_prenom"];
	}
	
	if(ISSET($_GET["salarie_surnom"])){
	$adresse = $_GET["salarie_surnom"];
	}
	
	if(ISSET($_GET["salarie_adr"])){
	$ville = $_GET["salarie_adr"];
	}
	
	if(ISSET($_GET["salarie_cp"])){
	$cp = $_GET["salarie_cp"];
	}
	
	if(ISSET($_GET["salarie_poste"])){
	$poste = $_GET["salarie_poste"];
	}
	
	if(ISSET($_GET["salarie_tel"])){
	$tel = $_GET["salarie_tel"];
	}
	
	if(ISSET($_GET["salarie_vehicule"])){
	$vehicule = $_GET["salarie_vehicule"];
	}
	
	echo "<section class=\"formulaire\">
	     <h3>Consultation</h3>   
         <table>           
            <tr>               
               <td><label for=\"Nom\"><strong>Nom</strong></label></td>
               <td><input type=\"text\" name=\"Nom\" id=\"nom\" value=\"".$nom."\"/></td>               
            </tr>            
            <tr>               
               <td><label for=\"Prenom\"><strong>Prenom</strong></label></td>
               <td><textarea rows=\"10\" cols=\"150\" name=\"Texte\">".$prenom."</textarea></td>         
            </tr>
			<tr>               
               <td><label for=\"Surnom\"><strong>Surnom</strong></label></td>
               <td><input type=\"text\" name=\"Auteur\" id=\"auteur\" value=\"".$surnom."\"/></td>         
            </tr>
			<tr>               
               <td><label for=\"Adresse\"><strong>Adresse</strong></label></td>
               <td><input type=\"text\" name=\"Adresse\" id=\"Adresse\" value=\"".$adresse."\"/></td>         
            </tr>
			<tr>               
               <td><label for=\"CodePostal\"><strong>CodePostal</strong></label></td>
               <td><input type=\"text\" name=\"CodePostal\" id=\"CodePostal\" value=\"".$cp."\"/></td>         
            </tr>
			<tr>               
               <td><label for=\"Telephone\"><strong>Telephone</strong></label></td>
               <td><input type=\"text\" name=\"Telephone\" id=\"Telephone\" value=\"".$tel."\"/></td>         
            </tr>
				<tr>               
               <td><label for=\"Poste\"><strong>Poste</strong></label></td>
               <td><input type=\"text\" name=\"Poste\" id=\"Poste\" value=\"".$poste."\"/></td>         
            </tr>
				<tr>               
               <td><label for=\"Vehicule\"><strong>Vehicule</strong></label></td>
               <td><input type=\"text\" name=\"Vehicule\" id=\"Vehicule\" value=\"".$vehicule."\"/></td>         
            </tr>
			<input style=\"color:black;\" type=\"submit\" value=\"Modifier\">
         </table>
		 </br>
      </form>
	  <form  style=\"color:white;\" action=\"location : salarie.php/\">
			<fieldset>
				<br><input style=\"color:black;\" type=\"submit\" value=\"Retour\">
			</fieldset>
	  </form>
	</section>"
	?>
	</section>
	<?php include('footer.php');?>
</body>
</html>
