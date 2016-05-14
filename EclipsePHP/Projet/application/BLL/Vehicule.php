<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

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
    
    /**
     * Constructeur par d�faut.
     */
    public function __construct() {
        $this->vehicule_num = -1;
        $this->vehicule_immatriculation = "";
        $this->vehicule_marque = "";
        $this->vehicule_modele = "";
        $this->vehicule_historique = array();
    }
    
    
    /**
     * "Constructeur" bas� sur le num�ro du v�hicule.
     * @param $num Num�ro du v�hicule.
     * @return Une nouvelle instance de v�hicule.
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
     * Accesseur sur l'historique du kilom�trage du v�hicule courant.
     */
    public function getVehicule_historique() {
    	return $this->vehicule_historique;
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
}
?>
