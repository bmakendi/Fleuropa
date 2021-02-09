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
			<center><h2>Récapitulatif de commande</h2></center>
			<center><h3>Votre commande a été enregistrée, elle sera traitée prochainement.</h3></center>
			<?php	
				if($_POST['mois']!='Mois' && $_POST['annee']!='Année' && $_POST['titu']!=null && $_POST['crypto']!=null){
					if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
						$id=$_SESSION['id'];
						$requete=$dbh->prepare('SELECT * FROM client WHERE numClub= :id');
						$requete->execute(array(
							'id'=>$id));
						$go=$requete->fetch();
						$numclient=$go['numCli'];
						$modele=$_GET['modele'];
						$numdest=$_GET['numdest'];
						$nomdest=$_GET['nomdest'];
						$prenomdest=$_GET['prenomdest'];
						$adressedest=$_GET['adressedest'];
						$numcommande1='AKROV984LBCQS72';
						$numcommande=str_shuffle($numcommande1);
						$dateenvoi=$_GET['dateenvoi'];
						$codeconf1='pogijef874gqr71';
						if($_GET['texte']==null){
							$texte="Aucun message";
						}
						else{
							$texte=$_GET['texte'];
						}
						$codeconf=str_shuffle($codeconf1);
						$requete=$dbh->prepare("SELECT * FROM bouquet WHERE modele = :modele");
						$requete->execute(array(
							'modele'=>$modele));
						$reponse=$requete->fetch();
						$numbouquet=$reponse['numBouquet'];
						$prix=$reponse['prix'];
						$requete->closeCursor();
						$rq=$dbh->prepare('INSERT INTO destinataire VALUES(:numdest, :adressedest, :nomdest, :prenomdest)');
						$rq->execute(array(
							'numdest'=>$numdest,
							'adressedest'=>$adressedest,
							'nomdest'=>$nomdest,
							'prenomdest'=>$prenomdest));
						$request=$dbh->prepare('INSERT INTO commande(numCommande, dateEnvoi, codeConf, numBouquet, numCli, texte) VALUES(:numcommande, :dateenvoi, :codeconf, :numbouquet, :numcli, :texte)');
						$request->execute(array(
							'numcommande'=>$numcommande,
							'dateenvoi'=>$dateenvoi,
							'codeconf'=>$codeconf,
							'numbouquet'=>$numbouquet,
							'numcli'=>$numclient,
							'texte'=>$texte));
						$request->closeCursor();
						echo "
							<p><b>Numéro de commande :</b> $numcommande<br/>
							<b>Numéro de client :</b> $numclient<br/>
							<b>Bouquet commandé :</b> $modele<br/>
							<b>Prix :</b> $prix €<br/>
							<b>Destinataire :</b> $nomdest $prenomdest<br/>
							<b>Adresse de livraison :</b> $adressedest<br/>
							<b>Code confidentiel (pour suivre votre commande) :</b> $codeconf<br/>
							<center><a href='bouquets.php'>Continuer vos achats</a></center>";
					}
					else{
						$nom=$_GET['nom'];
						$prenom=$_GET['prenom'];
						$adresse=$_GET['adresse'];
						$modele=$_GET['modele'];
						$numdest=$_GET['numdest'];
						$nomdest=$_GET['nomdest'];
						$prenomdest=$_GET['prenomdest'];
						$adressedest=$_GET['adressedest'];
						$numcommande1='AKROV984LBCQS72';
						$numcommande=str_shuffle($numcommande1);
						$dateenvoi=$_GET['dateenvoi'];
						$codeconf1='pogijef874gqr71';
						if($_GET['texte']==null){
							$texte="Aucun message";
						}
						else{
							$texte=$_GET['texte'];
						}
						$codeconf=str_shuffle($codeconf1);
						$requete=$dbh->prepare('INSERT INTO client(nom, prenom, adresseCli) VALUES(:nom, :prenom, :adresse)');
						$requete->execute(array(
							'nom'=>$nom,
							'prenom'=>$prenom,
							'adresse'=>$adresse));
						$requete->closeCursor();
						$requete=$dbh->prepare('SELECT * FROM client WHERE nom= :nom');
						$requete->execute(array(
							'nom'=>$nom));
						$go=$requete->fetch();
						$numclient=$go['numCli'];
						$requete->closeCursor();
						$requete=$dbh->prepare("SELECT * FROM bouquet WHERE modele = :modele");
						$requete->execute(array(
							'modele'=>$modele));
						$reponse=$requete->fetch();
						$numbouquet=$reponse['numBouquet'];
						$prix=$reponse['prix'];
						$requete->closeCursor();
						$rq=$dbh->prepare('INSERT INTO destinataire VALUES(:numdest, :adressedest, :nomdest, :prenomdest)');
						$rq->execute(array(
							'numdest'=>$numdest,
							'adressedest'=>$adressedest,
							'nomdest'=>$nomdest,
							'prenomdest'=>$prenomdest));
						$request=$dbh->prepare('INSERT INTO commande(numCommande, dateEnvoi, codeConf, numBouquet, numCli, texte) VALUES(:numcommande, :dateenvoi, :codeconf, :numbouquet, :numcli, :texte)');
						$request->execute(array(
							'numcommande'=>$numcommande,
							'dateenvoi'=>$dateenvoi,
							'codeconf'=>$codeconf,
							'numbouquet'=>$numbouquet,
							'numcli'=>$numclient,
							'texte'=>$texte));
						$request->closeCursor();
						echo "
							<p><b>Numéro de commande :</b> $numcommande<br/>
							<b>Numéro de client :</b> $numclient<br/>
							<b>Bouquet commandé :</b> $modele<br/>
							<b>Prix :</b> $prix €<br/>
							<b>Destinataire :</b> $nomdest $prenomdest<br/>
							<b>Adresse de livraison :</b> $adressedest<br/>
							<b>Code confidentiel (pour suivre votre commande) :</b> $codeconf<br/>
							<center><a href='bouquets.php'>Continuer vos achats</a></center>";
					}
				}
			?>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>