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
	<div Class="Filter">		
	<p style="border-style: solid;border-color: white;color:white;">Filter</p>
	<p style="border-style: solid;border-color: white;margin-top:1%;color:white;">Result</p>
	</div>
	</section>
	<?php include('footer.php');?>
</body>
</html>
