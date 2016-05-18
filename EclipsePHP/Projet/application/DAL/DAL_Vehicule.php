<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include_once __DIR__ . "/../BLL/Outils.php";
 
 /**
  * Classe d'acc�s aux donn�es pour la classe Vehicule.
  * DAL pour Data Access Layer.
  */
abstract class DAL_Vehicule {
	
	/**
	 * Ajout d'une entr�e � l'historique d'un v�hicule.
	 * @param $vehicule_num Num�ro unique du v�hicule.
	 * @return Le v�hicule correspondant.
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
	 * R�cup�re et renvoie une liste de v�hicules.
	 * @param $modele Mod�le d'une v�hicule.
	 * @param $marque Marque d'une v�hicule.
	 * @return resource Donn�es brutes repr�sentant des v�hicules.
	 */
	public static function listeVehicules($modele, $marque) {
		$conn = Outils::connexion_base();
		 
		// Construction de la requ�te
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
				// Premier �l�ment : WHERE
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
