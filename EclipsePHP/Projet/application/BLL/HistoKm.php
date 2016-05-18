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
    
    /** Date � laquelle le kilom�trage a �t� enregistr�. */
	private $histoKm_date;
    
    /** Nombre de kilom�tres. */
    private $histoKm_nbKm;
    
    /**
     * Constructeur par d�faut.
     */
    public function __construct() {
    	$this->histoKm_date = "01/01/1990";
        $this->histoKm_nbKm = -1;
    }
    
    /**
     * Constructeur avec la valeur du kilom�trage.
     * @param $date La date d'enregistrement du kilom�trage.
     * @param $nbKm La valeur du kilom�trage.
     * @throws Exception Si le kilom�trage est n�gatif.
     */
    public function HistoKm($date, $nbKm) {
    	if ($nbKm < 0) {
    		throw new Exception("Un kilom�trage ne peut �tre n�gatif.");
    	}
    	
    	$instance = new self();
    	
    	$instance->histoKm_date = $date;
    	$instance->histoKm_nbKm = $nbKm;
    	
    	return $instance;
    }
    
    /**
     * Accesseur sur la date d'enregistrement
     * du kilom�trage de l'historique courant.
     * @return La date du kilom�trage courant.
     */
    public function getHistoKm_date()
    {
        return $this->histoKm_date;
    }
    
    /**
     * Accesseur sur le nombre de kilom�tres de l'historique courant.
     * @return Le kilom�trage courant.
     */
    public function getHistoKm_nbKm()
    {
        return $this->histoKm_nbKm;
    }
}
?>
