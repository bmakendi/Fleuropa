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
			<center><h1>Espace membre</h1></center>
			<h3>Modifiez vos informations</h3>
			<?php
			if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['email']) && isset($_POST['telephone'])){
				$pseudo=$_SESSION['pseudo'];
				$nom=$_POST['nom'];
				$prenom=$_POST['prenom'];
				$adresse=$_POST['adresse'];
				$email=$_POST['email'];
				$telephone=$_POST['telephone'];
				$requete=$dbh->prepare('UPDATE club SET email= :mail, nom= :nom, prenom= :prenom, adresse= :adresse, telephone= :telephone WHERE identifiant = :pseudo');
				$requete->execute(array(
					'mail'=>$email,
					'nom'=>$nom,
					'prenom'=>$prenom,
					'adresse'=>$adresse,
					'telephone'=>$telephone,
					'pseudo'=>$pseudo));
				echo 'Vos informations ont été modifiées avec succès.';
			}
			$requete->closeCursor();
			$pseudo=$_SESSION['pseudo'];
				$requete=$dbh->query("SELECT * FROM club WHERE identifiant='$pseudo'");
				$membre=$requete->fetch();
			
				echo "<form method='post' action='modif2.php'>
					<p>
						Nom <input type='text' name='nom' size='40' value='".$membre['nom']."'/><br/>
						Prénom <input type='text' name='prenom' size='40' value='".$membre['prenom']."'/><br/>
						Adresse <input type='text' name='adresse' placeholder='Ex: 20 rue des fossés 77500 Chelles' size='40' value='".$membre['adresse']."'/><br/>
						Adresse email <input type='email' name='email' size='40' value='".$membre['email']."'/><br/>
						Ajoutez un numéro de téléphone pour savoir où se trouvent vos colis !<br/>
						Numéro de téléphone <input type='tel' name='telephone' maxlength='10' size='40' value='".$membre['telephone']."'/><br/>
						<input type='submit' value='Valider'/> <input type='reset' value='Annuler'/><br/>
					</p>
				</form>"
				
			?>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>