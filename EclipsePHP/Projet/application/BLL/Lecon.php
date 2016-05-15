<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

include __DIR__ . "/../DAL/DAL_Lecon.php";

/**
 * Classe repr�sentant une le�on.
 */
class Lecon {
	
	/** Num�ro de la le�on. */
	private $lecon_num;
	
	/** Date de la le�on. */
	private $lecon_date;
	
	/** Type de la le�on : code ou conduite. */
	private $lecon_type;
	
	/** Salari� donnant la le�on (conduite). */
	private $lecon_salarie;
	
	/** El�ve suivant la le�on. */
	private $lecon_eleve;
	
	/** V�hicule autre que celui du salari� servant � la le�on de conduite. */
	private $lecon_vehicule;
	
	/**
	 * Constructeur par d�faut.
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
	 * @param $num Num�ro de la le�on.
	 * @param $date Date de la le�on.
	 * @param $type Type de la le�on.
	 * @param $salarie Num�ro du salari�.
	 * @param $eleve Num�ro de l'�l�ve.
	 * @param $vehicule Num�ro du v�hicule (si besoin).
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
	 * Accesseur sur le num�ro de la le�on courante.
	 * @return Le num�ro de la le�on courante.
	 */
	public function getLecon_num() {
		return $this->lecon_num;
	}
	
	/**
	 * Accesseur sur la date de la le�on courante.
	 * @return La date de la le�on courante.
	 */
	public function getLecon_date() {
		return $this->lecon_date;
	}
	
	/**
	 * Accesseur sur le type de la le�on courante.
	 * @return Le type de la le�on courante.
	 */
	public function getLecon_type() {
		return $this->lecon_type;
	}
	
	/**
	 * Accesseur sur le salari� de la le�on courante.
	 * @return Le salari� de la le�on courante.
	 */
	public function getLecon_salarie() {
		return $this->lecon_salarie;
	}
	
	/**
	 * Accesseur sur l'�l�ve de la le�on courante.
	 * @return L'�l�ve de la le�on courante.
	 */
	public function getLecon_eleve() {
		return $this->lecon_eleve;
	}
	
	/**
	 * Accesseur sur le v�hicule de la le�on courante.
	 * @return Le v�hicule de la le�on courante.
	 */
	public function getLecon_vehicule() {
		return $this->lecon_vehicule;
	}
	
	/**
	 * Modifieur sur la date de la le�on courante.
	 * @param $valeur La nouvelle date de la le�on courante.
	 */
	public function setLecon_date($valeur) {
		$this->lecon_date = $valeur;
	}
	
	/**
	 * Modifieur sur la type de la le�on courante.
	 * @param $valeur Le nouveau type de la le�on courante.
	 */
	public function setLecon_type($valeur) {
		$this->lecon_type = $valeur;
	}
	
	/**
	 * Modifieur sur le salari� de la le�on courante.
	 * @param $valeur Le nouveau salari� de la le�on courante.
	 */
	public function setLecon_salarie($valeur) {
		$this->lecon_salarie = $valeur;
	}
	
	/**
	 * Modifieur sur l'�l�ve de la le�on courante.
	 * @param $valeur Le nouvel �l�ve de la le�on courante.
	 */
	public function setLecon_eleve($valeur) {
		$this->lecon_eleve = $valeur;
	}
	
	/**
	 * Modifieur sur le v�hicule de la le�on courante.
	 * @param $valeur Le nouveau v�hicule de la le�on courante.
	 */
	public function setLecon_vehicule($valeur) {
		$this->lecon_vehicule = $valeur;
	}
	
	/**
	 * Cr�ation d'une le�on en base.
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
	 * Modification d'une le�on en base.
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
	 * Suppression d'une le�on en base.
	 */
	public function supprimerLecon() {
		DAL_Lecon::supprimerLecon($this->lecon_num);
	}
	
	// TODO Liste avec filtres
    
    /**
     * R�cup�re et renvoie la liste des salari�s.
     * @param $nom Filtre optionnel sur le nom du salari� recherch�.
     * @param $prenom Filtre optionnel sur le pr�nom du salari� recherch�.
     * @param $surnom Filtre optionnel sur le surnom du salari� recherch�.
     * @param $poste Filtre optionnel sur le poste du salari� recherch�.
     * @return La liste des salari�s.
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
