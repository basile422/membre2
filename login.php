<?php 
if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
	require_once 'database.php';
	require_once 'function.php';
	$req= $pdo->prepare('select * from utilisateur where (username= :username OR email= :username) AND confirmed_at IS NOT NULL');
	$req->execute([':username ' => $_POST['username'] ]);
	$utilisateur = $req->fetch();
	if (password_verify($_POST['password'],$utilisateur->password)) {

	     session_start();
		$_SESSION['auth']=$utilisateur;
		$_SESSION['flash']['success']='vous etes maintenant bien connecter';
		header('location:account.php');
		exit();
		# code...
	}else{
		$_SESSION['flash']['danger']='indentifiant ou mot de passe incorrecte';
	}
}
	# code...

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
<h1>SE CONNECTER</h1>


<form action="" method="POST">
	<div class="form-group">
		<label for="">Pseudo ou email</label>
		<input type="email" name="username" class="form-group">
		
	
		
	</div>
	<div class="form-group">
		<label for="">Mots de passe<a href="forget.php"></br >(mot de passe oublier ?)</a></label>
		<input type="password" name="password" class="form-group">
		
	</div>
	<div class="form-group">
		<label for="">
			<input type="checkbox" name="remember" value="1">se souvenir de moi
		</label>
		
	</div>
	<button type="submit" class="btn btn-primary">se connecter</button>
</form>
</body>
</html>


