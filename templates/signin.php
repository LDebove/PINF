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
<div id="divLogin">
  <div class="page-header">
  	<h1>Inscription</h1>
    <p>Les champs marqués d'une * sont OBLIGATOIRES</p>
  </div>

  <p class="lead">

   <form role="form" action="controleur.php">
    <div class="form-group">
      <label for="email">* Login </label>
      <input type="text" class="form-control" id="email" name="login" value="<?php echo $login;?>" >
    </div>
    <div class="form-group">
      <label for="pwd">* Mot de Passe</label>
      <input type="password" class="form-control" id="pwd" name="passe" value="<?php echo $passe;?>">
    </div>
    <div class="form-group">
      <label for="pwd">Nom</label>
      <input type="password" class="form-control" id="pwd" name="passe" value="<?php echo $passe;?>">
    </div>
    <div class="form-group">
      <label for="pwd">Prénom</label>
      <input type="password" class="form-control" id="pwd" name="passe" value="<?php echo $passe;?>">
    </div>
    <div class="form-group">
      <label for="pwd">* Confirmation Mot de Passe</label>
      <input type="password" class="form-control" id="pwd" name="passe" value="<?php echo $passe;?>">
    </div>
    <div class="form-group">
      <label for="pwd">* Email</label>
      <input type="password" class="form-control" id="pwd" name="passe" value="<?php echo $passe;?>">
    </div>
    <div class="form-group">
      <label for="pwd">Téléphone</label>
      <input type="password" class="form-control" id="pwd" name="passe" value="<?php echo $passe;?>">
    </div>
    <button type="submit" name="action" value="Connexion" class="btn btn-default">S'inscrire</button>
  </form>

  </p>
</div>