<?php
session_start();

include_once "libs/maLibUtils.php";
include_once "libs/maLibSQL.pdo.php";
include_once "libs/maLibSecurisation.php"; 
include_once "libs/modele.php";
include_once 'libs/testmail2.php';


$addArgs = "";

if ($action = valider("action"))
{
	ob_start ();
	echo "Action = '$action' <br />";
		// ATTENTION : le codage des caractères peut poser PB si on utilise des actions comportant des accents... 
		// A EVITER si on ne maitrise pas ce type de problématiques

		/* TODO: A REVOIR !!
		// Dans tous les cas, il faut etre logue... 
		// Sauf si on veut se connecter (action == Connexion)

		if ($action != "Connexion") 
			securiser("login");
		*/

		// Un paramètre action a été soumis, on fait le boulot...
			switch($action)
			{


			// Connexion //////////////////////////////////////////////////
				case 'Connexion' :
				// On verifie la presence des champs login et passe
				if (($login = valider("login")) && ($passe = valider("passe")))
				{
					// On verifie l'utilisateur, 
					// et on crée des variables de session si tout est OK
					// Cf. maLibSecurisation
					if (verifUser($login,$passe)) {
						// tout s'est bien passé, doit-on se souvenir de la personne ? 
						if (valider("remember")) {
							setcookie("login",$login , time()+60*60*24*30);
							setcookie("passe",$passe, time()+60*60*24*30);
							setcookie("remember",true, time()+60*60*24*30);
						} else {
							setcookie("login","", time()-3600);
							setcookie("passe","", time()-3600);
							setcookie("remember",false, time()-3600);
						}
						
						if(isset($_SESSION['erreur'])) unset($_SESSION['erreur']);
					}
					else{
						$error="L'identifiant ou le mot de passe ne correspond pas. ";

						$_SESSION['erreursignin']=$error;

						header("Location:./index.php?view=signin");
						die("");
					}
				}
				break;
				// On redirigera vers la page index automatiquement

				case 'Newuser':
				if (preg_match(" /^[1-9][0-9]{4}$/ ", $_REQUEST['code']))//JE NE SAIS PAS COMMENT VERIF LE CODE EMAIL MAIS IL FAUT LE VERIF (TODO)
				{
					//$fichier=fopen('debug','w');
					//fwrite($fichier, $_SESSION['mail']);
					//fclose($fichier);
					if ($_SESSION['CodeAVerif']==$_REQUEST['code']) {
						//$fichier=fopen('debug','w');
						//fwrite($fichier, 'meme code');
						//fclose($fichier);
						creerUserBdd($_SESSION['login'],$_SESSION['passe'],$_SESSION['nom'],$_SESSION['prenom'],$_SESSION['mail'],$_SESSION['telephone']);
						
						setcookie("login",$_SESSION['login'] , time()+60*60*24*30);
						setcookie("passe",$_SESSION['passe'], time()+60*60*24*30);
						setcookie("remember",false, time()+60*60*24*30);
						$_SESSION['connecte']="1";
						//creerUserBdd($login,$passe,$nom,$prenom,$mail,$telephone)
					}					
				}
				$fichier=fopen('debug','w');
				fwrite($fichier, $_SESSION['mail']);
				fclose($fichier);

				break;

				case 'Logout' :
				session_destroy();
				break;

				case 'Email' :
				if (($login = valider("login")) && ($passe1 = valider("passe1")) && ($passe2 = valider("passe2")) && ($passe1 == $passe2) && ($mail = valider("mail")) && ( preg_match ( " /[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/ " , $mail )) && ($_REQUEST['telephone']=='' || (preg_match(" /^(\+\d+(\s|-))?0\d(\s|-)?(\d{2}(\s|-)?){4}$/ ", $telephone) && $telephone = valider("telephone"))) && ($_REQUEST['nom']=='' || $nom = valider("nom")) && ($_REQUEST['prenom']=='' || $prenom = valider("prenom")) && (!verifMailExist($mail)) && (!verifUserExist($login))){
					$_SESSION['login']=$login;
					$_SESSION['passe']=$passe1;
					$_SESSION['mail']=$mail;
					$_SESSION['telephone']=$telephone;
					$_SESSION['nom']=$nom;
					$_SESSION['prenom']=$prenom;
					$_SESSION['CodeAVerif'] = MailCreationCompte($mail);

					if(isset($_SESSION['erreur'])) unset($_SESSION['erreur']);
					if(isset($_SESSION['erreurMail'])) unset($_SESSION['erreurMail']);
					if(isset($_SESSION['erreurLogin'])) unset($_SESSION['erreurLogin']);

					header("Location:./index.php?view=confirmation");
					die("");
				}
				else{
					$error="";
					if(($mail = valider("mail")) && (preg_match( " /[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/ " , $mail)) && verifMailExist($mail)){
						$error.="L'addresse mail est déjà prise. ";
					}
					else if(($mail = valider("mail")) && (!preg_match( " /[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/ " , $mail))){
						$error.="L'adresse mail n'est pas valide. ";
					}
					if(($login = valider("login")) && verifUserExist($login)){
						$error.="L'identifiant est déjà pris. ";
					}
					if(($passe1 = valider("passe1")) && ($passe2 = valider("passe2")) && ($passe1 != $passe2)){
						$error.="Les mots de passe ne correspondent pas. ";
					}
					$_SESSION['erreur']=$error;
					$_SESSION['erreurMail']=$mail;
					$_SESSION['erreurLogin']=$login;
					header("Location:./index.php?view=signup");
					die("");
				}
				//INSERER ENVOI EMAIL
				break;

				case 'delComment' :
				$idcomment=valider("idComment");

				deleteComment($idcomment);

				header("Location:./index.php?view=livredor");
				die("");
				break;

				case 'Blacklister':
				$id2=valider("IDaBlack");
				interdireUtilisateur($id2);
				header("Location:./index.php?view=gestionUtilisateur");
				die("");
				break;

				case 'Autoriser':
				$id3=valider("IDAut");
				autoriserUtilisateur($id3);
				header("Location:./index.php?view=gestionUtilisateur");
				die("");
				break;

				case 'sendComment':
				$id=verifUserBdd($_SESSION["login"],$_SESSION["passe"]);
				$titre=valider("titre");
				$texte=valider("comment");

				sendComment($id,$titre,$texte);
				header("Location:./index.php?view=livredor");
				die("");
				break;

				case "enregistrerImage":
				$path="images/";
				$texte=valider("texte");
				if(isset($_FILES["file"])){
					$image=$_FILES["file"]["name"];
					$path.=$image;
					addPrestation($path, $texte);
				}
				else{
					addPrestation("", $texte);
				}
				if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
					$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
					$filename = $_FILES["file"]["name"];
					$filetype = $_FILES["file"]["type"];
					$filesize = $_FILES["file"]["size"];

					$ext = pathinfo($filename, PATHINFO_EXTENSION);
					if(!array_key_exists($ext, $allowed)) die("");
					$maxsize = 5 * 1024 * 1024;
					if($filesize > $maxsize) die("");
					if(in_array($filetype, $allowed)){
						if(!file_exists("images/" . $filename)){
							move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $filename);
						} 
					}
				}

				header("Location:./index.php?view=prestations");
				die("");
				break;

				default:
				break;


			}

		}

	// On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
	// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
	// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat

		$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
	// On redirige vers la page index avec les bons arguments

		//PAGE LOCALHOST
		header("Location:" . $urlBase . $qs);

		//PAGE SERVEUR
		//header("Location: http://pourlepinf.zd.fr" . $urlBase . $qs);
	// On écrit seulement après cette entête
		ob_end_flush();