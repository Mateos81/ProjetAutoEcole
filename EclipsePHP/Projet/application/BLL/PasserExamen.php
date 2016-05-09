<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 */

/**
 * Classe représentant un passage d'examen.
 */
class PasserExamen {
	
	/** Examen passé ou à passer. */
	private $examen;
	
	/** Résultat de l'examen, par défaut échoué (false). */
	private $resultat;
	
	// TODO Constructeurs
	
	/**
	 * Accesseur sur le résultat de l'examen courant.
	 * @return Le résultat de l'examen courant.
	 */
	public function getResultat() {
		return $this->resultat;
	}
}
?>
