<header>
	<h1 id="ancre">FLEUROPA</h1>
	<nav>
		<ul>
			<li><a href="accueil.php">Accueil</a></li>
			<li><a href="bouquets.php">Les bouquets</a></li>
			<li><a href="club.php">Club client</a></li>
			<li><?php 
			if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
				echo "<a href=pagemembre.php>Mon profil</a>";
			}
			else{
				echo "<a href='compteperso.php'>Connexion</a>";
			}
		?></li>
		</ul>
	<nav>
</header>