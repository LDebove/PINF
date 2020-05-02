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
	$SQL = "SELECT `date`, `heure_depart`, `heure_fin` FROM disponibilite WHERE date='$date';";
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

?>
