<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include_once __DIR__ . "/../BLL/Outils.php";
 
 /**
  * Classe d'accès aux données pour la classe Eleve.
  * DAL pour Data Access Layer.
  */
abstract class DAL_Eleve {
	
	/**
	 * Création d'un nouvel élève.
	 * @param $nom Le nom du nouvel élève.
	 * @param $prenom Le prénom du nouvel élève.
	 * @param $adr L'adresse du nouvel élève.
	 * @param $ville La ville du nouvel élève.
	 * @param $cp Le code postal du nouvel élève.
	 * @param $tel Le numéro de téléphone du nouvel élève.
	 * @param $dateNaiss La date de naissance du nouvel élève.
	 * @param $client Le client du nouvel élève.
	 * @param $salarie Le salarié rattaché au nouvel élève.
	 * @return Le numéro unique en base identifiant l'élève.
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
		
		// Construction de la commande d'accès à la procédure PL/SQL
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
	 * Mise à jour d'un élève existant.
	 * @param $id L'identifiant de l'élève.
	 * @param $nom Le nom de l'élève.
	 * @param $prenom Le prénom de l'élève.
	 * @param $adr L'adresse de l'élève.
	 * @param $ville La ville de l'élève.
	 * @param $cp Le code postal de l'élève.
	 * @param $tel Le numéro de téléphone de l'élève.
	 * @param $dateNaiss La date de naissance de l'élève.
	 * @param $client Le client de l'élève.
	 * @param $salarie Le salarié rattaché à l'élève.
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
		
		// Construction de la commande d'accès à la procédure PL/SQL
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
	 * Suppression d'un élève.
	 * @param $id Identifiant unique de l'élève à supprimer.
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
	 * Récupère et renvoie la liste des examens
	 * qu'a passé ou doit passer un élève.
	 * @param $id Identifiant d'un élève.
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
	 * Liste les leçons d'un élève.
	 * @param $id Identifiant d'un élève.
	 * @return resource La liste des leçons.
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
	 * Liste les élèves.
     * @param $nom Filtre optionnel sur le nom des élèves recherchés.
     * @param $prenom Filtre optionnel sur le prénom des élèves recherchés.
     * @param $client Filtre optionnel sur le client des élèves recherchés.
	 * @return array La liste des élèves.
	 */
	public static function listeEleves(
    		$nom,
    		$prenom,
    		$client) {
	    $conn = Outils::connexion_base();
	    
	    // Construction de la requête
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
