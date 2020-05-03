<?php
function mkHeadLink($label, $view, $currentView="", $class="")
{
	if ($label=="Se déconnecter") return ' <a href="controleur.php?action=Logout" >Se déconnecter </a>';
	if($view == $currentView) $class .= " active";
	return "<a href=\"index.php?view=$view\" class=\"$class\">$label</a>";
}

function mkPrestation($file, $alt="image", $folder="images")
{
	$url = $folder;
	$url .= "/";
	$url .= $file;
	return "<div class=\"prestation\"><img src=\"$url\" alt=\"$alt\"><p>$alt</p></div>";
}

function mkLivredor($commentaire, $admin=0)
{
	$id=$commentaire["id"];
	$id_users=$commentaire["id_users"];
	$date=$commentaire["date"];
	$titre=$commentaire["titre"];
	$texte=$commentaire["texte"];
	$login=getNameFromId($id);

	if($admin==0) return "<div class=\"livredor-comment\"><h2>$login</h2><h1>$titre</h1><p>$texte</p></div>";
	else return "<div class=\"livredor-comment\"><h2>$login</h2><h1>$titre</h1><form role=\"form\" action=\"controleur.php\"><input type=\"hidden\" name=\"idComment\" value=\"$id\"/><button type=\"submit\" name=\"action\" value=\"delComment\">x</button></form<p>$texte</p></div>";

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
                </form>
            </div><br>";
    }
}
?>
