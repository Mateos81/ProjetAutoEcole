<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */
 
 /**
  * Classe repr�sentant une formule.
  */
class Formule {
    
    /** */
    private $formule_num;
    
    /** */
    private $formule_nbLeconConduite;
    
    /** */
    private $formule_prix;
    
    /** */
    private $formule_ticketPrix;
    
    /**
     * 
     */
    public function __construct($id) {
        // TODO Recherche de la formule dans la base
        
        // TODO Renseignement des champs
    }
    
    // TODO Constructeur pour nouvelle formule + BDD
    
    /**
     * Accesseur sur le num�ro de la formule courante.
     */
    public function getFormule_num() {
        return $this->formule_num;
    }
    
    /**
     * Accesseur sur le nombre de le�ons de conduite de la formule courante.
     */
    public function getFormule_nbLeconConduite() {
        return $this->formule_nbLeconConduite;
    }
    
    /**
     * Accesseur sur le prix de la formule courante.
     */
    public function getFormule_prix() {
        return $this->formule_prix;
    }
    
    /**
     * Accesseur sur le prix unitaire d'un ticket de la formule courante.
     */
    public function getFormule_ticketPrix() {
        return $this->formule_ticketPrix;
    }
    
    /**
     * Modifieur sur le nombre de le�ons de conduite de la formule courante.
     * @param $valeur Nouvelle valeur.
     */
    public function setFormule_nbLeconConduite($valeur) {
        // TODO BDD
        
        $this->formule_nbLeconConduite = $valeur;
    }
    
    /**
     * Modifieur sur le prix de la formule courante.
     * @param $valeur Nouvelle valeur.
     */
    public function setFormule_prix($valeur) {
        // TODO BDD
        
        $this->formule_prix = $valeur;
    }
    
    /**
     * Modifieur sur le prix unitaire d'un ticket de la formule courante.
     * @param $valeur Nouvelle valeur.
     */
    public function setFormule_ticketPrix($valeur) {
        // TODO BDD
        
        $this->formule_ticketPrix = $valeur;
    }
    
    /**
     * R�cup�re et renvoie la liste de toutes les formules
     * @return La liste des formules.
     */
    public static function listeFormule() {
        $listeFormules = array();
        
        // TODO Appel au DAL pour r�cup�rer les donn�es
        
        // TODO Retraiter les donn�es et remplir la liste
        
        return $listeFormules;
    }
}
?>
