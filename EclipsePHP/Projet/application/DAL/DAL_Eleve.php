<?php
/**
 * Projet 2�me Ann�e 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include_once __DIR__ . "/../BLL/Outils.php";
 
 /**
  * Classe d'acc�s aux donn�es pour la classe Eleve.
  * DAL pour Data Access Layer.
  */
abstract class DAL_Eleve {
	
	/**
	 * Cr�ation d'un nouvel �l�ve.
	 * @param $nom Le nom du nouvel �l�ve.
	 * @param $prenom Le pr�nom du nouvel �l�ve.
	 * @param $adr L'adresse du nouvel �l�ve.
	 * @param $ville La ville du nouvel �l�ve.
	 * @param $cp Le code postal du nouvel �l�ve.
	 * @param $tel Le num�ro de t�l�phone du nouvel �l�ve.
	 * @param $dateNaiss La date de naissance du nouvel �l�ve.
	 * @param $client Le client du nouvel �l�ve.
	 * @param $salarie Le salari� rattach� au nouvel �l�ve.
	 * @return Le num�ro unique en base identifiant l'�l�ve.
	 */
	public static function creerEleve(
			$nom,
			$prenom,
			$adr,
			$ville,
			$cp,
			$tel,
			$dateNaiss,
			$client,
			$salarie) {
		$conn = Outils::connexion_base();
		
		// Construction de la commande d'acc�s � la proc�dure PL/SQL
		$cmd = 'BEGIN :resultat := ajoutEleve(';
		$cmd .= ':nom, :prenom, :adr, :ville, :cp, ';
		$cmd .= ':tel, :dateNaiss, :salarie, :client); END;';
		 
		$stid = oci_parse($conn, $cmd);
		
		oci_bind_by_name($stid, ':resultat', $resultat);
		
		oci_bind_by_name($stid, ':nom', $nom);
		oci_bind_by_name($stid, ':prenom', $prenom);
		oci_bind_by_name($stid, ':adr', $adr);
		oci_bind_by_name($stid, ':ville', $ville);
		oci_bind_by_name($stid, ':cp', $cp);
		oci_bind_by_name($stid, ':tel', $tel);
		oci_bind_by_name($stid, ':dateNaiss', $dateNaiss);
		oci_bind_by_name($stid, ':salarie', $salarie);
		oci_bind_by_name($stid, ':client', $client);
		
		oci_execute($stid);
		oci_free_statement($stid);
		
		Outils::deconnexion_base($conn);
		
		return $resultat;
	}
	
	/**
	 * Mise � jour d'un �l�ve existant.
	 * @param $id L'identifiant de l'�l�ve.
	 * @param $nom Le nom de l'�l�ve.
	 * @param $prenom Le pr�nom de l'�l�ve.
	 * @param $adr L'adresse de l'�l�ve.
	 * @param $ville La ville de l'�l�ve.
	 * @param $cp Le code postal de l'�l�ve.
	 * @param $tel Le num�ro de t�l�phone de l'�l�ve.
	 * @param $dateNaiss La date de naissance de l'�l�ve.
	 * @param $client Le client de l'�l�ve.
	 * @param $salarie Le salari� rattach� � l'�l�ve.
	 */
	public static function modifierEleve(
			$id,
			$nom,
			$prenom,
			$surnom,
			$adr,
			$ville,
			$cp,
			$tel,
			$dateNaiss,
			$client,
			$salarie) {
		$conn = Outils::connexion_base();
		
		// Construction de la commande d'acc�s � la proc�dure PL/SQL
		$cmd = 'BEGIN modifEleve(';
		$cmd .= ':nom, :prenom, :adr, :ville, :cp, ';
		$cmd .= ':tel, :dateNaiss, :salarie, :client); END;';
		 
		$stid = oci_parse($conn, $cmd);
		
		oci_bind_by_name($stid, ':nom', $nom);
		oci_bind_by_name($stid, ':prenom', $prenom);
		oci_bind_by_name($stid, ':adr', $adr);
		oci_bind_by_name($stid, ':ville', $ville);
		oci_bind_by_name($stid, ':cp', $cp);
		oci_bind_by_name($stid, ':tel', $tel);
		oci_bind_by_name($stid, ':dateNaiss', $dateNaiss);
		oci_bind_by_name($stid, ':salarie', $salarie);
		oci_bind_by_name($stid, ':client', $client);
		
		oci_execute($stid);
		oci_free_statement($stid);
		
		Outils::deconnexion_base($conn);
	}
	
	/**
	 * Suppression d'un �l�ve.
	 * @param $id Identifiant unique de l'�l�ve � supprimer.
	 */
	public static function supprimerEleve($id) {
		$conn = Outils::connexion_base();
		 
		$stid = oci_parse($conn, 'BEGIN suppressionEleve(:id); END;');
		oci_bind_by_name($stid, ':id', $id);
		
		oci_execute($stid);
		oci_free_statement($stid);
		
		Outils::deconnexion_base($conn);
	}
	
	/**
	 * R�cup�re et renvoie la liste des examens
	 * qu'a pass� ou doit passer un �l�ve.
	 * @param $id Identifiant d'un �l�ve.
	 * @return resource La liste des examens.
	 */
	public static function listeAchats($id) {
		$conn = Outils::connexion_base();
		
		$req = 'SELECT * FROM PASSER WHERE passer_eleve = ' . $id;
		$stid =	oci_parse($conn, $req);
		oci_execute($stid);
		
		Outils::deconnexion_base($conn);
		
		return $stid;
	}
	
	/**
	 * Liste les le�ons d'un �l�ve.
	 * @param $id Identifiant d'un �l�ve.
	 * @return resource La liste des le�ons.
	 */
	public static function listeLecons($id) {
	    $conn = Outils::connexion_base();

	    $req = 'SELECT * FROM LECON WHERE lecon_eleve = ' . $id;
		$stid =	oci_parse($conn, $req);
		oci_execute($stid);
		
		Outils::deconnexion_base($conn);
		
		return $stid;
	}
	
	/**
	 * Liste les �l�ves.
     * @param $nom Filtre optionnel sur le nom des �l�ves recherch�s.
     * @param $prenom Filtre optionnel sur le pr�nom des �l�ves recherch�s.
     * @param $client Filtre optionnel sur le client des �l�ves recherch�s.
	 * @return array La liste des �l�ves.
	 */
	public static function listeEleves(
    		$nom,
    		$prenom,
    		$client) {
	    $conn = Outils::connexion_base();
	    
	    // Construction de la requ�te
	    $req = 'SELECT * FROM ELEVE';
	    
	    $tabParts = array();
	    if ($nom != "") {
	    	$tabParts[] = 'eleve_nom LIKE %' . $nom . '%';
	    }
	    if ($prenom != "") {
	    	$tabParts[] = 'eleve_prenom LIKE %' . $prenom . '%';
	    }
	    if ($client != "") {
	    	$tabParts[] = 'eleve_cli LIKE %' . $client . '%';
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
