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
class DAL_Poste {
	
	/**
	 * R�cup�re la liste des postes, et met les donn�es dans un tableau.
	 * @return La liste des postes sous forme d'un tableau indic�.
	 */
	public static function listePostes() {
		$conn = Outils::connexion_base();
			
		$stid = oci_parse($conn, 'SELECT * FROM POSTE');
		oci_execute($stid);
		
		$tab = array();
		while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$tab[] = $row;
		}
		
		oci_free_statement($stid);
		
		Outils::deconnexion_base();
		
		return $tab;
	}
}
?>
