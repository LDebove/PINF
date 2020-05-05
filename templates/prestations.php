<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
    header("Location:../index.php?view=login");
    die("");
}
?>

<div class="page-content">
    <div class="prestations">
    <?php
    foreach(getPrestations() as $prestation){
        echo mkPrestation($prestation);
    }
    ?>
    <?php
    if (valider("admin","SESSION")) {
        echo mkPostPrestation();
    }
    ?>
    </div>
</div>