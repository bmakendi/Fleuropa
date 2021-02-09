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
				Nom <input type="text" name="nom"/><br/>
				Prénom <input type="text" name="prenom"/><br/>
				Adresse <input type="text" name="adresse" placeholder="Ex: 20 rue des fossés 77500 Chelles"/><br/>
				Identifiant <input type="text" name="pseudo"/><br/>
				Mot de passe <input type="password" name="mdp"/><br/>
				Retapez votre mot de passe <input type="password" name="mdp2"/><br/>
				Adresse email <input type="email" name="email"/><br/>
				<input type="submit" value="Valider"/> <input type="reset" value="Annuler"/><br/>
				</p>
			</form>
			<?php	
				$nom=$_POST['nom'];
				$prenom=$_POST['prenom'];
				$adresse=$_POST['adresse'];
				$pseudo=$_POST['pseudo'];
				$mdp=$_POST['mdp'];
				$mail=$_POST['email'];
				$mdpgro=$_POST['mdp2'];
				if($mdp!=$mdpgro){
					echo 'Le mot de passe ne correspond pas, recommencez.';
				}
				else{
					$trumdp=sha1($_POST['mdp']);
					$requete=$dbh->prepare('INSERT INTO club(mdp, identifiant, email, nom, prenom, adresse) VALUES(:mdp, :pseudo, :email, :nom, :prenom, :adresse)');
					$requete->execute(array(
						'pseudo'=>$pseudo,
						'mdp'=>$trumdp,
						'email'=>$mail,
						'nom'=>$nom,
						'prenom'=>$prenom,
						'adresse'=>$adresse));
					$requete->closeCursor();
					$request=$dbh->query("SELECT * FROM club WHERE identifiant='$pseudo'");
					$club=$request->fetch();
					$request->closeCursor();
					$requete=$dbh->prepare('INSERT INTO client(nom, prenom, adresseCli, numClub) VALUES(:nom, :prenom, :adresse, :idclub)');
					$requete->execute(array(
						'nom'=>$club['nom'],
						'prenom'=>$club['prenom'],
						'adresse'=>$club['adresse'],
						'idclub'=>$club['numClub']));
					$requete->closeCursor();
					echo "Inscription réussie, un mail vous a été envoyé. <a href='compteperso.php'>Connectez vous !</a>";
				}
				
			?>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>