<?php session_start();

// connection à la base
$db = new PDO('sqlite:../base.db');

if ($_SESSION['admin']){

//création de la table des conférenciers
$db->exec("CREATE TABLE IF NOT EXISTS membres (
					id INTEGER PRIMARY KEY, 
                    nom TEXT, 
                    prenom TEXT, 
                    photo TEXT, 
                    fonction TEXT, 
                    statut TEXT,
                    aux BOOLEAN DEFAULT 'FALSE',
                    bio TEXT,
                    date TEXT)");
                    
// préparation de l'insertion du conférencier
$qry = $db->prepare("INSERT INTO membres (nom, prenom, photo, fonction, statut, aux,  bio, date)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$nom=htmlentities(addslashes($_POST['nom']));
$prenom=htmlentities(addslashes($_POST['prenom']));
$photo="membres/".$_FILES['photo']['name'];
$fonction=htmlentities(addslashes($_POST['fonction']));
$statut=htmlentities(addslashes($_POST['statut']));
$aux=htmlentities(addslashes($_POST['aux']));
$bio=$_POST['bio'];
$maxsize=htmlentities(addslashes($_POST['MAX_FILE_SIZE']));
if ($_FILES['photo']['error'] > 0) $erreur = "Erreur lors du transfert de la photo.";
if ($_FILES['photo']['size'] > $maxsize) $erreur = "La photo est trop grosse.";
  
$image_sizes = getimagesize($_FILES['photo']['tmp_name']);
//enregistrement de l'image à l'adresse de $photo
move_uploaded_file($_FILES['photo']['tmp_name'],'../'.$photo);
//insertion du conférencier dans la base
echo date("m.d.y");
$qry->execute(array($nom, $prenom, $photo, $fonction, $statut, $aux, $bio, date("m.d.y")));

// fermeture de la base
$db = null;
}
header('Location:../../cooperative');

?>

		</section>
	</body>
</html>

