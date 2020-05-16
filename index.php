<?php
session_start();

	include_once "libs/maLibUtils.php";
	include_once "libs/maMainLib.php";
	include_once "libs/modele.php";


	$view = valider("view");

	if (!$view) $view = "accueil"; 

	if ($view != "confirmation")
	include("templates/header.php");



	switch($view)
	{		

		case "accueil" : 
		include("templates/accueil.php");
		break;

		default :
		if (file_exists("templates/$view.php"))
			include("templates/$view.php");
	}

	if ($view != "confirmation")
	include("templates/footer.php");
?>








