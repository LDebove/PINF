<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}
?>

<div class="page-content">
<?php
	print_r(verifUserBdd("admin","a"));
?>
</div>