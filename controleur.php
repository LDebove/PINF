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
				if ($login = valider("login"))
				if ($passe1 = valider("passe1"))
				if ($passe2 = valider("passe2"))
				if ($passe1 == $passe2)
				if ($mail = valider("mail"))
				if ($code = valider("code"))//JE NE SAIS PAS COMMENT VERIF LE CODE EMAIL MAIS IL FAUT LE VERIF (TODO)
				if (!verifMailExist($mail))
				if (!verifUserExist($login))
				{
					//pas de validation car peut être nul et en plus ça peut contenir nimp
					$nom = $_REQUEST["nom"];
					$prenom = $_REQUEST["prenom"];
					$telephone = $_REQUEST["telephone"];

					creerUserBdd($login,$passe,$mail,$telephone,$nom,$prenom);
				}
			break;
			
			case 'Logout' :
				session_destroy();
			break;

			case 'Email' :
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