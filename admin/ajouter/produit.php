<?php session_start();
// connection à la base
$db = new PDO('sqlite:../base.db');

if ($_SESSION['admin']){
	
//création de la table des conférenciers
$db->exec("CREATE TABLE IF NOT EXISTS produits (
					id INTEGER PRIMARY KEY,
					type TEXT, 
                    titre TEXT, 
                    editeur TEXT, 
                    photo TEXT,
                    cdc BOOLEAN DEFAULT FALSE,
                    description TEXT,
                    date TEXT)");
                    
// préparation de l'insertion du conférencier
$qry = $db->prepare("INSERT INTO produits (type, titre, editeur, photo, cdc, description,  date)
					VALUES (?, ?, ?, ?, ?, ?, ?)");

$type=htmlentities(addslashes($_POST['type']));
$titre=htmlentities(addslashes($_POST['titre']));
$editeur=htmlentities(addslashes($_POST['editeur']));
$cdc=htmlentities(addslashes($_POST['cdc']));
$description=$_POST['description'];
$photo="produits/".$_FILES['photo']['name'];
$maxsize=htmlentities(addslashes($_POST['MAX_FILE_SIZE']));
if ($_FILES['photo']['error'] > 0) $erreur = "Erreur lors du transfert de la photo.";
if ($_FILES['photo']['size'] > $maxsize) $erreur = "La photo est trop grosse.";
  
$image_sizes = getimagesize($_FILES['photo']['tmp_name']);
//enregistrement de l'image à l'adresse de $photo
move_uploaded_file($_FILES['photo']['tmp_name'],'../'.$photo);
//insertion du conférencier dans la base
$qry->execute(array($type, $titre, $editeur, $photo, $cdc, $description, date("m.d.y")));

// fermeture de la base
$db = null;
}
header('Location:../../produits');

?>

		</section>
	</body>
</html>

