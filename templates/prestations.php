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
        echo mkPrestation("test.png", "test a ezfneurnfjz nr zenzifnzefnze ner");
        echo mkPrestation("amazon.jpg", "test efizef berughezhb fjekengf jengi");
        echo mkPrestation("amazon2.png", "test");
        if (valider("admin","SESSION")) {
            $fichier=fopen('debug','w');
            fwrite($fichier, 'valider en temps qu\'admin');
            fclose($fichier);
            ?>
            <form action="controleur.php" method="post" enctype="multipart/form-data">
             Selectionner une image à upload:
             <input type="file" name="fileAUpload" id="fileToUpload">
             <br>
             <textarea id="textpresta">Décrire la prestation ici:</textarea>
            <input type="submit" value="EnregistrerImage" name="submit">
            </form>
            <?php
        }
        ?>

    </div>
</div>