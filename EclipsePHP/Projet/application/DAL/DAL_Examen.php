<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include __DIR__ . "/../BLL/Outils.php";

/**
 * Classe d'accès aux données pour la classe Examen.
 * DAL pour Data Access Layer.
 */
abstract class DAL_Examen {
	
	/**
	 * Création d'un examen en base de données.
	 * @param $date Date de l'examen.
	 * @param $type Type de l'examen (voir TypeL).
	 */
	public static function creerExamen($date, $type) {
		$conn = Outils::connexion_base();
		
		// Construction de la commande d'accès à la procédure PL/SQL
		$stid = oci_parse($conn, 'BEGIN ajoutExamen(:date, :type); END;');
		
		oci_bind_by_name($stid, ':date', $date);
		oci_bind_by_name($stid, ':type', $type);
		
		oci_execute($stid);
		oci_free_statement($stid);
		
		Outils::deconnexion_base($conn);
	}
	
	/**
	 * Suppression d'un examen existant en base de données.
	 * @param $date Date de l'examen.
	 * @param $type Type de l'examen (voir TypeL).
	 */
	public static function supprimerExamen($date, $type) {
		$conn = Outils::connexion_base();
	
		// Construction de la commande d'accès à la procédure PL/SQL
		$stid = oci_parse($conn, 'BEGIN suppressionExamen(:date, :type); END;');
	
		oci_bind_by_name($stid, ':date', $date);
		oci_bind_by_name($stid, ':type', $type);
	
		oci_execute($stid);
		oci_free_statement($stid);
	
		Outils::deconnexion_base($conn);
	}
	
	public static function listeExamens($type) {
		$conn = Outils::connexion_base();
		 
		// Construction de la requête
		$req = 'SELECT * FROM EXAMEN';
		 
		$tabParts = array();
		if ($type != "0") {
			$tabParts[] = 'examen_type = ' . $type;
		}
		 
		for ($i = 0; $i < count($tabParts); $i++) {
			if ($i == 0) {
				// Premier élément : WHERE
				$req .= ' WHERE ';
			} else if ($i != count($tabParts)) {
				// Si ce n'est ni le premier ni le dernier : AND
				$req .= ' AND ';
			}
		
			$req .= $tabParts[$i];
		}
			
		$stid = oci_parse($conn, $req);
		oci_execute($stid);
		
		Outils::deconnexion_base($conn);
		
		return $stid;
	}
}
?>
