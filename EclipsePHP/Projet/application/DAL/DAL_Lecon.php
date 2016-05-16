<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include __DIR__ . "/../BLL/Outils.php";

/**
 * Classe d'acc�s aux donn�es pour la classe Lecon.
 * DAL pour Data Access Layer.
 */
abstract class DAL_Lecon {
	
	/**
	 * Cr�ation d'une le�on en base.
	 * @param $date Date de la le�on.
	 * @param $type Type de la le�on.
	 * @param $salarie Salari� de la le�on.
	 * @param $eleve El�ve de la le�on.
	 * @param $vehicule V�hicule de la le�on.
	 * @return Le num�ro de la le�on.
	 */
	public static function creerLecon(
			$date,
			$type,
			$salarie,
			$eleve,
			$vehicule) {
		$conn = Outils::connexion_base();

		// Construction de la commande d'acc�s � la proc�dure PL/SQL
		$cmd = 'BEGIN :resultat := ajoutLecon(';
		$cmd .= ':date, :vehicule, :salarie, :eleve, :type); END;';
			
		$stid = oci_parse($conn, $cmd);

		oci_bind_by_name($stid, ':resultat', $resultat);

		oci_bind_by_name($stid, ':date', $date);
		oci_bind_by_name($stid, ':vehicule', $vehicule);
		oci_bind_by_name($stid, ':salarie', $salarie);
		oci_bind_by_name($stid, ':eleve', $eleve);
		oci_bind_by_name($stid, ':type', $type);

		oci_execute($stid);
		oci_free_statement($stid);

		Outils::deconnexion_base($conn);

		return $resultat;
	}
	
	/**
	 * Modification d'une le�on en base.
	 * @param $num Num�ro de la le�on.
	 * @param $date Date de la le�on.
	 * @param $type Type de la le�on.
	 * @param $salarie Salari� de la le�on.
	 * @param $eleve El�ve de la le�on.
	 * @param $vehicule V�hicule de la le�on.
	 */
	public static function modifierLecon(
			$num,
			$date,
			$type,
			$salarie,
			$eleve,
			$vehicule) {
		$conn = Outils::connexion_base();

		// Construction de la commande d'acc�s � la proc�dure PL/SQL
		$cmd = 'BEGIN modifLecon(';
		$cmd .= ':num, :date, :vehicule, :salarie, :eleve, :type); END;';
			
		$stid = oci_parse($conn, $cmd);

		oci_bind_by_name($stid, ':num', $num);
		oci_bind_by_name($stid, ':date', $date);
		oci_bind_by_name($stid, ':vehicule', $vehicule);
		oci_bind_by_name($stid, ':salarie', $salarie);
		oci_bind_by_name($stid, ':eleve', $eleve);
		oci_bind_by_name($stid, ':type', $type);

		oci_execute($stid);
		oci_free_statement($stid);

		Outils::deconnexion_base($conn);
	}
	
	/**
	 * Suppression d'une le�on en base.
	 * @param $num Num�ro de la le�on.
	 */
	public static function supprimerLecon($num) {
		$conn = Outils::connexion_base();

		// Construction de la commande d'acc�s � la proc�dure PL/SQL
		$cmd = 'BEGIN suppressionLecon(:num); END;';
			
		$stid = oci_parse($conn, $cmd);

		oci_bind_by_name($stid, ':num', $num);

		oci_execute($stid);
		oci_free_statement($stid);

		Outils::deconnexion_base($conn);
	}
	
	/**
	 * Liste les le�ons.
     * @param $date Filtre optionnel sur la date des le�ons recherch�es.
     * @param $type Filtre optionnel sur le type des le�ons recherch�es.
     * @param $salarie Filtre optionnel sur le salari� des le�ons recherch�es.
     * @param $eleve Filtre optionnel sur l'�l�ve des le�ons recherch�es.
     * @param $vehicule Filtre optionnel sur le v�hicule des le�ons recherch�es.
	 * @return array La liste des le�ons.
	 */
	public static function listeLecons(
    		$date,
    		$type,
    		$salarie,
    		$eleve,
    		$vehicule) {
	    $conn = Outils::connexion_base();
	    
	    // Construction de la requ�te
	    $req = 'SELECT * FROM LECON';
	    
	    $tabParts = array();
	    if ($date != "") {
	    	$tabParts[] = 'lecon_date = ' . $date;
	    }
	    if ($type != -1) {
	    	$tabParts[] = 'lecon_type = ' . $type;
	    }
	    if ($salarie != -1) {
	    	$tabParts[] = 'lecon_salarie = ' . $salarie;
	    }
	    if ($eleve != -1) {
	    	$tabParts[] = 'lecon_eleve = ' . $eleve;
	    }
	    if ($vehicule != -1) {
	    	$tabParts[] = 'lecon_vehicule = ' . $vehicule;
	    }
	    
	    for ($i = 0; $i < count($tabParts); $i++) {
	    	if ($i == 0) {
	    		// Premier �l�ment : WHERE
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
