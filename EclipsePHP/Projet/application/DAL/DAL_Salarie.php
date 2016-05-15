<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include __DIR__ . "/../BLL/Outils.php";
 
 /**
  * Classe d'accès aux données pour la classe Salarie.
  * DAL pour Data Access Layer.
  */
class DAL_Salarie {
	
	/**
	 * Création d'un nouveau salarié.
	 * @param $nom Le nom du nouveau salarié.
	 * @param $prenom Le prénom du nouveau salarié.
	 * @param $surnom Le surnom du nouveau salarié.
	 * @param $adr L'adresse du nouveau salarié.
	 * @param $ville La ville du nouveau salarié.
	 * @param $cp Le code postal du nouveau salarié.
	 * @param $tel Le numéro de téléphone du nouveau salarié.
	 * @param $vehicule Le numéro du véhicule du nouveau salarié.
	 * @param $poste Le poste du nouveau salarié.
	 * @return Le numéro unique en base identifiant le salarié.
	 */
	public static function creerSalarie(
			$nom,
			$prenom,
			$surnom,
			$adr,
			$ville,
			$cp,
			$tel,
			$vehicule,
			$poste) {
		$conn = Outils::connexion_base();
		
		// Construction de la commande d'accès à la procédure PL/SQL
		$cmd = 'BEGIN :resultat := ajoutSalarie(';
		$cmd .= ':nom, :prenom, :surnom, :adr, :ville, :cp, ';
		$cmd .= ':tel, :vehicule, :poste); END;';
		 
		$stid = oci_parse($conn, $cmd);
		
		oci_bind_by_name($stid, ':resultat', $resultat);
		
		oci_bind_by_name($stid, ':nom', $nom);
		oci_bind_by_name($stid, ':prenom', $prenom);
		oci_bind_by_name($stid, ':surnom', $surnom);
		oci_bind_by_name($stid, ':adr', $adr);
		oci_bind_by_name($stid, ':ville', $ville);
		oci_bind_by_name($stid, ':cp', $cp);
		oci_bind_by_name($stid, ':tel', $tel);
		oci_bind_by_name($stid, ':vehicule', $vehicule);
		oci_bind_by_name($stid, ':poste', $poste);
		
		oci_execute($stid);
		oci_free_statement($stid);
		
		Outils::deconnexion_base();
		
		return $resultat;
	}
	
/**
	 * Mise à jour d'un salarié existant.
	 * @param $id L'identifiant du salarié.
	 * @param $nom Le nom du salarié.
	 * @param $prenom Le prénom du salarié.
	 * @param $surnom Le surnom du salarié.
	 * @param $adr L'adresse du salarié.
	 * @param $ville La ville du salarié.
	 * @param $cp Le code postal du salarié.
	 * @param $tel Le numéro de téléphone du salarié.
	 * @param $vehicule Le numéro du véhicule du salarié.
	 * @param $poste Le poste du salarié.
	 */
	public static function modifierSalarie(
			$id,
			$nom,
			$prenom,
			$surnom,
			$adr,
			$ville,
			$cp,
			$tel,
			$vehicule,
			$poste) {
		$conn = Outils::connexion_base();
		
		// Construction de la commande d'accès à la procédure PL/SQL
		$cmd = 'BEGIN modifSalarie(';
		$cmd .= ':nom, :prenom, :surnom, :adr, :ville, :cp, ';
		$cmd .= ':tel, :vehicule, :poste); END;';
		 
		$stid = oci_parse($conn, $cmd);
		
		oci_bind_by_name($stid, ':nom', $nom);
		oci_bind_by_name($stid, ':prenom', $prenom);
		oci_bind_by_name($stid, ':surnom', $surnom);
		oci_bind_by_name($stid, ':adr', $adr);
		oci_bind_by_name($stid, ':ville', $ville);
		oci_bind_by_name($stid, ':cp', $cp);
		oci_bind_by_name($stid, ':tel', $tel);
		oci_bind_by_name($stid, ':vehicule', $vehicule);
		oci_bind_by_name($stid, ':poste', $poste);
		
		oci_execute($stid);
		oci_free_statement($stid);
		
		Outils::deconnexion_base();
	}
	
	/**
	 * Suppression d'un salarié.
	 * @param $id Identifiant unique du salarié à supprimer.
	 */
	public static function suppressionSalarie($id) {
		$conn = Outils::connexion_base();
		 
		$stid = oci_parse($conn, 'BEGIN suppressionSalarie(:id); END;');
		oci_bind_by_name($stid, ':id', $id);
		
		oci_execute($stid);
		oci_free_statement($stid);
		
		Outils::deconnexion_base();
	}
	
	/**
	 * Récupère et renvoie les informations du salarié via son surnom.
	 * @param $surnom Le surnom du salarié recherché.
	 * @return array Un tableau à une ligne
	 * 				 contenant les informations du salarié recherché.
	 */
	public static function getSalarieBySurnom($surnom) {
		$conn = Outils::connexion_base();
		
		$req = 'SELECT * FROM SALARIE ';
		$req .= 'WHERE salarie_surnom LIKE %' . $surnom . '%';
			
		$stid =	oci_parse($conn, $req);
		oci_execute($stid);
		
		$tab = array();
		while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$tab[] = $row;
		}
		
		oci_free_statement($stid);
		
		Outils::deconnexion_base();
		
		return $tab;
	}
	
	/**
	 * Liste les élèves d'un salarié.
	 * @param $id Identifiant d'un salarié.
	 * @return array La liste des élèves.
	 */
	public static function listeEleves($id) {
	    $conn = Outils::connexion_base();
			
		$stid =
			oci_parse(
				$conn,
				'SELECT * FROM ELEVE WHERE eleve_salarie = ' . $id);
		oci_execute($stid);
		
		$tab = array();
		while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$tab[] = $row;
		}
		
		oci_free_statement($stid);
		
		Outils::deconnexion_base();
		
		return $tab;
	}
	
	/**
	 * Liste les leçons d'un salarié.
	 * @param $id Identifiant d'un salarié.
	 * @return array La liste des leçons.
	 */
	public static function listeLecons($id) {
	    $conn = Outils::connexion_base();
			
		$stid =
			oci_parse(
				$conn,
				'SELECT * FROM LECON WHERE lecon_salarie = ' . $id);
		oci_execute($stid);
		
		$tab = array();
		while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$tab[] = $row;
		}
		
		oci_free_statement($stid);
		
		Outils::deconnexion_base();
		
		return $tab;
	}
	
	/**
	 * Liste les salariés.
     * @param $nom Filtre optionnel sur le nom des salariés recherchés.
     * @param $prenom Filtre optionnel sur le prénom des salariés recherchés.
     * @param $surnom Filtre optionnel sur le surnom des salariés recherchés.
     * @param $poste Filtre optionnel sur le poste des salariés recherchés.
	 * @return array La liste des salariés.
	 */
	public static function listeSalaries(
    		$nom,
    		$prenom,
    		$surnom,
    		$poste) {
	    $conn = Outils::connexion_base();
	    
	    // Construction de la requête
	    $req = 'SELECT * FROM SALARIE';
	    
	    $tabParts = array();
	    if ($nom != "") {
	    	$tabParts[] = 'salarie_nom LIKE %' . $nom . '%';
	    }
	    if ($prenom != "") {
	    	$tabParts[] = 'salarie_prenom LIKE %' . $prenom . '%';
	    }
	    if ($surnom != "") {
	    	$tabParts[] = 'salarie_surnom LIKE %' . $surnom . '%';
	    }
	    if ($poste != 0) {
	    	$tabParts[] = 'salarie_poste = ' . $poste;
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
