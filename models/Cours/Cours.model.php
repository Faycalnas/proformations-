<?php 
require_once("./models/MainManager.model.php");

class CoursManager extends MainManager{


    public function getCours(){
        $req = "SELECT * FROM cours";
        $statement = $this->getBdd()->prepare($req);
        $statement->execute();
        $resultat = $statement->fetchall(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $resultat;
    }

    public function getCoursInformation($code){
        $req = "SELECT * FROM cours WHERE code = :code";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":code",$code,PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }
	
    public function getInscrits(){
        $req = "SELECT inscriptions.code, titre, inscriptions.ine, nom, prenom, inscriptionDate FROM inscriptions, utilisateur, cours WHERE inscriptions.code = cours.code and inscriptions.ine=utilisateur.ine";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }

    public function ajoutCours($code,$titre,$resume,$domaine,$langue){
        $req = "INSERT INTO cours (code, titre, resume, domaine, langue) VALUES (:code, :titre, :resume, :domaine, :langue)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":code",$code,PDO::PARAM_STR);
        $stmt->bindValue(":titre",$titre,PDO::PARAM_STR);
        $stmt->bindValue(":resume",$resume,PDO::PARAM_STR);
        $stmt->bindValue(":domaine",$domaine,PDO::PARAM_STR);
        $stmt->bindValue(":langue",$langue,PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    public function verifCodeCours($code){
        $code = $this->getCoursInformation($code);
        return empty($code);
    }

    public function modificationCours($code, $titre, $resume, $domaine,$langue){
        $req = "UPDATE cours SET titre = :titre, resume = :resume, domaine = :domaine, langue = :langue WHERE code = :code";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":code",$code,PDO::PARAM_STR);
        $stmt->bindValue(":titre",$titre,PDO::PARAM_STR);
        $stmt->bindValue(":resume",$resume,PDO::PARAM_STR);
        $stmt->bindValue(":domaine",$domaine,PDO::PARAM_STR);
        $stmt->bindValue(":langue",$langue,PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }


    public function SuppressionCours($code){
        $req="DELETE FROM cours WHERE code = :code";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":code",$code,PDO::PARAM_STR);
        $stmt->execute();
        $estSupprimer = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estSupprimer;
    }

}