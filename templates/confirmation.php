<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<link href="styles/main.css" rel="stylesheet">
</head>
<body>
	<div class="page-confirm">
		<div class="confirm">
			<p>Un code de confirmation vous a été envoyé par E-mail</p>
			<form role="form" action="controleur.php">
				<p id="form-group-verif">
					<label for="code">Votre code de confirmation :</label>
				</p>
				<p>
					<input type="text" class="form-control" id="code" name="code">
				</p>
				<p>
					<button type="submit" name="action" value="Newuser" class="btn btn-default">Valider</button>
				</p>
			</form>
		</div>
	</div>
</body>
</html>