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
BEGIN
	
  UPDATE VEHICULE SET 
  vehicule_immatriculation = lImmatriculation,
  vehicule_marque = laMarque,
  vehicule_modele = lemodele
  WHERE vehicule_num = leNum;
  print('Le véhicule a bien été modifié');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END modifVehicule;

FUNCTION getCurVehicule RETURN VEHICULE.vehicule_num%TYPE
IS
   idVehicule VEHICULE.vehicule_num%TYPE;
 BEGIN
   SELECT seq_vehicule.currval INTO idVehicule FROM dual;
   
 RETURN idVehicule;
 
END getCurVehicule;


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
BEGIN
	
  UPDATE LECON SET 
  lecon_num = leNum,
  lecon_date = laDate,
  lecon_vehicule = leVehicule,
  lecon_salarie = leSalarie,
  lecon_eleve = lEleve,
  lecon_type = leType
  WHERE lecon_num = leNum;
  print('La leçon a bien été modifié');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END modifLecon;

FUNCTION getCurLecon RETURN LECON.lecon_num%TYPE
IS
   idLecon LECON.lecon_num%TYPE;
 BEGIN
   SELECT seq_lecon.currval INTO idLecon FROM dual;
   
 RETURN idLecon;
 
END getCurLecon;

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
BEGIN
  
  UPDATE SALARIE SET 
  salarie_nom = leNom,
  salarie_prenom = lePrenom,
  salarie_surnom = leSurnom,
  salarie_adr = lAdr,
  salarie_ville = laVille,
  salarie_cp = leCp,
  salarie_tel = leTel,
  salarie_vehicule = leVehicule,
  salarie_poste = lePoste
  WHERE salarie_id = lId;
  
  print('Salarié modifié');
  
END modifSalarie;

FUNCTION getCurSalarie RETURN SALARIE.salarie_id%TYPE
IS
   idSalarie SALARIE.salarie_id%TYPE;
 BEGIN
   SELECT seq_salarie.currval INTO idSalarie FROM dual;
   
 RETURN idSalarie;
 
END getCurSalarie;

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
PROCEDURE modifEleve(lId IN ELEVE.eleve_id%TYPE, leNom IN ELEVE.eleve_nom%TYPE, 
					     lePrenom IN ELEVE.eleve_prenom%TYPE, lAdr IN ELEVE.eleve_adr%TYPE, 
						 laVille IN ELEVE.eleve_ville%TYPE, leCp IN ELEVE.eleve_cp%TYPE, 
						 leTel IN ELEVE.eleve_tel%TYPE, laDateNaiss IN ELEVE.eleve_dateNaiss%TYPE,
						 leSalarie IN ELEVE.eleve_salarie%TYPE, leCli IN ELEVE.eleve_cli%TYPE)
IS
BEGIN
	

  UPDATE ELEVE SET 
  eleve_nom = leNom,
  eleve_prenom = lePrenom,
  eleve_adr = lAdr,
  eleve_ville = laVille,
  eleve_cp = leCp,
  eleve_tel = leTel,
  eleve_dateNaiss = laDateNaiss,
  eleve_salarie = leSalarie,
  eleve_cli = leCli
  WHERE eleve_id = lId;
  print('L''eleve a bien été modifié');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END modifEleve;

FUNCTION getCurEleve RETURN ELEVE.eleve_id%TYPE
IS
   idEleve ELEVE.eleve_id%TYPE;
 BEGIN
   SELECT seq_eleve.currval INTO idEleve FROM dual;
   
 RETURN idEleve;
 
END getCurEleve;

FUNCTION sommeLeconEleve(lId IN ELEVE.eleve_id%TYPE) RETURN FLOAT
IS
BEGIN

RETURN 0;

END sommeLeconEleve;

FUNCTION dateCodeEleve(lId IN ELEVE.eleve_id%TYPE) RETURN DATE
IS
BEGIN

RETURN '10/10/2016';

END dateCodeEleve;

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
PROCEDURE ajoutClient(leNom IN CLIENT.client_nom%TYPE, lePrenom IN CLIENT.client_prenom%TYPE,
						 lAdr IN CLIENT.client_adr%TYPE, laVille IN CLIENT.client_ville%TYPE, 
						 leCp IN CLIENT.client_cp%TYPE, leTel IN CLIENT.client_tel%TYPE, 
						 laDateNaiss IN CLIENT.client_dateNaiss%TYPE)
					 
IS
BEGIN
  INSERT INTO CLIENT VALUES(seq_client.NextVal, leNom, lePrenom, lAdr, laVille, leCp, leTel, laDateNaiss);
  print('Le client a bien été rajouté');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END ajoutClient;

/**
 * Suppression d'un client de la base de données.
 * @param lId Id du client à supprimer.
 */
PROCEDURE suppressionClient(lId IN CLIENT.client_id%TYPE)
IS
BEGIN 
  DELETE FROM CLIENT WHERE client_id = lId;
  print('Suppression effectuée avec succès');

END suppressionClient;



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
PROCEDURE modifClient(lId IN CLIENT.client_id%TYPE, leNom IN CLIENT.client_nom%TYPE, 
				   lePrenom IN CLIENT.client_prenom%TYPE, lAdr IN CLIENT.client_adr%TYPE, 
				   laVille IN CLIENT.client_ville%TYPE, leCp IN CLIENT.client_cp%TYPE, 
				   leTel IN CLIENT.client_tel%TYPE, laDateNaiss IN CLIENT.client_dateNaiss%TYPE) 
				   
IS
BEGIN
	
  UPDATE CLIENT SET 
  client_nom = leNom,
  client_prenom = lePrenom,
  client_adr = lAdr,
  client_ville = laVille,
  client_cp = leCp,
  client_tel = leTel,
  client_dateNaiss = laDateNaiss
  WHERE client_id = lId;
  print('Le client a bien été modifié');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END modifClient;

FUNCTION getCurClient RETURN CLIENT.client_id%TYPE
IS
   idCli CLIENT.client_id%TYPE;
 BEGIN
   SELECT seq_client.currval INTO idCli FROM dual;
   
 RETURN idCli;
 
END getCurClient;


FUNCTION sommeAPayerClient(lId IN CLIENT.client_id%TYPE, lIdE IN ELEVE.eleve_id%TYPE) RETURN FLOAT
IS 
BEGIN

RETURN 0;

END sommeAPayerClient;

FUNCTION sommeAchatClient(lId IN CLIENT.client_id%TYPE, lIdE IN ELEVE.eleve_id%TYPE) RETURN FLOAT
IS 
BEGIN

RETURN 0;

END sommeAchatClient;

FUNCTION verifPaiementClient(lId IN CLIENT.client_id%TYPE) RETURN FLOAT
IS 
BEGIN

RETURN 0.0;

END verifPaiementClient;	

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
PROCEDURE suppressionFormule(leNum IN FORMULE.formule_num%TYPE)
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
BEGIN
	
  UPDATE FORMULE SET 
  formule_nbLeconConduite = leNbLecon,
  formule_prix = lePrix,
  formule_ticketPrix = lePrixTicket
  WHERE formule_num = leNum;
  print('La formule a bien été modifiée');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END modifFormule;

FUNCTION getCurFormule RETURN FORMULE.formule_num%TYPE
IS
   idFormule FORMULE.formule_num%TYPE;
 BEGIN
   SELECT seq_formule.currval INTO idFormule FROM dual;
   
 RETURN idFormule;
 
END getCurFormule;

----------------------------------- Ville ----------------------------------------

PROCEDURE ajoutVille(laVille IN VILLE.ville_nom%TYPE, leCp IN VILLE.ville_cp%TYPE)
 IS 
 BEGIN
   INSERT INTO VILLE VALUES(laVille, leCp);
   
   print('ville ajoutée');
   
 END ajoutVille;
 
 PROCEDURE suppressionVille(laVille IN VILLE.ville_nom%TYPE, leCp IN VILLE.ville_cp%TYPE)
 IS
 BEGIN
   DELETE FROM VILLE WHERE ville_nom = laVille AND ville_cp = leCp;
   
   print('ville supprimée');
   
 END suppressionVille;
 
----------------------------------- Poste ----------------------------------------

PROCEDURE ajoutPoste(leNom IN POSTE.poste_nom%TYPE)
 IS 
 BEGIN
   INSERT INTO POSTE VALUES(seq_poste.nextval, leNom);
   
   print('poste ajouté');
   
 END ajoutPoste;
 
 PROCEDURE suppressionPoste(leNum IN POSTE.poste_num%TYPE)
 IS
 BEGIN
   DELETE FROM POSTE WHERE poste_num = leNum;
   
   print('poste supprimé');
   
 END suppressionPoste;

FUNCTION getCurPoste RETURN POSTE.poste_num%TYPE
IS
   idPoste POSTE.poste_num%TYPE;
 BEGIN
   SELECT seq_poste.currval INTO idPoste FROM dual;
   
 RETURN idPoste;
 
END getCurPoste;

----------------------------------- Type -------------------------------------------

PROCEDURE ajoutType(leNom IN TYPEL.typel_nom%TYPE)
 IS 
 BEGIN
   INSERT INTO TYPEL VALUES(seq_type.nextval, leNom);
   
   print('type ajouté');
   
 END ajoutType;
 
PROCEDURE suppressionType(leNum IN TYPEL.typel_num%TYPE)
 IS
 BEGIN
   DELETE FROM TYPEL WHERE typel_num = leNum;
   
   print('type supprimé');
   
 END suppressionType;	
	
	
FUNCTION getCurType RETURN TYPEL.typel_num%TYPE
IS
   idType TYPEL.typel_num%TYPE;
 BEGIN
   SELECT seq_type.currval INTO idType FROM dual;
   
 RETURN idType;
 
END getCurType;
 
----------------------------------- Autre ----------------------------------------

/**
 * Affichage d'un message.
 * @param message Message à afficher.
 */
PROCEDURE print(message IN VARCHAR)
IS
BEGIN
  dbms_output.put_line(message);
END print;


END autoEcole;