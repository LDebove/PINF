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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menuiserie du Nord</title>
	<meta name="description" content="This is a basic starter template for MMPilot which includes Bootstrap Framework."/>
	<link href="https://fonts.googleapis.com/css?family=Oxygen:300,400,600,700" rel="stylesheet">
	<link href="styles/main.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="scripts/main.js"></script>
</head>

<body id="top">
	<header class="tf-header">
		<nav class="navbar py-5 navbar-dark">
			<div class="container">
				<h1><a class="navbar-brand" href="index.php">Menuiserie du Nord</a></h1>
				<div id="navbar">
					<ul class="nav pull-right">
						<?php
						echo mkHeadLink("Accueil","accueil",$view);
						echo mkHeadLink("Nos prestations","prestations",$view);
						if(!valider("connecte","SESSION")){
							echo mkHeadLink("Se connecter","signin",$view);
							echo mkHeadLink("S'inscrire","signup",$view);
						}
						else{
							echo mkHeadLink("Se déconnecter","signin",$view);
						}

						?>
					</ul>
				</div>
			</div>
		</nav>
	</header>