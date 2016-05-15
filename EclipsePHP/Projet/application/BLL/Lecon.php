<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

include __DIR__ . "/../DAL/DAL_Lecon.php";

/**
 * Classe représentant une leçon.
 */
class Lecon {
	
	/** Numéro de la leçon. */
	private $lecon_num;
	
	/** Date de la leçon. */
	private $lecon_date;
	
	/** Type de la leçon : code ou conduite. */
	private $lecon_type;
	
	/** Salarié donnant la leçon (conduite). */
	private $lecon_salarie;
	
	/** Elève suivant la leçon. */
	private $lecon_eleve;
	
	/** Véhicule autre que celui du salarié servant à la leçon de conduite. */
	private $lecon_vehicule;
	
	/**
	 * Constructeur par défaut.
	 */
	public function __construct() {
		$this->lecon_num = -1;
		$this->lecon_date = "01/01/1990";
		$this->lecon_type = -1;
		$this->lecon_salarie = -1;
		$this->lecon_eleve = -1;
		$this->lecon_vehicule = -1;
	}
	
	/**
	 * "Constructeur" complet.
	 * @param $num Numéro de la leçon.
	 * @param $date Date de la leçon.
	 * @param $type Type de la leçon.
	 * @param $salarie Numéro du salarié.
	 * @param $eleve Numéro de l'élève.
	 * @param $vehicule Numéro du véhicule (si besoin).
	 * @return Lecon Une nouvelle instance de Lecon.
	 */
	public function Lecon($num, $date, $type, $salarie, $eleve, $vehicule) {
		$instance = new self();
		
		$instance->lecon_num = $num;
		$instance->lecon_date = $date;
		$instance->lecon_type = $type;
		$instance->lecon_salarie = $salarie;
		$instance->lecon_eleve = $eleve;
		$instance->lecon_vehicule = $vehicule;
		
		return $instance;
	}
	
	/**
	 * Accesseur sur le numéro de la leçon courante.
	 * @return Le numéro de la leçon courante.
	 */
	public function getLecon_num() {
		return $this->lecon_num;
	}
	
	/**
	 * Accesseur sur la date de la leçon courante.
	 * @return La date de la leçon courante.
	 */
	public function getLecon_date() {
		return $this->lecon_date;
	}
	
	/**
	 * Accesseur sur le type de la leçon courante.
	 * @return Le type de la leçon courante.
	 */
	public function getLecon_type() {
		return $this->lecon_type;
	}
	
	/**
	 * Accesseur sur le salarié de la leçon courante.
	 * @return Le salarié de la leçon courante.
	 */
	public function getLecon_salarie() {
		return $this->lecon_salarie;
	}
	
	/**
	 * Accesseur sur l'élève de la leçon courante.
	 * @return L'élève de la leçon courante.
	 */
	public function getLecon_eleve() {
		return $this->lecon_eleve;
	}
	
	/**
	 * Accesseur sur le véhicule de la leçon courante.
	 * @return Le véhicule de la leçon courante.
	 */
	public function getLecon_vehicule() {
		return $this->lecon_vehicule;
	}
	
	/**
	 * Modifieur sur la date de la leçon courante.
	 * @param $valeur La nouvelle date de la leçon courante.
	 */
	public function setLecon_date($valeur) {
		$this->lecon_date = $valeur;
	}
	
	/**
	 * Modifieur sur la type de la leçon courante.
	 * @param $valeur Le nouveau type de la leçon courante.
	 */
	public function setLecon_type($valeur) {
		$this->lecon_type = $valeur;
	}
	
	/**
	 * Modifieur sur le salarié de la leçon courante.
	 * @param $valeur Le nouveau salarié de la leçon courante.
	 */
	public function setLecon_salarie($valeur) {
		$this->lecon_salarie = $valeur;
	}
	
	/**
	 * Modifieur sur l'élève de la leçon courante.
	 * @param $valeur Le nouvel élève de la leçon courante.
	 */
	public function setLecon_eleve($valeur) {
		$this->lecon_eleve = $valeur;
	}
	
	/**
	 * Modifieur sur le véhicule de la leçon courante.
	 * @param $valeur Le nouveau véhicule de la leçon courante.
	 */
	public function setLecon_vehicule($valeur) {
		$this->lecon_vehicule = $valeur;
	}
	
	/**
	 * Création d'une leçon en base.
	 */
	public function creerLecon() {
		DAL_Lecon::creerLecon(
			$this->lecon_date,
			$this->lecon_type,
			$this->lecon_salarie,
			$this->lecon_eleve,
			$this->lecon_vehicule);		
	}
	
	/**
	 * Modification d'une leçon en base.
	 */
	public function modifierLecon() {
		DAL_Lecon::modifierLecon(
			$this->lecon_num,
			$this->lecon_date,
			$this->lecon_type,
			$this->lecon_salarie,
			$this->lecon_eleve,
			$this->lecon_vehicule);
	}
	
	/**
	 * Suppression d'une leçon en base.
	 */
	public function supprimerLecon() {
		DAL_Lecon::supprimerLecon($this->lecon_num);
	}
	
	// TODO Liste avec filtres
    
    /**
     * Récupère et renvoie la liste des salariés.
     * @param $nom Filtre optionnel sur le nom du salarié recherché.
     * @param $prenom Filtre optionnel sur le prénom du salarié recherché.
     * @param $surnom Filtre optionnel sur le surnom du salarié recherché.
     * @param $poste Filtre optionnel sur le poste du salarié recherché.
     * @return La liste des salariés.
     */
    public static function listeLecons(
    		$date,
    		$type,
    		$salarie,
    		$eleve,
    		$vehicule) {
    	$tabData =
    		DAL_Lecon::listeLecons(
	    		$date,
	    		$type,
	    		$salarie,
	    		$eleve,
	    		$vehicule);
    	$tabLecons = array();
    	
		while ($row = oci_fetch_array($tabData, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$lecon = new Lecon();
			
			$lecon->Lecon(
				intval($row['LECON_NUM']),
				$row['LECON_DATE'],
				$row['LECON_TYPE'],
				intval($row['LECON_SALARIE']),
				intval($row['LECON_ELEVE']),
				intval($row['LECON_VEHICULE']));
			
			$tabLecons[] = $lecon;
		}
		
		return $tabLecons;
    }
}
?>
