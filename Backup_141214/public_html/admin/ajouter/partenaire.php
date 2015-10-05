<?php session_start();

$db = new PDO('sqlite:../base.db');

if ($_SESSION['admin']){

//création de la table des conférenciers
$db->exec("CREATE TABLE IF NOT EXISTS partenaires (
					id INTEGER PRIMARY KEY, 
                    nom TEXT, 
                    statut TEXT, 
                    logo TEXT, 
                    site TEXT, 
                    remerciement TEXT)");
                    
// préparation de l'insertion du conférencier
$qry = $db->prepare("INSERT INTO partenaires (nom, statut, logo, site, remerciement)
					VALUES (?, ?, ?, ?, ?)");

$nom=htmlentities(addslashes($_POST['nom']));
$statut=htmlentities(addslashes($_POST['statut']));
$logo='';
$site='';
$remerciement='';
$logo="partenaires/".$_FILES['logo']['name'];
$site=htmlentities(addslashes($_POST['site']));
if (!(strstr($site, 'http'))){$site="http://".$site;}
$remerciement=$_POST['remerciement'];
$maxsize=htmlentities(addslashes($_POST['MAX_FILE_SIZE']));
if ($_FILES['logo']['error'] > 0) $erreur = "Erreur lors du transfert de la photo.";
if ($_FILES['logo']['size'] > $maxsize) $erreur = "La photo est trop grosse.";
 
$image_sizes = getimagesize($_FILES['logo']['tmp_name']);
//enregistrement de l'image à l'adresse de $photo
move_uploaded_file($_FILES['logo']['tmp_name'],'../'.$logo);

//insertion du conférencier dans la base
$qry->execute(array($nom, $statut, $logo, $site, $remerciement));
}

$db = null;

header('Location:../../partenaires');

?>
