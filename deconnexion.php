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
			<?php	
				$_SESSION=array();
				session_destroy();
				echo 'Vous êtes déconnecté(e)';
			?>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>