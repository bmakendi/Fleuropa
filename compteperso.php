<?php
	session_start();
?>
<html>
	<head>
		<?php include("connexion.php"); ?>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
		<title>Fleuropa - Livraison de fleurs express</title>
	</head>
	<body>
		<?php include("header.php"); ?>
		<div class="corps">
		<h2>Connexion</h2>
		<form method="post" action="compteperso2.php">
			<p>
				Identifiant <input type="text" name="pseudo" size="40"/><br/>
				Mot de passe <input type="password" name="mdp" size="40"/><br />
				<input type="submit" value="Valider"/> <input type="reset" value="Annuler"/>
			</p>
		</form>
		<h2>Pas encore inscrit ?</h2>
		<p>Pour le faire, c'est <a href="inscription.php">ici</a> ! Vous profiterez d'avantages supplémentaires.</p>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>