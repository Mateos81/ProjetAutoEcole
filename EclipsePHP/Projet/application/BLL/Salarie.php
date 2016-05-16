<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */

include "Personne.php";
include "Vehicule.php";
include "Ville.php";

include __DIR__ . "/../DAL/DAL_Salarie.php";
 
 /**
  * Classe repr�sentant un salari�.
  */
class Salarie extends Personne {
    
    /** Poste du salari� courant. */
    private $salarie_poste;
    
    /** Surnom du salari� courant. */
    private $salarie_surnom;
    
    /** V�hicule dont est responsable le salari� courant. */
    private $salarie_vehicule;
    
    /**
     * Constructeur vide servant � cr�er un salari� via les modifieurs.
     * A utiliser quand toutes les informations ne sont pas disponibles.
     * Peut aussi �tre utilis� pour typer les champs.
     */
    public function __construct() {
    	$this->personne_id = -1;
    	$this->personne_nom = "";
    	$this->personne_prenom = "";
    	$this->personne_adr = "";
    	$this->personne_ville = new Ville();
    	$this->personne_tel = "";
    	 
    	$this->salarie_poste = 0;
    	$this->salarie_surnom = "";
    	$this->salarie_vehicule = new Vehicule();
    }

    /**
     * Constructeur complet.
     * @param $id Identifiant du salari�.
     * @param $nom Nom du salari�.
     * @param $prenom Pr�nom du salari�.
     * @param $adr Adresse du salari�.
     * @param Ville $ville Ville du salari�.
     * @param $tel T�l�phone du salari�.
     * @param $poste Poste du salari�.
     * @param $surnom Surnom du salari�.
     * @param Vehicule $vehicule
     * @return Une nouvelle instance de Salarie.
     */
    public function Salarie(
    		$id,
    		$nom,
    		$prenom,
    		$adr,
    		Ville $ville,
    		$tel,
    		$poste,
    		$surnom,
    		Vehicule $vehicule) {
    	//$instance = new self();
    	
    	$this->personne_id = $id;
    	$this->personne_nom = $nom;
    	$this->personne_prenom = $prenom;
    	$this->personne_adr = $adr;
    	$this->personne_ville = $ville;
    	$this->personne_tel = $tel;
    	
    	$this->salarie_poste = $poste;
    	$this->salarie_surnom = $surnom;
    	$this->salarie_vehicule = $vehicule;
    	
    	//return $instance;
    }
    
    /**
     * Constructeur bas� sur le surnom d'un salari�,
     * car c'est l'information que l'on connait.
     * @param Le surnom du salari�.
     * @return Une nouvelle instance de Salarie.
     */
    public function SalarieSurnom($surnom) {
    	$instance = new self();
    	
        // Recherche du salari� dans la base
        $salarie = array();        
        $salarie = DAL_Salarie::getSalarieBySurnom($surnom);
        
        // Renseignement des champs
        $instance->personne_id = $salarie[0]['salarie_id'];
        $instance->personne_nom = $salarie[0]['salarie_nom'];
        $instance->personne_prenom = $salarie[0]['salarie_prenom'];
        $instance->salarie_surnom = $salarie[0]['salarie_surnom'];
        $instance->personne_adr = $salarie[0]['salarie_adr'];
        $instance->personne_ville =
        	new Ville(
        		$salarie[0]['salarie_ville'],
        		$salarie[0]['salarie_cp']);
        $instance->salarie_poste = $salarie[0]['salarie_poste'];
        $instance->salarie_vehicule =
        	new Vehicule($salarie[0]['salarie_vehicule']);
        
        return $instance;
    }
    
    /**
     * Accesseur sur le poste du salari�.
     * @return Le num�ro du poste du salari�.
     */
    public function getSalarie_poste() {
        return $this->salarie_poste;
    }
    
    /**
     * Accesseur sur le surnom du salari�.
     * @return Le surnom du salari�.
     */
    public function getSalarie_surnom() {
        return $this->salarie_surnom;
    }
    
    /**
     * Accesseur sur le v�hicule du salari�.
     * @return Vehicule Le v�hicule du salari�.
     */
    public function getSalarie_vehicule() {
        return $this->salarie_vehicule;
    }
    
    /**
     * Modifieur sur le poste du salari� courant.
     * @param $valeur Le nouveau poste du salari�.
     */
    public function setSalarie_poste($valeur) {
    	$this->salarie_poste = $valeur;
    }
    
    /**
     * Modifieur sur le surnom du salari� courant.
     * @param $valeur Le nouveau surnom du salari�.
     */
    public function setSalarie_surnom($valeur) {
    	$this->salarie_surnom = $valeur;
    }
    
    /**
     * Modifieur sur le v�hicule du salari� courant.
     * @param Vehicule $valeur Le nouveau v�hicule du salari�.
     */
    public function setSalarie_vehicule(Vehicule $valeur) {
    	$this->salarie_vehicule = $valeur;
    }
    
    /**
     * Cr�ation d'un nouveau salari� en base de donn�es.
     */
    public function creerSalarie() {
    	// Cr�ation en base
    	DAL_Salarie::creerSalarie(
    		$this->personne_nom,
    		$this->personne_prenom,
    		$this->salarie_surnom,
    		$this->personne_adr,
    		$this->personne_ville->getVille_nom(),
    		$this->personne_ville->getVille_cp(),
    		$this->personne_tel,
    		$this->salarie_vehicule->getVehicule_num(),
    		$this->salarie_poste);
    	
    	// R�cup�ration de l'identifiant unique
    	// N'est pas retourn� par creerSalarie
    	// car on ne peut faire de RETURN avec un UPDATE
    	// dans la m�me fonction...
    	$this->personne_id = DAL_Salarie::getCurSalarie();
    }
    
    /**
     * Mise en jour en base d'un salari�
     * suivant les informations de l'objet courant.
     */
    public function modifierSalarie() {
    	DAL_Salarie::modifierSalarie(
    		$this->personne_id,
    		$this->personne_nom,
    		$this->personne_prenom,
    		$this->salarie_surnom,
    		$this->personne_adr,
    		$this->personne_ville->getVille_nom(),
    		$this->personne_ville->getVille_cp(),
    		$this->personne_tel,
    		$this->salarie_vehicule->getVehicule_num(),
    		$this->salarie_poste);
    }
    
    /**
     * Suppression en base du salari� courant.
     */
    public function supprimerSalarie() {
    	DAL_Salarie::supprimerSalarie($this->personne_id);
    }
    
    /**
     * R�cup�re et renvoie la liste de tous les �l�ves
     * associ�s au salari� courant.
     * @return La liste des �l�ves.
     */
    public function listeEleves() {
        return DAL_Salarie::listeEleves($this->personne_id);
    }
    
    /**
     * R�cup�re et renvoie la liste de toutes les le�ons
     * dispens�es par salari� courant.
     * @return La liste des le�ons.
     */
    public function listeLecons() {
        return DAL_Salarie::listeLecons($this->personne_id);
    }
    
    /**
     * R�cup�re et renvoie la liste des salari�s.
     * @param $nom Filtre optionnel sur le nom du salari� recherch�.
     * @param $prenom Filtre optionnel sur le pr�nom du salari� recherch�.
     * @param $surnom Filtre optionnel sur le surnom du salari� recherch�.
     * @param $poste Filtre optionnel sur le poste du salari� recherch�.
     * @return array(Salarie) La liste des salari�s.
     */
    public static function listeSalaries(
    		$nom,
    		$prenom,
    		$surnom,
    		$poste) {
    	$tabData =
    		DAL_Salarie::listeSalaries(
    			$nom,
    			$prenom,
    			$surnom,
    			$poste);
    	$tabSalaries = array();
    	
		while ($row = oci_fetch_array($tabData, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$salarie = new Salarie();
			$ville = new Ville();
			$vehicule = new Vehicule();
			
			$salarie->Salarie(
				intval($row['SALARIE_ID']),
				$row['SALARIE_NOM'],
				$row['SALARIE_PRENOM'],
				$row['SALARIE_ADR'],
				$ville->Ville($row['SALARIE_VILLE'], $row['SALARIE_CP']),
				$row['SALARIE_TEL'],
				$row['SALARIE_POSTE'],
				$row['SALARIE_SURNOM'],
				$vehicule->Vehicule(
					intval(
						$row['SALARIE_VEHICULE'])));
			
			$tabSalaries[] = $salarie;
		}
		
		return $tabSalaries;
    }
}
?>
