<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

/**
 * Classe repr�sentant un examen.
 */
class Examen {
	
	/** Date de passage de l'examen. */
	private $examen_date;
	
	/** Type de l'examen (voir TypeL). */
	private $examen_type;
	
	// TODO Constructeur(s)
	
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
}
?>
