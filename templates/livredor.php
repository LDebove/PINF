<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}
?>

<div class="page-content">
	<div class="reply">
		
	</div>
	<div class="livredor-comments">
		<?php
		foreach(getCom() as $commentaire){
			if(valider("admin","SESSION")){
				echo mkLivredor($commentaire, 1);
			}
			else echo mkLivredor($commentaire);
		}
		?>
	</div>
</div>