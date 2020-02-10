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
			<div class="col-md-6 col-sm-12 text-right tf-design">Design - <a href="https://templateflip.com" target="_blank">Templateflip</a></div>
		</div>
	</div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="scripts/main.js"></script>
</body>
</html>
