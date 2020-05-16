<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=signin");
	die("");
}

$login = valider("login", "COOKIE");
$passe = valider("passe", "COOKIE"); 
if ($checked = valider("remember", "COOKIE")) $checked = "checked"; 
?>
<div class="page-content">
  <div class="signin">
    <div class="page-header">
      <h1>Se connecter</h1>
    </div>

    <form role="form" action="controleur.php">
      <p class="form-group">
        <label for="email">Identifiant :</label>
        <input type="text" class="form-control" id="email" name="login" value="<?php echo $login;?>" >
      </p>
      <p class="form-group">
        <label for="pwd">Mot de Passe :</label>
        <input type="password" class="form-control" id="pwd" name="passe" value="<?php echo $passe;?>">
      </p>
      <p class="checkbox">
        <label><input type="checkbox" name="remember" <?php echo $checked;?> >Se souvenir de moi</label>
      </p>
      <p><span style="color: red;"><?php if(isset($_SESSION['erreursignin'])) echo $_SESSION['erreursignin']; ?></span></p>
      <button type="submit" name="action" value="Connexion" class="btn btn-default">Se connecter</button>
    </form>

  </div>
</div>


