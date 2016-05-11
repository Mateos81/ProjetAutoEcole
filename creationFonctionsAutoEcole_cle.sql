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
	PROCEDURE ajoutHistoKm(leVehicule IN HISTO_KM.histoKm_numVehicule%TYPE, leKm IN HISTO_KM.HistoKm_nbKm%TYPE);
	-- Lecon
	PROCEDURE ajoutLecon(laDate IN LECON.lecon_date%TYPE, leVehicule IN LECON.lecon_vehicule%TYPE,
						 leSalarie IN LECON.lecon_salarie%TYPE, lEleve IN LECON.lecon_eleve%TYPE,
						 leType IN LECON.lecon_type%TYPE);
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
	PROCEDURE ajoutEleve(leNom IN ELEVE.eleve_nom%TYPE, lePrenom IN ELEVE.eleve_prenom%TYPE,
						 lAdr IN ELEVE.eleve_adr%TYPE, laVille IN ELEVE.eleve_ville%TYPE, 
						 leCp IN ELEVE.eleve_cp%TYPE, leTel IN ELEVE.eleve_tel%TYPE, 
						 laDateNaiss IN ELEVE.eleve_dateNaiss%TYPE, leSalarie IN ELEVE.eleve_salarie%TYPE,
						 leCli IN ELEVE.eleve_cli%TYPE);
	PROCEDURE suppressionEleve(lId IN ELEVE.eleve_id%TYPE);
	PROCEDURE modifEleve(lId IN ELEVE.eleve_id%TYPE, leNom IN ELEVE.eleve_nom%TYPE, 
					     lePrenom IN ELEVE.eleve_prenom%TYPE, lAdr IN ELEVE.eleve_adr%TYPE, 
						 laVille IN ELEVE.eleve_ville%TYPE, leCp IN ELEVE.eleve_cp%TYPE, 
						 leTel IN ELEVE.eleve_tel%TYPE, laDateNaiss IN ELEVE.eleve_dateNaiss%TYPE,
						 leSalarie IN ELEVE.eleve_salarie%TYPE, leCli IN ELEVE.eleve_cli%TYPE);	

	-- Client
	PROCEDURE ajoutClient(leNom IN CLIENT.client_nom%TYPE, lePrenom IN CLIENT.client_prenom%TYPE,
						 lAdr IN CLIENT.client_adr%TYPE, laVille IN CLIENT.client_ville%TYPE, 
						 leCp IN CLIENT.client_cp%TYPE, leTel IN CLIENT.client_tel%TYPE, 
						 laDateNaiss IN CLIENT.client_dateNaiss%TYPE);
	PROCEDURE suppressionClient(lId IN CLIENT.client_id%TYPE);
	PROCEDURE modifClient(lId IN CLIENT.client_id%TYPE, leNom IN CLIENT.client_nom%TYPE, 
					     lePrenom IN CLIENT.client_prenom%TYPE, lAdr IN CLIENT.client_adr%TYPE, 
						 laVille IN CLIENT.client_ville%TYPE, leCp IN CLIENT.client_cp%TYPE, 
						 leTel IN CLIENT.client_tel%TYPE, laDateNaiss IN CLIENT.client_dateNaiss%TYPE);		
	
	-- Examen
	PROCEDURE ajoutExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE);
	PROCEDURE suppressionExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE);
	PROCEDURE modifExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE);
							
	-- Formule
	PROCEDURE ajoutFormule(leNbLecon IN FORMULE.formule_nbLeconConduite%TYPE, lePrix IN FORMULE.formule_prix%TYPE, 
						   lePrixTicket IN FORMULE.formule_ticketPrix%TYPE);
	PROCEDURE suppressionFormule(leNum IN FORMULE.formule_num%TYPE);
	PROCEDURE modifFormule(leNum IN FORMULE.formule_num%TYPE, leNbLecon IN FORMULE.formule_nbLeconConduite%TYPE, 
						   lePrix IN FORMULE.formule_prix%TYPE, lePrixTicket IN FORMULE.formule_ticketPrix%TYPE);
							
	PROCEDURE print(message IN VARCHAR);
	
	-- Vehicule
	FUNCTION listeVehicule RETURN OBJECT;
	FUNCTION listeKmVehicule(leNum IN VEHICULE.vehicule_num%TYPE) RETURN OBJECT;
	
	-- Lecon
	FUNCTION listeLecon(leType IN LECON.lecon_type%TYPE, laDateDebut IN LECON.lecon_date%TYPE,
					    laDateFin IN LECON.lecon_date%TYPE, leSalarie IN LECON.lecon_salarie%TYPE, 
						lEleve IN LECON.lecon_eleve%TYPE) RETURN OBJECT;
						
	-- Salarie		
	FUNCTION listeSalarie(lId IN SALARIE.salarie_id%TYPE) RETURN OBJECT;
	FUNCTION listeEleveSalarie(lId IN SALARIE.salarie_id%TYPE) RETURN OBJECT;
	FUNCTION listeLeconSalarie(lId IN SALARIE.salarie_id%TYPE) RETURN OBJECT;
		
	-- Eleve
	FUNCTION listeEleve RETURN OBJECT;
	FUNCTION sommeLeconEleve(lId IN ELEVE.eleve_id%TYPE) RETURN FLOAT;
	FUNCTION dateCodeEleve(lId IN ELEVE.eleve_id%TYPE) RETURN DATE;
	
	-- Client
	FUNCTION listeClient RETURN OBJECT;
	FUNCTION listeEleveClient(lId IN CLIENT.client_id%TYPE) RETURN OBJECT;
	FUNCTION verifPaiementClient(lId IN CLIENT.client_id%TYPE) RETURN FLOAT;
	FUNCTION listeFactureClient(lId IN CLIENT.client_id%TYPE, paye INT, 
								laDateDebut IN ACHAT.achat_date%TYPE, laDateFin IN ACHAT.achat_date%TYPE)
								RETURN OBJECT;
	FUNCTION sommeAPayerClient(lId IN CLIENT.client_id%TYPE, lIdE IN ELEVE.eleve_id%TYPE) RETURN FLOAT;
	FUNCTION sommeAchatClient(lId IN CLIENT.client_id%TYPE, lIdE IN ELEVE.eleve_id%TYPE) RETURN FLOAT;
	
	-- Examen
	FUNCTION listeExamen RETURN OBJECT;
	
	-- Formule
	FUNCTION listeFormule RETURN OBJECT;
	
	-- Ville
	FUNCTION listeVille(leCp IN VILLE.ville_cp%TYPE, laVille IN VILLE.ville_nom%TYPE) RETURN OBJECT;
	
	
END autoEcole;

CREATE OR REPLACE PACKAGE BODY autoEcole AS

----------------------------------- PROCEDURES --------------------------------


------------------------------------ Véhicule ---------------------------------
/**
 * Ajout d'un vehicule dans la base de données.
 * @param lImmatriculation Immatriculation du véhicule à ajouter.
 * @param laMarque Marque du véhicule à ajouter.
 * @param leModele Modèle du véhicule à ajouter.
 */
PROCEDURE ajoutVehicule(lImmatriculation IN VEHICULE.vehicule_immatriculation%TYPE,
						laMarque IN VEHICULE.vehicule_marque%TYPE, leModele IN VEHICULE.vehicule_modele%TYPE)
IS
BEGIN
  INSERT INTO VEHICULE VALUES(seq_vehicule.NextVal, lImmatriculation, laMarque, leModele);
  print('Le véhicule a bien été rajouté');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END ajoutVehicule;

/**
 * Suppression d'un véhicule de la base de données.
 * @param leNum Numéro du véhicule à supprimer.
 */
PROCEDURE suppressionVehicule(leNum IN VEHICULE.vehicule_num%TYPE)
IS
BEGIN 
  DELETE FROM VEHICULE WHERE vehicule_num = leNum;
  print('Suppression effectuée avec succès');

END suppressionVehicule;



/**
 * Modification d'un vehicule dans la base de données.
 * @param leNum Numéro du véhicule à modifier.
 * @param lImmatriculation Immatriculation du véhicule à ajouter.
 * @param laMarque Marque du véhicule à ajouter.
 * @param leModele Modèle du véhicule à ajouter.
 */
PROCEDURE modifVehicule(leNum IN VEHICULE.vehicule_num%TYPE, lImmatriculation IN VEHICULE.vehicule_immatriculation%TYPE,
							laMarque IN VEHICULE.vehicule_marque%TYPE, leModele IN VEHICULE.vehicule_modele%TYPE)
IS
DECLARE
  req CLOB;
BEGIN
	if (lImmatriculation is not NULL)
		req = req || 'vehicule_immatriculation = ' || lImmatriculation;
	if (laMarque is not NULL)
		req = req || 'AND vehicule_marque = ' || laMarque;
	if (leModele is not NULL)
		req = req || 'AND vehicule_modele = ' || leModele;

  ALTER TABLE VEHICULE 
  MODIFY SET || req ||
  WHERE vehicule_num = leNum;
  print('Le véhicule a bien été modifié');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END modifVehicule;


------------------------------------HistoKm --------------------------------------------

/**
 * Ajout du kilométrage d'un vehicule dans la base de données.
 * @param leVehicule Véhicule auquel ajouter le kilométrage.
 * @param laMarque Marque du véhicule à ajouter.
 * @param leModele Modèle du véhicule à ajouter.
 */
PROCEDURE ajoutHistoKm(leVehicule IN HISTO_KM.histoKm_numVehicule%TYPE, leKm IN HISTO_KM.HistoKm_nbKm%TYPE)
IS
BEGIN
  INSERT INTO HISTO_KM VALUES(SYSDATE(), leVehicule, leKm);
  print('Le kilométrage a bien été rajouté');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END ajoutHistoKm;

-------------------------------------- Lecon ------------------------------------------------

/**
 * Ajout d'une leçon dans la base de données.
 * @param laDate Date de la leçon à ajouter.
 * @param leVehicule Numéro du véhicule utilisé pour la leçon à ajouter.
 * @param leSalarie Salarié s'occupant de la leçon à ajouter.
 * @param lEleve Eleve participant à la leçon.
 * @param leType Type de la leçon. 
 */
PROCEDURE ajoutLecon(laDate IN LECON.lecon_date%TYPE, leVehicule IN LECON.lecon_vehicule%TYPE,
						 leSalarie IN LECON.lecon_salarie%TYPE, lEleve IN LECON.lecon_eleve%TYPE,
						 leType IN LECON.lecon_type%TYPE)
IS
BEGIN
  INSERT INTO LECON VALUES(seq_lecon.NextVal, laDate, leVehicule, leSalarie, lEleve, leType);
  print('La leçon a bien été rajoutée');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END ajoutLecon;

/**
 * Suppression d'une leçon de la base de données.
 * @param leNum Numéro de la leçon à supprimer.
 */
PROCEDURE suppressionLecon(leNum IN LECON.lecon_num%TYPE)
IS
BEGIN 
  DELETE FROM LECON WHERE lecon_num = leNum;
  print('Suppression effectuée avec succès');

END suppressionLecon;



/**
 * Modification d'une leçon dans la base de données.
 * @param leNum Numéro de la lecon à modifier.
 * @param laDate Date de la leçon à modifier.
 * @param leVehicule Numéro du véhicule utilisé pour la leçon à modifier.
 * @param leSalarie Salarié s'occupant de la leçon à modifier.
 * @param lEleve Eleve participant à la leçon.
 * @param leType Type de la leçon. 
 */
PROCEDURE modifLecon(leNum IN LECON.lecon_num%TYPE, laDate IN LECON.lecon_date%TYPE, 
						 leVehicule IN LECON.lecon_vehicule%TYPE, leSalarie IN LECON.lecon_salarie%TYPE, 
						 lEleve IN LECON.lecon_eleve%TYPE, leType IN LECON.lecon_type%TYPE)
IS
DECLARE
  req CLOB;
BEGIN
	if (laDate is not NULL)
		req = req || 'lecon_date = ' || laDate;
	if (leVehicule is not NULL)
		req = req || 'AND lecon_vehicule = ' || leVehicule;
	if (leSalarie is not NULL)
		req = req || 'AND lecon_salarie = ' || leSalarie;
	if (lEleve is not NULL)
		req = req || 'AND lecon_eleve = ' || lEleve;
	if (leType is not NULL)
		req = req || 'AND lecon_type = ' || leType;

  ALTER TABLE LECON 
  MODIFY SET || req ||
  WHERE lecon_num = leNum;
  print('La leçon a bien été modifié');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END modifLecon;


----------------------------------- Salarié ---------------------------------

/**
 * Ajout d'un salarié dans la base de données.
 * @param leNom Nom du salarié à ajouter.
 * @param lePrenom Prénom du salarié à ajouter.
 * @param leSurnom Surnom du salarié à ajouter.
 * @param lAdr Adresse du salarié à ajouter.
 * @param laVille Nom de la ville du salarié à ajouter. 
 * @param leCp Code postal de la ville du salarié à ajouter.
 * @param leTel Numéro de téléphone du salarié à ajouter.
 * @param leVehicule Véhicule dont s'occupe le salarié à ajouter.
 * @param lePoste Poste du salarié à ajouter.
 */
PROCEDURE ajoutSalarie(leNom IN SALARIE.salarie_nom%TYPE, lePrenom IN SALARIE.salarie_prenom%TYPE,
						   leSurnom IN SALARIE.salarie_surnom%TYPE, lAdr IN SALARIE.salarie_adr%TYPE,
						   laVille IN SALARIE.salarie_ville%TYPE, leCp IN SALARIE.salarie_cp%TYPE,
						   leTel IN SALARIE.salarie_tel%TYPE, leVehicule IN SALARIE.salarie_vehicule%TYPE,
						   lePoste IN SALARIE.salarie_poste%TYPE)
IS
BEGIN
  INSERT INTO SALARIE VALUES(seq_salarie.NextVal, leNom, lePrenom, leSurnom, lAdr, laVille, leCp, leTel, lePoste, leVehicule);
  print('Le salarié a bien été rajouté');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END ajoutSalarie;

/**
 * Suppression d'un salarié de la base de données.
 * @param lId Id du salarié à supprimer.
 */
PROCEDURE suppressionSalarie(lId IN SALARIE.salarie_id%TYPE)
IS
BEGIN 
  DELETE FROM SALARIE WHERE salarie_id = lId;
  print('Suppression effectuée avec succès');

END suppressionSalarie;



/**
 * Modification d'un salarié dans la base de données.
 * @param lId Id du salarié à modifier
 * @param leNom Nom du salarié à modifier.
 * @param lePrenom Prénom du salarié à modifier.
 * @param leSurnom Surnom du salarié à modifier.
 * @param lAdr Adresse du salarié à modifier.
 * @param laVille Nom de la ville du salarié à modifier. 
 * @param leCp Code postal de la ville du salarié à modifier.
 * @param leTel Numéro de téléphone du salarié à modifier.
 * @param leVehicule Véhicule dont s'occupe le salarié à modifier.
 * @param lePoste Poste du salarié à modifier.
 */
PROCEDURE modifSalarie(lId IN SALARIE.salarie_id%TYPE, leNom IN SALARIE.salarie_nom%TYPE,
				       lePrenom IN SALARIE.salarie_prenom%TYPE, leSurnom IN SALARIE.salarie_surnom%TYPE, 
				       lAdr IN SALARIE.salarie_adr%TYPE, laVille IN SALARIE.salarie_ville%TYPE, 
				       leCp IN SALARIE.salarie_cp%TYPE, leTel IN SALARIE.salarie_tel%TYPE, 
				       leVehicule IN SALARIE.salarie_vehicule%TYPE, lePoste IN SALARIE.salarie_poste%TYPE)
IS
DECLARE
  req CLOB;
BEGIN
	if (leNom is not NULL)
		req = req || 'salarie_nom = ' || leNom;
	if (lePrenom is not NULL)
		req = req || 'AND salarie_prenom = ' || lePrenom;
	if (leSurnom is not NULL)
		req = req || 'AND salarie_surnom = ' || leSurnom;
	if (lAdr is not NULL)
		req = req || 'AND salarie_adr = ' || lAdr;
	if (laVille is not NULL)
		req = req || 'AND salarie_ville = ' || laVille;
	if (leCp is not NULL)
		req = req || 'AND salarie_cp = ' || leCp;
	if (leTel is not NULL)
		req = req || 'AND salarie_tel = ' || leTel;
	if (leVehicule is not NULL)
		req = req || 'AND salarie_vehicule = ' || leVehicule;
	if (lePoste is not NULL)
		req = req || 'AND salarie_poste = ' || lePoste;

  ALTER TABLE SALARIE 
  MODIFY SET || req ||
  WHERE salarie_id = lId;
  print('Le salarié a bien été modifié');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END modifSalarie;

--------------------------------- Eleve ---------------------------------------


/**
 * Ajout d'un eleve dans la base de données.
 * @param leNom Nom de l'eleve à ajouter.
 * @param lePrenom Prénom de l'eleve à ajouter.
 * @param leSurnom Surnom de l'eleve à ajouter.
 * @param lAdr Adresse de l'eleve à ajouter.
 * @param laVille Nom de la ville de l'eleve à ajouter. 
 * @param leCp Code postal de la ville de l'eleve à ajouter.
 * @param leTel Numéro de téléphone de l'eleve à ajouter.
 * @param laDateNaiss Date de naissance de l'eleve à ajouter.
 * @param leSalarie Salarie auquel est affilié l'eleve à ajouter.
 * @param leCli Client qui s'occupe de payer pour l'eleve à ajouter.
 */
PROCEDURE ajoutEleve(leNom IN ELEVE.eleve_nom%TYPE, lePrenom IN ELEVE.eleve_prenom%TYPE,
					 lAdr IN ELEVE.eleve_adr%TYPE, laVille IN ELEVE.eleve_ville%TYPE, 
					 leCp IN ELEVE.eleve_cp%TYPE, leTel IN ELEVE.eleve_tel%TYPE, 
					 laDateNaiss IN ELEVE.eleve_dateNaiss%TYPE, leSalarie IN ELEVE.eleve_salarie%TYPE,
					 leCli IN ELEVE.eleve_cli%TYPE)
IS
BEGIN
  INSERT INTO ELEVE VALUES(seq_eleve.NextVal, leNom, lePrenom, lAdr, laVille, leCp, leTel, laDateNaiss, leSalarie, leCli);
  print('L''eleve a bien été rajouté');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END ajoutEleve;

/**
 * Suppression d'un eleve de la base de données.
 * @param lId Id de l'eleve à supprimer.
 */
PROCEDURE suppressionEleve(lId IN ELEVE.eleve_id%TYPE)
IS
BEGIN 
  DELETE FROM ELEVE WHERE eleve_id = lId;
  print('Suppression effectuée avec succès');

END suppressionEleve;



/**
 * Modification d'un eleve dans la base de données.
 * @param lId Id de l'eleve à modifier
 * @param leNom Nom de l'eleve à modifier.
 * @param lePrenom Prénom de l'eleve à modifier.
 * @param leSurnom Surnom de l'eleve à modifier.
 * @param lAdr Adresse de l'eleve à modifier.
 * @param laVille Nom de la ville de l'eleve à modifier. 
 * @param leCp Code postal de la ville de l'eleve à modifier.
 * @param leTel Numéro de téléphone de l'eleve à modifier.
 * @param laDateNaiss Date de naissance de l'eleve à modifier.
 * @param leSalarie Salarie auquel est affilié l'eleve à modifier.
 * @param leCli Client qui s'occupe de payer pour l'eleve à modifier.
 */
PROCEDURE modifEleve(lId IN ELEVE.eleve_id, leNom IN ELEVE.eleve_nom%TYPE, 
				     lePrenom IN ELEVE.eleve_prenom%TYPE, lAdr IN ELEVE.eleve_adr%TYPE, 
					 laVille IN ELEVE.eleve_ville%TYPE, leCp IN ELEVE.eleve_cp%TYPE, 
					 leTel IN ELEVE.eleve_tel%TYPE, laDateNaiss IN ELEVE.eleve_dateNaiss%TYPE, 
					 leSalarie IN ELEVE.eleve_salarie%TYPE, leCli IN ELEVE.eleve_cli%TYPE)
IS
DECLARE
  req CLOB;
BEGIN
	if (leNom is not NULL)
		req = req || 'eleve_nom = ' || leNom;
	if (lePrenom is not NULL)
		req = req || 'AND eleve_prenom = ' || lePrenom;	
	if (lAdr is not NULL)
		req = req || 'AND eleve_adr = ' || lAdr;
	if (laVille is not NULL)
		req = req || 'AND eleve_ville = ' || laVille;
	if (leCp is not NULL)
		req = req || 'AND eleve_cp = ' || leCp;
	if (leTel is not NULL)
		req = req || 'AND eleve_tel = ' || leTel;
	if (laDateNaiss is not NULL)
		req = req || 'AND eleve_dateNaiss = ' || laDateNaiss;
	if (leSalarie is not NULL)
		req = req || 'AND eleve_salarie = ' || leSalarie;
	if (leCli is not NULL)
		req = req || 'AND eleve_cli = ' || leCli;

  ALTER TABLE ELEVE 
  MODIFY SET || req ||
  WHERE eleve_id = lId;
  print('L''eleve a bien été modifié');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END modifEleve;

---------------------------------- Client ----------------------------------


/**
 * Ajout d'un client dans la base de données.
 * @param leNom Nom du client à ajouter.
 * @param lePrenom Prénom du client à ajouter.
 * @param leSurnom Surnom du client à ajouter.
 * @param lAdr Adresse du client à ajouter.
 * @param laVille Nom de la ville du client à ajouter. 
 * @param leCp Code postal de la ville du client à ajouter.
 * @param leTel Numéro de téléphone du client à ajouter.
 * @param laDateNaiss Date de naissance du client à ajouter. 
 */
PROCEDURE ajoutCli(leNom IN CLIENT.client_nom%TYPE, lePrenom IN CLIENT.client_prenom%TYPE,
				   lAdr IN CLIENT.client_adr%TYPE, laVille IN CLIENT.client_ville%TYPE, 
				   leCp IN CLIENT.client_cp%TYPE, leTel IN CLIENT.client_tel%TYPE, 
				   laDateNaiss IN CLIENT.client_dateNaiss%TYPE)
					 
IS
BEGIN
  INSERT INTO CLIENT VALUES(seq_client.NextVal, leNom, lePrenom, lAdr, laVille, leCp, leTel, laDateNaiss);
  print('Le client a bien été rajouté');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END ajoutCli;

/**
 * Suppression d'un client de la base de données.
 * @param lId Id du client à supprimer.
 */
PROCEDURE suppressionCli(lId IN CLIENT.client_id%TYPE)
IS
BEGIN 
  DELETE FROM CLIENT WHERE client_id = lId;
  print('Suppression effectuée avec succès');

END suppressionCli;



/**
 * Modification d'un client dans la base de données.
 * @param lId Id du client à modifier
 * @param leNom Nom du client à modifier.
 * @param lePrenom Prénom du client à modifier.
 * @param leSurnom Surnom du client à modifier.
 * @param lAdr Adresse du client à modifier.
 * @param laVille Nom de la ville du client à modifier. 
 * @param leCp Code postal de la ville du client à modifier.
 * @param leTel Numéro de téléphone du client à modifier.
 * @param laDateNaiss Date de naissance du client à modifier. 
 */
PROCEDURE modifCli(lId IN CLIENT.client_id, leNom IN CLIENT.client_nom%TYPE, 
				   lePrenom IN CLIENT.client_prenom%TYPE, lAdr IN CLIENT.client_adr%TYPE, 
				   laVille IN CLIENT.client_ville%TYPE, leCp IN CLIENT.client_cp%TYPE, 
				   leTel IN CLIENT.client_tel%TYPE, laDateNaiss IN CLIENT.client_dateNaiss%TYPE) 
				   
IS
DECLARE
  req CLOB;
BEGIN
	if (leNom is not NULL)
		req = req || 'client_nom = ' || leNom;
	if (lePrenom is not NULL)
		req = req || 'AND client_prenom = ' || lePrenom;	
	if (lAdr is not NULL)
		req = req || 'AND client_adr = ' || lAdr;
	if (laVille is not NULL)
		req = req || 'AND client_ville = ' || laVille;
	if (leCp is not NULL)
		req = req || 'AND client_cp = ' || leCp;
	if (leTel is not NULL)
		req = req || 'AND client_tel = ' || leTel;
	if (laDateNaiss is not NULL)
		req = req || 'AND client_dateNaiss = ' || laDateNaiss;	

  ALTER TABLE CLIENT 
  MODIFY SET || req ||
  WHERE client_id = lId;
  print('Le client a bien été modifié');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END modifCli;


---------------------------------- Examen ------------------------------------

/**
 * Ajout d'un examen dans la base de données.
 * @param laDate Date de l'examen à ajouter.
 * @param leType Type de l'examen à ajouter.
 */
PROCEDURE ajoutExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE)
IS
BEGIN
  INSERT INTO EXAMEN VALUES(laDate, leType);
  print('L''examen a bien été rajouté');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END ajoutExamen;

/**
 * Suppression d'un examen de la base de données.
 * @param laDate Date de l'examen à supprimer.
 * @param leType Type de l'examen à supprimer.
 */
PROCEDURE suppressionExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE)
IS
BEGIN 
  DELETE FROM EXAMEN WHERE examen_date = laDate AND examen_type = leType;
  print('Suppression effectuée avec succès');

END suppressionExamen;



--------------------------------- Formule ------------------------------------------

/**
 * Ajout d'une formule dans la base de données.
 * @param leNbLecon Le nombre de leçon de la formule à ajouter.
 * @param lePrix de la formule à ajouter.
 * @param lePrixTicket Le prix des tickets en fonction de la formule à ajouter.
 */
PROCEDURE ajoutFormule(leNbLecon IN FORMULE.formule_nbLeconConduite%TYPE, lePrix IN FORMULE.formule_prix%TYPE, 
					   lePrixTicket IN FORMULE.formule_ticketPrix%TYPE)
IS
BEGIN
  INSERT INTO FORMULE VALUES(seq_formule.NextVal, leNbLecon, lePrix, lePrixTicket);
  print('La formule a bien été rajoutée');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END ajoutFormule;

/**
 * Suppression d'une formule de la base de données.
 * @param leNum Numéro de la formule à supprimer. 
 */
PROCEDURE suppressionFormule(leNum IN formule_num%TYPE)
IS
BEGIN 
  DELETE FROM FORMULE WHERE formule_num = leNum;
  print('Suppression effectuée avec succès');

END suppressionFormule;


/**
 * Modification d'une formule dans la base de données.
 * @param leNum Numéro de la formule à modifier.
 * @param leNbLecon Le nombre de leçon de la formule à modifier.
 * @param lePrix de la formule à modifier.
 * @param lePrixTicket Le prix des tickets en fonction de la formule à modifier.
 */
PROCEDURE modifFormule(leNum IN FORMULE.formule_num%TYPE, leNbLecon IN FORMULE.formule_nbLeconConduite%TYPE, 
					   lePrix IN FORMULE.formule_prix%TYPE, lePrixTicket IN FORMULE.formule_ticketPrix%TYPE)
IS
DECLARE
  req CLOB;
BEGIN
	if (leNbLecon is not NULL)
		req = req || 'formule_nbLeconConduite = ' || leNbLecon;
	if (lePrix is not NULL)
		req = req || 'AND lecon_prix = ' || lePrix;
	if (lePrixTicket is not NULL)
		req = req || 'AND lecon_ticketPrix = ' || lePrixTicket;

  ALTER TABLE FORMULE 
  MODIFY SET || req ||
  WHERE formule_num = leNum;
  print('La formule a bien été modifiée');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END modifFormule;

----------------------------------- Autre ----------------------------------------

/**
 * Affichage d'un message.
 * @param message Message à afficher.
 */
PROCEDURE print(message IN VARCHAR(50))
IS
BEGIN
  dbms_output.put_line(message);
END print;

----------------------------------- FONCTIONS ------------------------------------

----------------------------------- Véhicule -------------------------------------

/**
 * Liste des véhicules de la base de données
 * @return Tableau des véhicules de la base de données.
 */
FUNCTION listeVehicule RETURN OBJECT
IS
DECLARE
  -- Déclarations de types
  
  BEGIN
  -- Remontée des données
  SELECT vehicule_num, vehicule_immatriculation, vehicule_marque, vehicule_modele
  BULK COLLECT INTO vehicules
  FROM VEHICULE
  ORDER BY vehicule_num;

  RETURN vehicules

 END listeVehicule;




END autoEcole;
