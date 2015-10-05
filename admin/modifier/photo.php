<?php session_start();

$db = new PDO('sqlite:../base.db');

if ($_SESSION['admin']){

$photo="photos/".$_FILES['photo']['name'];
$id=$_POST['id'];
$legende=$_POST['legende'];

if($_FILES['photo']['name']!=''){
	$qry = $db->prepare("UPDATE photos SET photo=?,legende=? WHERE id=?;");
	move_uploaded_file($_FILES['photo']['tmp_name'],'../'.$photo);
	$qry->execute(array($photo,$legende,$id));
}
}
$db = null;

header('Location:../../accueil');
?>
