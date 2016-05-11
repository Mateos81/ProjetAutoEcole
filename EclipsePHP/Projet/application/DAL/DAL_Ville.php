<?php

/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

/**
 * Classe d'acc�s aux donn�es pour la classe Ville.
 * DAL pour Data Access Layer.
 */
class DAL_Ville {
	
	/**
	 * R�cup�re et renvoie la liste des villes sous forme de tableau.
	 * @return array La liste des villes.
	 */
	public static function listeVilles() {
		$conn = Outils.connexion();
			
		$stid = oci_parse($conn, 'SELECT * FROM VILLE');
		oci_execute($stid);
		
		$tab = array();
		while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$tab[] = $row;
		}
		
		oci_free_statement($stid);
		
		Outils.deconnexion_base($conn);
		
		return $tab;
	}
}
?>
