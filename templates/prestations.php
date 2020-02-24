<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}
?>
<div class="page-content">
  <?php
  echo mkDivImg("test.png", "test a adi,erfijerfn ezfneurnfjz nr zenzifnzefnze ner");
  echo mkDivImg("amazon.jpg", "test zeifjevhnerubf efizef berughezhb fjekengf jengi");
  echo mkDivImg("amazon2.png", "test");
  ?>
</div>