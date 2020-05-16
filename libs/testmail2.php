<?php

// lance les classes de PHPMailer 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
// path du dossier PHPMailer % fichier d'envoi du mail 
require 'PHPMailer/src/Exception.php'; 
require 'PHPMailer/src/PHPMailer.php'; 
require 'PHPMailer/src/SMTP.php';

  function sendmail($objet, $contenu, $destinataire) {   
  // on crée une nouvelle instance de la classe 
  $mail = new PHPMailer(true); 
    // puis on l’exécute avec un 'try/catch' qui teste les erreurs d'envoi 
    try { 
    $mail -> SMTPDebug  =  2 ;     
    $mail -> isSMTP(); 
    $mail->Host = "smtp.gmail.com"; 
    $mail->Port = 25; //587/465
    $mail->SMTPSecure = 'tls';   //tls 
    $mail->SMTPAuth = true; 
    $mail->Username = "web.menuiseriedunord@gmail.com";    //Votre mail 
    $mail->Password = "yozo_4a3ibriwruDlban";          //Votre mot de passe  
    $mail->setFrom('web.menuiseriedunord@gmail.com');           //Votre mail
    
    $mail->addAddress($destinataire, 'Clients de Mon_Domaine');        // Adresse du destinataire (le nom est facultatif) 
    // $mail->addReplyTo('moi@mon_domaine.fr', 'son nom');     // réponse à un autre que l'expéditeur (le nom est facultatif) 
    // $mail->addCC('cc@example.com');            // Cc (copie) : autant d'adresse que souhaité = Cc (le nom est facultatif) 
    // $mail->addBCC('bcc@example.com');          // Cci (Copie cachée) :  : autant d'adresse que souhaité = Cci (le nom est facultatif) 
 
 
    /* CONTENU DE L'EMAIL*/ 
    ########################## 
    $mail->isHTML(true);                                      // email au format HTML 
    $mail->Subject = utf8_decode($objet);      // Objet du message (éviter les accents là, sauf si utf8_encode) 
    $mail->Body    = $contenu;          // corps du message en HTML - Mettre des slashes si apostrophes 
    $mail->AltBody = 'Contenu au format texte pour les clients e-mails qui ne le supportent pas'; // ajout facultatif de texte sans balises HTML (format texte) 
 
    $mail->send(); 
    echo 'Message envoyé.'; 
   
  } 
  // si le try ne marche pas > exception ici 
  catch (Exception $e) { 
    echo "Le Message n'a pas été envoyé. Mailer Error: {$mail->ErrorInfo}"; // Affiche l'erreur concernée le cas échéant 
  }   
} // fin de la fonction sendmail

  
function MailCreationCompte($dest){
          //$fichier=fopen('deb','w');
          //fwrite($fichier, 'Dans MailCreationCompte, adresse mail :');
          //fclose($fichier);
  $NbValidation = rand(10000, 99999);
  //$dest = "p.desaintmeleuc@laposte.net"; 
  $objet = "Confirmation de votre adresse mail"; 
  $contenu = "<br />Bonjour, pour valider la creation de votre compte, veuillez saisir le nombre ci-dessous"; 
  $contenu .= "<br /><br />Votre nombre :".$NbValidation;
  $contenu .= "<br /><br />Envoye le : ".date("d/m/Y"); 
  //echo $NbValidation;
  sendmail($objet, $contenu, $dest);
  return $NbValidation;
}

function MailValidationRDV($dest,$rdv){
  $objet = "Validation de votre rendez-vous"; 
  $contenu = "Bonjour,<br /><br />Votre demande de rendez vous ".$rdv." a bien ete acceptee."; 
  $contenu .= "<br /><br />Envoye le : ".date("d/m/Y"); 
  sendmail($objet, $contenu, $dest);
  //return $NbValidation;
}

function MailAnnulationRDV($dest,$rdv){
  $objet = "Annulation de votre rendez-vous"; 
  $contenu = "Bonjour,<br /><br />Votre demande de rendez vous ".$rdv." a ete annule."; 
  $contenu .= "<br /><br />Envoye le : ".date("d/m/Y"); 
  sendmail($objet, $contenu, $dest);
  //return $NbValidation;
}
?>
