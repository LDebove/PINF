<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=account");
	die("");
}
if(!valider("connecte","SESSION")){
	header("Location: ./index.php?view=accueil");
	die("");
}
?>

<div class="page-content">
	<div class="updateUser">
		<div class="page-header">
			<h1>Modifier ses informations</h1>
		</div>
		<?php
		if(valider("connecte","SESSION")) echo formUpdateUser(getDataUser(getIdFromLogin($_SESSION["login"])));
		?>
	</div>
</div>