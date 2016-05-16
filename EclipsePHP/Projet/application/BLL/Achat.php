<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */
 
 /**
  * Classe repr�sentant un achat d'un �l�ve,
  * dans les limites d'une formule.
  */
class Achat {
    
	/** Num�ro de l'achat. */
	private $achat_num;
	
    /** Date d'achat. */
    private $achat_date;
    
    /** El�ve correspondant � l'achat courant. */
    private $achat_eleve;
    
    /** Formule sur laquelle est bas�e l'achat. */
    private $achat_formule;
    
    /** Nombre de tickets suppl�mentaires achet�s. */
    private $achat_nbTicket;
    
    /** Montant d�j� vers� pour l'achat. */
    private $achat_montantPaye;
    
    /**
     * Constructeur vide servant � cr�er un salari� via les modifieurs.
     * A utiliser quand toutes les informations ne sont pas disponibles.
     * Peut aussi �tre utilis� pour typer les champs.
     */
    public function __construct() {
    	$this->achat_num = -1;
        $this->achat_date = "01/01/1990";
        $this->achat_eleve = -1;
        $this->achat_formule = -1;
        $this->achat_nbTicket = 0;
        $this->achat_montantPaye = 0.0;
    }
    
    /**
     * "Constructeur" complet.
     * @param $num Num�ro de l'achat.
     * @param $date Date de l'achat.
     * @param $eleve El�ve de l'achat.
     * @param $formule Formule de l'achat.
     * @param $nbTicket Nombre de tickets suppl�mentaires pris.
     * @param $montantPaye Montant d�j� vers�.
     */
    public function Achat(
    		$num,
    		$date,
    		$eleve,
    		$formule,
    		$nbTicket,
    		$montantPaye) {
    	$this->achat_num = $num;
    	$this->achat_date = $date;
    	$this->achat_eleve = $eleve;
    	$this->achat_formule = $formule;
    	$this->achat_nbTicket = $nbTicket;
    	$this->achat_montantPaye = $montantPaye;
    }
    
    /**
     * Accesseur sur le num�ro de l'achat courant.
     * @return Le num�ro d'achat.
     */
    public function getAchat_num() {
        return $this->achat_num;
    }
    
    /**
     * Accesseur sur la date de l'achat courant.
     * @return La date d'achat.
     */
    public function getAchat_date() {
        return $this->achat_date;
    }
    
    /**
     * Accesseur sur l'�l�ve de l'achat courant.
     * @return L'�l�ve de l'achat.
     */
    public function getAchat_eleve() {
        return $this->achat_eleve;
    }
    
    /**
     * Accesseur sur la formule de l'achat courant.
     * @return La formule.
     */
    public function getAchat_formule() {
        return $this->achat_formule;
    }
    
    /**
     * Accesseur sur le nombre de tickets de l'achat courant.
     * @return Le nombre de tickets achet�s.
     */
    public function getAchat_nbTicket() {
        return $this->achat_nbTicket;
    }
    
    /**
     * Accesseur sur le montant vers� pour l'achat courant.
     * @return Le montant vers� pour l'achat courant.
     */
    public function getAchat_montantPaye() {
        return $this->achat_montantPaye;
    }
    
    /**
     * Modifieur sur la date de l'achat courant.
     * @param $valeur Nouvelle valeur.
     */
    public function setAchat_date($valeur) {
        $this->achat_date = $valeur;
    }
    
    /**
     * Modifieur sur l'�l�ve de l'achat courant.
     * @param $valeur Nouvelle valeur.
     */
    public function setAchat_eleve($valeur) {
        $this->achat_eleve = $valeur;
    }
    
    /**
     * Modifieur sur le nombre de tickets de l'achat courant.
     * @param $valeur Nouvelle valeur.
     */
    public function setAchat_nbTicket($valeur) {
        $this->achat_nbTicket = $valeur;
    }
    
    /**
     * Modifieur sur le montant vers� pour l'achat courant.
     * @param $valeur Nouvelle valeur.
     */
    public function setAchat_paye($valeur) {
        $this->achat_montantPaye = $valeur;
    }
    
    /**
     * Cr�ation d'un nouvel achat en base de donn�es.
     */
    public function creerAchat() {
    	$this->achat_num = 
	    	DAL_Achat::creerAchat(
				$this->achat_date,
				$this->achat_eleve,
				$this->achat_formule,
				$this->achat_nbTicket,
				$this->achat_montantPaye);
    }
    
    /**
     * Modification d'un achat existant en base de donn�es.
     */
    public function modifierAchat() {
    	DAL_Achat::modifierAchat(
    		$this->achat_num,
    		$this->achat_date,
    		$this->achat_eleve,
    		$this->achat_formule,
    		$this->achat_nbTicket,
    		$this->achat_montantPaye);
    }
    
    /**
     * Suppression d'un achat existant en base de donn�es.
     */
    public function supprimerAchat() {
    	DAL_Achat::supprimerAchat($this->achat_num);
    }
}
?>
