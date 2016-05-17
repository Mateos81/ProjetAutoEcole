<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

include __DIR__ . "/../DAL/DAL_Examen.php";

/**
 * Classe représentant un examen.
 */
class Examen {
	
	/** Date de passage de l'examen. */
	private $examen_date;
	
	/** Type de l'examen (voir TypeL). */
	private $examen_type;
	
	/**
	 * Constructeur vide servant à créer un salarié via les modifieurs.
     * A utiliser quand toutes les informations ne sont pas disponibles.
     * Peut aussi être utilisé pour typer les champs.
	 */
	public function __construct() {
		$this->examen_date = "01/01/1990";
		$this->examen_type = -1;
	}
	
	/**
	 * "Constructeur" complet.
	 * @param $date Date de l'examen.
	 * @param $type Type de l'examen.
	 */
	public function Examen($date, $type) {
		$this->examen_date = $date;
		$this->examen_type = $type;
	}
	
	/**
	 * Accesseur sur la date de l'examen courant.
	 * @return La date de l'examen.
	 */
	public function getExamen_date() {
		return $this->examen_date;
	}
	
	/**
	 * Accesseur sur le type de l'examen courant.
	 * @return Le type de l'examen (cf. TypeL).
	 */
	public function getExamen_type() {
		return $this->examen_type;
	}
	
	/**
	 * Modifieur sur la date de l'examen courant.
	 * @param $valeur Nouvelle date de l'examen courant.
	 */
	public function setExamen_date($valeur) {
		$this->examen_date = $valeur;
	}
	
	/**
	 * Modifieur sur le type de l'examen courant.
	 * @param $valeur Nouveau type de l'examen courant.
	 */
	public function setExamen_type($valeur) {
		$this->examen_type = $valeur;
	}
	
	/**
	 * Création d'un nouvel examen en base de données.
	 */
	public function creerExamen() {
		// Création en base
		DAL_Examen::creerExamen(
			$this->examen_date,
			$this->examen_type);
	}
	
	/**
     * Suppression en base de l'examen courant.
     */
    public function supprimerExamen() {
		DAL_Examen::supprimerExamen(
			$this->examen_date,
			$this->examen_type);
	}
	
	/**
	 * Récupère et renvoie la liste des examens suivant un filtre.
	 * @param $type Filtre optionnel sur le type des examens recherchés.
	 * @return Examen[] La liste des examens.
	 */
	public static function listeExamens($type) {
		$tabData = DAL_Examen::listeExamens($type);
		$tabExamens = array();
		 
		while ($row = oci_fetch_array($tabData, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$examen = new Examen();
				
			$examen->Examen($row['EXAMEN_DATE'], $row['EXAMEN_TYPE']);
				
			$tabExamens[] = $examen;
		}
		
		return $tabExamens;
	}
}
?>
