<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Cours/Cours.model.php");

class CoursController extends MainController{
    private $CoursManager;

    public function __construct(){
        $this->CoursManager = new CoursManager();
    } 

    public function cours(){
        $cours = $this->CoursManager->getCours();

        $data_page = [
            "page_description" => "Liste des différentes cours",
            "page_title" => "Nos cours",
            "cours" => $cours,
            "view" => "views/Cours/cours.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function creerCours(){
        $data_page = [
            "page_description" => "Création d'un cours",
            "page_title" => "Ajout d'une cours",
            "view" => "views/Cours/creerCours.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
	
    public function modifierCours($id){
		$cours = $this->CoursManager->getCoursInformation($id);
		
        $data_page = [
            "page_description" => "Modification d'un cours",
            "page_title" => "Modification d'une cours",			
            "cours" => $cours,
            "view" => "views/Cours/modifierCours.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
		
    public function inscrits(){
		$inscrits = $this->CoursManager->getInscrits();
		
        $data_page = [
            "page_description" => "Tous les inscrits",
            "page_title" => "Gestion des inscrits",			
            "inscrits" => $inscrits,
            "view" => "views/Inscription/inscrits.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
	
    public function validation_creerCours($code,$titre, $resume,$domaine, $langue){
        if($this->CoursManager->verifCodeCours($code)){
            if($this->CoursManager->ajoutCours($code,$titre, $resume,$domaine, $langue)){                
                Toolbox::ajouterMessageAlerte("La cours a été créée !", Toolbox::COULEUR_VERTE);
                header("Location: ".URL."cours");
            } else {
                Toolbox::ajouterMessageAlerte("Erreur lors de la création de la cours, recommencez !", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."creerCours");
            }
        } else {
            Toolbox::ajouterMessageAlerte("Le code Specialité est déjà utilisé !", Toolbox::COULEUR_ROUGE);
            header("Location: ".URL."creerCours");
        }
    }

    public function validation_modification($code, $titre, $resume,$domaine, $langue){
        if($this->CoursManager->modificationCours($code,$titre, $resume,$domaine, $langue)){
            Toolbox::ajouterMessageAlerte("La modification est effectuée", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::ajouterMessageAlerte("Aucune modification effectuée", Toolbox::COULEUR_ROUGE);
        }
        header("Location: ".URL."cours");
    }

    public function suppressionCours($code){
        if($this->CoursManager->SuppressionCours($code)) {
            Toolbox::ajouterMessageAlerte("La suppression du cours est effectuée", Toolbox::COULEUR_VERTE);			
            header("Location: ".URL."cours");
        } else {
            Toolbox::ajouterMessageAlerte("La suppression n'a pas été effectuée. Contactez l'administrateur",Toolbox::COULEUR_ROUGE);
            header("Location: ".URL."partenaire");
        }
    }

    public function pageErreur($msg){
        parent::pageErreur($msg);
    }
}