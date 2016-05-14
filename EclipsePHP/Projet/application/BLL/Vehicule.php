<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

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
    
    /**
     * Constructeur par défaut.
     */
    public function __construct() {
        $this->vehicule_num = -1;
        $this->vehicule_immatriculation = "";
        $this->vehicule_marque = "";
        $this->vehicule_modele = "";
        $this->vehicule_historique = array();
    }
    
    
    /**
     * "Constructeur" basé sur le numéro du véhicule.
     * @param $num Numéro du véhicule.
     * @return Une nouvelle instance de véhicule.
     */
    public function Vehicule($num) {
    	$instance = new Vehicule();
    	
    	$tabData = DAL_Vehicule::getVehicule($num);
    	 
    	$row = oci_fetch_array($tabData, OCI_ASSOC+OCI_RETURN_NULLS);
    	$instance->vehicule_num = $row['VEHICULE_NUM'];
    	$instance->vehicule_immatriculation = $row['VEHICULE_IMMATRICULATION'];
    	$instance->vehicule_marque = $row['VEHICULE_MARQUE'];
    	$instance->vehicule_modele = $row['VEHICULE_MODELE'];
    	// TODO Historique
    	
    	return $instance;
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
     * Accesseur sur l'historique du kilométrage du véhicule courant.
     */
    public function getVehicule_historique() {
    	return $this->vehicule_historique;
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
}
?>
