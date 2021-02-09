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
			<h2>Inscription</h2>
			<form method="post" action="inscription2.php">
				<p>
				Nom <input type="text" name="nom" size="40"/><br/>
				Prénom <input type="text" name="prenom" size="40"/><br/>
				Adresse <input type="text" name="adresse" placeholder="Ex: 20 rue des fossés 77500 Chelles" size="40"/><br/>
				Identifiant <input type="text" name="pseudo" size="40"/><br/>
				Mot de passe <input type="password" name="mdp" size="40"/><br/>
				Retapez votre mot de passe <input type="password" name="mdp2" size="40"/><br/>
				Adresse email <input type="email" name="email" size="30" size="40"/><br/>
				<input type="submit" value="Valider"/> <input type="reset" value="Annuler"/><br/>
				</p>
			</form>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>