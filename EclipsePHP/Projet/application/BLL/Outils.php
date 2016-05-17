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
	 * Test de connexion d'une utilisateur.
	 * @param $login Identifiant.
	 * @param $password Mot de passe.
	 * @return boolean Vrai si la combinaison existe, faux sinon.
	 */
	public static function connexion_user($login, $password) {
		$conn = self::connexion_base();
		
		// Construction de la requ�te
		$req = 'SELECT COUNT(*) AS Nb FROM LOGIN WHERE ';
		$req .= 'login_id = ' . $login . ' AND ';
		$req .= 'login_password = ' . $password;
		
		$stid = oci_parse($conn, $req);
		
		oci_execute($stid);
		
		Outils::deconnexion_base($conn);
		
		$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
		
		return intval($row['Nb']) == 1;
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
