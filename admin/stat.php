<?php 
$db = new PDO('sqlite:../admin/base.db');
//création de la table des conférenciers
$db->exec("CREATE TABLE IF NOT EXISTS stats (
					id INTEGER PRIMARY KEY, 
					ip INTEGER, 
                    page TEXT, 
                    date TEXT, 
                    heure TEXT, 
                    minute TEXT, 
                    seconde TEXT)");
                    
// préparation de l'insertion du conférencier
$qry = $db->prepare("INSERT INTO stats (ip, page, date, heure, minute, seconde)
					VALUES (?, ?, ?, ?, ?, ?)");

$ip=$_SERVER["REMOTE_ADDR"];
$page=$_SERVER["PHP_SELF"];
$date=date("d-m-Y");
$time=time();
$heure=($time / 3600 - 4) % 24;
$minute=$time / 60 % 60;
$seconde=$time % 60;

$qry->execute(array($ip, $page, $date, $heure, $minute, $seconde));

// fermeture de la base
$db = null;
?>
