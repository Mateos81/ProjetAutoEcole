<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include __DIR__ . "/../BLL/Outils.php";

/**
 * Classe d'accès aux données pour la classe Lecon.
 * DAL pour Data Access Layer.
 */
abstract class DAL_Lecon {
	
	/**
	 * Création d'une leçon en base.
	 * @param $date Date de la leçon.
	 * @param $type Type de la leçon.
	 * @param $salarie Salarié de la leçon.
	 * @param $eleve Elève de la leçon.
	 * @param $vehicule Véhicule de la leçon.
	 * @return Le numéro de la leçon.
	 */
	public static function creerLecon(
			$date,
			$type,
			$salarie,
			$eleve,
			$vehicule) {
		$conn = Outils::connexion_base();

		// Construction de la commande d'accès à la procédure PL/SQL
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
	 * Modification d'une leçon en base.
	 * @param $num Numéro de la leçon.
	 * @param $date Date de la leçon.
	 * @param $type Type de la leçon.
	 * @param $salarie Salarié de la leçon.
	 * @param $eleve Elève de la leçon.
	 * @param $vehicule Véhicule de la leçon.
	 */
	public static function modifierLecon(
			$num,
			$date,
			$type,
			$salarie,
			$eleve,
			$vehicule) {
		$conn = Outils::connexion_base();

		// Construction de la commande d'accès à la procédure PL/SQL
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
	 * Suppression d'une leçon en base.
	 * @param $num Numéro de la leçon.
	 */
	public static function supprimerLecon($num) {
		$conn = Outils::connexion_base();

		// Construction de la commande d'accès à la procédure PL/SQL
		$cmd = 'BEGIN suppressionLecon(:num); END;';
			
		$stid = oci_parse($conn, $cmd);

		oci_bind_by_name($stid, ':num', $num);

		oci_execute($stid);
		oci_free_statement($stid);

		Outils::deconnexion_base($conn);
	}
	
	/**
	 * Liste les leçons.
     * @param $date Filtre optionnel sur la date des leçons recherchées.
     * @param $type Filtre optionnel sur le type des leçons recherchées.
     * @param $salarie Filtre optionnel sur le salarié des leçons recherchées.
     * @param $eleve Filtre optionnel sur l'élève des leçons recherchées.
     * @param $vehicule Filtre optionnel sur le véhicule des leçons recherchées.
	 * @return array La liste des leçons.
	 */
	public static function listeLecons(
    		$date,
    		$type,
    		$salarie,
    		$eleve,
    		$vehicule) {
	    $conn = Outils::connexion_base();
	    
	    // Construction de la requête
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
