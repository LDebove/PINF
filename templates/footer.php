<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}
?>

<footer class="bg-dark py-4 mt-5 tf-footer">
	<div class="container text-light">
		<div class="row">
			<div class="col-md-6 col-sm-12">&copy; Your Company Name. All rights reserved.</div>
			<div class="col-md-6 col-sm-12 text-right tf-design"></div>
		</div>
	</div>
</footer>
</body>
</html>
