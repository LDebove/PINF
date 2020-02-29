<?php
function mkHeadLink($label, $view, $currentView="", $class="")
{
	if($view == $currentView) $class .= " active";
	return "<a href=\"index.php?view=$view\" class=\"$class\">$label</a>";
}

function mkPrestation($file, $alt="image", $folder="images")
{
	$url = $folder;
	$url .= "/";
	$url .= $file;
	return "<div class=\"prestation\"><img src=\"$url\" alt=\"$alt\"><p>$alt</p></div>";
}
?>