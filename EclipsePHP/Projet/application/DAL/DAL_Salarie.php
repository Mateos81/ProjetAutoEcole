<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include __DIR__ . "/../BLL/Outils.php";
 
 /**
  * Classe d'acc�s aux donn�es pour la classe Salarie.
  * DAL pour Data Access Layer.
  */
class DAL_Salarie {
	
	/**
	 * Cr�ation d'un nouveau salari�.
	 * @param $nom Le nom du nouveau salari�.
	 * @param $prenom Le pr�nom du nouveau salari�.
	 * @param $surnom Le surnom du nouveau salari�.
	 * @param $adr L'adresse du nouveau salari�.
	 * @param $ville La ville du nouveau salari�.
	 * @param $cp Le code postal du nouveau salari�.
	 * @param $tel Le num�ro de t�l�phone du nouveau salari�.
	 * @param $vehicule Le num�ro du v�hicule du nouveau salari�.
	 * @param $poste Le poste du nouveau salari�.
	 * @return Le num�ro unique en base identifiant le salari�.
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
		
		// Construction de la commande d'acc�s � la proc�dure PL/SQL
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
	 * Mise � jour d'un salari� existant.
	 * @param $id L'identifiant du salari�.
	 * @param $nom Le nom du salari�.
	 * @param $prenom Le pr�nom du salari�.
	 * @param $surnom Le surnom du salari�.
	 * @param $adr L'adresse du salari�.
	 * @param $ville La ville du salari�.
	 * @param $cp Le code postal du salari�.
	 * @param $tel Le num�ro de t�l�phone du salari�.
	 * @param $vehicule Le num�ro du v�hicule du salari�.
	 * @param $poste Le poste du salari�.
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
		
		// Construction de la commande d'acc�s � la proc�dure PL/SQL
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
	 * Suppression d'un salari�.
	 * @param $id Identifiant unique du salari� � supprimer.
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
	 * R�cup�re et renvoie les informations du salari� via son surnom.
	 * @param $surnom Le surnom du salari� recherch�.
	 * @return array Un tableau � une ligne
	 * 				 contenant les informations du salari� recherch�.
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
	 * Liste les �l�ves d'un salari�.
	 * @param $id Identifiant d'un salari�.
	 * @return array La liste des �l�ves.
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
	 * Liste les le�ons d'un salari�.
	 * @param $id Identifiant d'un salari�.
	 * @return array La liste des le�ons.
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
	 * Liste les salari�s.
     * @param $nom Filtre optionnel sur le nom des salari�s recherch�s.
     * @param $prenom Filtre optionnel sur le pr�nom des salari�s recherch�s.
     * @param $surnom Filtre optionnel sur le surnom des salari�s recherch�s.
     * @param $poste Filtre optionnel sur le poste des salari�s recherch�s.
	 * @return array La liste des salari�s.
	 */
	public static function listeSalaries(
    		$nom,
    		$prenom,
    		$surnom,
    		$poste) {
	    $conn = Outils::connexion_base();
	    
	    // Construction de la requ�te
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
