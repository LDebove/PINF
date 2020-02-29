<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Site Web d'un artisan"/>
	<title>Menuiserie du Nord</title>
	<link href="styles/main.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="scripts/main.js"></script>
</head>

<body>
	<header>
		<div id="header-container">
			<a href="index.php">Menuiserie du Nord</a>
			<div class="topMenu" id="myTopMenu">
				<?php
				echo mkHeadLink("Accueil","accueil",$view);
				echo mkHeadLink("Nos prestations","prestations",$view);
				echo mkHeadLink("Livre d'or","livredor",$view);
				if(!valider("connecte","SESSION")){
					echo mkHeadLink("Se connecter","signin",$view);
					echo mkHeadLink("S'inscrire","signup",$view);
				}
				else{
					echo mkHeadLink("Se déconnecter","signin",$view);
				}
				?>
				<a href="javascript:void(0);" class="icon" onclick="responsiveMenu()">
					<img src="icons/bars-solid.png" class="icon-menu">
				</a>
			</div>
		</div>
		
	</header>