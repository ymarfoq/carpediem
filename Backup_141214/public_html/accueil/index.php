<?php session_start(); 
header( 'content-type: text/html; charset=utf-8' );
 if(isset($_POST['mdp'])){if($_POST['mdp']=='Carpediem/2014'){$_SESSION['admin']=TRUE;}else{$_SESSION['admin']=FALSE;}}else{if(!(isset($_SESSION['admin']))){$_SESSION['admin']=FALSE;}};?>
<!DOCTYPE html>
<html lang=en>
<head>
	<style>
article table{width:100%;}
#resume{text-align:center; overflow:hidden; margin:15px; font: 20px 'ruzicka', sans-serif;}
</style>
<?php 
	$titre="Accueil";
	include("../header.php");
?>
	<h1> Bienvenue à votre librairie</h1>
	<table>
		<tr>
	<td width=680 valign=top>
		<div id="resume">
			<p>
				<?php
$resume = $db->query('SELECT text FROM descriptions WHERE type="resume";')->fetch();
if($_SESSION['admin']){echo "<form method='post' action='../admin/modifier/description.php'>
			<input type='hidden' name='type' value='resume'>
			<textarea name='text' rows=10>".$resume['text']."</textarea>
			<input type='submit' value='Enregistrer les modifications'>
		</form>";}
else{ echo nl2br(html_entity_decode(stripslashes($resume['text'])));}
?>
			</p>
		</div>
		<hr width=80%>
		<h2>Dernières actualités</h2>
		<table cellspacing=10>
<?php
if($_SESSION['admin']){
		echo "<tr>
					<form method='post' action='../admin/ajouter/actu.php'>
						<input type='hidden' name='type' value='actu'>
						<td colspan=2><input type='text' name='text' size=90></td>
						<td width=50><input type='submit' value='+'></td>
					</form>
				</tr>";}
$actus = $db->query('SELECT * FROM actus ORDER BY id DESC LIMIT 5;')->fetchAll();
foreach($actus as $donnee){
	echo "<tr width=100%>
				<td >".$donnee['text']."</td>
				<td width=120 class='close'>publié le ".$donnee['date']."</td>";
	if($_SESSION['admin']){
		echo "<td width=30>
					<form method='post' action='../admin/supprimer/actu.php'>
						<input type='hidden' name='id' value='".$donnee['id']."'>
						<input type='submit' value='supprimer'>
					</form>
				</td>";}
	echo "</tr>";
}
?>
		</table>
	</td>	
	<td width=300>
	<?php
	$photos = $db->query('SELECT * FROM photos ORDER BY id DESC LIMIT 2;')->fetchAll();
foreach($photos as $donnee){
	echo "<img src='../admin/".$donnee['photo']."' width=280>";
	if($_SESSION['admin']){
		echo "<form method='post' action='../admin/modifier/photo.php' enctype='multipart/form-data'>
						<input type='text' name='legende' value='".$donnee['legende']."'>
						<input type='hidden' name='id' value='".$donnee['id']."'>
						<input type='hidden' name='MAX_FILE_SIZE' value='12000000' />
						<input type='file' name='photo'/>
						<input type='submit' value='modifier'>
					</form>";
	}
	else{echo "<h2>".$donnee['legende']."</h2>";}
}
?>
	</td>
	</tr>
	</table>
	<?php include("../footer.php") ?>
</section>
</body
</html>
