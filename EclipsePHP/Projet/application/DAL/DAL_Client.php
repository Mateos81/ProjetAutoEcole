<?php
/**
 * Projet 2ème Année 3iL
 * @author CIULLI - MATEOS - ROUX
 * @version 1.0
 * @package DAL
 */

include_once __DIR__ . "/../BLL/Outils.php";
 
 /**
  * Classe d'accès aux données pour la classe Client.
  * DAL pour Data Access Layer.
  */
abstract class DAL_Client {
	
	/**
	 * Création d'un nouveau client.
	 * @param $nom Le nom du nouveau client.
	 * @param $prenom Le prénom du nouveau client.
	 * @param $adr L'adresse du nouveau client.
	 * @param $ville La ville du nouveau client.
	 * @param $cp Le code postal du nouveau client.
	 * @param $tel Le numéro de téléphone du nouveau client.
	 * @param $dateNaiss La date de naissance du nouveau client.
	 * @return Le numéro unique en base identifiant le client.
	 */
	public static function creerClient(
			$nom,
			$prenom,
			$adr,
			$ville,
			$cp,
			$tel,
			$dateNaiss) {
		$conn = Outils::connexion_base();
		
		// Construction de la commande d'accès à la procédure PL/SQL
		$cmd = 'BEGIN :resultat := ajoutClient(';
		$cmd .= ':nom, :prenom, :adr, :ville, :cp, ';
		$cmd .= ':tel, :dateNaiss); END;';
		 
		$stid = oci_parse($conn, $cmd);
		
		oci_bind_by_name($stid, ':resultat', $resultat);
		
		oci_bind_by_name($stid, ':nom', $nom);
		oci_bind_by_name($stid, ':prenom', $prenom);
		oci_bind_by_name($stid, ':adr', $adr);
		oci_bind_by_name($stid, ':ville', $ville);
		oci_bind_by_name($stid, ':cp', $cp);
		oci_bind_by_name($stid, ':tel', $tel);
		oci_bind_by_name($stid, ':dateNaiss', $dateNaiss);
		
		oci_execute($stid);
		oci_free_statement($stid);
		
		Outils::deconnexion_base($conn);
		
		return $resultat;
	}
	
	/**
	 * Mise à jour d'un client existant.
	 * @param $id L'identifiant du client.
	 * @param $nom Le nom du client.
	 * @param $prenom Le prénom du client.
	 * @param $adr L'adresse du client.
	 * @param $ville La ville du client.
	 * @param $cp Le code postal du client.
	 * @param $tel Le numéro de téléphone du client.
	 * @param $dateNaiss La date de naissance du client.
	 */
	public static function modifierClient(
			$id,
			$nom,
			$prenom,
			$surnom,
			$adr,
			$ville,
			$cp,
			$tel,
			$dateNaiss) {
		$conn = Outils::connexion_base();
		
		// Construction de la commande d'accès à la procédure PL/SQL
		$cmd = 'BEGIN modifClient(';
		$cmd .= ':nom, :prenom, :adr, :ville, :cp, ';
		$cmd .= ':tel, :dateNaiss); END;';
		 
		$stid = oci_parse($conn, $cmd);
		
		oci_bind_by_name($stid, ':nom', $nom);
		oci_bind_by_name($stid, ':prenom', $prenom);
		oci_bind_by_name($stid, ':adr', $adr);
		oci_bind_by_name($stid, ':ville', $ville);
		oci_bind_by_name($stid, ':cp', $cp);
		oci_bind_by_name($stid, ':tel', $tel);
		oci_bind_by_name($stid, ':dateNaiss', $dateNaiss);
		
		oci_execute($stid);
		oci_free_statement($stid);
		
		Outils::deconnexion_base($conn);
	}
	
	/**
	 * Suppression d'un client.
	 * @param $id Identifiant unique du client à supprimer.
	 */
	public static function supprimerClient($id) {
		$conn = Outils::connexion_base();
		 
		$stid = oci_parse($conn, 'BEGIN suppressionClient(:id); END;');
		oci_bind_by_name($stid, ':id', $id);
		
		oci_execute($stid);
		oci_free_statement($stid);
		
		Outils::deconnexion_base($conn);
	}
	
	/**
	 * Liste les élèves d'un client.
	 * @param $id Identifiant d'un client.
	 * @return array La liste des élèves.
	 */
	public static function listeEleves($id) {
	    $conn = Outils::connexion_base();
			
		$stid =
			oci_parse(
				$conn,
				'SELECT * FROM ELEVE WHERE eleve_cli = ' . $id);
		oci_execute($stid);
		
		$tab = array();
		while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
			$tab[] = $row;
		}
		
		oci_free_statement($stid);
		
		Outils::deconnexion_base($conn);
		
		return $tab;
	}
	
	/**
	 * Liste les clients.
     * @param $nom Filtre optionnel sur le nom des clients recherchés.
	 * @return array(Client) La liste des clients.
	 */
	public static function listeClients($nom) {
	    $conn = Outils::connexion_base();
	    
	    // Construction de la requête
	    $req = 'SELECT * FROM CLIENT';
	    
	    $tabParts = array();
	    if ($nom != "") {
	    	$tabParts[] = 'client_nom LIKE \'%' . $nom . '\'%';
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
