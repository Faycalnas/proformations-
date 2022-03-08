<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Inscription/Inscription.model.php");

class InscriptionController extends MainController{
    private $InscriptionManager;

    public function __construct(){
        $this->InscriptionManager = new InscriptionManager();
    } 

    public function inscrits(){
		$etudiant = $_SESSION['profil']['INE'];
        $Inscription = $this->InscriptionManager->getCours($etudiant);

        $data_page = [
            "page_description" => "Mes différents cours",
            "page_title" => "Mes cours",
            "inscriptions" => $Inscription,
            "view" => "views/Inscription/inscription.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
	
    public function modifierInscription($id){
		$Inscription = $this->InscriptionManager->getInscriptionInformation($id);
		
        $data_page = [
            "page_description" => "Modification d'un Inscription",
            "page_title" => "Modification d'une Inscription",			
            "Inscription" => $Inscription,
            "view" => "views/Inscription/modifierInscription.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
	
    public function sinscrire($code){		
		if(Securite::estConnecte()){			
			$etudiant = $_SESSION['profil']['INE'];
			if(empty($this->InscriptionManager->getInscription($code,$etudiant))){
				if($this->InscriptionManager->sinscrire($code,$etudiant)){                
					Toolbox::ajouterMessageAlerte("Le cours a bien été ajouté !", Toolbox::COULEUR_VERTE);
					header("Location: ".URL."mesCours");
				} else {
					Toolbox::ajouterMessageAlerte("Erreur lors de la création de la Inscription, recommencez !", Toolbox::COULEUR_ROUGE);
					header("Location: ".URL."cours");
				}
			} else {
				Toolbox::ajouterMessageAlerte("Vous êtes déjà inscrit à ce cours !", Toolbox::COULEUR_ROUGE);
				header("Location: ".URL."mesCours");
			}
		}else {
            Toolbox::ajouterMessageAlerte("Merci d'ouvrir votre session avant d'ajouter ce cours !", Toolbox::COULEUR_ROUGE);
            header("Location: ".URL."login");
        }
    }

    public function desinscrire($code){
		if(Securite::estConnecte()){			
			$etudiant = $_SESSION['profil']['INE'];
		
			if($this->InscriptionManager->desinscrire($code,$etudiant)) {
				Toolbox::ajouterMessageAlerte("Le cours a été rétiré", Toolbox::COULEUR_VERTE);			
				header("Location: ".URL."mesCours");
			} else {
				Toolbox::ajouterMessageAlerte("La suppression n'a pas été effectuée. Contactez l'administrateur",Toolbox::COULEUR_ROUGE);
				header("Location: ".URL."mesCours");
			}
		}else {
            Toolbox::ajouterMessageAlerte("Vous n'êtes pas connecté !", Toolbox::COULEUR_ROUGE);
            header("Location: ".URL."login");
        }
    }

    public function pageErreur($msg){
        parent::pageErreur($msg);
    }
}