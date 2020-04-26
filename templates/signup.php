<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}
?>

<div class="page-content">
  <div class="signup">
    <div class="page-header">
      <h1>Inscription</h1>
      <p>Les champs marqués d'une <span style="color: red;">*</span> sont OBLIGATOIRES</p>
    </div>

    <p class="lead">

      <form role="form" action="controleur.php">
        <div class="form-group">
          <label for="login"><span style="color: red;">*</span> Identifiant</label>
          <input type="text" class="form-control" id="login" name="login">
        </div>
        <div class="form-group">
          <label for="pwd"><span style="color: red;">*</span> Mot de Passe</label>
          <input type="password" class="form-control" id="pwd" name="passe1">
        </div>
        <div class="form-group">
          <label for="confirmPwd"><span style="color: red;">*</span> Confirmation Mot de Passe</label>
          <input type="password" class="form-control" id="confirmPwd" name="passe2">
        </div>
        <div class="form-group">
          <label for="mail"><span style="color: red;">*</span> Adresse Mail</label>
          <input type="text" class="form-control" id="mail" name="mail">
        </div>
        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" class="form-control" id="nom" name="nom">
        </div>
        <div class="form-group">
          <label for="prenom">Prénom</label>
          <input type="text" class="form-control" id="prenom" name="prenom">
        </div>
        <div class="form-group">
          <label for="telephone">Téléphone</label>
          <input type="text" class="form-control" id="telephone" name="telephone">
        </div>
        <button type="submit" name="action" value="Email" class="btn btn-default">S'inscrire</button>

        <?php
        //SI l'utilisateur a entré les bonnes données, on affiche un popup demandant un code ayant été transmit par mail
         /* if($_POST['action'] == "Email"){ //pourquoi vérifie tu la valeur de la variable action alors que ce traitement est fais dans le controleur ?
            if ($login = valider("login"))
            if ($passe1 = valider("passe1"))
            if ($passe2 = valider("passe2"))
            if ($passe1 == $passe2)
            if ($mail = valider("mail"))
            if (!verifMailExist($mail))
            if (!verifUserExist($login))
              echo "<div id=\"form-group-verif\"><input type=\"text\" class=\"form-control\" id=\"code\" name=\"code\"><button type=\"submit\" name=\"action\" value=\"Newuser\" class=\"btn btn-default\">Valider</button></div>";
          }*/
        ?>

      </form>

    </p>
  </div>
</div>