<?php
/*
 * Projet 2�me Ann�e 3iL
 * CIULLI - MATEOS - ROUX
 */
 
 /**
  * Classe repr�sentant les divers types d'examen et de le�on.
  * TODO Faire de m�me pour la classe Ville
  */
class TypeL {
    
    /** Mise en place d'un singleton. */
    private static $instance = NULL;
    
    /** 
     * Tableau avec pour cl� le num�ro
     * et pour valeur le type d'examen/le�on.
     */
    private $typeL;
    
    /** Constructeur par d�faut (singleton). */
    private function __construct() {
        $this->$typeL = array();
        
        // TODO R�cup�ration en base des types d'examen/le�on
        
        // TODO Remplissage du tableau � la fa�on d'un dictionnaire
    }
    
    /**
     * Cr�e ou renvoie l'instance unique de cette classe.
     * @return L'instance unique de TypeL.
     */
    public static function getInstance() {
        if ($instance == NULL) {
            $instance = new TypeL();
        }
        
        return $instance;
    }
    
    /**
     * Accesseur sur le tableau des types d'examen.
     */
    public function getTypeL() {
        return $this->typeL;
    }
    
    // TODO Fonction qui renvoie le type d'examen/le�on depuis le num�ro
}
?>