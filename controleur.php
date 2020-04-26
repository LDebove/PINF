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
				if ($login = valider("login"))
				if ($passe = valider("passe"))
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
					}	
				}
				break;
				// On redirigera vers la page index automatiquement

			case 'Newuser':
				if (preg_match(" /^[1-9][0-9]{4}$/ ", $_REQUEST['code']))//JE NE SAIS PAS COMMENT VERIF LE CODE EMAIL MAIS IL FAUT LE VERIF (TODO)
				{
					$fichier=fopen('debug','w');
					fwrite($fichier, $_SESSION['mail']);
					fclose($fichier);
					if ($_SESSION['CodeAVerif']==$_REQUEST['code']) {
						//$fichier=fopen('debug','w');
						//fwrite($fichier, 'meme code');
						//fclose($fichier);
						creerUserBdd($_SESSION['login'],$_SESSION['passe'],$_SESSION['nom'],$_SESSION['prenom'],$_SESSION['mail'],$_SESSION['telephone']);
						
							setcookie("login",$_SESSION['login'] , time()+60*60*24*30);
							setcookie("passe",$_SESSION['passe'], time()+60*60*24*30);
							setcookie("remember",false, time()+60*60*24*30);
						//creerUserBdd($login,$passe,$nom,$prenom,$mail,$telephone)
					}
					
				}
			
			break;
			
			case 'Logout' :
				session_destroy();
			break;

			case 'Email' :
				if ($login = valider("login"))
				if ($passe1 = valider("passe1"))
				if ($passe2 = valider("passe2"))
				if ($passe1 == $passe2)
				if ($mail = valider("mail"))					
				if ( preg_match ( " /[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/ " , $mail ) )
				if ($_REQUEST['telephone']=='' || $telephone = valider("telephone"))
				if ( preg_match(" /^(\+\d+(\s|-))?0\d(\s|-)?(\d{2}(\s|-)?){4}$/ ", $telephone))
				if ($_REQUEST['nom']=='' || $nom = valider("nom"))
				if ($_REQUEST['prenom']=='' || $prenom = valider("prenom"))
				if (!verifMailExist($mail))
				if (!verifUserExist($login)){
					$_SESSION['login']=$login;
					$_SESSION['passe']=$passe1;
					$_SESSION['mail']=$mail;
					$_SESSION['telephone']=$telephone;
					$_SESSION['nom']=$nom;
					$_SESSION['prenom']=$prenom;

					//$fichier=fopen('debug','w');
					//fwrite($fichier, 'L\'user n\'est pas dans la BDD');
					//fclose($fichier);
					$_SESSION['CodeAVerif'] = MailCreationCompte($mail);
					//$fichier=fopen('debug','w');
					//fwrite($fichier, $_SESSION['CodeAVerif']);
					//fclose($fichier);
					header("Location:./index.php?view=confirmation");
					die("");
				}
					 //if(preg_match(" /^[1-9][0-9]{4}$/ ", $CodeAVerif )) Sert à vérifier en code entré
				
				//INSERER ENVOI EMAIL
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

	header("Location:" . $urlBase . $qs);

	// On écrit seulement après cette entête
	ob_end_flush();