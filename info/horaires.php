<?php session_start();
	
$db = new PDO('sqlite:../admin/base.db');

$db->exec("CREATE TABLE IF NOT EXISTS horaires (
					id INTEGER PRIMARY KEY, 
                    lundi_o TEXT, 
                    lundi_f TEXT, 
                    mardi_o TEXT, 
                    mardi_f TEXT, 
                    mercredi_o TEXT, 
                    mercredi_f TEXT, 
                    jeudi_o TEXT, 
                    jeudi_f TEXT, 
                    vendredi_o TEXT, 
                    vendredi_f TEXT, 
                    samedi_o TEXT, 
                    samedi_f TEXT, 
                    dimanche_o TEXT, 
                    dimanche_f TEXT, 
                    autre TEXT)");
                    
// préparation de l'insertion du conférencier
$qry = $db->prepare("INSERT INTO horaires (lundi_o, lundi_f, mardi_o, mardi_f, mercredi_o, mercredi_f, jeudi_o, jeudi_f, vendredi_o, vendredi_f, samedi_o, samedi_f, dimanche_o, dimanche_f)
					VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

$qry->execute(array('00h00','00h00','00h00','00h00','00h00','00h00','00h00','00h00','00h00','00h00','00h00','00h00','00h00','00h00'));


$db = null;

header('Location:.');
