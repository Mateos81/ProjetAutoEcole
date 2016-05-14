<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */
 
 /**
  * Classe repr�sentant un achat d'un client, dans les limites d'une formule.
  */
class Achat {
    
    /** Date d'achat. */
    private $achat_date;
    
    /** Nombre de tickets suppl�mentaires achet�s. */
    private $achat_nbTicket;
    
    /** Indicateur de paiement de l'achat. */
    private $achat_paye;
    
    /** Formule sur laquelle est bas�e l'achat. */
    private $achat_formule;
    
    /**
     * TODO
     */
    public function __construct($date) {
        
    }
    
    // TODO Nouvelle formule : Constructeur
    
    /**
     * Accesseur sur la date de l'achat courant.
     * @return La date d'achat.
     */
    public function getAchat_date() {
        return $this->achat_date;
    }
    
    /**
     * Accesseur sur le nombre de tickets de l'achat courant.
     * @return Le nombre de tickets achet�s.
     */
    public function getAchat_nbTicket() {
        return $this->achat_nbTicket;
    }
    
    /**
     * Accesseur sur le statut du paiement de l'achat courant.
     * @return bool True si pay�, False sinon.
     */
    public function getAchat_paye() {
        return $this->achat_paye;
    }
    
    /**
     * Accesseur sur la formule de l'achat courant.
     * @return Formule La formule.
     */
    public function getAchat_formule() {
        return $this->achat_formule;
    }
    
    /**
     * Modifieur sur la date de l'achat courant.
     * @param $valeur Nouvelle valeur.
     */
    public function setAchat_date($valeur) {
        $this->achat_date = $valeur;
    }
    
    /**
     * Modifieur sur le nombre de tickets de l'achat courant.
     * @param $valeur Nouvelle valeur.
     */
    public function setAchat_nbTicket($valeur) {
        $this->achat_nbTicket = $valeur;
    }
    
    /**
     * Modifieur sur le statut du paiement de l'achat courant.
     * @param $valeur Nouvelle valeur.
     */
    public function setAchat_paye($valeur) {
        $this->achat_paye = $valeur;
    }
    
    // TODO Ajouter/Modifier/Supprimer
}
?>
