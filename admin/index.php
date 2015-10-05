<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
<meta name="rating" content="general" />
<meta name="revisit-after" content="10 Days" />
<meta name="expires" content="never">
<meta name="distribution" content="global" /> 
<title>TEDxHECMontréal | Admin</title>
<!--POLICES-->
<!--CSS-->
<link rel="stylesheet" type="text/css" media="all" href="../style.css">
<style>
form{width:100%; text-align:center;}

</style>
</head>
<body>
	<section id="principal">
		<!--entête et menu-->
		<?php include("../header.php") ?>
		<!--fin entête et menu -->
		<br>
		<form method='post' action="admin.php">
			
			<label for="mdp">Mot de passe : </label>
			<input type="password" name="mdp" maxlength="30"/>
			<input type = "submit" onclick="return verification()" value='Connexion'>
		</form>
	</section>
</body>
</html>	
