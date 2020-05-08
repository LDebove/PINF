<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=gestionUtilisateur");
	die("");
}
if(!valider("connecte","SESSION")){
	header("Location: ./index.php?view=accueil");
	die("");
}
?>

<div class="page-content">
<?php

?>
</div>