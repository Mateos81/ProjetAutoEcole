<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

include "HistoKm.php";

include __DIR__ . "/../DAL/DAL_Vehicule.php";

/**
 * Classe repr�sentant un v�hicule.
 */
class Vehicule {

    /** Num�ro du v�hicule. */
    private $vehicule_num;
    
    /** Num�ro d'immatriculation du v�hicule. */
    private $vehicule_immatriculation;
    
    /** Marque du v�hicule. */
    private $vehicule_marque;
    
    /** Mod�le du v�hicule. */
    private $vehicule_modele;
    
    /** Historique des kilom�trages du v�hicule. */
    private $vehicule_historique;
    
    // TODO Remonter le dernier historique pour l'�cran
    
    /**
     * Constructeur par d�faut.
     */
    public function __construct() {
        $this->vehicule_num = -1;
        $this->vehicule_immatriculation = "";
        $this->vehicule_marque = "";
        $this->vehicule_modele = "";
        $this->vehicule_dernierHistorique = array();
    }
    
    /**
     * "Constructeur" complet.
     * @param $num Num�ro unique identifiant le v�hicule, servant d'index.
     * @param $immatriculation Num�ro d'immatriculation du v�hicule.
     * @param $marque Marque du v�hicule.
     * @param $modele Mod�le du v�hicule.
     * @param array(HistoKm) $histoKm
     *        Historique du kilom�trage du v�hicule.
     */
    public function Vehicule(
    		$num,
    		$immatriculation,
    		$marque,
    		$modele,
    		HistoKm $histoKm) {
    	$this->vehicule_num = $num;
    	$this->vehicule_immatriculation = $immatriculation;
    	$this->vehicule_marque = $marque;
    	$this->vehicule_modele = $modele;
    	$this->vehicule_historique = $histoKm;
    }    
    
    /**
     * "Constructeur" bas� sur le num�ro du v�hicule.
     * @param $num Num�ro du v�hicule.
     * @return Une nouvelle instance de Vehicule.
     */
    public function VehiculeNum($num) {    	
    	$tabData = DAL_Vehicule::getVehicule($num);
    	
    	// R�cup�rer une fois les infos
    	$row = oci_fetch_array($tabData, OCI_ASSOC+OCI_RETURN_NULLS);
    	$this->vehicule_num = $row['VEHICULE_NUM'];
    	$this->vehicule_immatriculation = $row['VEHICULE_IMMATRICULATION'];
    	$this->vehicule_marque = $row['VEHICULE_MARQUE'];
    	$this->vehicule_modele = $row['VEHICULE_MODELE'];
    	$this->vehicule_historique[] =
    		new HistoKm($row['HISTOKM_DATE'], $row['HISTOKM_NBKM']);
    	
    	// Boucler pour l'historique
    	while ($row = oci_fetch_array($tabData, OCI_ASSOC+OCI_RETURN_NULLS)) {
    		$this->vehicule_historique[] =
    			new HistoKm($row['HISTOKM_DATE'], $row['HISTOKM_NBKM']);
    	}
    }
    
    /**
     * Accesseur sur le num�ro du v�hicule courant.
     */
    public function getVehicule_num() {
        return $this->vehicule_num;
    }
    
    /**
     * Accesseur sur le num�ro d'immatriculation du v�hicule courant.
     */
    public function getVehicule_immatriculation() {
        return $this->vehicule_immatriculation;
    }
    
    /**
     * Accesseur sur la marque du v�hicule courant.
     */
    public function getVehicule_marque() {
        return $this->vehicule_marque;
    }
    
    /**
     * Accesseur sur le mod�le du v�hicule courant.
     */
    public function getVehicule_modele() {
        return $this->vehicule_modele;
    }
    
    /**
     * Accesseur sur la derni�re entr�e
     * de l'historique du kilom�trage du v�hicule courant.
     */
    public function getVehicule_dernierHistorique() {
    	return
    		$this->vehicule_historique;//[count($this->vehicule_historique) - 1];
    }
    
    /**
     * Ajout d'une nouvelle entr�e � l'historique du v�hicule courant.
     * @param HistoKm $histo Nouvelle entr�e � ajouter pour l'historique
     *        du v�hicule courant.
     */
    public function addHisto_Km(HistoKm $histo) {
    	// Ajout en base
    	DAL.addHisto_Km($this->vehicule_num, $histo);
    	
    	// Mise � jour de l'objet
    	$this->vehicule_historique[count($this->vehicule_historique.count)]
    	    = $histo;
    }
    
    /**
     * R�cup�re et renvoie la liste des v�hicules.
     * @param $modele Filtre optionnel sur le mod�le du v�hicule.
     * @param $marque Filtre optionnel sur la marque du v�hicule.
     * @return Vehicule[] Liste des v�hicules correspondant aux filtres.
     */
    public static function listeVehicules($modele, $marque) {
    	$tabData = DAL_Vehicule::listeVehicules($modele, $marque);
    	$tabVehicules = array();
    	
		while ($row = oci_fetch_array($tabData, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$vehicule = new Vehicule();
			$histoKm = new HistoKm();
			
			$vehicule->Vehicule(
				intval($row['VEHICULE_NUM']),
				$row['VEHICULE_IMMATRICULATION'],
				$row['VEHICULE_MARQUE'],
				$row['VEHICULE_MODELE'],
				$histoKm->HistoKm($row['HISTOKM_DATE'], $row['HISTOKM_NBKM']));
			
			$tabVehicules[] = $vehicule;
		}
		
		return $tabVehicules;
    }
}
?>
