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

function findIdUser($login,$passe)
{
<<<<<<< HEAD
=======
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

>>>>>>> e4de9e7ebb29931a949496be1d90cbfe02e5c762
	$SQL="SELECT id FROM users WHERE identifiant='$login' AND passe='$passe'";

	return SQLGetChamp($SQL);
}


?>
