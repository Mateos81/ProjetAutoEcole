<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

/**
 * Classe représentant un passage d'examen.
 */
class PasserExamen {
	
	/** Numéro identifiant le passage d'examen. */
	private $passer_num;
	
	/** Examen passé ou à passer. */
	private $passer_examen;
	
	/** Elève rattaché au passage de l'examen. */
	private $passer_eleve;
	
	/** Résultat de l'examen, par défaut échoué (false). */
	private $passer_resultat;
	
	/**
	 * Constructeur par défaut.
	 */
	public function __construct() {
		$this->passer_num = -1;
		$this->passer_examen = NULL;
		$this->passer_eleve = -1;
		$this->passer_resultat = false;
	}
	
	/**
	 * "Constructeur" complet.
	 * @param $num Numéro de l'examen.
	 * @param Examen $examen Objet Examen.
	 * @param $eleve Elève passant ou allant passer l'examen.
	 * @param $resultat Réussite ou échec.
	 */
	public function PasserExamen($num, Examen $examen, $eleve, $resultat) {
		$this->passer_num = $num;
		$this->passer_examen = $examen;
		$this->passer_eleve = $eleve;
		$this->passer_resultat = $resultat;
	}
	
	/**
	 * Accesseur sur le résultat de l'examen courant.
	 * @return Le résultat de l'examen courant.
	 */
	public function getPasser_resultat() {
		return $this->passer_resultat;
	}
	
	/**
	 * Accesseur sur l'élève rattaché à l'examen courant.
	 * @return L'élève rattaché à l'examen courant.
	 */
	public function getPasser_eleve() {
		return $this->passer_eleve;
	}
	
	/**
	 * Accesseur sur l'examen rattaché à l'examen courant.
	 * @return Examen L'examen rattaché à l'examen courant.
	 */
	public function getPasser_examen() {
		return $this->passer_examen;
	}
	
	/**
	 * Modifieur sur le résultat de l'examen courant.
	 * @param $value Le nouveau résultat de l'examen courant.
	 */
	public function setPasser_resultat($value) {
		$this->passer_resultat = $value;
	}
	
	/**
	 * Modifieur sur l'élève rattaché à l'examen courant.
	 * @param $value Le élève rattaché à l'examen courant.
	 */
	public function setPasser_eleve($value) {
		$this->passer_eleve = $value;
	}
	
	/**
	 * Modifieur sur l'examen rattaché à l'examen courant.
	 * @param Examen $value L'examen rattaché à l'examen courant.
	 */
	public function setPasser_examen(Examen $value) {
		$this->passer_examen = $value;
	}
}
?>
