<?php session_start();

// connection à la base
$db = new PDO('sqlite:../base.db');

if ($_SESSION['admin']){

$qry = $db->prepare("DELETE FROM membres WHERE id=?;");
$qry->execute(array($_POST['id']));

// fermeture de la base
$db = null;
}
header('Location:../../cooperative');
?>

		</section>
	</body>
</html>
