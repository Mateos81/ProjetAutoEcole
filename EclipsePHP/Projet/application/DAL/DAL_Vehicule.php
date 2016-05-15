<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

//include __DIR__ . "/../BLL/Outils.php";
 
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
    	
		$stid = oci_parse($conn, $req);		
		oci_execute($stid);
		
    	Outils::deconnexion_base($conn);
    	
    	return $stid;
	}
}
?>
