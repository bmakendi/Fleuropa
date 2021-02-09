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
			<?php
				if($_POST['nom']!=null && $_POST['prenom']!=null && $_POST['adresse']!=null && $_POST['email']!=null && $_POST['dateenvoi']!=null && $_POST['nomdest']!=null && $_POST['prenomdest']!=null && $_POST['adressedest']!=null){
					if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
						$dateenvoi=$_POST['dateenvoi'];
						$modele=$_GET["modele"];
						$texte=$_POST['message'];
						$numdest=$_POST['teldest'];
						$nomdest=$_POST['nomdest'];
						$prenomdest=$_POST['prenomdest'];
						$adressedest=$_POST['adressedest'];
						echo "<center><h2>Informations de paiement</h2></center>";
						echo "
						<form method='post' action='recap.php?modele=$modele&amp;dateenvoi=$dateenvoi&amp;texte=$texte&amp;numdest=$numdest&amp;nomdest=$nomdest&amp;prenomdest=$prenomdest&amp;adressedest=$adressedest'>
						<p>
						Choisissez votre moyen de paiement  <select name='cb' id='cb'>
															<option value='visa'>VISA</option>
															<option value='mc'>MasterCard</option>
															<option value='ae'>American Express</option>
															</select><br/>
						Numéro de carte  <input type='text' name='numcb' maxlength='16' size='18'/><br/>
						Date d'expiration  <select name='mois' id='mois'>
											<option selected='Mois'>Mois</option>
											<option value='01'>01</option>
											<option value='02'>02</option>
											<option value='03'>03</option>
											<option value='04'>04</option>
											<option value='05'>05</option>
											<option value='06'>06</option>
											<option value='07'>07</option>
											<option value='08'>08</option>
											<option value='09'>09</option>
											<option value='10'>10</option>
											<option value='11'>11</option>
											<option value='12'>12</option>
											</select>
											<select name='annee' id='annee'>
											<option selected='Année'>Année</option>
											<option value='2016'>2016</option>
											<option value='2017'>2017</option>
											<option value='2018'>2018</option>
											<option value='2019'>2019</option>
											<option value='2020'>2020</option>
											<option value='2021'>2021</option>
											<option value='2022'>2022</option>
											<option value='2023'>2023</option>
											<option value='2024'>2024</option>
											<option value='2025'>2025</option>
											<option value='2026'>2026</option>
											</select><br/>
						Titulaire de la carte <input type='text' name='titu' placeholder='Nom Prénom' size='20'/><br/>					
						Cryptogramme visuel <input type='text' name='crypto' maxlength='3' size='4'/><br/>
						<input type='submit' value='Valider ma commande' name='valider'/>
						</p>
					</form>";
					}
					else{
						$nom=$_POST['nom'];
						$prenom=$_POST['prenom'];
						$adresse=$_POST['adresse'];
						$dateenvoi=$_POST['dateenvoi'];
						$modele=$_GET["modele"];
						$texte=$_POST["message"];
						$numdest=$_POST['teldest'];
						$nomdest=$_POST['nomdest'];
						$prenomdest=$_POST['prenomdest'];
						$adressedest=$_POST['adressedest'];
						echo "<center><h2>Informations de paiement</h2></center>";
						echo "
						<form method='post' action='recap.php?nom=$nom&amp;prenom=$prenom&amp;adresse=$adresse&amp;modele=$modele&amp;dateenvoi=$dateenvoi&amp;texte=$texte&amp;numdest=$numdest&amp;nomdest=$nomdest&amp;prenomdest=$prenomdest&amp;adressedest=$adressedest'>
						<p>
						Choisissez votre moyen de paiement  <select name='cb' id='cb'>
															<option value='visa'>VISA</option>
															<option value='mc'>MasterCard</option>
															<option value='ae'>American Express</option>
															</select><br/>
						Numéro de carte  <input type='text' name='numcb' maxlength='16' size='18'/><br/>
						Date d'expiration  <select name='mois' id='mois'>
											<option selected='Mois'>Mois</option>
											<option value='01'>01</option>
											<option value='02'>02</option>
											<option value='03'>03</option>
											<option value='04'>04</option>
											<option value='05'>05</option>
											<option value='06'>06</option>
											<option value='07'>07</option>
											<option value='08'>08</option>
											<option value='09'>09</option>
											<option value='10'>10</option>
											<option value='11'>11</option>
											<option value='12'>12</option>
											</select>
											<select name='annee' id='annee'>
											<option selected='Année'>Année</option>
											<option value='2016'>2016</option>
											<option value='2017'>2017</option>
											<option value='2018'>2018</option>
											<option value='2019'>2019</option>
											<option value='2020'>2020</option>
											<option value='2021'>2021</option>
											<option value='2022'>2022</option>
											<option value='2023'>2023</option>
											<option value='2024'>2024</option>
											<option value='2025'>2025</option>
											<option value='2026'>2026</option>
											</select><br/>
						Titulaire de la carte <input type='text' name='titu' placeholder='Nom Prénom' size='20'/><br/>					
						Cryptogramme visuel <input type='text' name='crypto' maxlength='3' size='4'/><br/>
						<input type='submit' value='Valider ma commande' name='valider'/>
						</p>
					</form>";
					}
				}
				else{
					echo "<h2>Veuillez bien remplir le formulaire.</h2>";
					if(isset($_SESSION['pseudo'])){
					$modele=$_GET["modele"];
					$id=$_SESSION['pseudo'];
					$requete=$dbh->query("SELECT * FROM club WHERE identifiant ='$id'");
					$membre=$requete->fetch();
					echo "<form method='post' action='payer.php?modele=$modele'>
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
						<form method='post' action='payer.php'>
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
					
				}
			?>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>