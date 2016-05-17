<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include __DIR__ . "/../BLL/Outils.php";

/**
 * Classe d'accès aux données pour la classe TypeL.
 * DAL pour Data Access Layer.
 */
abstract class DAL_TypeL {
	
	/**
	 * Récupère et renvoie la liste des types.
	 * @return La liste des types.
	 */
	public static function listeTypes() {
		$conn = Outils::connexion_base();
			
		$stid = oci_parse($conn, 'SELECT * FROM TYPEL');
		oci_execute($stid);
	
		Outils::deconnexion_base($conn);
	
		return $stid;
	}
}
?>
