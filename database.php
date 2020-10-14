<!DOCTYPE html>
<html>
<head>
	<title>dbase</title>
</head>
<body>
<?php
 try {
 	
//creation de la base de  donnee 
$pdo= new PDO('mysql:dbname:opismscrud; host=localhost','root','');

//definir quelqs attribu a pdo
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
 	
 } catch (\PDOException $e) {
 	die("echec de la base de donnee".$e->getmessage());
 }

?>
</body>
</html>

