<?php
session_start();
if (!isset($_SESSION['USER'])) {
?>
			<script type="text/javascript">
			alert("Connexion nécessaire pour accéder à cette page.");
			document.location.href="../index.php";
			</script>
<?php
} else if (time() - $_SESSION['LAST_ACTIVITY'] > 1200) {
?>
			<script type="text/javascript">
			alert("Votre connexion a expiré pour inactivité.");
			document.location.href="../index.php";
			</script>
<?php
}else{
	$_SESSION['LAST_ACTIVITY']=time();
	//AFFICHER LA PAGE
	echo "

<!DOCTYPE html>
<html>
<body>
		<header>
			<a href=\"index.php\"><img src=\"images/Logo3syl.png\" height=\"250\" width=\"350\" alt=\"Jus de Box\" class=\"float\" id=\"banner\"/></a>
		</header>
	<?php include('head.php');?>
	<?php include('menu.php');?>
	<section>
		<form name=\"formDeco\" id=\"formDeco\" action=\"../index.php\" method=\"post\">
		<input type=\"hidden\" name=\"Deco\" id=\"Deco\" value=\"\"/>
        <input type=\"submit\" name=\"deconnexion\" value=\"Se déconnecter\"/>
	    </form>
	</section>
	<?php include('footer.php');?>
</body>
</html>
";
}	
?>