<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

include __DIR__ . "/../DAL/DAL_Poste.php";

/**
 * Classe repr�sentant les divers postes.
 */
class Poste {

	/** Mise en place d'un singleton. */
	private static $instance = NULL;

	/**
	 * Tableau avec pour cl� le num�ro
	 * et pour valeur le poste.
	 */
	private $tabPostes;

	/**
	 * Constructeur par d�faut (singleton).
	 */
	private function __construct() {
		$this->tabPostes = array();
		
		// R�cup�ration en base des postes
		$tabData = DAL_Poste::listePostes();

		// Remplissage du tableau � la fa�on d'un dictionnaire
		while ($row = oci_fetch_array($tabData, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$this->tabPostes[$row['POSTE_NUM']] = $row['POSTE_NOM'];
		}
	}

	/**
	 * Cr�e ou renvoie l'instance unique de cette classe.
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
	 * Fonction qui renvoie le poste depuis le num�ro unique.
	 * @param $id Le num�ro identifiant le poste.
	 * @return La valeur du type de Poste.
	 * @throws Exception Si le param�tre est invalide.
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
