<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

/**
 * Classe repr�sentant une ville.
 */
class Ville {
	
	/** Nom de la ville courante. */
	private $ville_nom;
	
	/** Code postal de la ville courante. */
	private $ville_cp;
	
	/**
	 * Constructeur par d�faut.
	 */
	public function __construct() {
		$this->ville_nom = "";
		$this->ville_cp = "";
	}
	
	/**
	 * "Constructeur".
	 * @param $nom Nom de la ville.
	 * @param $cp Code postal de la ville.
	 * @return Une nouvelle instance de Ville.
	 */
	public function Ville($nom, $cp) {
		$instance = new self();
		
		$instance->ville_nom = $nom;
		$instance->ville_cp = $cp;
		
		return $instance;
	}
	
	/**
	 * Accesseur sur le nom de la ville courante.
	 * @return Le nom de la ville courante.
	 */
	public function getVille_nom() {
		return $this->ville_nom;
	}
	
	/**
	 * Accesseur sur le code postal de la ville courante.
	 * @return Le code postal de la ville courante.
	 */
	public function getVille_cp() {
		return $this->ville_cp;
	}
	
	/**
	 * Modifieur sur le nom de la ville courante.
	 * @param $valeur Le nouveau nom de la ville courante.
	 */
	public function setVille_nom($valeur) {
		$this->ville_nom = $valeur;
	}
	
	/**
	 * Modifieur sur le code postal de la ville courante.
	 * @param $valeur Le nouveau code postal de la ville courante.
	 */
	public function setVille_cp($valeur) {
		$this->ville_cp = $valeur;
	}
	
	/**
	 * R�cup�re et renvoie la liste des villes sous forme de tableau.
	 * @return array La liste des villes.
	 */
	public static function listeVilles() {
		return DAL_Ville::listeVilles();
	}
}
?>
