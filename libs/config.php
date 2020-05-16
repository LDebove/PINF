<?php

/*
IMPORTANT : pour créer de nouvelles bases sur les installations de mysql sur les postes de l'ig2i, il faut nommer les bases 'testdb_<nom>', et utiliser le fichier de configuration suivant :

$BDD_host="localhost;port=3307";
$BDD_user="administrateur";
$BDD_password=""; // pas de mot de passe
$BDD_base="testdb_<nom>";
*/

//$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

// MACHINE LINUX
$BDD_host="localhost";
$BDD_user="admin";
$BDD_password="mysql";
$BDD_base="pinf";

// MACHINE LINUX 
/*$BDD_host="localhost";
$BDD_user="pourqwcd_MenuiserieDuNord";
$BDD_password="mysql59VBAtest";
$BDD_base="pourqwcd_pinf";*/

?>
