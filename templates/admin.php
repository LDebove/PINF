<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=admin");
	die("");
}
if(!valider("admin","SESSION")){
	header("Location: ./index.php?view=accueil");
	die("");
}
?>

<div class="page-content">
<?php
$tabuser=getUSer();
//print_r($tabuser);
foreach ($tabuser as $utilisateur) {
	//echo "1";
	echo mkficheUser($utilisateur);
}
?>
</div>