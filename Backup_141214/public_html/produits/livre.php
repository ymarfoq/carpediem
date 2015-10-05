<div class='cdc' id='cdc'>
<?php
$cdc_livres = $db->query('SELECT * FROM produits WHERE type="livre" and cdc="TRUE" ORDER BY id DESC LIMIT 5;')->fetchAll();

	echo "<div class='cover'>
		<h4>C a r p e d i e m</h4>
		<h4>N o s<br>c o u p s <br>d e <br>c o e u r </h4>
	</div>";
	foreach($cdc_livres as $donnee){
		echo "
	<div class='page'> 
		<h4>".html_entity_decode(stripslashes($donnee['titre']))."</h4>
		<img width=130 height=150 src='../admin/".$donnee['photo']."'>
	</div>
	<div class='page'>
	<p>".$donnee['description']."</p>
	</div>";
	}
	echo "<div class='cover'> <a href='.'><h4>PLUS</h4></a></div>
</div>";
?>

<script type="text/javascript">
	$("#cdc").turn({
		width: 300,
		height: 220,
		autoCenter: true
	});
</script>
