<?php
session_start();
if(ISSET($_SESSION['USER'])){
	header('Location: pageConfig.php');
	exit();
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
	<!-- 
	Formulaire de connexion page admin
	-->
	<section>
	<div Class="filter" style="width:500px;">
	     <h4 style="color:white;">Connexion Admin:</h4>
		       <form name="form1" id="form1" action="connexion.php" method="post">        
         <table>  
			<tbody style="overflow-y:auto;">		 
            <tr>   
				
               <td style="text-align:center;"><label for="login"><strong>Nom de compte</strong></label></td>
               <td style="text-align:center;"><input type="text" name="login" id="login"/></td>               
            </tr>            
            <tr>               
               <td style="text-align:center;"><label for="pass"><strong>Mot de passe</strong></label></td>
               <td style="text-align:center;"><input type="password" name="pass" id="pass"/></td>         
            </tr>
			</tbody>
         </table>
		 </br>
         <input type="submit" name="connexion" value="Se connecter"/>
      </form>
	  </div>
</section>
<?php include('footer.php');?>
</body>
</html>