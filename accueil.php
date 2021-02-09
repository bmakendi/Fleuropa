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
			<center><h2>Nouveaux bouquets</h2></center>
			<div class="noob">
				<?php
					$requete=$dbh->query('SELECT * FROM bouquet LIMIT 0,3');
					while($bouquets=$requete->fetch()){
						$image=$bouquets['photo'];
						?>
						<a href="commander.php?modele=<?php echo $bouquets['modele'];?>&amp;photo=<?php echo $image;?>&amp;prix=<?php echo $bouquets['prix'];?>&amp;taille=<?php echo $bouquets['taille'];?>"><img class="<?php echo $bouquets['modele']?>" src="<?php echo $image; ?>" alt="<?php echo $bouquets['modele'];?>" title="<?php echo $bouquets['modele'];?>"/><br/></a>
						<?php
						echo $bouquets['modele'].'<br/>';
					}
					$requete->closeCursor();
				?>
			</div>

			<center><h2>Nos meilleures ventes</h2></center>
			<div class="bestvente">
				<?php
					$requete=$dbh->query('SELECT * FROM bouquet LIMIT 5,8');
					while($bouquets=$requete->fetch()){
						$image=$bouquets['photo'];
						?>
						<a href="commander.php?modele=<?php echo $bouquets['modele'];?>&amp;photo=<?php echo $image;?>&amp;prix=<?php echo $bouquets['prix'];?>&amp;taille=<?php echo $bouquets['taille'];?>"><img class="<?php echo $bouquets['modele']?>" src="<?php echo $image; ?>" alt="<?php echo $bouquets['modele'];?>" title="<?php echo $bouquets['modele'];?>"/><br/></a>
						<?php
						echo $bouquets['modele'].'<br/>';
					}
					$requete->closeCursor();
				?>
			</div>
		</div>
	
		<?php include("footer.php"); ?>
	</body>
</html>