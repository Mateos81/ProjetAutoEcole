<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

/**
 * Classe représentant les divers postes.
 */
class Poste {

	/** Mise en place d'un singleton. */
	private static $instance = NULL;

	/**
	 * Tableau avec pour clé le numéro
	 * et pour valeur le poste.
	 */
	private $tabPostes;

	/**
	 * Constructeur par défaut (singleton).
	 */
	private function __construct() {
		$this->$tabPostes = array();

		// Récupération en base des postes
		// Remplissage du tableau à la façon d'un dictionnaire
		$this->$tabPostes = DAL_Poste::listePostes();
	}

	/**
	 * Crée ou renvoie l'instance unique de cette classe.
	 * @return Poste L'instance unique de Poste.
	 */
	public static function getInstance() {
		if ($instance == NULL) {
			$instance = new Poste();
		}

		return $instance;
	}

	/**
	 * Accesseur sur le tableau des types d'examen.
	 */
	public function getTabPoste() {
		return $this->tabPoste;
	}

	
	/**
	 * Fonction qui renvoie le poste depuis le numéro unique.
	 * @param $id Le numéro identifiant le poste.
	 * @return La valeur du type de Poste.
	 * @throws Exception Si le paramètre est invalide.
	 */
	public function getExamenType($id) {
		foreach ($this->tabPostes as $key => $value) {
			if ($key == $id) {
				return $value;
			}
		}
		
		throw new Exception("Identifiant de poste invalide.");
	}
}
?>
