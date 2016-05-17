<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */
 
 /**
  * Classe représentant les divers types d'examen et de leçon.
  */
class TypeL {
    
    /** Mise en place d'un singleton. */
    private static $instance = NULL;
    
    /** 
     * Tableau avec pour clé le numéro
     * et pour valeur le type d'examen/leçon.
     */
    private $tabTypeL;
    
    /** 
     * Constructeur par défaut (singleton).
     */
    private function __construct() {
        $this->$tabTypeL = array();
		
		// Récupération en base des types
		$tabData = DAL_TypeL::listeTypes();

		// Remplissage du tableau à la façon d'un dictionnaire
		while ($row = oci_fetch_array($tabData, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$this->tabPostes[$row['TYPEL_NUM']] = $row['TYPEL_NOM'];
		}
    }
    
    /**
     * Crée ou renvoie l'instance unique de cette classe.
     * @return L'instance unique de TypeL.
     */
    public static function getInstance() {
        if (self::$instance == NULL) {
            self::$instance = new TypeL();
        }
        
        return self::$instance;
    }
    
    /**
     * Accesseur sur le tableau des types d'examen.
     */
    public function getTypeL() {
        return $this->tabTypeL;
    }
	
	/**
	 * Fonction qui renvoie le type depuis le numéro unique.
	 * @param $id Le numéro identifiant le type.
	 * @return La valeur du type d'examen/leçon.
	 * @throws Exception Si le paramètre est invalide.
	 */
	public function getExamenType($id) {
		foreach ($this->tabTypeL as $key => $value) {
			if ($key == $id) {
				return $value;
			}
		}
		
		throw new Exception("Identifiant de type invalide.");
	}
}
?>