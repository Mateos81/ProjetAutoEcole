<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */
 
 /**
  * Classe d'acc�s aux donn�es pour la classe HistoKM.
  * DAL pour Data Access Layer.
  */
abstract class DAL_HistoKM {
	
	/**
	 * Ajout d'une entr�e � l'historique d'un v�hicule.
	 * @param $vehicule_num Num�ro unique du v�hicule.
	 * @param HistoKm $histo
	 *        Nouvelle entr�e � ajouter pour l'historique d'un v�hicule.
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
