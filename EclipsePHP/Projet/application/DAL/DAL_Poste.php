<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

/**
 * Classe d'accès aux données pour la classe Poste.
 * DAL pour Data Access Layer.
 */
abstract class DAL_Poste {
	
	/**
	 * Récupère et renvoie la liste des postes.
	 * @return La liste des postes.
	 */
	public static function listePostes() {
		$conn = Outils::connexion_base();
			
		$stid = oci_parse($conn, 'SELECT * FROM POSTE');
		oci_execute($stid);
		
		Outils::deconnexion_base($conn);
		
		return $stid;
	}
}
?>
