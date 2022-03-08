<?php 
require_once("./models/MainManager.model.php");

class InscriptionManager extends MainManager{
	
	    public function getInscription($cours,$etudiant){
        $req = "SELECT * FROM inscriptions WHERE code = :code and INE = :INE";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":code",$cours,PDO::PARAM_STR);
        $stmt->bindValue(":INE",$etudiant,PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }

    public function getIncrits($cours){
        $requete = "SELECT inscriptions.id, code, titre, domaine, ine, nom, prenom, ville, mail, inscriptionDate FROM inscriptions, Cours, utilisateur WHERE code = :code";
        $statement = $this->getBdd()->prepare($requete);
        $stmt->bindValue(":code",$cours,PDO::PARAM_STR);
        $statement->execute();
        $resultat = $statement->fetchall(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $resultat;
    }

    public function getCours($etudiant){
        $req = "SELECT inscriptions.id, inscriptions.code, titre, resume, domaine, langue, inscriptionDate FROM inscriptions, cours WHERE inscriptions.code=cours.code and INE = :INE";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":INE",$etudiant,PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }

    public function sinscrire($cours,$etudiant){
        $req = "INSERT INTO inscriptions (INE, code) VALUES (:INE, :code)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":INE",$etudiant,PDO::PARAM_STR);
        $stmt->bindValue(":code",$cours,PDO::PARAM_STR);
        $stmt->execute();
        $estAjouter = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estAjouter;
    }


    public function desinscrire ($cours,$etudiant){
        $req="DELETE FROM inscriptions WHERE code = :code and INE= :INE";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":code",$cours,PDO::PARAM_STR);
        $stmt->bindValue(":INE",$etudiant,PDO::PARAM_STR);
        $stmt->execute();
        $estSupprimer = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estSupprimer;
    }

}