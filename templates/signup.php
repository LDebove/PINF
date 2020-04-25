<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}

// Chargement eventuel des données en cookies
$login = valider("login", "COOKIE");
$passe = valider("passe", "COOKIE"); 
if ($checked = valider("remember", "COOKIE")) $checked = "checked"; 

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
        <button type="submit" name="action" value="Connexion" class="btn btn-default">S'inscrire</button>
      </form>

    </p>
  </div>
</div>