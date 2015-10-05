<?php session_start(); ?>
<?php
// connection à la base
$db = new PDO('sqlite:../base.db');

if ($_SESSION['mdp']==="Carpediem/2014"){

//création de la table des conférenciers
$db->exec("CREATE TABLE IF NOT EXISTS descriptions (
					id INTEGER PRIMARY KEY, 
                    type TEXT, 
                    text TEXT)");
                    
// préparation de l'insertion du conférencier
$qry = $db->prepare("INSERT INTO descriptions (type, text)
					VALUES (?, ?)");

$type=htmlentities(addslashes($_POST['type']));
$text=$_POST['text'];

$qry->execute(array($type, $text));

// fermeture de la base
$db = null;

header('Location:../admin.php');
}
else {echo "problème avec la connexion, veuillez réessayer. <a href='index.php'>connexion</a>";}

?>

		</section>
	</body>
</html>

