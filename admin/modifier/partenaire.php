<?php session_start(); ?>
<?php
// connection à la base
$db = new PDO('sqlite:../base.db');

if ($_SESSION['admin']){

$id=$_POST['id'];

$nom=htmlentities(addslashes($_POST['nom']));
if($nom!=''){
	$qry = $db->prepare("UPDATE partenaires SET nom=? WHERE id=?;");
	$qry->execute(array($nom,$id));
}

$statut=htmlentities(addslashes($_POST['statut']));
if($statut!=''){
	$qry = $db->prepare("UPDATE partenaires SET statut=? WHERE id=?;");
	$qry->execute(array($statut,$id));
}

$logo="partenaires/".$_FILES['logo']['name'];
if($_FILES['logo']['name']!=''){
	$qry = $db->prepare("UPDATE partenaires SET logo=? WHERE id=?;");
	//enregistrement de l'image à l'adresse de $logo
	move_uploaded_file($_FILES['logo']['tmp_name'],'../'.$logo);
	$qry->execute(array($logo,$id));
}

$site=htmlentities(addslashes($_POST['site']));
if($site!=''){
	$qry = $db->prepare("UPDATE partenaires SET site=? WHERE id=?;");
	$qry->execute(array($site,$id));
}

$rem=$_POST['rem'];
if($rem!=''){
	$qry = $db->prepare("UPDATE partenaires SET remerciment=? WHERE id=?;");
	$qry->execute(array($rem,$id));
}
                    
// fermeture de la base
$db = null;
}
header('Location:../../partenaires');
?>

		</section>
	</body>
</html>

