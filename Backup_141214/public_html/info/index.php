<?php session_start(); 
header( 'content-type: text/html; charset=utf-8' );
 if(isset($_POST['mdp'])){if($_POST['mdp']=='Carpediem/2014'){$_SESSION['admin']=TRUE;}else{$_SESSION['admin']=FALSE;}}else{if(!(isset($_SESSION['admin']))){$_SESSION['admin']=FALSE;}};
$admin=$_SESSION['admin'];?>
<!DOCTYPE html>
<html lang=en>
	<head>
<style>
aside table{width:300px; text-align:center; background:#C8C8C8; border:2px solid; border-radius:5px; margin-top:15px; font-size:13px;}
article{width:680px; display:inline-block;}
aside{display:inline-block; float:right; padding:10px;}
#topo{text-align:justify; display:block; overflow:hidden; margin:15px; font: 20px 'ruzicka', sans-serif;}
</style>
	<?php
	$titre="info";
	include("../header.php")
	?>
	<!--fin entête et menu-->
	<h1> Comment tout a commencé...</h1>
	<article>
		<div id="topo">
			<p>
				<?php

$topo = $db->query('SELECT text FROM descriptions WHERE type="topo";')->fetch();
if($_SESSION['admin']){echo "<form method='post' action='../admin/modifier/description.php'>
			<input type='hidden' name='type' value='topo'>
			<textarea name='text' rows=50>".$topo['text']."</textarea>
			<input type='submit' value='Enregistrer les modifications'>
		</form>";}
else{ echo nl2br(html_entity_decode(stripslashes($topo['text'])));}

?>
			</p>
		</div>
	</article>
	<aside>
		<table cellspacing=10>
			<tr><th colspan=2><h2>Contacts</h2></th></tr>
			<tr><td><a href='mailto:libraire@librairiecarpediem.com'>Libraire</a></td><td>Isabelle Legault</td></tr>
			<tr><td><a href='mailto:jeux@librairiecarpediem.com'>Jeux</a></td><td>Manuela B.Erba</td></tr>
			<tr><td><a href='mailto:administration@librairiecarpediem.com'>Administration</a></td><td>Céline Giroux</td></tr>
			<tr><td><a href='mailto:cooperative@librairiecarpediem.com'>Coopérative</a></td><td>Anik Beaulieu</td></tr>
			<tr><td><a href='mailto:info@librairiecarpediem.com'>Information</a></td><td>-</td></tr>
			<tr><td>Téléphone</td><td>(819) 717 1313</td></tr>
			<tr><td>Fax</td><td>(819) 717 1306</td></tr>
		</table>
		<table cellspacing=10>
			<form method='post' action='../admin/modifier/horaires.php'>
			<tr><th colspan=3><h2>Horaires</h2></th></tr>
			<tr><th>jour</th><th>ouverture</th><th>fermeture</th></tr>
			<?php $horaire = $db->query('SELECT * FROM horaires;')->fetch();?>
			<tr>
				<td>Lundi</td>
				<td> <?php if($admin){echo "<input type='text' name='lundi_o' value='".$horaire['lundi_o']."' size=10>";} else{echo $horaire['lundi_o'];}?></td>
				<td> <?php if($admin){echo "<input type='text' name='lundi_f' value='".$horaire['lundi_f']."' size=10>";} else{echo $horaire['lundi_f'];}?></td>
			</tr>
			<tr>
				<td>Mardi</td>
				<td> <?php if($admin){echo "<input type='text' name='mardi_o' value='".$horaire['mardi_o']."' size=10>";} else{echo $horaire['mardi_o'];}?></td>
				<td> <?php if($admin){echo "<input type='text' name='mardi_f' value='".$horaire['mardi_f']."' size=10>";} else{echo $horaire['mardi_f'];}?></td>
			</tr>
			<tr>
				<td>Mercredi</td>
				<td> <?php if($admin){echo "<input type='text' name='mercredi_o' value='".$horaire['mercredi_o']."' size=10>";} else{echo $horaire['mercredi_o'];}?></td>
				<td> <?php if($admin){echo "<input type='text' name='mercredi_f' value='".$horaire['mercredi_f']."' size=10>";} else{echo $horaire['mercredi_f'];}?></td>
			</tr>
			<tr>
				<td>Jeudi</td>
				<td> <?php if($admin){echo "<input type='text' name='jeudi_o' value='".$horaire['jeudi_o']."' size=10>";} else{echo $horaire['jeudi_o'];}?></td>
				<td> <?php if($admin){echo "<input type='text' name='jeudi_f' value='".$horaire['jeudi_f']."' size=10>";} else{echo $horaire['jeudi_f'];}?></td>
			</tr>
			<tr>
				<td>Vendredi</td>
				<td> <?php if($admin){echo "<input type='text' name='vendredi_o' value='".$horaire['vendredi_o']."' size=10>";} else{echo $horaire['vendredi_o'];}?></td>
				<td> <?php if($admin){echo "<input type='text' name='vendredi_f' value='".$horaire['vendredi_f']."' size=10>";} else{echo $horaire['vendredi_f'];}?></td>
			</tr>
			<tr>
				<td>Samedi</td>
				<td> <?php if($admin){echo "<input type='text' name='samedi_o' value='".$horaire['samedi_o']."' size=10>";} else{echo $horaire['samedi_o'];}?></td>
				<td> <?php if($admin){echo "<input type='text' name='samedi_f' value='".$horaire['samedi_f']."' size=10>";} else{echo $horaire['samedi_f'];}?></td>
			</tr>
			<tr>
				<td>Dimanche</td>
				<td> <?php if($admin){echo "<input type='text' name='dimanche_o' value='".$horaire['dimanche_o']."' size=10>";} else{echo $horaire['dimanche_o'];}?></td>
				<td> <?php if($admin){echo "<input type='text' name='dimanche_f' value='".$horaire['dimanche_f']."' size=10>";} else{echo $horaire['dimanche_f'];}?></td>
			</tr>
			<tr><td colspan=3 class='close'><?php if($admin){echo "autre : <input type=text' name='autre' value='".$horaire['autre']."' size=30>";} else{echo $horaire['autre'];}?></td></tr>
			<tr><td colspan=3 class='close'><?php if($admin){echo "<input type='submit' value='enregistrer les modifications'>";}?></td></tr>
		</form>
		</table>
		<h2>Localisation</h2>
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5531.277337736217!2d-74.5907856264249!3d46.11810651306115!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccf74fd2e7d0c91%3A0xda2ab3e5d3df2c56!2s814+Rue+de+Saint+Jovite%2C+Mont-Tremblant%2C+QC+J8E!5e0!3m2!1sfr!2sca!4v1409173108352" width="300" height="300" frameborder="0" style="border:0"></iframe>
		</aside>		
	<?php include("../footer.php") ?>
</section>
</body>
</html>	
