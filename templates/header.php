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
	<title>Start Simple</title>
	<meta name="description" content="This is a basic starter template for MMPilot which includes Bootstrap Framework."/>
	<link href="https://fonts.googleapis.com/css?family=Oxygen:300,400,600,700" rel="stylesheet">
	<link href="styles/main.css" rel="stylesheet">
</head>

<body id="top">
	<header class="tf-header">
		<nav class="navbar py-5 navbar-dark">
			<div class="container">
				<h1><a class="navbar-brand" href="/">Start Simple</a></h1>
				<div id="navbar">
					<ul class="nav pull-right">
						<li class="nav-item"><a class="nav-link" href="#">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="#work">Work</a></li>
						<li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container googlemap">

		</div>

	</header>