<?php
    /* session_start(); */
    include_once "maLibUtils.php";
    include_once "maLibSQL.pdo.php";
    include_once "maLibSecurisation.php";
    include_once "modele.php";
    
if(!($action = valider("action","POST"))){
    header("Location:index.php?view=accueil");
}

$action = valider("action","POST");
switch($action){

	case 'list' : 
        $date = valider("date", "POST");
	echo json_encode(listerRDV($date));
    break;

	case 'add' : 
        $date = valider("date", "POST");
        $depart = valider("depart", "POST");
        $fin = valider("fin", "POST");
	echo json_encode(addRDV($date, $depart, $fin));
    break;

	case 'select' : 
        $date = valider("date", "POST");
        $depart = valider("depart", "POST");
	echo json_encode(selectRDV($date, $depart));
    break;

	case 'delete' : 
        $date = valider("date", "POST");
        $depart = valider("depart", "POST");
	echo json_encode(deleteRDV($date, $depart));
    break;
}


?>
