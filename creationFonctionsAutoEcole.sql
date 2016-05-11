------------
-- PL SQL --
------------

CREATE OR REPLACE PACKAGE autoEcole IS

	-- Vehicule 	
	PROCEDURE ajoutVehicule(lImmatriculation IN VEHICULE.vehicule_immatriculation%TYPE,
							laMarque IN VEHICULE.vehicule_marque%TYPE, leModele IN VEHICULE.vehicule_modele%TYPE);
	PROCEDURE suppressionVehicule(leNum IN VEHICULE.vehicule_num%TYPE);
	PROCEDURE modifVehicule(leNum IN VEHICULE.vehicule_num%TYPE, lImmatriculation IN VEHICULE.vehicule_immatriculation%TYPE,
							laMarque IN VEHICULE.vehicule_marque%TYPE, leModele IN VEHICULE.vehicule_modele%TYPE);
	-- HistoKm				
	PROCEDURE ajoutHistoKm(leVehicule IN HISTO_KM.histoKm_numVehicule%TYPE, leKm IN HISTO_KM.HistoKm_nbKm%TYPE, 
						   laDate IN HISTO_KM.histoKm_date%TYPE);
	-- Lecon	
	PROCEDURE suppressionLecon(leNum IN LECON.lecon_num%TYPE);
	PROCEDURE modifLecon(leNum IN VEHICULE.vehicule_num%TYPE, laDate IN LECON.lecon_date%TYPE, 
						 leVehicule IN LECON.lecon_vehicule%TYPE, leSalarie IN LECON.lecon_salarie%TYPE, 
						 lEleve IN LECON.lecon_eleve%TYPE, leType IN LECON.lecon_type%TYPE);
	-- Salarie	
	PROCEDURE ajoutSalarie(leNom IN SALARIE.salarie_nom%TYPE, lePrenom IN SALARIE.salarie_prenom%TYPE,
						   leSurnom IN SALARIE.salarie_surnom%TYPE, lAdr IN SALARIE.salarie_adr%TYPE,
						   laVille IN SALARIE.salarie_ville%TYPE, leCp IN SALARIE.salarie_cp%TYPE,
						   leTel IN SALARIE.salarie_tel%TYPE, leVehicule IN SALARIE.salarie_vehicule%TYPE,
						   lePoste IN SALARIE.salarie_poste%TYPE);
	PROCEDURE suppressionSalarie(lId IN SALARIE.salarie_id%TYPE);
	PROCEDURE modifSalarie(lId IN SALARIE.salarie_id%TYPE, leNom IN SALARIE.salarie_nom%TYPE,
						   lePrenom IN SALARIE.salarie_prenom%TYPE, leSurnom IN SALARIE.salarie_surnom%TYPE, 
						   lAdr IN SALARIE.salarie_adr%TYPE, laVille IN SALARIE.salarie_ville%TYPE, 
						   leCp IN SALARIE.salarie_cp%TYPE, leTel IN SALARIE.salarie_tel%TYPE, 
						   leVehicule IN SALARIE.salarie_vehicule%TYPE, lePoste IN SALARIE.salarie_poste%TYPE);
	-- Eleve	
	PROCEDURE suppressionEleve(lId IN ELEVE.eleve_id%TYPE);
	PROCEDURE modifEleve(lId IN ELEVE.eleve_id%TYPE, leNom IN ELEVE.eleve_nom%TYPE, 
					     lePrenom IN ELEVE.eleve_prenom%TYPE, lAdr IN ELEVE.eleve_adr%TYPE, 
						 laVille IN ELEVE.eleve_ville%TYPE, leCp IN ELEVE.eleve_cp%TYPE, 
						 leTel IN ELEVE.eleve_tel%TYPE, laDateNaiss IN ELEVE.eleve_dateNaiss%TYPE);	

	-- Client	
	PROCEDURE suppressionClient(lId IN CLIENT.client_id%TYPE);
	PROCEDURE modifClient(lId IN CLIENT.client_id%TYPE, leNom IN CLIENT.client_nom%TYPE, 
					     lePrenom IN CLIENT.client_prenom%TYPE, lAdr IN CLIENT.client_adr%TYPE, 
						 laVille IN CLIENT.client_ville%TYPE, leCp IN CLIENT.client_cp%TYPE, 
						 leTel IN CLIENT.client_tel%TYPE, laDateNaiss IN CLIENT.client_dateNaiss%TYPE);		
	
	-- Examen
	PROCEDURE ajoutExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE);
	PROCEDURE suppressionExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE);
	
	-- Autre
	PROCEDURE print(message IN VARCHAR);
	
	-- Vehicule
	FUNCTION getCurVehicule RETURN VEHICULE.vehicule_num%TYPE;
	-- FUNCTION listeVehicule() RETURN VEHICULE[];
	-- FUNCTION listeKmVehicule(leNum IN VEHICULE.vehicule_num%TYPE) RETURN HISTO_KM;
	
	-- Lecon
	FUNCTION ajoutLecon(laDate IN LECON.lecon_date%TYPE, leVehicule IN LECON.lecon_vehicule%TYPE,
						 leSalarie IN LECON.lecon_salarie%TYPE, lEleve IN LECON.lecon_eleve%TYPE,
						 leType IN LECON.lecon_type%TYPE)
						 RETURN LECON.lecon_num%TYPE;
	-- FUNCTION listeLecon(leType IN LECON.lecon_type%TYPE, laDateDebut IN LECON.lecon_date%TYPE,
					    -- laDateFin IN LECON.lecon_date%TYPE, leSalarie IN LECON.lecon_salarie%TYPE, 
						-- lEleve IN LECON.lecon_eleve%TYPE) RETURN LECON[];
						
	-- Salarie		
	
	-- FUNCTION listeSalarie() RETURN SALARIE[];
	-- FUNCTION listeEleveSalarie(lId IN SALARIE.salarie_id%TYPE) RETURN ELEVE[];
	-- FUNCTION listeLeconSalarie(lId IN SALARIE.salarie_id%TYPE) RETURN LECON[];
		
	-- Eleve
	FUNCTION ajoutEleve(leNom IN ELEVE.eleve_nom%TYPE, lePrenom IN ELEVE.eleve_prenom%TYPE,
						 lAdr IN ELEVE.eleve_adr%TYPE, laVille IN ELEVE.eleve_ville%TYPE, 
						 leCp IN ELEVE.eleve_cp%TYPE, leTel IN ELEVE.eleve_tel%TYPE, 
						 laDateNaiss IN ELEVE.eleve_dateNaiss%TYPE)
						 RETURN ELEVE.eleve_id%TYPE;
	-- FUNCTION listeEleve() RETURN ELEVE[];
	FUNCTION sommeLeconEleve(lId IN ELEVE.eleve_id%TYPE) RETURN FLOAT;
	FUNCTION dateCodeEleve(lId IN ELEVE.eleve_id%TYPE) RETURN DATE;
	
	-- Client
	FUNCTION ajoutClient(leNom IN CLIENT.client_nom%TYPE, lePrenom IN CLIENT.client_prenom%TYPE,
						 lAdr IN CLIENT.client_adr%TYPE, laVille IN CLIENT.client_ville%TYPE, 
						 leCp IN CLIENT.client_cp%TYPE, leTel IN CLIENT.client_tel%TYPE, 
						 laDateNaiss IN CLIENT.client_dateNaiss%TYPE)
						 RETURN CLIENT.client_id%TYPE;
	-- FUNCTION listeClient() RETURN CLIENT[];
	-- FUNCTION listeEleveClient(lId IN CLIENT.client_id%TYPE) RETURN ELEVE[];
	FUNCTION verifPaiementClient(lId IN CLIENT.client_id%TYPE) RETURN FLOAT;
	-- FUNCTION listeFactureClient(lId IN CLIENT.client_id%TYPE, paye INT, 
	--							laDateDebut IN ACHAT.achat_date%TYPE, laDateFin IN ACHAT.achat_date%TYPE)
	--							RETURN ACHAT[];
	FUNCTION sommeAPayerClient(lId IN CLIENT.client_id%TYPE, lIdE IN ELEVE.eleve_id%TYPE) RETURN FLOAT;
	FUNCTION sommeAchatClient(lId IN CLIENT.client_id%TYPE, lIdE IN ELEVE.eleve_id%TYPE) RETURN FLOAT;
		
	

END autoEcole;

CREATE OR REPLACE PACKAGE BODY autoEcole AS



PROCEDURE ajoutVehicule(lImmatriculation IN VEHICULE.vehicule_immatriculation%TYPE,
							laMarque IN VEHICULE.vehicule_marque%TYPE, leModele IN VEHICULE.vehicule_modele%TYPE)
IS
BEGIN

  INSERT INTO VEHICULE VALUES(seq_vehicule.nextval, lImmatriculation, laMarque, leModele);
  print('Véhicule ajouté');
    
-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
  
END ajoutVehicule;

PROCEDURE ajoutSalarie(leNom IN SALARIE.salarie_nom%TYPE, lePrenom IN SALARIE.salarie_prenom%TYPE,
						   leSurnom IN SALARIE.salarie_surnom%TYPE, lAdr IN SALARIE.salarie_adr%TYPE,
						   laVille IN SALARIE.salarie_ville%TYPE, leCp IN SALARIE.salarie_cp%TYPE,
						   leTel IN SALARIE.salarie_tel%TYPE, leVehicule IN SALARIE.salarie_vehicule%TYPE,
						   lePoste IN SALARIE.salarie_poste%TYPE)
IS
BEGIN

  INSERT INTO SALARIE VALUES(seq_salarie.nextval, leNom, lePrenom, leSurnom, laVille, leCp, leTel, leVehicule, lePoste);
  print('Véhicule ajouté');
  
END ajoutSalarie;

/**
 * Affichage d'un message.
 * @param message Message à afficher.
 */
PROCEDURE print(message IN VARCHAR)
IS
BEGIN
  dbms_output.put_line(message);
END print;

FUNCTION getCurVehicule RETURN VEHICULE.vehicule_num%TYPE
IS
   idVehicule VEHICULE.vehicule_num%TYPE;
 BEGIN
   SELECT seq_vehicule.currval INTO idVehicule FROM dual;
   
 RETURN idVehicule;
 
END getCurVehicule;

/**
 * Ajout d'un utilisateur dans la base de données.
 * @param leLogin Login de l'utilisateur à ajouter.
 */
PROCEDURE ajoutUtilisateur(leLogin IN UTILISATEUR.login%TYPE)
IS
BEGIN
  INSERT INTO UTILISATEUR VALUES(leLogin, false);
  print('Bienvenue ' || leLogin || ' !');

EXCEPTION
  WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END ajoutUtilisateur;

/**
 * Suppression d'un utilisateur de la base de données.
 * @param leLogin Login de l'utilisateur à supprimer.
 */
PROCEDURE suppressionUtilisateur(leLogin IN UTILISATEUR.login%TYPE)
IS
BEGIN
  IF NOT estConnecte(leLogin) THEN
    RETURN;
  END IF;

  DELETE FROM UTLISATEUR WHERE login = leLogin;

  print('Suppression effectuée avec succès. Adieu ' || leLogin || ' !');

END suppressionUtilisateur;

/**
 * Vérification du statut de connexion d'un utilisateur.
 * @param leLogin
 * @return TRUE si l'utilisateur est connecté, FALSE sinon.
 */
FUNCTION estConnecte((leLogin IN UTILISATEUR.login%TYPE) RETURN BOOLEAN
IS
DECLARE
  estConnecte BOOLEAN;
BEGIN
  IF NOT existe(leLogin) THEN
    RETURN FALSE;
  END IF;

  estConnecte = (utilisateurConnecte = leLogin);
  IF NOT estConnecte THEN
    print('L''utilisateur ' || leLogin || ' n''est pas connecté.');
  END IF;

  RETURN estConnecte;

END verifUtilisateurConnecte;

 /**
  * Connexion d'un utilisateur.
  * @param leLogin Login de l'utilisateur à loguer.
  */
PROCEDURE connexion(leLogin IN UTLILISATEUR.login%TYPE)
IS
DECLARE
  exc_co EXCEPTION;
  estConnecte BOOLEAN;
BEGIN
  IF NOT existe(leLogin) THEN
    print('L''utilisateur n''existe pas.');
    RETURN;
  END IF;

  estConnecte = SELECT connecte FROM UTILISATEUR WHERE login = leLogin;
  IF estConnecte THEN
    print('L''utilisateur ' || leLogin || ' est déjà connecté.');
    RETURN;
  END IF;

  UPDATE UTILISATEUR SET connecte = TRUE WHERE login = leLogin;

  utilisateurConnecte = leLogin;

  print('Bienvenue ' || leLogin || ' !');
END connexion;

/**
 * Affichage d'un message.
 * @param message Message à afficher.
 */
PROCEDURE print(message IN VARCHAR(50))
IS
BEGIN
  dbms_output.put_line(message);
END print;


END autoEcole;
