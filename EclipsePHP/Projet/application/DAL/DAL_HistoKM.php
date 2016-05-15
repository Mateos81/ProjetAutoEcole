<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */
 
 /**
  * Classe d'accès aux données pour la classe HistoKM.
  * DAL pour Data Access Layer.
  */
abstract class DAL_HistoKM {
	
	/**
	 * Ajout d'une entrée à l'historique d'un véhicule.
	 * @param $vehicule_num Numéro unique du véhicule.
	 * @param HistoKm $histo
	 *        Nouvelle entrée à ajouter pour l'historique d'un véhicule.
	 */
	public static function addHisto_Km($vehicule_num, HistoKm $histo) {
		$conn = Outils::connexion_base();
    	
		$stid = oci_parse($conn, 'BEGIN ajoutHistoKm(:id, :nbKm); END;');
		oci_bind_by_name($stid, ':id', $vehicule_num);
		oci_bind_by_name($stid, ':nbKm', $histo->getHistoKm_nbKm());
		
		oci_execute($stid);
		oci_free_statement($stid);
		
    	Outils::deconnexion_base($conn);
	}
}
?>
