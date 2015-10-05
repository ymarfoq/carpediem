<?php session_start();
header( 'content-type: text/html; charset=utf-8' );
 if(isset($_POST['mdp'])){if($_POST['mdp']=='Carpediem/2014'){$_SESSION['admin']=TRUE;}else{$_SESSION['admin']=FALSE;}}else{if(!(isset($_SESSION['admin']))){$_SESSION['admin']=FALSE;}};?>
<!DOCTYPE html>
<html lang=en>
	<head>
<style>
article{text-align:center;}
#tableau{width:100%; align:center;}
.block{display:inline-block; text-align:center; overflow:hidden; margin:20px; border-radius:40px 40px 5px 5px;; padding:8px; background:#CFCFCF;}
.hr{background:#CFCFCF; margin:auto; margin-top:3px; margin-bottom:15px; height:2px; width:80%;}
span{width:100px; heigth:30px; margin:10px; border-radius:5px; border 1px solid;}
.cible{cursor: pointer;}
#cache{position:fixed; top:0; right:0; bottom:0; left:0; background-color:black; z-index:200; opacity:0.8; display:none;}
.centrale{position:fixed; top:50px; right:15%; left:15%; bottom:20px; background-color:#F5F5F5; z-index:300; opacity:1; display:none; text-align:center; overflow:auto;}
textarea{  width:90%;}
.centrale p{text-align:justify; font-size:16px; font-style:normal; margin:15px;}
.petit{font-size:12px;}
.ajout{display:none; z-index:300; position:relative; background:#FFFFD7; width:100%;}
</style>
	<?php 
	$titre="cooperative";
	include("../header.php") ?>
	<?php
$db =new PDO('sqlite:../admin/base.db');

$membres = $db->query('SELECT * FROM membres WHERE statut!="soutien";')->fetchAll();
?>
	<div id="cache"></div>
<?php

foreach($membres as $donnee) {
	echo "<div class='centrale' id='".$donnee['id']."'>";
	if($_SESSION['admin']){echo "<form method='post' action='../admin/modifier/membre.php' enctype='multipart/form-data'>
									<input type='hidden' name='id' value='".$donnee['id']."'>
									<input type='hidden' name='statut' value='".$donnee['statut']."'>";}
	echo "		<img class='exit cible' src='../images/croix.png' width=10 onclick='cachage(".$donnee['id'].",1);'>";
	if($_SESSION['admin']){echo "<h2><input type='text' name='prenom' value='".html_entity_decode(stripslashes($donnee ['prenom']))."'/><input type='text' name='nom' value='".html_entity_decode(stripslashes($donnee ['nom']))."'/>";}
	else{ echo "<h2>".html_entity_decode(stripslashes($donnee ['prenom']))." ".html_entity_decode(stripslashes($donnee ['nom']));}
	if($_SESSION['admin']){echo "<span class='close'>Ajouté le ".$donnee['date']."</span>";}
	echo "</h2>";
	echo "<img src='../admin/".$donnee ['photo']."' alt='speaker' width='150'/>"; if($_SESSION['admin']){echo "<br><input type='hidden' name='MAX_FILE_SIZE' value='12000000' />	<input type='file' name='photo'/>";}
	echo "<h2>";
	if($_SESSION['admin']){echo "<select name='fonction'>
							<option value='Président' "; if(html_entity_decode(stripslashes($donnee ['fonction']))=='Président'){echo"selected";}; echo">Président</option>
							<option value='Présidente' "; if(html_entity_decode(stripslashes($donnee ['fonction']))=='Présidente'){echo"selected";}; echo">Présidente</option>
							<option value='Vice-président' "; if(html_entity_decode(stripslashes($donnee ['fonction']))=='Vice-président'){echo"selected";} echo">Vice-président</option>
							<option value='Vice-présidente' "; if(html_entity_decode(stripslashes($donnee ['fonction']))=='Vice-présidente'){echo"selected";} echo">Vice-présidente</option>
							<option value='Trésorier' "; if(html_entity_decode(stripslashes($donnee ['fonction']))=='Trésorier'){echo"selected";} echo">Trésorier</option>
							<option value='Trésorière' "; if(html_entity_decode(stripslashes($donnee ['fonction']))=='Trésorière'){echo"selected";} echo">Trésorière</option>
							<option value='Secrétaire' "; if(html_entity_decode(stripslashes($donnee ['fonction']))=='Secrétaire'){echo"selected";} echo">Secrétaire</option>
							<option value='Administrateur' "; if(html_entity_decode(stripslashes($donnee ['fonction']))=='Administrateur'){echo"selected";} echo ">Administrateur</option>
							<option value='Administratrice' "; if(html_entity_decode(stripslashes($donnee ['fonction']))=='Administratrice'){echo"selected";} echo ">Administratrice</option>
						</select>";
						echo " auxiliaire<input type='checkbox' name='aux' value='TRUE' "; if($donnee ['aux']=='TRUE'){echo "checked";} echo ">";
	echo "</h2>";
	}
	else{ echo "<h2>".html_entity_decode(stripslashes($donnee ['fonction'])); if($donnee ['aux']=='TRUE'){echo " (membre auxiliaire)";}; echo "</h2>";}
	if($_SESSION['admin']){echo "<textarea name='bio' rows='10'>".$donnee ['bio']."</textarea>";}
	else{ echo "<p>".nl2br(html_entity_decode(stripslashes($donnee ['bio'])))."</p>";}
	if($_SESSION['admin']){echo "<h2><input type = 'submit' name='modifier' value='Enregistrer les modifications'> <input type = 'submit' name='supprimer' value='Supprimer le membre'></h2></form>";}
	echo "</div>";
}
?>
		<h1>Membres de la coopérative <?php if($_SESSION['admin']){echo "<span class='cible' onclick=revelation('ajout_membre')>+</span>";} ?></h1>
		<?php if($_SESSION['admin']){ include("../admin/ajouter/membre_form.php");} ?>
		<article>
			<h2>Membres travailleurs</h2>
<?php
$membres_t = $db->query('SELECT * FROM membres WHERE statut="travailleur" or  statut="travailleur_aux" ORDER BY nom;')->fetchAll();
foreach($membres_t as $donnee) {
			echo "	
						<div class='cible block' onclick='revelation(".$donnee['id'].",1);'>
							<h3 >".html_entity_decode(stripslashes($donnee ['prenom']))." ".html_entity_decode(stripslashes($donnee ['nom']))."</h3>
							<img src='../admin/".$donnee ['photo']."' alt='speaker' height=200 width=150'/>
						</div>";
}
?>
		</article>
<hr width=80%>
	<article>
		<h2>Membres de soutien sur le Conseil d'Administration</h2>
<?php
$membres_sCA = $db->query('SELECT * FROM membres WHERE statut="soutienCA" ORDER BY nom;')->fetchAll();
foreach($membres_sCA as $donnee) {
			echo "	
						<div class='cible block' onclick='revelation(".$donnee['id'].",1);'>
							<h3>".html_entity_decode(stripslashes($donnee ['prenom']))." ".html_entity_decode(stripslashes($donnee ['nom']))."</h3>
							<img src='../admin/".$donnee ['photo']."' alt='speaker'  height=200 width=150/>
						</div>";
}
?>
	</article>
	<hr width=80%>
	<article>
		<h2>Tous nos membres de soutien</h2>
<?php
$membres_s = $db->query('SELECT * FROM membres WHERE statut="soutien" ORDER BY nom;')->fetchAll();
foreach($membres_s as $donnee) {
			echo "<span>".html_entity_decode(stripslashes($donnee ['prenom']))." ".html_entity_decode(stripslashes($donnee ['nom']));
			if($_SESSION['admin']){echo "<form method='post' action='../admin/supprimer/membre.php' style='display:inline;'><input type='hidden' name='id' value='".$donnee ['id']."' /><input type = 'submit' value='supprimer'></form>";}
			echo "</span>";
}
?>
	<?php include("../footer.php") ?>
</section>
</body>
</html>	
