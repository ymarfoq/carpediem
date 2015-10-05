<?php session_start();
header( 'content-type: text/html; charset=utf-8' );
 if(isset($_POST['mdp'])){if($_POST['mdp']=='Carpediem/2014'){$_SESSION['admin']=TRUE;}else{$_SESSION['admin']=FALSE;}}else{if(!(isset($_SESSION['admin']))){$_SESSION['admin']=FALSE;}};?>
<!DOCTYPE html>
<html lang=en>
	<head>
<style>
article{width:100%; display:inline-block; margin:20px auto;}
.cdc{ float:right; height:280px; width:300px; display:inline-block; margin:15px;}
.nouveau{overflow:hidden; display:inline-block; margin-left:30px;}
.nouveau h3{font-size:14px; margin:0px;}
.nouveau h4{font-size:13px; font-style:italic; margin:2px; text-align:center;}
.ajout{display:none; z-index:300; position:relative; background:#FFFFD7; width:100%;}
.page{background: url(../images/page.jpg); background-size:cover; text-align:center;}
.cover{background: url(../images/cover.jpg); background-size:cover; text-align:center;}
.cover h4{margin-top:45px; margin-bottom:-30px;color:#FFC704; font-size:20px; font-family:'LadyRene';}
.page h4{margin-top:20px; font-size:14px; font-family:'Ruzicka';}
.page p{font-family:'Ruzicka';}
</style>
	<?php
	$titre="produits";
	include("../header.php") ?>
	<!--fin entête et menu-->
	<h1>Nos produits <?php if($_SESSION['admin']){echo "<span class='cible' onclick=revelation('ajout_produit')>+</span>";} ?></h1>
	<?php if($_SESSION['admin']){ include("../admin/ajouter/produit_form.php");} ?>
	<article id='livres'>
		<h2>Livres - Quelques nouveautés</h2>
		<table class='nouveau' cellspacing=15>
<?php
$livres = $db->query('SELECT * FROM produits WHERE type="livre" and cdc<>"TRUE" ORDER BY id DESC LIMIT 5;')->fetchAll();
echo "<tr>";
foreach($livres as $donnee){echo "<td width=100 valign=top><h3>".html_entity_decode(stripslashes($donnee['titre']))."</h3></td>";}
echo "</tr><tr>";
foreach($livres as $donnee){echo "<td valign=top><h4>".html_entity_decode(stripslashes($donnee['editeur']))."</h4></td>";}
echo "</tr><tr>";
foreach($livres as $donnee){echo "<td valign=top><img title='".$donnee['description']."' src='../admin/".$donnee['photo']."' width=100></td>";}
echo "</tr>";
if($_SESSION['admin']){
	echo "<tr>";
	foreach($livres as $donnee){
		echo "<td><form method='post' action='../admin/supprimer/produit.php'>
					<input type='hidden' name='id' value='".$donnee ['id']."' />
					<input type = 'submit' value='supprimer'>
				</form></td>";
	}
	echo "</tr>";
}
?>
		</table>
		<?php include('livre.php'); ?>
	</article>
	<hr width=80%>
	<article id='jeux'>
		<h2>Jeux - Quelques nouveautés</h2>
		<table class='nouveau' cellspacing=15>
<?php
$jeux = $db->query('SELECT * FROM produits WHERE type="jeu" and cdc<>"TRUE" ORDER BY id DESC LIMIT 5;')->fetchAll();
echo "<tr>";
foreach($jeux as $donnee){echo "<td width=100 valign=top><h3>".html_entity_decode(stripslashes($donnee['titre']))."</h3></td>";}
echo "</tr><tr>";
foreach($jeux as $donnee){echo "<td valign=top><h4>".html_entity_decode(stripslashes($donnee['editeur']))."</h4></td>";}
echo "</tr><tr>";
foreach($jeux as $donnee){echo "<td valign=top><img src='../admin/".$donnee['photo']."' width=100></td>";}
echo "</tr>";
if($_SESSION['admin']){
	echo "<tr>";
	foreach($jeux as $donnee){
		echo "<td><form method='post' action='../admin/supprimer/produit.php'>
					<input type='hidden' name='id' value='".$donnee ['id']."' />
					<input type = 'submit' value='supprimer'>
				</form></td>";
	}
	echo "</tr>";
}
?>
		</table>
		
		<?php include('jeu.php'); ?>
		</div>
	</article>
	<hr width=80%>
	<article>
		<h2>articles divers</h2>
		<table width=900 cellspacing=10 class='nouveau'>
			<tr style='width:900px; text-align:center;'>
<?php
$livres = $db->query('SELECT * FROM produits WHERE type="divers" ORDER BY id DESC LIMIT 5;')->fetchAll();

foreach($livres as $donnee){
	echo "<td valign=top>
				<h3>".html_entity_decode(stripslashes($donnee['titre']))."</h3>
				<img src='../admin/".$donnee['photo']."' height=100>";
				if($_SESSION['admin']){echo "<form method='post' action='../admin/supprimer/produit.php'>
					<input type='hidden' name='id' value='".$donnee ['id']."' />
					<input type = 'submit' value='supprimer'>
				</form>";}
	echo "</td>";
}
?>
			</tr>
		</table>
	</article>
		<?php include("../footer.php") ?>
</section>
</body>
</html>	
