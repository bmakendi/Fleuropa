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
			<h1>Mes informations</h1>
			<div class="infos">
				<?php
					$pseudo=$_SESSION['pseudo'];
					$requete=$dbh->query("SELECT * FROM club WHERE identifiant='$pseudo'");
					$membre=$requete->fetch();
					echo 'Votre nom : '.$membre['nom'].'<br/>';
					echo 'Votre prénom : '.$membre['prenom'].'<br/>';
					echo 'Votre adresse : '.$membre['adresse'].'<br/>';
					if($membre['telephone']!=0){
						echo 'Votre numéro de téléphone : '.$membre['telephone'].'<br/>';
					}
					$requete->closeCursor();
			?>
			</div>
			<a href="modifmembre.php" class="modif">Modifier vos informations</a>
			<a href="deconnexion.php" class="deco">Se déconnecter</a>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>