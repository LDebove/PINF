<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}
?>

<div class="page-content">
  <?php
  echo mkPrestation("test.png", "test a ezfneurnfjz nr zenzifnzefnze ner");
  echo mkPrestation("amazon.jpg", "test efizef berughezhb fjekengf jengi");
  echo mkPrestation("amazon2.png", "test");
  ?>
</div>