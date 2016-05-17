<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include __DIR__ . "/../BLL/Outils.php";

/**
 * Classe d'acc�s aux donn�es pour la classe TypeL.
 * DAL pour Data Access Layer.
 */
abstract class DAL_TypeL {
	
	/**
	 * R�cup�re et renvoie la liste des types.
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
