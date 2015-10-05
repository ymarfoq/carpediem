<?php session_start(); 

$db = new PDO('sqlite:../base.db');

if ($_SESSION['admin']){

	$db->exec("CREATE TABLE IF NOT EXISTS photos (
					id INTEGER PRIMARY KEY,
					legende TEXT,
                    photo TEXT)");
                    
	$qry = $db->prepare("INSERT INTO photos (photo,legende)
							VALUES (?,?)");

	$photo='';
	$legende='';

	$qry->execute(array($photo,$legende));
}

$db = null;

header('Location:../../accueil');

?>

		</section>
	</body>
</html>

