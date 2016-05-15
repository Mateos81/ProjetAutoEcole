<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

//include __DIR__ . "/../BLL/Outils.php";
 
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
    	
		$stid = oci_parse($conn, $req);		
		oci_execute($stid);
		
    	Outils::deconnexion_base($conn);
    	
    	return $stid;
	}
}
?>
