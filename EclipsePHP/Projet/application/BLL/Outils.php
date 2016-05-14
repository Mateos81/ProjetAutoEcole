<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package BLL
 */
 
 /**
  * Classe outil.
  */
abstract class Outils {
    
    /**
	 * Connexion � la base de donn�es Oracle.
	 * @return Un objet de connexion.
	 */
	public static function connexion_base() {
	    $conn = 
			oci_connect(
				'ROUX_MATEOS_CIULLI',
				'ROUX_MATEOS_CIULLI'/*,
				'BD10'*/);
		
		if (!$conn) {
		    $e = oci_error();
		    trigger_error(
		    	htmlentities($e['message'], ENT_QUOTES), 
		    	E_USER_ERROR);
		}
		
		return $conn;
	}
	
	/**
	 * D�connexion de la base de donn�es.
	 * @param unknown Objet de connexion.
	 */
	public static function deconnexion_base($conn) {
		$res = oci_close($conn);
		if (!$res) {
		    $e = oci_error();
		    trigger_error(
		        htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
	}
}
?>
