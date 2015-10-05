<?php session_start();
header( 'content-type: text/html; charset=utf-8' );
 if(isset($_POST['mdp'])){if($_POST['mdp']=='Carpediem/2014'){$_SESSION['admin']=TRUE;}else{$_SESSION['admin']=FALSE;}}else{if(!(isset($_SESSION['admin']))){$_SESSION['admin']=FALSE;}};?>
<!DOCTYPE html>
<html lang=en>
	<head>
<style>
table{text-align:center;}
article{text-align:center;}
.ajout{display:none; z-index:300; position:relative; background:#FFFFD7; width:100%;}
form{display:inline-block;}
</style>
	<?php
	$titre="remerciement";
	include("../header.php") ?>
	<!--fin entête et menu-->
	<h1>Remerciements <?php if($_SESSION['admin']){echo "<span class='cible' onclick=revelation('ajout_partenaire')>+</span>";} ?></h1>
	<?php if($_SESSION['admin']){ include("../admin/ajouter/partenaire_form.php");} ?>
	<article>
	<h2>A tous nos partenaires financiers</h2>
		<table cellspacing=10>
<?php
	$partenaires = $db->query('SELECT * FROM partenaires WHERE statut="financeur" ORDER BY nom;')->fetchAll();
	foreach($partenaires as $donnee){
	echo "<tr>
				<td width=100>".html_entity_decode(stripslashes($donnee['nom']))."</td>
				<td>
					<a href='".$donnee['site']."' target='_blank'>
						<img src='../admin/".$donnee['logo']."' height=100>
					</a>
				</td>
				<td width=1000>".html_entity_decode(stripslashes($donnee ['remerciement']))."</td>";
	if($_SESSION['admin']){echo "<td width=30><form method='post' action='../admin/supprimer/partenaire.php'><input type='hidden' name='id' value='".$donnee['id']."'><input type='submit' value='supprimer'></form></td>";}
}
?>
		</table>
	</article>
	<hr width=80%>
	<article>
		<h2>A tous nos fournisseurs</h2>
			<table cellspacing=10>
	<?php
		$partenaires = $db->query('SELECT * FROM partenaires WHERE statut="fournisseur" ORDER BY nom;')->fetchAll();
		foreach($partenaires as $donnee){
		echo "<tr>
					<td width=100>".html_entity_decode(stripslashes($donnee['nom']))."</td>
					<td>
						<a href='".$donnee['site']."' target='_blank'>
							<img src='../admin/".$donnee['logo']."' height=100>
						</a>
					</td>
					<td width=1000>".html_entity_decode(stripslashes($donnee['remerciement']))."</td>";
		if($_SESSION['admin']){echo "<td width=30><form method='post' action='../admin/supprimer/partenaire.php'><input type='hidden' name='id' value='".$donnee['id']."'><input type='submit' value='supprimer'></form></td>";}
	}
	?>
			</table>	
	</article>
	<hr width=80%>
	<article>
	<h2>A tous nos autres partenaires</h2>
		<table cellspacing=10>
	<?php
		$partenaires = $db->query('SELECT * FROM partenaires WHERE statut="autre" ORDER BY nom;')->fetchAll();
		foreach($partenaires as $donnee){
		echo "<tr>
					<td width=100>".html_entity_decode(stripslashes($donnee['nom']))."</td>
					<td>
						<a href='".$donnee['site']."' target='_blank'>
							<img src='../admin/".$donnee['logo']."' height=100>
						</a>
					</td>
					<td width=1000>".html_entity_decode(stripslashes($donnee['remerciement']))."</td>";
		if($_SESSION['admin']){echo "<td width=30><form method='post' action='../admin/supprimer/partenaire.php'><input type='hidden' name='id' value='".$donnee['id']."'><input type='submit' value='supprimer'></form></td>";}
	}
	?>
			</table>	
	</article>
	<?php include("../footer.php") ?>
</section>
</body>
</html>	
