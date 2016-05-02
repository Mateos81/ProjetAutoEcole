<?php
/*
 * Projet 2�me Ann�e 3iL
 * CIULLI - MATEOS - ROUX
 */
 
 /**
  * Classe repr�sentant un item de l'historique d'un v�hicule.
  */
class HistoKm {
    
    /** Date � laquelle l'historique a �t� enregistr�. */
    private $histoKm_date;
    
    /** Nombre de kilom�tres. */
    private $histoKm_nbKm;
    
    /**
     * Constructeur par d�faut.
     */
    public function __construct() {
        $this->histoKm_date = date("d/m/Y");
        $this->histoKm_nbKm = 0;
    }
    
    /**
     * Accesseur sur la date de l'historique courant.
     */
    public function getHistoKm_date()
    {
        return $this->histoKm_date;
    }
    
    /**
     * Accesseur sur le nombre de kilom�tres de l'historique courant.
     */
    public function getHistoKm_nbKm()
    {
        return $this->histoKm_nbKm;
    }
    
    /**
     * Modifieur sur la date de l'historique courant.
     */
    public function setHistoKm_date($valeur)
    {
        $this->histoKm_date = $valeur;
    }
    
    /**
     * Modifieur sur le nombre de kilom�tres de l'historique courant.
     */
    public function setHistoKm_nbKm($valeur)
    {
        $this->histoKm_nbKm = $valeur;
    }
}
php?>
