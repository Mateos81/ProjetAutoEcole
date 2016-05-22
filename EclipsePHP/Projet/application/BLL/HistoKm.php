<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

include __DIR__ . "/../DAL/DAL_HistoKm.php";
 
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
    	
    	$this->histoKm_date = $date;
    	$this->histoKm_nbKm = $nbKm;
    }
    
    /**
     * Accesseur sur la date d'enregistrement
     * du kilom�trage de l'historique courant.
     * @return La date du kilom�trage courant.
     */
    public function getHistoKm_date() {
        return $this->histoKm_date;
    }
    
    /**
     * Accesseur sur le nombre de kilom�tres de l'historique courant.
     * @return Le kilom�trage courant.
     */
    public function getHistoKm_nbKm() {
        return $this->histoKm_nbKm;
    }
    
	/**
	 * R�cup�re et renvoie l'historique du kilom�trage
	 * du v�hicule pass� en param�tre sous forme d'un tableau.
	 * @param number $numVehicule Num�ro du v�hicule.
	 * @return HistoKm[] Historique du v�hicule.
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
