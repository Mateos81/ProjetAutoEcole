<?php
/*
 * Projet 2�me Ann�e 3iL
 * CIULLI - MATEOS - ROUX
 */
 
 /**
  * Classe repr�sentant un salari�.
  */
class Salarie {
    
    /** Identifiant du salari� courant. */
    private $salarie_id;
    
    /** Nom du salari� courant. */
    private $salarie_nom;
    
    /** Pr�nom du salari� courant. */
    private $salarie_prenom;
    
    /** Adresse du salari� courant. */
    private $salarie_adr;
    
    /** T�l�phone du salari� courant. */
    private $salarie_tel;
    
    /** TODO Poste du salari� courant. */
    private $salarie_poste;
    
    /** Surnom du salari� courant. */
    private $salarie_surnom;
    
    /** TODO Ville du salari� courant. */
    private $salarie_ville;
    
    /** TODO V�hicule dont est responsable le salari� courant. */
    private $salarie_vehicule;
    
    /**
     * Constructeur bas� sur le surnom d'un salari�,
     * car c'est l'information que l'on connait.
     */
    public function __construct($surnom) {
        // TODO Recherche du salari� dans la base
        
        // TODO Renseignement des champs
    }
    
    // TODO Constructeur pour l'ajout d'un nouveau salari� :
    // param�tres + insertion en base
    
    /**
     * Accesseur sur l'identifiant du salari�.
     */
    public function getSalarie_id() {
        return $this->salarie_id;
    }
    
    /**
     * Accesseur sur le nom du salari�.
     */
    public function getSalarie_nom() {
        return $this->$salarie_nom;
    }
    
    /**
     * Accesseur sur le pr�nom du salari�.
     */
    public function getSalarie_prenom() {
        return $this->$salarie_prenom;
    }
    
    /**
     * Accesseur sur l'adresse du salari�.
     */
    public function getSalarie_adr() {
        return $this->salarie_adr;
    }
    
    /**
     * Accesseur sur le t�l�phone du salari�.
     */
    public function getSalarie_tel() {
        return $this->salarie_tel;
    }
    
    /**
     * Accesseur sur le poste du salari�.
     */
    public function getSalarie_poste() {
        return $this->salarie_poste;
    }
    
    /**
     * Accesseur sur le surnom du salari�.
     */
    public function getSalarie_surnom() {
        return $this->salarie_surnom;
    }
    
    /**
     * Accesseur sur la ville du salari�.
     */
    public function getSalarie_ville() {
        return $this->salarie_ville;
    }
    
    /**
     * Accesseur sur le v�hicule du salari�.
     */
    public function getSalarie_vehicule() {
        return $this->salarie_vehicule;
    }
    
    // TODO Modifieurs + BDD
    
    /**
     * R�cup�re et renvoie la liste de tous les �l�ves.
     * @return La liste des �l�ves.
     */
    public function listeEleves() {
        $listeEleves = array();
        
        // R�cup�ration des donn�es
        DAL.listeEleves($this->salarie_id);
        
        // TODO Remplissage du tableau
        
        return $listeEleves;
    }
}
?>
