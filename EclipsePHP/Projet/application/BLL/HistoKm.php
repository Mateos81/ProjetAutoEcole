<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */
 
 /**
  * Classe représentant un item de l'historique d'un véhicule.
  */
class HistoKm {
    
    /** Nombre de kilomètres. */
    private $histoKm_nbKm;
    
    /**
     * Constructeur par défaut.
     */
    public function __construct() {
        $this->histoKm_nbKm = 0;
    }
    
    /**
     * Constructeur avec la valeur du kilométrage.
     * @param $nbKm La valeur du kilométrage.
     * @throws Exception Si le kilométrage est négatif.
     */
    public function __construct($nbKm) {
    	if ($nbKm < 0) {
    		throw new Exception("Un kilométrage ne peut être négatif.");
    	}
    	
    	$this->histoKm_nbKm = $nbKm;
    }
    
    /**
     * Accesseur sur le nombre de kilomètres de l'historique courant.
     */
    public function getHistoKm_nbKm()
    {
        return $this->histoKm_nbKm;
    }
}
?>
