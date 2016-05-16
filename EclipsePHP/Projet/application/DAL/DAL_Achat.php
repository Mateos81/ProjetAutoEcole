<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include __DIR__ . "/../BLL/Outils.php";

/**
 * Classe d'acc�s aux donn�es pour la classe Achat.
 * DAL pour Data Access Layer.
 */
abstract class DAL_Achat {
	
	/**
	 * Insertion d'une ligne Acheter en base.
	 * @param $date Date de l'achat.
	 * @param $eleve El�ve concern� par l'achat.
	 * @param $formule Formule r�gissant l'achat.
	 * @param $nbTicket Nombre de tickets suppl�mentaires pris.
	 * @param $prix Montant d�j� vers�.
	 * @return Le num�ro de l'achat en base.
	 */
	public static function creerAchat(
			$date,
			$eleve,
			$formule,
			$nbTicket,
			$prix) {
		$conn = Outils::connexion_base();
		
		// Construction de la commande d'acc�s � la proc�dure PL/SQL
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
	 * @param $num Num�ro de l'achat.
	 * @param $date Date de l'achat.
	 * @param $eleve El�ve concern� par l'achat.
	 * @param $formule Formule r�gissant l'achat.
	 * @param $nbTicket Nombre de tickets suppl�mentaires pris.
	 * @param $prix Montant d�j� vers�.
	 */
	public static function modifierAchat(
			$num,
			$date,
			$eleve,
			$formule,
			$nbTicket,
			$prix) {
		$conn = Outils::connexion_base();

		// Construction de la commande d'acc�s � la proc�dure PL/SQL
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
	 * @param $num Num�ro unique de l'achat � supprimer.
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
