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
		<center><h2>Club Fleuropa</h2></center>
			<?php
				if(!isset($_SESSION['pseudo'])){
					echo "Vous devez être connecté pour bénficier des avantages du club Fleuropa. <a href='compteperso.php'>Connectez vous !</a>";
				}
				else{
					
					$requete=$dbh->query('SELECT * FROM bouquet');
					while($bouquets=$requete->fetch()){
						$image=$bouquets['photo'];
						?>
						<a href="commander.php?modele=<?php echo $bouquets['modele'];?>&amp;photo=<?php echo $image;?>&amp;prix=<?php echo $bouquets['prix'];?>&amp;taille=<?php echo $bouquets['taille'];?>"><img class="<?php echo $bouquets['modele']?>" src="<?php echo $image; ?>" alt="<?php echo $bouquets['modele'];?>" title="<?php echo $bouquets['modele'];?>"/><br/></a>
						<?php 
						echo $bouquets['modele'];echo ' - à partir de ';echo $bouquets['prix'].'€'.' -10%<br/>';
					}
					$requete->closeCursor();
				}
			?>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>