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
	$prenom=$_POST['prenom'];
	$nom=$_POST['nom'];
	if(isset($_POST['ville'])){
		$ville=$_POST['ville'];
		$qry = $db->prepare("UPDATE membres SET prenom=?,nom=?,bio=? WHERE id=?;");
		$qry->execute(array($prenom,$nom,$ville,$id));
	}
	else{
		$fonction=$_POST['fonction'];
		$statut=$_POST['statut'];
		if(isset($_POST['aux'])){$aux=$_POST['aux'];}else{$aux='FALSE';}
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
}

// fermeture de la base
$db = null;
}
header('Location:../../cooperative');
?>

		</section>
	</body>
</html>

