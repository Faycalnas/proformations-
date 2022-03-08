<?php
session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));

require_once("./controllers/Toolbox.class.php");
require_once("./controllers/Securite.class.php");
require_once("./controllers/Visiteur/Visiteur.controller.php");
require_once("./controllers/Utilisateur/Utilisateur.controller.php");
require_once("./controllers/Administrateur/Administrateur.controller.php");
require_once("./controllers/Cours/Cours.controller.php");
require_once("./controllers/Inscription/Inscription.controller.php");
$visiteurController = new VisiteurController();
$utilisateurController = new UtilisateurController();
$administrateurController = new AdministrateurController();
$coursController = new CoursController();
$inscriptionController = new InscriptionController();

try {
    if(empty($_GET['page'])){
        $page = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    switch($page){
        case "accueil" : $visiteurController->accueil();
        break;
        case "login" : $visiteurController->login();
        break;
        case "validation_login" : 
            if(!empty($_POST['login']) && !empty($_POST['password'])){
                $login = Securite::secureHTML($_POST['login']);
                $password = Securite::secureHTML($_POST['password']);
                $utilisateurController->validation_login($login,$password);
            } else {
                Toolbox::ajouterMessageAlerte("Login ou mot de passe non renseigné", Toolbox::COULEUR_ROUGE);
                header('Location: '.URL."login");
            }
        break;
		
		
        case "creerCompte" : $visiteurController->creerCompte();
        break;
		
        case "mesCours" : $inscriptionController->inscrits();
        break;
		
		case "inscrits" : $coursController->inscrits();
        break;
		
		case "sinscrire" : 
            if(!empty($_POST['code'])){
                $code = Securite::secureHTML($_POST['code']);
                $inscriptionController->sinscrire($code);
            } else {
                Toolbox::ajouterMessageAlerte("Merci de sélectionner le cours à ajouter !", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."creerCours");
            }
        break;
		break;case "desinscrire" : 
            if(!empty($_POST['code'])){
                $code = Securite::secureHTML($_POST['code']);
                $inscriptionController->desinscrire($code);
            } else {
                Toolbox::ajouterMessageAlerte("Merci de sélectionner le cours à retirer !", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."mesCours");
            }
        break;
		
        case "creerCours" : $coursController->creerCours();
        break;
		case "modifierCours" : 
			 if(!empty($_POST['code'])){
                $code = Securite::secureHTML($_POST['code']);
                $courses = $coursController->modifierCours($code);
            } else {
                Toolbox::ajouterMessageAlerte("Merci de choisir le cours à modifier !", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."cours");
            }
        break;
		
		case "cours" : $coursController->cours();
        break;
		
		case "cours" : $coursController->cours();
        break;
		case "validation_creerCours" : 
            if(!empty($_POST['code']) && !empty($_POST['titre']) && !empty($_POST['domaine']) ){
                $code = Securite::secureHTML($_POST['code']);
                $titre = Securite::secureHTML($_POST['titre']);
                $resume = Securite::secureHTML($_POST['resume']);
                $domaine = Securite::secureHTML($_POST['domaine']);
                $langue = Securite::secureHTML($_POST['langue']);
                $course = Securite::secureHTML($_POST['course']);
                $coursController->validation_creerCours($code,$titre, $resume,$domaine, $langue);
            } else {
                Toolbox::ajouterMessageAlerte("Il existe des champs obligatoires non remplis !", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."creerCours");
            }
        break;
		
		case "validation_modification" : 
            if(!empty($_POST['code']) && !empty($_POST['titre']) && !empty($_POST['resume']) && !empty($_POST['domaine'])&& !empty($_POST['langue']) && !empty($_POST['course'])){
                $code = Securite::secureHTML($_POST['code']);
                $titre = Securite::secureHTML($_POST['titre']);
                $resume = Securite::secureHTML($_POST['resume']);
                $domaine = Securite::secureHTML($_POST['domaine']);
                $langue = Securite::secureHTML($_POST['langue']);
                $course = Securite::secureHTML($_POST['course']);
                $coursController->validation_modification($code,$titre, $resume,$domaine, $langue);
            } else {
                Toolbox::ajouterMessageAlerte("Il existe des champs obligatoires non remplis !", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."modifierCours");
            }
        break;
		
        break;case "suppressionCours" : 
            if(!empty($_POST['code'])){
                $code = Securite::secureHTML($_POST['code']);
                $coursController->suppressionCours($code);
            } else {
                Toolbox::ajouterMessageAlerte("Merci de sélectionner le cours à supprimer !", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."cours");
            }
        break;
		
        case "validation_creerCompte" : 
            if(!empty($_POST['login']) && !empty($_POST['ine']) && !empty($_POST['nom']) && !empty($_POST['adresse']) && !empty($_POST['password']) && !empty($_POST['mail'])){
                $login = Securite::secureHTML($_POST['login']);
                $ine = Securite::secureHTML($_POST['ine']);
                $nom = Securite::secureHTML($_POST['nom']);
                $prenom = Securite::secureHTML($_POST['prenom']);
                $adresse = Securite::secureHTML($_POST['adresse']);
                $ville = Securite::secureHTML($_POST['ville']);
                $password = Securite::secureHTML($_POST['password']);
                $mail = Securite::secureHTML($_POST['mail']);
                $utilisateurController->validation_creerCompte($login,$ine, $nom, $prenom, $adresse, $ville,$password,$mail);
            } else {
                Toolbox::ajouterMessageAlerte("Il existe des champs obligatoires non remplis !", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."creerCompte");
            }
        break;
        case "renvoyerMailValidation" : $utilisateurController->renvoyerMailValidation($url[1]);
        break;
        case "validationMail" : $utilisateurController->validation_mailCompte($url[1],$url[2]);
        break;
        case "compte" : 
            if(!Securite::estConnecte()){
                Toolbox::ajouterMessageAlerte("Veuillez vous connecter !", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."login");
            }elseif(!Securite::checkCookieConnexion()) {
                Toolbox::ajouterMessageAlerte("Veuillez vous reconnecter !", Toolbox::COULEUR_ROUGE);
                setcookie(Securite::COOKIE_NAME,"",time() - 3600);
                unset($_SESSION["profil"]);
                header("Location: ".URL."login");
            }else {
                Securite::genererCookieConnexion();//regénération du cookie
                switch($url[1]){
                    case "profil" : $utilisateurController->profil();
                    break;
                    case "deconnexion" : $utilisateurController->deconnexion();
                    break;
                    case "validation_modificationMail" : $utilisateurController->validation_modificationMail(Securite::secureHTML($_POST['mail']));
                    break;
                    case "modificationPassword" : $utilisateurController->modificationPassword();
                    break;
                    case "validation_modificationPassword" :
                        if(!empty($_POST['ancienPassword']) && !empty($_POST['nouveauPassword']) && !empty($_POST['confirmNouveauPassword'])){
                            $ancienPassword = Securite::secureHTML($_POST['ancienPassword']);
                            $nouveauPassword = Securite::secureHTML($_POST['nouveauPassword']);
                            $confirmationNouveauPassword = Securite::secureHTML($_POST['confirmNouveauPassword']);
                            $utilisateurController->validation_modificationPassword($ancienPassword,$nouveauPassword,$confirmationNouveauPassword);
                        } else {
                            Toolbox::ajouterMessageAlerte("Vous n'avez pas renseigné toutes les informations", Toolbox::COULEUR_ROUGE);
                            header("Location: ".URL."compte/modificationPassword");
                        }
                    break;
                    case "suppressionCompte" : $utilisateurController->suppressionCompte();
                    break;
                    case "validation_modificationImage" :
                        if($_FILES['image']['size'] > 0) {
                            $utilisateurController->validation_modificationImage($_FILES['image']);
                        } else {
                            Toolbox::ajouterMessageAlerte("Vous n'avez pas modifié l'image", Toolbox::COULEUR_ROUGE);
                            header("Location: ".URL."compte/profil");
                        }
                    break;
                    default : throw new Exception("La page n'existe pas");
                }
            }
        break;
        case "administration" :
            if(!Securite::estConnecte()) {
                Toolbox::ajouterMessageAlerte("Veuillez vous connecter !",Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."Login");
            } elseif(!Securite::estAdministrateur()){
                Toolbox::ajouterMessageAlerte("Vous n'avez le droit d'être ici",Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."accueil");
            } else {
                switch($url[1]){
                    case "droits" : $administrateurController->droits();
                    break;
                    case "validation_modificationRole" : $administrateurController->validation_modificationRole($_POST['login'],$_POST['role']);
                    break;
                    default : throw new Exception("La page n'existe pas");
                }
            }
        break;
        default : throw new Exception("La page n'existe pas");
    }
} catch (Exception $e){
    $visiteurController->pageErreur($e->getMessage());
}