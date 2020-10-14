<?php session_start();
require'function.php';
logged_only();
//chnager le mot de passe de l'utilisateur
if (!empty($_POST)) {

	if (empty( $_POST['password']) || $_POST['password']     != $_POST['password_confirm']) { $_SESSION['flash']['danger']="les mots de passes ne correspondent pas";
		# code...
	}else{
		$utilisateur_id= $_SESSION['auth']->id;
		$password= password_hash($_POST['password'], PASSWORD_BCRYPT);
		require_once 'database.php';
		$req=$pdo->prepare('UPDATE utilisateur SET password=?');
		$_SESSION['flash']['success']="votre mot de passe a ete bien modifier aves succes";
	}
	# code...
}
	# code...

?>
<?php
//rediriger l'utilisateur vers accoount pour une connecter.

require 'header.php';
?>
<h1>Bonjour<?=$_SESSION['auth']->username;?> </h1>
<!DOCTYPE html>
<html>
<head>
	<title>account</title>
</head>
<body>

<form action="" method="post">
<div class="form-group">
	<input class="form-control" type="password" name="password" placeholder="changer votre mot de passe "/>
	
</div>
div class="form-group">
	<input class="form-control" type="password" name="password_confirm" placeholder="changer votre mot de passe "/>
	
</div>
<button class="btn btn-primary">changer mon mot de passe</button>
	<form>


<?php debug ($_SESSION); ?>
</body>
</html>