<?php session_start();

$db = new PDO('sqlite:../base.db');

if ($_SESSION['admin']){

	$qry = $db->prepare("UPDATE horaires SET lundi_o=?, lundi_f=?, mardi_o=?, mardi_f=?, mercredi_o=?, mercredi_f=?, jeudi_o=?, jeudi_f=?, vendredi_o=?, vendredi_f=?, samedi_o=?, samedi_f=?, dimanche_o=?, dimanche_f=?, autre=?;");

	$qry->execute(array($_POST['lundi_o'], $_POST['lundi_f'], $_POST['mardi_o'], $_POST['mardi_f'], $_POST['mercredi_o'], $_POST['mercredi_f'], $_POST['jeudi_o'], $_POST['jeudi_f'], $_POST['vendredi_o'], $_POST['vendredi_f'], $_POST['samedi_o'], $_POST['samedi_f'], $_POST['dimanche_o'], $_POST['dimanche_f'], $_POST['autre']));
}

$db = null;

header('Location:../../info');
?>
