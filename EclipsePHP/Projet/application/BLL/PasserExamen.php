<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

/**
 * Classe repr�sentant un passage d'examen.
 */
class PasserExamen {
	
	/** Num�ro identifiant le passage d'examen. */
	private $passer_num;
	
	/** Examen pass� ou � passer. */
	private $passer_examen;
	
	/** El�ve rattach� au passage de l'examen. */
	private $passer_eleve;
	
	/** R�sultat de l'examen, par d�faut �chou� (false). */
	private $passer_resultat;
	
	/**
	 * Constructeur par d�faut.
	 */
	public function __construct() {
		$this->passer_num = -1;
		$this->passer_examen = NULL;
		$this->passer_eleve = -1;
		$this->passer_resultat = false;
	}
	
	/**
	 * "Constructeur" complet.
	 * @param $num Num�ro de l'examen.
	 * @param Examen $examen Objet Examen.
	 * @param $eleve El�ve passant ou allant passer l'examen.
	 * @param $resultat R�ussite ou �chec.
	 */
	public function PasserExamen($num, Examen $examen, $eleve, $resultat) {
		$this->passer_num = $num;
		$this->passer_examen = $examen;
		$this->passer_eleve = $eleve;
		$this->passer_resultat = $resultat;
	}
	
	/**
	 * Accesseur sur le r�sultat de l'examen courant.
	 * @return Le r�sultat de l'examen courant.
	 */
	public function getPasser_resultat() {
		return $this->passer_resultat;
	}
	
	/**
	 * Accesseur sur l'�l�ve rattach� � l'examen courant.
	 * @return L'�l�ve rattach� � l'examen courant.
	 */
	public function getPasser_eleve() {
		return $this->passer_eleve;
	}
	
	/**
	 * Accesseur sur l'examen rattach� � l'examen courant.
	 * @return Examen L'examen rattach� � l'examen courant.
	 */
	public function getPasser_examen() {
		return $this->passer_examen;
	}
	
	/**
	 * Modifieur sur le r�sultat de l'examen courant.
	 * @param $value Le nouveau r�sultat de l'examen courant.
	 */
	public function setPasser_resultat($value) {
		$this->passer_resultat = $value;
	}
	
	/**
	 * Modifieur sur l'�l�ve rattach� � l'examen courant.
	 * @param $value Le �l�ve rattach� � l'examen courant.
	 */
	public function setPasser_eleve($value) {
		$this->passer_eleve = $value;
	}
	
	/**
	 * Modifieur sur l'examen rattach� � l'examen courant.
	 * @param Examen $value L'examen rattach� � l'examen courant.
	 */
	public function setPasser_examen(Examen $value) {
		$this->passer_examen = $value;
	}
}
?>
