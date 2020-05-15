<?php
session_start();
    include_once "maLibUtils.php";
    include_once "maLibSQL.pdo.php";
    include_once "maLibSecurisation.php";
    include_once "modele.php";
    include_once "testmail2.php";
    include_once "maMainLib.php";
    
/*    if (version_compare(PHP_VERSION, '5.4.0', '<')) {
        if(session_id() == '') {session_start();}
    } else  {
       if (session_status() == PHP_SESSION_NONE) {session_start();}
    }*/

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

    case 'selectIDusers' : 

//  $nom = false;
//  if (isset($_SESSION['nom'])){
//      if ($_SESSION['nom'] != NULL){
//          return $_SESSION['nom'];                   
//      }
//      return "ok";  
//  }
//  if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    $passe = $_SESSION['passe'];
//  }
//  $login = $_SESSION['login'];
//  echo $_SESSION['nom'];
    echo json_encode(idUSERS($login, $passe));
    break;

    case 'selectIDrdv' : 
        $date = valider("date", "POST");
        $depart = valider("depart", "POST");
    echo json_encode(idRDV($date, $depart));
    break;

    case 'verif_demande' : 
    $idusers = valider("idusers", "POST");
        $idRDV = valider("idRDV", "POST");
    echo json_encode(verif_demandeRDV($idusers, $idRDV));
    break;

    case 'demande' : 
    $idusers = valider("idusers", "POST");
        $idRDV = valider("idRDV", "POST");
    echo json_encode(demandeRDV($idusers, $idRDV));
    break;

    case 'affiche_demande' :
    echo json_encode(affiche_demandeRDV());
    break;

    case 'selectUsers' :
    $id_users = valider("id_users", "POST");
    echo json_encode(selectUsers($id_users));
    break;

    case 'selectRDVByID' :
    $id_rdv = valider("id_rdv", "POST");
    echo json_encode(selectRDVByID($id_rdv));
    break;

    case 'accepter_demande' :
    $id_rdv = valider("id_rdv", "POST");
    $id_users = valider("id_users", "POST");
    echo json_encode(update_demande($id_rdv, $id_users));
    break;

    case 'refuser_demande' :
    $id_rdv = valider("id_rdv", "POST");
    $id_users = valider("id_users", "POST");
    echo json_encode(delete_demande($id_rdv, $id_users));
    break;

    case 'delete_demande' :
    $id_rdv = valider("id_rdv", "POST");
    $id_users = valider("id_users", "POST");
    echo json_encode(delete_demandes($id_rdv, $id_users));
    break;

    case 'verif_user' :
    $login = $_SESSION['login'];
    $passe = $_SESSION['passe'];
    echo json_encode(verif_user($login, $passe));
    break;

    case 'deleteRDV_demande' :
        $date = valider("date", "POST");
        $depart = valider("depart", "POST");
    echo json_encode(deleteRDV_demande($date, $depart));
    break;

    case 'deleteRDV_demande_verif' :
        $date = valider("date", "POST");
        $depart = valider("depart", "POST");
    $mail = deleteRDV_demande_verif($date, $depart);
    $date2 = substr($date,8,2)."/".substr($date,5,2)."/".substr($date,0,4);
    $depart2 = substr($depart, 0, 5);
    $fin = substr(selectFinRDVByDate($date, $depart), 0, 5);
    $rdv = "le ".$date2." de ".$depart2." a ".$fin;
    echo MailAnnulationRDV($mail,$rdv);
    break;

    case 'couleur' :
        $id = valider("id", "POST");
    echo json_encode(couleur_RDV($id));
    break;

    case 'selectRDV_dispo_ad' :
        $id = valider("id", "POST");
    echo json_encode(selectRDV_dispo_ad($id));
    break;

    case 'delete_demande_erreur' :
    $id_rdv = valider("id_rdv", "POST");
    $id_users = valider("id_users", "POST");
    echo json_encode(delete_demande_erreur($id_rdv, $id_users));
    break;

    case 'mail' :
    $id_users = valider("id_users", "POST");
    $id_rdv = valider("id_rdv", "POST");
        $mail = get_mail($id_users);
    $day = selectDateRDVByID($id_rdv);
    $date = substr($day,8,2)."/".substr($day,5,2)."/".substr($day,0,4);
    $depart = substr(selectDepartRDVByID($id_rdv), 0, 5);
    $fin = substr(selectFinRDVByID($id_rdv), 0, 5);
    $rdv = "le ".$date." de ".$depart." a ".$fin;
    echo MailValidationRDV($mail,$rdv);
    break;

    case 'verif_deja_demande' : 
    $login = $_SESSION['login'];
    $passe = $_SESSION['passe'];
        $id_rdv = valider("id_rdv", "POST");
    echo json_encode(verif_deja_demande($login, $passe, $id_rdv));
    break;

    case 'verifRDV_client' : 
    $login = $_SESSION['login'];
    $passe = $_SESSION['passe'];
        $id_rdv = valider("id_rdv", "POST");
    echo json_encode(verifRDV_client($login, $passe, $id_rdv));
    break;
}
?>






















