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
		<?php
			$pass_hache = sha1($_POST['mdp']);
			$pseudo=$_POST['pseudo'];
			$req = $dbh->prepare('SELECT numClub FROM club WHERE mdp = :pass AND identifiant = :pseudo');
			$req->execute(array(
				'pseudo' => $pseudo,
				'pass' => $pass_hache));

			$resultat = $req->fetch();
			if (!$resultat){
				echo 'Mauvais identifiant ou mot de passe !';
				echo "<form method='post' action='compteperso2.php'>
						<p>
							Identifiant <input type='text' name='pseudo' size='40'/><br/>
							Mot de passe <input type='password' name='mdp' size='40'/><br />
							<input type='submit' value='Valider'/> <input type='reset' value='Annuler'/>
						</p>
					</form>";
			}
			else{
				session_start();
				$_SESSION['id'] = $resultat['numClub'];
				$_SESSION['pseudo'] = $pseudo;
				echo '<h3>Vous êtes connecté(e)</h3>';
				echo "Bonjour ". $_SESSION['pseudo'].", profitez dès maintenant de vos avantages au <a href='club.php'>club Fleuropa</a> !";
			}
			
		?>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>