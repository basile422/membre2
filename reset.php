<?php
//verifier si les informatios ont ete poster 
if ($_GET['id'])  &&  isset($_GET['token'])){
	//verifier si les information poster correspond a un utilisateur dans la base de donnee//
	require 'database.php';
	require 'function.php '
	$req=$pdo-> prepare('select * from utilisateur where id= ? AND  reset_token is not null AND reset_token= ? AND reset_at > date_sub(NOW), interval 1 MINUTE) ');
	$req=->execute([$_GET['id'], $_GET['token']]);
	$utilisateur= $req->fetch();
	if ($utilisateur) {
		if (!empty($_POST)) {if ($_POST)['password']  && $_POST['password'] == $_POST['password_confirm']) {

        $password =password_hash($_POST['password'], PASSWORD_BCRYPT);



	   $pdo->prepare('UPDATE utilisateur SET password=? , reset_at= null, reset_token=null')->execute([$password]);
	   session_start();
	   $_SESSION['flash']['success']='votre mot de passe ete modifier avec succes';
	   $_SESSION['auth']=$utilisateur;
	   header('location:account.php');
	   exit();
			# code...
		}
			# code...
		}
		# code...
	//si l'utlisateur existe le programme continu. sinon... 
 }else{
session_start();

	$_SESSION['flash']['danger']="Ce token n'est pass valide ";
	header('location: login.php')
	exit();
}
else{
	header('Location: login.php')

	exit();
}
?>


<?php require 'header.php';

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>reset page</title>
</head>
<body>
<h1>Reinitialiser mo mot de passe  </h1>
<form action="" method="POST">
	<div class="form-group">
		<label for="">Mot de passe</label>
		<input type="password" name="password" class="form-control">
		
	</div>
<div class="form-group">
	<label for="">confirmaation du mot de passe </label>
	<input type="password" name="password_confirm" class="form-control">
</div>
<button type="submit" class="btn btn-primary">Reinitialiser votre mot de passe</button>

</form>


</body>
</html>