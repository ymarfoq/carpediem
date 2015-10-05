<?php 
$db = new PDO('sqlite:base.db');
//création de la table des conférenciers
try{
	echo $db->exec("select * from photos;");
	$db->exec("INSERT INTO photos(legende) VALUES ("-");");
	echo "ok";
}
$db = null;
?>
