<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include __DIR__ . "/../BLL/Outils.php";

/**
 * Classe d'accès aux données pour la classe Achat.
 * DAL pour Data Access Layer.
 */
abstract class DAL_Achat {
	
	/**
	 * Insertion d'une ligne Acheter en base.
	 * @param $date Date de l'achat.
	 * @param $eleve Elève concerné par l'achat.
	 * @param $formule Formule régissant l'achat.
	 * @param $nbTicket Nombre de tickets supplémentaires pris.
	 * @param $prix Montant déjà versé.
	 * @return Le numéro de l'achat en base.
	 */
	public static function creerAchat(
			$date,
			$eleve,
			$formule,
			$nbTicket,
			$prix) {
		$conn = Outils::connexion_base();
		
		// Construction de la commande d'accès à la procédure PL/SQL
		$cmd = 'BEGIN :resultat := ajoutAcheter(';
		$cmd .= ':date, :eleve, :formule, :nbTicket, :prix); END;';
			
		$stid = oci_parse($conn, $cmd);
		
		oci_bind_by_name($stid, ':resultat', $resultat);
		
		oci_bind_by_name($stid, ':date', $date);
		oci_bind_by_name($stid, ':eleve', $eleve);
		oci_bind_by_name($stid, ':formule', $formule);
		oci_bind_by_name($stid, ':nbTicket', $nbTicket);
		oci_bind_by_name($stid, ':prix', $prix);
		
		oci_execute($stid);
		oci_free_statement($stid);
		
		Outils::deconnexion_base($conn);
		
		return $resultat;
	}
	
	/**
	 * Modification d'une ligne Acheter en base.
	 * @param $num Numéro de l'achat.
	 * @param $date Date de l'achat.
	 * @param $eleve Elève concerné par l'achat.
	 * @param $formule Formule régissant l'achat.
	 * @param $nbTicket Nombre de tickets supplémentaires pris.
	 * @param $prix Montant déjà versé.
	 */
	public static function modifierAchat(
			$num,
			$date,
			$eleve,
			$formule,
			$nbTicket,
			$prix) {
		$conn = Outils::connexion_base();

		// Construction de la commande d'accès à la procédure PL/SQL
		$cmd = 'BEGIN modifAcheter(';
		$cmd .= ':num, :date, :eleve, :formule, :nbTicket, :prix';
		$cmd .= '); END;';
			
		$stid = oci_parse($conn, $cmd);

		oci_bind_by_name($stid, ':num', $num);
		oci_bind_by_name($stid, ':date', $date);
		oci_bind_by_name($stid, ':eleve', $eleve);
		oci_bind_by_name($stid, ':formule', $formule);
		oci_bind_by_name($stid, ':nbTicket', $nbTicket);
		oci_bind_by_name($stid, ':prix', $prix);

		oci_execute($stid);
		oci_free_statement($stid);

		Outils::deconnexion_base($conn);
	}
	
	/**
	 * Suppression d'un achat.
	 * @param $num Numéro unique de l'achat à supprimer.
	 */
	public static function supprimerAchat($num) {
		$conn = Outils::connexion_base();
		 
		$stid = oci_parse($conn, 'BEGIN suppressionAcheter(:num); END;');
		oci_bind_by_name($stid, ':num', $num);
		
		oci_execute($stid);
		oci_free_statement($stid);
		
		Outils::deconnexion_base($conn);
	}
}
?>
