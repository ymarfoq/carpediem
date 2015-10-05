<?php
	session_start();
	if (isset($_POST['mdp'])){$_SESSION['mdp']=$_POST['mdp'];}
	else if (isset($_SESSION['mdp'])){$_SESSION['mdp']=$_SESSION['mdp'];}
	else {$_SESSION['mdp']="nul";}
?>

<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
<title>TEDxHECMontréal | Admin</title>

<link rel="shortcut icon" type="image/png" href="images/favicon.png">
<!--POLICES-->
<!--CSS-->
<link rel="stylesheet" type="text/css" media="all" href="../style.css">
<style>
.block{display:none; background:white; width:800px; margin:auto; border-radius:12px;}
#admin_menu{float:left; margin:auto; width:150px;}
.actions{margin:5px; border-radius:3px;}
.categories{width:150px; border-radius:3px;}
table{text-align:center;}
textarea{ border:none; padding:60px 80px; background: url("../images/parchemin.png") no-repeat  center; background-size:100%; border-radius:3px; font-family:'Ruzicka'; font-style: italic; font-weight: bold;}
</style>
</head>
<body>
	<section>
	<?php include("../header.php");
	
		if (isset($_SESSION['mdp']) &  $_SESSION['mdp']=== "Carpediem/2014") {
			$db =new PDO('sqlite:base.db');
		?>
	
	<table id='admin_menu' cellspacing=0;>
		<tr>
			<td width=200; valign='top'>
				<h3 class='cible categories' onclick='afficher(0,0)'>Membres</h3>
				<h3 class='cible categories' onclick='afficher(1,0)'>Remerciements</h3>
				<h3 class='cible categories' onclick='afficher(2,0)'>Nouveau livre</h3>
				<h3 class='cible categories' onclick='afficher(3,0)'>Nouveau jeu</h3>
				<h3 class='cible categories' onclick='afficher(4,0)'>Description</h3>
			</td>

			<td valign='top'>
				
				<!--section ajouter-->	
					
				<div class='block'>
					<table width='100%' cellspacing=0;>
						<tr>
							<td width='33%' onclick='afficher(0,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(0,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(0,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("ajouter/membre_form.php") ?>
				</div>
				<div class='block'>
					<table width='100%' cellspacing=0;>
						<tr>
							<td width='33%' onclick='afficher(1,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(1,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(1,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("ajouter/partenaire_form.php") ?>
				</div>
				<div class='block'>
					<table width='100%' cellspacing=0;>
						<tr>
							<td width='33%' onclick='afficher(2,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(2,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(2,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("ajouter/livre_form.php") ?>
				</div>
				<div class='block'>
					<table width='100%' cellspacing=0;>
						<tr>
							<td width='33%' onclick='afficher(3,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(3,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(3,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("ajouter/jeu_form.php") ?>
				</div>
				<div class='block'>
					<table width='100%' cellspacing=0;>
						<tr>
							<td width='33%' onclick='afficher(4,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(4,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(4,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("ajouter/description_form.php") ?>
				</div>
				
				<!--fin section ajouter, début section modifier-->
				
				<div class='block'>
					<table width='100%' cellspacing=0>
						<tr>
							<td width='33%' onclick='afficher(0,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(0,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(0,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("modifier/membre_form.php") ?>
				</div>
				<div class='block'>
					<table width='100%' cellspacing=0>
						<tr>
							<td width='33%' onclick='afficher(1,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(1,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(1,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("modifier/partenaire_form.php") ?>
				</div>
				<div class='block'>
					<table width='100%' cellspacing=0>
						<tr>
							<td width='33%' onclick='afficher(2,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(2,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(2,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("modifier/livre_form.php") ?>
				</div>
				<div class='block'>
					<table width='100%' cellspacing=0>
						<tr>
							<td width='33%' onclick='afficher(3,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(3,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(3,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("modifier/jeu_form.php") ?>
				</div>
				<div class='block'>
					<table width='100%' cellspacing=0>
						<tr>
							<td width='33%' onclick='afficher(4,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(4,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(4,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("modifier/description_form.php") ?>
				</div>
				
				<!--fin section ajouter, début section modifier-->
				
				<div class='block'>
					<table width='100%' cellspacing=0>
						<tr>
							<td width='33%' onclick='afficher(0,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(0,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(0,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("supprimer/membre_form.php") ?>
				</div>
				<div class='block'>
					<table width='100%' cellspacing=0>
						<tr>
							<td width='33%' onclick='afficher(1,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(1,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(1,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("supprimer/partenaire_form.php") ?>
				</div>
				<div class='block'>
					<table width='100%' cellspacing=0>
						<tr>
							<td width='33%' onclick='afficher(2,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(2,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(2,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("supprimer/livre_form.php") ?>
				</div>
				<div class='block'>
					<table width='100%' cellspacing=0>
						<tr>
							<td width='33%' onclick='afficher(3,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(3,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(3,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("supprimer/jeu_form.php") ?>
				</div>
				<div class='block'>
					<table width='100%' cellspacing=0>
						<tr>
							<td width='33%' onclick='afficher(4,0)'><h3 class='cible actions'>Ajouter</h3></td>
							<td  width='33%' onclick='afficher(4,1)'><h3 class='cible actions'>Modifier</h3></td>
							<td  width='33%' onclick='afficher(4,2)'><h3 class='cible actions'>Supprimer</h3></td>
						</tr>
					</table>
					<?php include("supprimer/description_form.php") ?>
				</div>
				
			</td>
		</tr>
	</table>	
<?php	}
		else { echo "La connexion n'a pas été effectuée correctement. Veuillez <a href='./'>réessayer</a> plus tard ou contacter le webmaster."; }
?>
	</section>
</body>
<script src="script.js"></script>
<?php include("../admin/stat.php") ?>
</html>	
