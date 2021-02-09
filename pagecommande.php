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
			<center><h2>Finalisez votre commande</h2></center>
			<?php	
				$modele=$_GET["modele"];
				if(isset($_SESSION['pseudo'])){
					$id=$_SESSION['pseudo'];
					$requete=$dbh->query("SELECT * FROM club WHERE identifiant ='$id'");
					$membre=$requete->fetch();
					echo "
						<form method='post' action='payer.php?modele=$modele'>
							<p>
								Nom <input type='text' name='nom' size='40' value='".$membre['nom']."'/><br/>
								Prénom <input type='text' name='prenom' size='40' value='".$membre['prenom']."'/><br/>
								Adresse <input type='text' name='adresse' size='40' value='".$membre['adresse']."'/><br/>
								Adresse email <input type='email' name='email' size='40' value='".$membre['email']."'/><br/>
								Numéro de téléphone <input type='tel' name='telephone' maxlength='10' size='40' value='".$membre['telephone']."'/><br/>
								Choisissez une date d'envoi <input type='text' name='dateenvoi' placeholder='Ex: 2016-01-30' maxlength='10'/><br/>
								Joindre un message ?<br/><textarea name='message' id='message'></textarea><br/>
								<h3>Informations du destinataire</h3>
								Nom <input type='text' name='nomdest' size='40'/><br/>
								Prénom <input type='text' name='prenomdest' size='40'/><br/>
								Adresse <input type='text' name='adressedest' size='40' placeholder='Ex: 20 rue des fossés 77500 Chelles' /><br/>
								Numéro de téléphone <input type='telephone' name='teldest' maxlength='10' size='40'/><br/>
								<input type='submit' value='Valider'/> <input type='reset' value='Annuler'/><br/>
							</p>
						</form>";
				}
				else{
					echo "
						<form method='post' action='payer.php?modele=$modele'>
							<p>
								Nom <input type='text' name='nom' size='40'/><br/>
								Prénom <input type='text' name='prenom' size='40'/><br/>
								Adresse <input type='text' name='adresse' size='40' placeholder='Ex: 20 rue des fossés 77500 Chelles' /><br/>
								Adresse email <input type='email' name='email' size='40'/><br/>
								Numéro de téléphone <input type='tel' name='telephone' maxlength='10' size='40'/><br/>
								Choisissez une date d'envoi <input type='text' name='dateenvoi' placeholder='Ex: 2016-01-30' maxlength='10'/><br/>
								Joindre un message ?<br/><textarea name='message' id='message'></textarea><br/>
								<h3>Informations du destinataire</h3>
								Nom <input type='text' name='nomdest' size='40'/><br/>
								Prénom <input type='text' name='prenomdest' size='40'/><br/>
								Adresse <input type='text' name='adressedest' size='40' placeholder='Ex: 20 rue des fossés 77500 Chelles' /><br/>
								Numéro de téléphone <input type='telephone' name='teldest' maxlength='10' size='40'/><br/>
								<input type='submit' value='Valider'/> <input type='reset' value='Annuler'/><br/>
							</p>
						</form>";
				}
			?>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>