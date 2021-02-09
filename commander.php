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
				$modele=$_GET["modele"];
				$prix=$_GET["prix"];
				$taille=$_GET["taille"];
				$photo=$_GET["photo"];
			?>
			<center><h2><?php echo "$modele";?></h2></center>
			<div class="lacommande">
			<img id="<?php echo "$modele" ?>" src="<?php echo "$photo"; ?>" alt="<?php echo "$modele";?>" title="<?php echo "$modele";?>"/>
		
			<?php
				if(!isset($_SESSION['pseudo'])){
					echo "<form class='commande' method='post' action='pagecommande.php?modele=$modele'>
						Taille du bouquet :<br/>
						<input type='radio' name='taille' id='taille'/>".$taille."<br/>
						Prix : ".$prix."€<br/>
						<input type='submit' value='Commander'/>
						</form>";
				}
				else{
					echo "<form class='commande' method='post' action='pagecommande.php?modele=$modele'>
						Taille du bouquet :<br/>
						<input type='radio' name='taille' id='taille'/>".$taille."<br/>
						Prix : ".$prix."€ -10% (Réservé au membre du club !)<br/>
						<input type='submit' value='Commander'/>
						</form>";
				}
			?>
			</div>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>