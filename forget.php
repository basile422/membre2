<?php 
if (!empty($_POST) && !empty($_POST['email'])) {
	require_once 'database.php';
	require_once 'function.php';
	$req=$pdo->prepare('select * from utilisateur where  email=: ? AND confirmed_at IS NOT NULL');
	$req->execute([$_POST['email']]);
	$utilisateur=$req->fetch();
	if ($utilisateur) {

	     session_start();
	     $reset_token = str_random(60);
	     $pdo->prepare('UPDATE utilisateur SET reset_token= ?, reset_at= NOW() wehere id= ?')->execute([$reset_token, $utilisateur->id]);

		$_SESSION['flash']['succes']='Les instruction du rappel de mot de passe vous ont ete envoyer par email';

		mail($_POST ['email'],'reinitialisation de votre mot de passe ',"Afin de reinitialiser  votre mot de passe merci de cliquer sur ce lien\n\n http\\localhost/systemcrud/reset.php? id={$utilisateur->id}$token=$reset_token");
		header('location:login.php');
		exit();
		
	}else{
		$_SESSION['flash']['danger']='aucun compte ne correspond a cet adresse ';
	}
}
	
?>



<?php 
require'function.php';
?>
<?php
//rediriger l'utilisateur vers accoount une connecter.

require 'header.php';?>
<!DOCTYPE html>
<html>
<header>
	<title>login</title>

</header>
<body>
<h1>Mot de passe oublier</h1>


<form action="" method="POST">
	<div class="form-group">
		<label for="">Email</label>
		<input type="email" name="email" class="form-group">
		
	
		
	</div>
	
	<button type="submit" class="btn btn-primary">se connecter</button>
</form>
</body>
</html>


