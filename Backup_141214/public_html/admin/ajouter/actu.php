<?php session_start(); ?>
<?php
// connection à la base
$db = new PDO('sqlite:../base.db');

if ($_SESSION['admin']){

	$db->exec("CREATE TABLE IF NOT EXISTS actus (
					id INTEGER PRIMARY KEY, 
                    date TEXT, 
                    text TEXT)");
                    
	$qry = $db->prepare("INSERT INTO actus (date, text)
							VALUES (?, ?)");

	$text=$_POST['text'];

	$qry->execute(array(date('d/m/Y'), $text));
}

$db = null;

header('Location:../../accueil');

?>

		</section>
	</body>
</html>

