<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

include "HistoKm.php";

include __DIR__ . "/../DAL/DAL_Vehicule.php";

/**
 * Classe représentant un véhicule.
 */
class Vehicule {

    /** Numéro du véhicule. */
    private $vehicule_num;
    
    /** Numéro d'immatriculation du véhicule. */
    private $vehicule_immatriculation;
    
    /** Marque du véhicule. */
    private $vehicule_marque;
    
    /** Modèle du véhicule. */
    private $vehicule_modele;
    
    /** Historique des kilométrages du véhicule. */
    private $vehicule_historique;
    
    // TODO Remonter le dernier historique pour l'écran
    
    /**
     * Constructeur par défaut.
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
     * @param $num Numéro unique identifiant le véhicule, servant d'index.
     * @param $immatriculation Numéro d'immatriculation du véhicule.
     * @param $marque Marque du véhicule.
     * @param $modele Modèle du véhicule.
     * @param array(HistoKm) $histoKm
     *        Historique du kilométrage du véhicule.
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
     * "Constructeur" basé sur le numéro du véhicule.
     * @param $num Numéro du véhicule.
     * @return Une nouvelle instance de Vehicule.
     */
    public function VehiculeNum($num) {    	
    	$tabData = DAL_Vehicule::getVehicule($num);
    	
    	// Récupérer une fois les infos
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
     * Accesseur sur le numéro du véhicule courant.
     */
    public function getVehicule_num() {
        return $this->vehicule_num;
    }
    
    /**
     * Accesseur sur le numéro d'immatriculation du véhicule courant.
     */
    public function getVehicule_immatriculation() {
        return $this->vehicule_immatriculation;
    }
    
    /**
     * Accesseur sur la marque du véhicule courant.
     */
    public function getVehicule_marque() {
        return $this->vehicule_marque;
    }
    
    /**
     * Accesseur sur le modèle du véhicule courant.
     */
    public function getVehicule_modele() {
        return $this->vehicule_modele;
    }
    
    /**
     * Accesseur sur la dernière entrée
     * de l'historique du kilométrage du véhicule courant.
     */
    public function getVehicule_dernierHistorique() {
    	return
    		$this->vehicule_historique;//[count($this->vehicule_historique) - 1];
    }
    
    /**
     * Ajout d'une nouvelle entrée à l'historique du véhicule courant.
     * @param HistoKm $histo Nouvelle entrée à ajouter pour l'historique
     *        du véhicule courant.
     */
    public function addHisto_Km(HistoKm $histo) {
    	// Ajout en base
    	DAL.addHisto_Km($this->vehicule_num, $histo);
    	
    	// Mise à jour de l'objet
    	$this->vehicule_historique[count($this->vehicule_historique.count)]
    	    = $histo;
    }
    
    /**
     * Récupère et renvoie la liste des véhicules.
     * @param $modele Filtre optionnel sur le modèle du véhicule.
     * @param $marque Filtre optionnel sur la marque du véhicule.
     * @return Vehicule[] Liste des véhicules correspondant aux filtres.
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
