<?php
session_start();
	if(!ISSET($_POST['login']) || !ISSET($_POST['pass'])){
		echo "<h1>You shouldn't have done that!</h1>";
	}else{
		$loginE = $_POST['login'];
		$mdpE = $_POST['pass'];
	
?>
			<!--<script type="text/javascript">
			alert("Login ou Mot de Passe incorrect.");
			history.back();
			</script>-->
<?php
			}
				
		$mdpBdd=mysqli_fetch_row($result);
		$mdpBdd=$mdpBdd[0];
		
		$mdpALire=md5($mdpE);

		if($mdpBdd==$mdpALire){
			$_SESSION['USER'] = $loginE;
			$_SESSION['LAST_ACTIVITY'] = time(); 
			header('Location: pageConfig.php');
			exit();
		}		
?>