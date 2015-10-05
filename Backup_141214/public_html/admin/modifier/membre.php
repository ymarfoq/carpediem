<?php session_start();

// connection à la base
$db = new PDO('sqlite:../base.db');

if ($_SESSION['admin']){

$id=$_POST['id'];

if(isset($_POST['supprimer'])){
	$qry = $db->prepare("DELETE FROM membres WHERE id=?;");
	$qry->execute(array($id));
}
else if(isset($_POST['modifier'])){
	$prenom=htmlentities(addslashes($_POST['prenom']));
	$nom=htmlentities(addslashes($_POST['nom']));
	$fonction=htmlentities(addslashes($_POST['fonction']));
	$statut=htmlentities(addslashes($_POST['statut']));
	if(isset($_POST['aux'])){$aux=htmlentities(addslashes($_POST['aux']));}else{$aux='';}
	$bio=$_POST['bio'];

	$qry = $db->prepare("UPDATE membres SET prenom=?,nom=?,fonction=?,statut=?, aux=?,bio=?   WHERE id=?;");
	$qry->execute(array($prenom,$nom,$fonction,$statut,$aux,$bio,$id));
	$photo="membres/".$_FILES['photo']['name'];
	if($_FILES['photo']['name']!=''){
		$qry = $db->prepare("UPDATE membres SET photo=? WHERE id=?;");
		//enregistrement de l'image à l'adresse de $photo
		move_uploaded_file($_FILES['photo']['tmp_name'],'../'.$photo);
		$qry->execute(array($photo,$id));
	}
}

// fermeture de la base
$db = null;
}
header('Location:../../cooperative');
?>

		</section>
	</body>
</html>

