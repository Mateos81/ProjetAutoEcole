<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

/**
 * Classe abstraite repr�sentant une personne.
 * Classe dont h�rite Salarie, Eleve et Client.
 */
abstract class Personne {
	
	/** Identifiant de la personne courante. */
	protected $personne_id;
	
	/** Nom de la personne courante. */
	protected $personne_nom;
	
	/** Pr�nom de la personne courante. */
	protected $personne_prenom;
	
	/** Adresse de la personne courante. */
	protected $personne_adr;
    
    /** Ville de la personne courante. */
    protected $salarie_ville;
	
	/** T�l�phone de la personne courante. */
	protected $personne_tel;
    
    /**
     * Accesseur sur l'identifiant de la personne.
     * @return L'identifiant de la personne.
     */
    public function getPersonne_id() {
        return $this->personne_id;
    }
    
    /**
     * Accesseur sur le nom de la personne.
     * @return Le nom de la personne.
     */
    public function getPersonne_nom() {
        return $this->personne_nom;
    }
    
    /**
     * Accesseur sur le pr�nom de la personne.
     * @return Le pr�nom de la personne.
     */
    public function getPersonne_prenom() {
        return $this->personne_prenom;
    }
    
    /**
     * Accesseur sur l'adresse de la personne.
     * @return L'adresse de la personne.
     */
    public function getPersonne_adr() {
        return $this->personne_adr;
    }
    
    /**
     * Accesseur sur la ville de la personne.
     * @return Ville La ville de la personne.
     */
    public function getPersonne_ville() {
        return $this->personne_ville;
    }
    
    /**
     * Accesseur sur le t�l�phone de la personne.
     * @return Le num�ro de t�l�phone de la personne.
     */
    public function getPersonne_tel() {
        return $this->personne_tel;
    }
    
    /**
     * Modifieur sur le nom de la personne.
     * @param $valeur Le nouveau nom de la personne.
     */
    public function setPersonne_nom($valeur) {
    	$this->personne_nom = $valeur;
    }
    
    /**
     * Modifieur sur le pr�nom de la personne.
     * @param $valeur Le nouveau pr�nom de la personne.
     */
    public function setPersonne_prenom($valeur) {
    	$this->personne_prenom = $valeur;
    }
    
    /**
     * Modifieur sur l'adresse de la personne.
     * @param $valeur La nouvelle adresse de la personne.
     */
    public function setPersonne_adr($valeur) {
    	$this->personne_adr = $valeur;
    }
    
    /**
     * Modifieur sur la ville de la personne.
     * @param Ville $valeur La nouvelle ville de la personne.
     */
    public function setPersonne_ville(Ville $valeur) {
    	$this->personne_ville = $valeur;
    }
    
    /**
     * Modifieur sur le num�ro de t�l�phone de la personne.
     * @param $valeur Le nouveau num�ro de t�l�phone de la personne.
     */
    public function setPersonne_tel($valeur) {
    	$this->personne_tel = $valeur;
    }
}
?>
