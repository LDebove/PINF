<?php
// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=signup");
	die("");
}

if(isset($_SESSION['erreurMail'])) $mail = $_SESSION['erreurMail'];
else $mail="";
if(isset($_SESSION['erreurLogin'])) $login = $_SESSION['erreurLogin'];
else $login="";
?>

<div class="page-content">
  <div class="signup">
    <div class="page-header">
      <h1>Créer un compte</h1>
      <p>Les champs marqués d'une <span style="color: red;">*</span> sont OBLIGATOIRES</p>
    </div>

    <form role="form" action="controleur.php">
      <p class="form-group">
        <label for="login"><span style="color: red;">*</span> Identifiant :</label>
        <input type="text" class="form-control" id="login" name="login" value="<?php echo $login;?>">
      </p>
      <p class="form-group">
        <label for="pwd"><span style="color: red;">*</span> Mot de Passe :</label>
        <input type="password" class="form-control" id="pwd" name="passe1">
      </p>
      <p class="form-group">
        <label for="confirmPwd"><span style="color: red;">*</span> Confirmation Mot de Passe :</label>
        <input type="password" class="form-control" id="confirmPwd" name="passe2">
      </p>
      <p class="form-group">
        <label for="mail"><span style="color: red;">*</span> Adresse Mail :</label>
        <input type="text" class="form-control" id="mail" name="mail" value="<?php echo $mail;?>">
      </p>
      <p class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" class="form-control" id="nom" name="nom">
      </p>
      <p class="form-group">
        <label for="prenom">Prénom :</label>
        <input type="text" class="form-control" id="prenom" name="prenom">
      </p>
      <p class="form-group">
        <label for="telephone">Téléphone :</label>
        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Ex : 0512149876">
      </p>
      <p><span style="color: red;"><?php if(isset($_SESSION['erreur'])) echo $_SESSION['erreur']; ?></span></p>
      <button type="submit" name="action" value="Email" class="btn btn-default">S'inscrire</button>
    </form>
  </div>
</div>