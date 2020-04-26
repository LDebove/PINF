<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}
?>

<div class="page-content">
	<form role="form" action="controleur.php">
		<div id="form-group-verif">
			<input type="text" class="form-control" id="code" name="code">
			<button type="submit" name="action" value="Newuser" class="btn btn-default">Valider</button>
		</div>
	</form>
</div>