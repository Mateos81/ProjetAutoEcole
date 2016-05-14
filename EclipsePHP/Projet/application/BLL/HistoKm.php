<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */
 
 /**
  * Classe repr�sentant un item de l'historique d'un v�hicule.
  */
class HistoKm {
    
    /** Nombre de kilom�tres. */
    private $histoKm_nbKm;
    
    /**
     * Constructeur par d�faut.
     */
    public function __construct() {
        $this->histoKm_nbKm = 0;
    }
    
    /**
     * Constructeur avec la valeur du kilom�trage.
     * @param $nbKm La valeur du kilom�trage.
     * @throws Exception Si le kilom�trage est n�gatif.
     */
    public function __construct($nbKm) {
    	if ($nbKm < 0) {
    		throw new Exception("Un kilom�trage ne peut �tre n�gatif.");
    	}
    	
    	$this->histoKm_nbKm = $nbKm;
    }
    
    /**
     * Accesseur sur le nombre de kilom�tres de l'historique courant.
     */
    public function getHistoKm_nbKm()
    {
        return $this->histoKm_nbKm;
    }
}
?>
