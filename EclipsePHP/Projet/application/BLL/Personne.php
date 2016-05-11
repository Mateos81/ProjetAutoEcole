<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

/**
 * Classe abstraite représentant une personne.
 * Classe dont hérite Salarie, Eleve et Client.
 */
abstract class Personne {
	
	/** Identifiant de la personne courante. */
	private $personne_id;
	
	/** Nom de la personne courante. */
	private $personne_nom;
	
	/** Prénom de la personne courante. */
	private $personne_prenom;
	
	/** Adresse de la personne courante. */
	private $personne_adr;
    
    /** Ville de la personne courante. */
    private $salarie_ville;
	
	/** Téléphone de la personne courante. */
	private $personne_tel;
    
    /**
     * Accesseur sur l'identifiant de la personne.
     */
    public function getPersonne_id() {
        return $this->personne_id;
    }
    
    /**
     * Accesseur sur le nom de la personne.
     */
    public function getPersonne_nom() {
        return $this->$personne_nom;
    }
    
    /**
     * Accesseur sur le prénom de la personne.
     */
    public function getPersonne_prenom() {
        return $this->$personne_prenom;
    }
    
    /**
     * Accesseur sur l'adresse de la personne.
     */
    public function getPersonne_adr() {
        return $this->personne_adr;
    }
    
    /**
     * Accesseur sur la ville de la personne.
     */
    public function getPersonne_ville() {
        return $this->personne_ville;
    }
    
    /**
     * Accesseur sur le téléphone de la personne.
     */
    public function getPersonne_tel() {
        return $this->personne_tel;
    }
    
    /**
     * Modifieur sur le nom de la personne.
     * @param string $valeur Le nouveau nom de la personne.
     */
    public function setPersonne_nom(string $valeur) {
    	$this->personne_nom = $valeur;
    }
    
    /**
     * Modifieur sur le prénom de la personne.
     * @param string $valeur Le nouveau prénom de la personne.
     */
    public function setPersonne_prenom(string $valeur) {
    	$this->personne_prenom = $valeur;
    }
    
    /**
     * Modifieur sur l'adresse de la personne.
     * @param string $valeur La nouvelle adresse de la personne.
     */
    public function setPersonne_adr(string $valeur) {
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
     * Modifieur sur le numéro de téléphone de la personne.
     * @param string $valeur Le nouveau numéro de téléphone de la personne.
     */
    public function setPersonne_tel(string $valeur) {
    	$this->personne_tel = $valeur;
    }
}
?>
