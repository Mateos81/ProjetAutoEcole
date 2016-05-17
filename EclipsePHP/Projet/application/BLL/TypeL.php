<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */
 
 /**
  * Classe repr�sentant les divers types d'examen et de le�on.
  */
class TypeL {
    
    /** Mise en place d'un singleton. */
    private static $instance = NULL;
    
    /** 
     * Tableau avec pour cl� le num�ro
     * et pour valeur le type d'examen/le�on.
     */
    private $tabTypeL;
    
    /** 
     * Constructeur par d�faut (singleton).
     */
    private function __construct() {
        $this->$tabTypeL = array();
		
		// R�cup�ration en base des types
		$tabData = DAL_TypeL::listeTypes();

		// Remplissage du tableau � la fa�on d'un dictionnaire
		while ($row = oci_fetch_array($tabData, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$this->tabPostes[$row['TYPEL_NUM']] = $row['TYPEL_NOM'];
		}
    }
    
    /**
     * Cr�e ou renvoie l'instance unique de cette classe.
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
	 * Fonction qui renvoie le type depuis le num�ro unique.
	 * @param $id Le num�ro identifiant le type.
	 * @return La valeur du type d'examen/le�on.
	 * @throws Exception Si le param�tre est invalide.
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