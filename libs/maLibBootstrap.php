<?php
function mkHeadLink($label,$view,$currentView="",$class="")
{
	// EX: <?=mkHeadLink("Accueil","accueil",$view)
	// produit <li class="active"><a href="index.php?view=accueil">Accueil</a></li> si $view= accueil
		
	if($view == $currentView) 
		$class .= " active";
	return "<li class=\"nav-item $class\"> <a class=\"nav-link\" href=\"index.php?view=$view\">$label</a></li>";
}

function mkDivImg($file, $alt="image", $folder="images")
{
	$url = $folder;
	$url .= "/";
	$url .= $file;
	return "<div class=\"divImgPrestations\"><img src=\"$url\" alt=\"$alt\"></div>";
}
?>
