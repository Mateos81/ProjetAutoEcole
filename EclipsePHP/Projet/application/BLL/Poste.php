<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

include __DIR__ . "/../DAL/DAL_Poste.php";

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
		$this->tabPostes = array();
		
		// Récupération en base des postes
		$tabData = DAL_Poste::listePostes();

		// Remplissage du tableau à la façon d'un dictionnaire
		while ($row = oci_fetch_array($tabData, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$this->tabPostes[$row['POSTE_NUM']] = $row['POSTE_NOM'];
		}
	}

	/**
	 * Crée ou renvoie l'instance unique de cette classe.
	 * @return Poste L'instance unique de Poste.
	 */
	public static function getInstance() {
		if (self::$instance == NULL) {
			self::$instance = new Poste();
		}

		return self::$instance;
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
	public function getPosteType($id) {
		foreach ($this->tabPostes as $key => $value) {
			if ($key == $id) {
				return $value;
			}
		}
		
		throw new Exception("Identifiant de poste invalide.");
	}
}
?>
