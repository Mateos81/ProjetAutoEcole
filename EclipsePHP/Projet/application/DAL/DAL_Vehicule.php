<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include_once __DIR__ . "/../BLL/Outils.php";
 
 /**
  * Classe d'accès aux données pour la classe Vehicule.
  * DAL pour Data Access Layer.
  */
abstract class DAL_Vehicule {
	
	/**
	 * Ajout d'une entrée à l'historique d'un véhicule.
	 * @param $vehicule_num Numéro unique du véhicule.
	 * @return Le véhicule correspondant.
	 */
	public static function getVehicule($vehicule_num) {
		$conn = Outils::connexion_base();
		
		$req = 'SELECT * FROM VEHICULE WHERE vehicule_num = ' . $vehicule_num;
		
		/*
		$req = 'SELECT VEHICULE.*, histoKm_date, histoKm_nbKm ';
		$req .= 'FROM VEHICULE RIGHT JOIN HISTO_KM Histo ';
		$req .= 'ON Histo.HISTOKM_DATE = ';
		$req .= '(SELECT MAX(histoKm_date) FROM HISTO_KM WHERE vehicule_num = histokm_numvehicule)';
		$req .= 'WHERE vehicule_num = ' . $vehicule_num;
		*/
    	
		$stid = oci_parse($conn, $req);		
		oci_execute($stid);
		
    	Outils::deconnexion_base($conn);
    	
    	return $stid;
	}
	
	/**
	 * Récupère et renvoie une liste de véhicules.
	 * @param $modele Modèle d'une véhicule.
	 * @param $marque Marque d'une véhicule.
	 * @return resource Données brutes représentant des véhicules.
	 */
	public static function listeVehicules($modele, $marque) {
		$conn = Outils::connexion_base();
		 
		// Construction de la requête
		$req = 'SELECT * FROM VEHICULE';
		
		/*
		$req = 'SELECT VEHICULE.*, histoKm_date, histoKm_nbKm ';
		$req .= 'FROM VEHICULE RIGHT JOIN HISTO_KM Histo ';
		$req .= 'ON Histo.HISTOKM_DATE = ';
		$req .= '(SELECT MAX(histoKm_date) FROM HISTO_KM WHERE vehicule_num = histokm_numvehicule)';
		*/
		
		$tabParts = array();
		if ($modele != "") {
			$tabParts[] = 'vehicule_modele LIKE \'%' . $modele . '\'%';
		}
		if ($marque != "") {
			$tabParts[] = 'vehicule_marque LIKE \'%' . $marque . '\'%';
		}
		 
		for ($i = 0; $i < count($tabParts); $i++) {
			if ($i == 0) {
				// Premier élément : WHERE
				$req .= ' WHERE ';
			} else if ($i != count($tabParts)) {
				// Si ce n'est ni le premier ni le dernier : AND
				$req .= ' AND ';
			}
		
			$req .= $tabParts[$i];
		}
			
		$stid = oci_parse($conn, $req);
		oci_execute($stid);
		
		Outils::deconnexion_base($conn);
		
		return $stid;
	}
}
?>
