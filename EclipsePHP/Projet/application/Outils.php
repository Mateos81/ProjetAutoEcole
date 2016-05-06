<?php
/*
 * Projet 2�me Ann�e 3iL
 * CIULLI - MATEOS - ROUX
 */
 
 /**
  * Classe outil.
  */
class Outils {
    
    /**
	 * Connexion � la base de donn�es Oracle.
	 * @return Un objet de connexion.
	 */
	public static function connexion_base() {
	    // TODO Identifiants de connexion
		$conn = oci_connect('hr', 'welcome', 'localhost/XE');
		if (!$conn) {
		    $e = oci_error();
		    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
		
		return $conn;
	}
	
	/**
	 * D�connexion de la base de donn�es.
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
