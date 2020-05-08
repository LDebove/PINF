<?php
function mkHeadLink($label, $view, $currentView="", $class="")
{
	if ($label=="Se déconnecter") return ' <a href="controleur.php?action=Logout" >Se déconnecter </a>';
	if($view == $currentView) $class .= " active";
	return "<a href=\"index.php?view=$view\" class=\"$class\">$label</a>";
}

function mkPrestation($prestation,$admin=0)
{
	$path=$prestation["path"];
    $texte=$prestation["texte"];
    if($admin==0){
        if($path!="images/") return "<div class=\"prestation\"><img src=\"$path\"><p>$texte</p></div>";
        else return "<div class=\"prestation\"><p>$texte</p></div>";
    }
    else{
        if($path!="images/") return "<div class=\"prestation\"><form role=\"form\" action=\"controleur.php\"><input type=\"hidden\" name=\"pathPrestation\" value=\"$path\"/><input type=\"hidden\" name=\"textePrestation\" value=\"$texte\"/><button type=\"submit\" name=\"action\" value=\"delPrestation\">x</button></form><img src=\"$path\"><p>$texte</p></div>";
        else return "<div class=\"prestation\"><form role=\"form\" action=\"controleur.php\"><input type=\"hidden\" name=\"pathPrestation\" value=\"$path\"/><input type=\"hidden\" name=\"textePrestation\" value=\"$texte\"/><button type=\"submit\" name=\"action\" value=\"delPrestation\">x</button></form><p>$texte</p></div>";
    }
}

function mkLivredor($commentaire, $admin=0)
{
	$id=$commentaire["id"];
	$id_users=$commentaire["id_users"];
	$date=$commentaire["date"];
	$titre=$commentaire["titre"];
	$texte=$commentaire["texte"];
	$login=getNameFromId($id_users);

	if($admin==0) return "<div class=\"livredor-comment\"><h2>$login</h2><h1>$titre</h1><p>$texte</p></div>";
	else return "<div class=\"livredor-comment\"><h2>$login</h2><h1>$titre</h1><form role=\"form\" action=\"controleur.php\"><input type=\"hidden\" name=\"idComment\" value=\"$id\"/><button type=\"submit\" name=\"action\" value=\"delComment\">x</button></form><p>$texte</p></div>";

}

function mkficheUser($utilisateur)
{
    $iduser=$utilisateur["id"];
    $mailuser=$utilisateur["mail"];
    $phoneuser=$utilisateur["telephone"];
    $nomuser=$utilisateur["nom"];
    $prenomuser=$utilisateur["prenom"];
    $loginuser=$utilisateur["login"];
    if($utilisateur["blacklist"]==0){
            return "<div class=\"ficheUser\" id=\"$iduser\">
                <p>Login :$loginuser</p>
                <p>Nom :$nomuser</p>
                <p>prenom :$prenomuser</p>
                <p>mail :$mailuser</p>
                <p>telephone :$phoneuser</p>
                <form role=\"form\" action=\"controleur.php\">
                    <input type = \"hidden\" name = \"IDaBlack\" value = \"$iduser\" />
                    <button type=\"submit\" name=\"action\" value=\"Blacklister\">Bloquer la personne</button>
                    <button type=\"submit\" name=\"action\" value=\"delUser\">Supprimer la personne</button>
                </form>

            </div><br>";
    }else{
            return "<div class=\"ficheUser\" id=\"$iduser\">
                <p>Login :$loginuser</p>
                <p>Nom :$nomuser</p>
                <p>prenom :$prenomuser</p>
                <p>mail :$mailuser</p>
                <p>telephone :$phoneuser</p>
                <form role=\"form\" action=\"controleur.php\">
                    <input type = \"hidden\" name = \"IDAut\" value = \"$iduser\" />
                    <button type=\"submit\" name=\"action\" value=\"Autoriser\">Debloquer la personne</button>
                    <button type=\"submit\" name=\"action\" value=\"delUser\">Supprimer la personne</button>
                </form>
            </div><br>";
    }
}

function mkReply()
{
	return "<div class=\"reply\"><label for=\"titre\">Titre : </label><input name=\"titre\" form=\"form-reply\"></input><textarea name=\"comment\" form=\"form-reply\"></textarea><form role=\"form\" action=\"controleur.php\" id=\"form-reply\"><button type=\"submit\" name=\"action\" value=\"sendComment\">Envoyer</button></form></div>";
}

function mkPostPrestation()
{
    return "<form role=\"form\" action=\"controleur.php\" method=\"post\" enctype=\"multipart/form-data\">Selectionner une image à upload: <input type=\"file\" name=\"file\" id=\"fileAUpload\"><br><textarea name=\"texte\" id=\"textpresta\" placeholder=\"Décrire la prestation ici:\"></textarea><button type=\"submit\" name=\"action\" value=\"enregistrerImage\">Envoyer</button></form>";
}
?>
