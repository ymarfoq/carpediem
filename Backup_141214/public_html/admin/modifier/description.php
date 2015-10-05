<?php session_start(); 

// connection à la base
$db = new PDO('sqlite:../base.db');

if ($_SESSION['admin']){
	$type=$_POST['type'];
	$text=$_POST['text'];
	if($type=='resume'){
		$qry = $db->prepare("UPDATE descriptions SET text=? WHERE type='resume';");
		$qry->execute(array($text));
		$db = null;
		header('Location:../../accueil');
	}
	else if($type=='topo'){
		$qry = $db->prepare("UPDATE descriptions SET text=? WHERE type='topo';");
		$qry->execute(array($text));
		$db = null;
		header('Location:../../info');
	}
}
?>

		</section>
	</body>
</html>

