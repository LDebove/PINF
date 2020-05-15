<?php


// inclure ici la librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");


function listerUtilisateurs()
{
	$SQL = "select * from users";
	
	return parcoursRs(SQLSelect($SQL));
}


function interdireUtilisateur($idUser)
{
	$SQL = "UPDATE users SET blacklist=1 WHERE id='$idUser'";

	SQLUpdate($SQL);
}

function autoriserUtilisateur($idUser)
{
	$SQL = "UPDATE users SET blacklist=0 WHERE id='$idUser'";

	SQLUpdate($SQL);
}

function verifUserBdd($login,$passe)
{
	$SQL="SELECT id FROM users WHERE login='$login' AND passe='$passe'";

	return SQLGetChamp($SQL);
}

function verifMailExist($mail)
{
	$SQL="SELECT id FROM users WHERE mail='$mail'";

	if(SQLGetChamp($SQL)!=NULL) return true;
	else return false;
}

function verifUserExist($login)
{
	$SQL="SELECT id FROM users WHERE login='$login'";

	if(SQLGetChamp($SQL)!=NULL) return true;
	else return false;
}

function creerUserBdd($login,$passe,$nom,$prenom,$mail,$telephone,$admin=0)
{
	$SQL="INSERT INTO users(login,passe,mail,telephone,nom,prenom,admin) VALUES('$login','$passe','$mail','$telephone','$nom','$prenom','$admin')";

	SQLInsert($SQL);
}

function listerRDV($date)
{
	$SQL = "SELECT id, `date`, `heure_depart`, `heure_fin` FROM disponibilite WHERE date='$date';";
	return parcoursRs(SQLSelect($SQL));
}

function addRDV($date, $depart, $fin)
{
	$SQL = "INSERT INTO `disponibilite` (`date`, `heure_depart`, `heure_fin`) VALUES ('$date', '$depart', '$fin');";
	return SQLInsert($SQL);
}

function selectRDV($date, $depart)
{
	$SQL = "SELECT `date`, `heure_depart`, `heure_fin` FROM disponibilite WHERE date='$date' && heure_depart='$depart';";
	return parcoursRs(SQLSelect($SQL));
}

function deleteRDV($date, $depart)
{
	$SQL = "delete FROM disponibilite WHERE date='$date' && heure_depart='$depart';";
	return SQLDelete($SQL);
}

function verifUserAdmin($id)
{
	$SQL = "SELECT admin FROM users WHERE id = $id";
	if(SQLGetChamp($SQL)==1) return true;
	else return false;
}

function getCom()
{
	$SQL = "SELECT L.id, L.id_users, L.date, L.titre, L.texte FROM livre_or L, users U WHERE U.blacklist=0 AND L.id_users=U.id ORDER BY L.date DESC ";
	return parcoursRs(SQLSelect($SQL));
}

function getUser()
{
    $SQL = "SELECT * FROM users WHERE admin=0";
    return parcoursRs(SQLSelect($SQL));
}

function getNameFromId($id)
{
	$SQL = "SELECT login FROM users WHERE id=$id";
	return SQLGetChamp($SQL);
}

function getIdFromLogin($login)
{
	$SQL = "SELECT id FROM users WHERE login=$login";
	return SQLGetChamp($SQL);
}

function verifUserBlacklist($id)
{
	$SQL = "SELECT blacklist FROM users WHERE id = $id";
	if(SQLGetChamp($SQL)==1) return true;
	else return false;
}

function deleteComment($idcomment)
{
	$SQL = "DELETE FROM livre_or WHERE id=$idcomment";
	return SQLDelete($SQL);
}

function sendComment($id,$titre,$texte)
{
	$SQL = "INSERT INTO livre_or(id_users,titre,texte) VALUES($id,'$titre','$texte');";
	return SQLInsert($SQL);
}

function getPrestations()
{
	$SQL = "SELECT `path`, `texte` FROM prestations";
	return parcoursRs(SQLSelect($SQL));
}

function addPrestation($path="", $texte)
{
	$SQL ="INSERT INTO prestations(`path`,`texte`) VALUES('$path','$texte')";
	return SQLInsert($SQL);
}

function delPrestation($path, $texte)
{
	$SQL ="DELETE FROM prestations WHERE `path`='$path' AND `texte`='$texte'";
	return SQLDelete($SQL);
}

function delUser($id)
{
    $SQL ="DELETE FROM users WHERE id=$id";
    return SQLDelete($SQL);
}

function delUserRDV($id)
{
    $SQL ="DELETE FROM rendez_vous WHERE id_users=$id";
    return SQLDelete($SQL);
}

function delUserLivredor($id)
{
    $SQL ="DELETE FROM livre_or WHERE id_users=$id";
    return SQLDelete($SQL);
}

function getDataUser($id)
{
	$SQL = "SELECT * FROM users WHERE id=$id";
	return parcoursRs(SQLSelect($SQL));
}

function updateUser($id,$passe,$telephone,$nom,$prenom)
{
    $SQL ="UPDATE users SET passe='$passe', telephone='$telephone', nom='$nom', prenom='$prenom' WHERE id=$id";
    SQLUpdate($SQL);
}

function idUSERS($login, $passe)
{
	$SQL = "select id from users where login='$login' and passe='$passe';";
//	return parcoursRs(SQLSelect($SQL));
//	return SQLSelect($SQL);
	return parcoursRs(SQLSelect($SQL));
}

function idRDV($date, $depart)
{
	$SQL = "select id from disponibilite where date='$date' and heure_depart='$depart';";
	return parcoursRs(SQLSelect($SQL));
}

function verif_demandeRDV($idusers, $idRDV)
{
	$SQL = "SELECT COUNT(*) FROM rendez_vous WHERE id_users='$idusers' AND id_rdv='$idRDV';";
	return SQLGetChamp($SQL);
}

function demandeRDV($idusers, $idRDV)
{
	$SQL = "INSERT INTO `rendez_vous` (`id_users`, `id_rdv`, `accepte`) VALUES ('$idusers', '$idRDV', 0);";
	return SQLInsert($SQL);
}

function affiche_demandeRDV()
{
	$SQL = "select `id_users`, `id_rdv` from rendez_vous, disponibilite where accepte=0 and id_rdv=disponibilite.id order by disponibilite.date, disponibilite.heure_depart;";
	return parcoursRs(SQLSelect($SQL));
}

function selectUsers($id_users)
{
	$SQL = "select `nom`, `prenom` from users where id='$id_users';";
	return parcoursRs(SQLSelect($SQL));
}

function selectRDVByID($id_rdv)
{
	$SQL = "SELECT `date`, `heure_depart`, `heure_fin` FROM disponibilite WHERE id='$id_rdv';";
	return parcoursRs(SQLSelect($SQL));
}

function update_demande($id_rdv, $id_users)
{
	$SQL = "UPDATE rendez_vous SET accepte=1 WHERE id_users='$id_users' and id_rdv='$id_rdv';";
	return SQLUpdate($SQL);
}

function delete_demande($id_rdv, $id_users)
{
	$SQL = "delete FROM rendez_vous WHERE id_users='$id_users' and id_rdv='$id_rdv';";
	return SQLDelete($SQL);
}

function delete_demandes($id_rdv, $id_users)
{
	$SQL = "delete FROM rendez_vous WHERE id_users!='$id_users' and id_rdv='$id_rdv';";
	return SQLDelete($SQL);
}

function verif_user($login, $passe)
{
	$SQL = "SELECT admin FROM users WHERE login='$login' AND passe='$passe';";
	return SQLGetChamp($SQL);
}

function deleteRDV_demande($date, $depart)
{
	$SQL = "delete FROM rendez_vous WHERE id_rdv=(SELECT id FROM disponibilite WHERE date='$date' and heure_depart='$depart');";
	return SQLDelete($SQL);
}

function couleur_RDV($id)
{
	$SQL = "SELECT accepte FROM rendez_vous WHERE id_rdv='$id';";
	return parcoursRs(SQLSelect($SQL));
}

function get_mail($id_users)
{
	$SQL = "SELECT mail FROM users WHERE id='$id_users';";
	return SQLGetChamp($SQL);
}

function selectRDV_dispo_ad($id)
{
	$SQL = "SELECT nom, prenom FROM users, rendez_vous WHERE rendez_vous.id_rdv='$id' and rendez_vous.accepte=1 and users.id=rendez_vous.id_users;";
	return parcoursRs(SQLSelect($SQL));
}

function delete_demande_erreur($id_rdv, $id_users)
{
	$SQL = "delete FROM rendez_vous WHERE id_users='$id_users' and id_rdv='$id_rdv';";
	return SQLDelete($SQL);
}

function verif_deja_demande($login, $passe, $id_rdv)
{
	$SQL = "SELECT COUNT(*) FROM rendez_vous WHERE id_users=(SELECT id FROM users WHERE login='$login' and passe='$passe') AND id_rdv='$id_rdv';";
	return SQLGetChamp($SQL);
}

function verifRDV_client($login, $passe, $id_rdv)
{
	$SQL = "SELECT COUNT(*) FROM rendez_vous WHERE id_users=(SELECT id FROM users WHERE login='$login' and passe='$passe') AND id_rdv='$id_rdv' and accepte=1;";
	return SQLGetChamp($SQL);
}

function selectDateRDVByID($id_rdv)
{
	$SQL = "SELECT date FROM disponibilite WHERE id=$id_rdv;";
	return SQLGetChamp($SQL);
}

function selectDepartRDVByID($id_rdv)
{
	$SQL = "SELECT heure_depart FROM disponibilite WHERE id='$id_rdv';";
	return SQLGetChamp($SQL);
}

function selectFinRDVByID($id_rdv)
{
	$SQL = "SELECT heure_fin FROM disponibilite WHERE id='$id_rdv';";
	return SQLGetChamp($SQL);
}

function deleteRDV_demande_verif($date, $depart)
{
	$SQL = "SELECT mail FROM users WHERE id=(SELECT id_users FROM rendez_vous WHERE id_rdv=(SELECT id FROM disponibilite WHERE date='$date' and heure_depart='$depart') and accepte=1);";
	return SQLGetChamp($SQL);
}

function selectFinRDVByDate($date, $depart)
{
	$SQL = "SELECT heure_fin FROM disponibilite WHERE id=(select id from disponibilite where date='$date' and heure_depart='$depart');";
	return SQLGetChamp($SQL);
}

?>