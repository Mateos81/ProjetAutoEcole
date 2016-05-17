<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include __DIR__ . "/../BLL/Outils.php";
 
 /**
  * Classe d'accès aux données pour la classe Formule.
  * DAL pour Data Access Layer.
  */
abstract class DAL_Formule {
	
	/**
	 * Ajout d'une nouvelle formule en base de données.
	 * @param $nbLeconConduite Nombre de leçons de conduite de la formule.
	 * @param $prix Prix de la formule.
	 * @param $ticketPrix Prix d'un ticket supplémentaire de la formule.
	 */
	public static function creerFormule(
			$nbLeconConduite,
			$prix,
			$ticketPrix) {
		$conn = Outils::connexion_base();
	
		// Construction de la commande d'accès à la procédure PL/SQL
		$cmd = 'BEGIN ajoutFormule(';
		$cmd .= ':nbLeconConduite, :prix, :ticketPrix); END;';
			
		$stid = oci_parse($conn, $cmd);
	
		oci_bind_by_name($stid, ':nbLeconConduite', $nbLeconConduite);
		oci_bind_by_name($stid, ':prix', $prix);
		oci_bind_by_name($stid, ':ticketPrix', $ticketPrix);
	
		oci_execute($stid);
		oci_free_statement($stid);

		Outils::deconnexion_base($conn);
	}
	
	/**
	 * Modification d'une formule existante en base de données.
	 * @param $num Numéro de la formule.
	 * @param $nbLeconConduite Nombre de leçons de conduite de la formule.
	 * @param $prix Prix de la formule.
	 * @param $ticketPrix Prix d'un ticket supplémentaire de la formule.
	 */
	public static function modifierFormule(
			$num,
			$nbLeconConduite,
			$prix,
			$ticketPrix) {
		$conn = Outils::connexion_base();

		// Construction de la commande d'accès à la procédure PL/SQL
		$cmd = 'BEGIN modifFormule(';
		$cmd .= ':num, :nbLeconConduite, :prix, :ticketPrix); END;';
			
		$stid = oci_parse($conn, $cmd);

		oci_bind_by_name($stid, ':num', $num);
		oci_bind_by_name($stid, ':nbLeconConduite', $nbLeconConduite);
		oci_bind_by_name($stid, ':prix', $prix);
		oci_bind_by_name($stid, ':ticketPrix', $ticketPrix);

		oci_execute($stid);
		oci_free_statement($stid);

		Outils::deconnexion_base($conn);
	}
	
	/**
	 * Suppression d'une formule.
	 * @param $num Numéro unique de la formule à supprimer.
	 */
	public static function supprimerFormule($num) {
		$conn = Outils::connexion_base();
		 
		$stid = oci_parse($conn, 'BEGIN suppressionFormule(:num); END;');
		oci_bind_by_name($stid, ':num', $num);
		
		oci_execute($stid);
		oci_free_statement($stid);
		
		Outils::deconnexion_base($conn);
	}
	
	/**
	 * Récupère et renvoie la valeur courante
	 * de la séquence du numéro de la formule.
	 * @return La valeur courante de la séquence.
	 */
	public static function getCurFormule() {
		$conn = Outils::connexion_base();
	
		$stid = oci_parse($conn, 'BEGIN :resultat := getCurFormule(); END;');
	
		oci_bind_by_name($stid, ':resultat', $resultat);
	
		oci_execute($stid);
		oci_free_statement($stid);
	
		Outils::deconnexion_base($conn);
	
		return $resultat;
	}
	
	/**
	 * Récupère et renvoie la liste des formules.
	 * @return La liste des formules.
	 */
	public static function listeFormules() {
		$conn = Outils::connexion_base();
		
		$req = 'SELECT * FROM FORMULE';
    	
		$stid = oci_parse($conn, $req);		
		oci_execute($stid);
		
    	Outils::deconnexion_base($conn);
    	
    	return $stid;
	}
}
?>
