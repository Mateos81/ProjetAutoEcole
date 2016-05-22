<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

include __DIR__ . "/../DAL/DAL_HistoKm.php";
 
 /**
  * Classe représentant un item de l'historique d'un véhicule.
  */
class HistoKm {
    
    /** Date à laquelle le kilométrage a été enregistré. */
	private $histoKm_date;
    
    /** Nombre de kilomètres. */
    private $histoKm_nbKm;
    
    /**
     * Constructeur par défaut.
     */
    public function __construct() {
    	$this->histoKm_date = "01/01/1990";
        $this->histoKm_nbKm = -1;
    }
    
    /**
     * Constructeur avec la valeur du kilométrage.
     * @param $date La date d'enregistrement du kilométrage.
     * @param $nbKm La valeur du kilométrage.
     * @throws Exception Si le kilométrage est négatif.
     */
    public function HistoKm($date, $nbKm) {
    	if ($nbKm < 0) {
    		throw new Exception("Un kilométrage ne peut être négatif.");
    	}
    	
    	$this->histoKm_date = $date;
    	$this->histoKm_nbKm = $nbKm;
    }
    
    /**
     * Accesseur sur la date d'enregistrement
     * du kilométrage de l'historique courant.
     * @return La date du kilométrage courant.
     */
    public function getHistoKm_date() {
        return $this->histoKm_date;
    }
    
    /**
     * Accesseur sur le nombre de kilomètres de l'historique courant.
     * @return Le kilométrage courant.
     */
    public function getHistoKm_nbKm() {
        return $this->histoKm_nbKm;
    }
    
	/**
	 * Récupère et renvoie l'historique du kilométrage
	 * du véhicule passé en paramètre sous forme d'un tableau.
	 * @param number $numVehicule Numéro du véhicule.
	 * @return HistoKm[] Historique du véhicule.
	 */
	public static function getHistoKm($numVehicule) {
		$tabData = DAL_HistoKM::getHisto_Km($numVehicule);
		$tabHisto_Km = array();
		
		while ($row = oci_fetch_array($tabData, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$histoKm = new HistoKm();
				
			$histoKm->HistoKm($row['HISTOKM_DATE'], $row['HISTOKM_NBKM']);
			
			$tabHisto_Km[] = $histoKm;
		}
		
		return $tabHisto_Km;
	}
}
?>
