<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

/**
 * Classe d'acc�s aux donn�es pour la classe Poste.
 * DAL pour Data Access Layer.
 */
abstract class DAL_Poste {
	
	/**
	 * R�cup�re et renvoie la liste des postes.
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
