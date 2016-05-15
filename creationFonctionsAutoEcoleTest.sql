create or replace 
PACKAGE BODY autoEcole AS

----------------------------------- PROCEDURES --------------------------------


------------------------------------ V�hicule ---------------------------------
/**
 * Ajout d'un vehicule dans la base de donn�es.
 * @param lImmatriculation Immatriculation du v�hicule � ajouter.
 * @param laMarque Marque du v�hicule � ajouter.
 * @param leModele Mod�le du v�hicule � ajouter.
 */
PROCEDURE ajoutVehicule(lImmatriculation IN VEHICULE.vehicule_immatriculation%TYPE,
						laMarque IN VEHICULE.vehicule_marque%TYPE, leModele IN VEHICULE.vehicule_modele%TYPE)
IS
BEGIN
  INSERT INTO VEHICULE VALUES(seq_vehicule.NextVal, lImmatriculation, laMarque, leModele);
  print('Le v�hicule a bien �t� rajout�');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est d�j� existant.');
END ajoutVehicule;

/**
 * Suppression d'un v�hicule de la base de donn�es.
 * @param leNum Num�ro du v�hicule � supprimer.
 */
PROCEDURE suppressionVehicule(leNum IN VEHICULE.vehicule_num%TYPE)
IS
BEGIN 
  DELETE FROM VEHICULE WHERE vehicule_num = leNum;
  print('Suppression effectu�e avec succ�s');

END suppressionVehicule;



/**
 * Modification d'un vehicule dans la base de donn�es.
 * @param leNum Num�ro du v�hicule � modifier.
 * @param lImmatriculation Immatriculation du v�hicule � ajouter.
 * @param laMarque Marque du v�hicule � ajouter.
 * @param leModele Mod�le du v�hicule � ajouter.
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
  print('Le v�hicule a bien �t� modifi�');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est d�j� existant.');
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
 * Ajout du kilom�trage d'un vehicule dans la base de donn�es.
 * @param leVehicule V�hicule auquel ajouter le kilom�trage.
 * @param laMarque Marque du v�hicule � ajouter.
 * @param leModele Mod�le du v�hicule � ajouter.
 */
PROCEDURE ajoutHistoKm(leVehicule IN HISTO_KM.histoKm_numVehicule%TYPE, leKm IN HISTO_KM.HistoKm_nbKm%TYPE)
IS
BEGIN
  INSERT INTO HISTO_KM VALUES(SYSDATE(), leVehicule, leKm);
  print('Le kilom�trage a bien �t� rajout�');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est d�j� existant.');
END ajoutHistoKm;

-------------------------------------- Lecon ------------------------------------------------

/**
 * Ajout d'une le�on dans la base de donn�es.
 * @param laDate Date de la le�on � ajouter.
 * @param leVehicule Num�ro du v�hicule utilis� pour la le�on � ajouter.
 * @param leSalarie Salari� s'occupant de la le�on � ajouter.
 * @param lEleve Eleve participant � la le�on.
 * @param leType Type de la le�on. 
 */
PROCEDURE ajoutLecon(laDate IN LECON.lecon_date%TYPE, leVehicule IN LECON.lecon_vehicule%TYPE,
						 leSalarie IN LECON.lecon_salarie%TYPE, lEleve IN LECON.lecon_eleve%TYPE,
						 leType IN LECON.lecon_type%TYPE)
IS
BEGIN
  INSERT INTO LECON VALUES(seq_lecon.NextVal, laDate, leVehicule, leSalarie, lEleve, leType);
  print('La le�on a bien �t� rajout�e');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est d�j� existant.');
END ajoutLecon;

/**
 * Suppression d'une le�on de la base de donn�es.
 * @param leNum Num�ro de la le�on � supprimer.
 */
PROCEDURE suppressionLecon(leNum IN LECON.lecon_num%TYPE)
IS
BEGIN 
  DELETE FROM LECON WHERE lecon_num = leNum;
  print('Suppression effectu�e avec succ�s');

END suppressionLecon;

/**
 * Modification d'une le�on dans la base de donn�es.
 * @param leNum Num�ro de la lecon � modifier.
 * @param laDate Date de la le�on � modifier.
 * @param leVehicule Num�ro du v�hicule utilis� pour la le�on � modifier.
 * @param leSalarie Salari� s'occupant de la le�on � modifier.
 * @param lEleve Eleve participant � la le�on.
 * @param leType Type de la le�on. 
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
  print('La le�on a bien �t� modifi�');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est d�j� existant.');
END modifLecon;

FUNCTION getCurLecon RETURN LECON.lecon_num%TYPE
IS
   idLecon LECON.lecon_num%TYPE;
 BEGIN
   SELECT seq_lecon.currval INTO idLecon FROM dual;
   
 RETURN idLecon;
 
END getCurLecon;

----------------------------------- Salari� ---------------------------------

/**
 * Ajout d'un salari� dans la base de donn�es.
 * @param leNom Nom du salari� � ajouter.
 * @param lePrenom Pr�nom du salari� � ajouter.
 * @param leSurnom Surnom du salari� � ajouter.
 * @param lAdr Adresse du salari� � ajouter.
 * @param laVille Nom de la ville du salari� � ajouter. 
 * @param leCp Code postal de la ville du salari� � ajouter.
 * @param leTel Num�ro de t�l�phone du salari� � ajouter.
 * @param leVehicule V�hicule dont s'occupe le salari� � ajouter.
 * @param lePoste Poste du salari� � ajouter.
 */
PROCEDURE ajoutSalarie(leNom IN SALARIE.salarie_nom%TYPE, lePrenom IN SALARIE.salarie_prenom%TYPE,
						   leSurnom IN SALARIE.salarie_surnom%TYPE, lAdr IN SALARIE.salarie_adr%TYPE,
						   laVille IN SALARIE.salarie_ville%TYPE, leCp IN SALARIE.salarie_cp%TYPE,
						   leTel IN SALARIE.salarie_tel%TYPE, leVehicule IN SALARIE.salarie_vehicule%TYPE,
						   lePoste IN SALARIE.salarie_poste%TYPE)
IS
BEGIN
  INSERT INTO SALARIE VALUES(seq_salarie.NextVal, leNom, lePrenom, leSurnom, lAdr, laVille, leCp, leTel, lePoste, leVehicule);
  print('Le salari� a bien �t� rajout�');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est d�j� existant.');
END ajoutSalarie;

/**
 * Suppression d'un salari� de la base de donn�es.
 * @param lId Id du salari� � supprimer.
 */
PROCEDURE suppressionSalarie(lId IN SALARIE.salarie_id%TYPE)
IS
BEGIN 
  DELETE FROM SALARIE WHERE salarie_id = lId;
  print('Suppression effectu�e avec succ�s');

END suppressionSalarie;



/**
 * Modification d'un salari� dans la base de donn�es.
 * @param lId Id du salari� � modifier
 * @param leNom Nom du salari� � modifier.
 * @param lePrenom Pr�nom du salari� � modifier.
 * @param leSurnom Surnom du salari� � modifier.
 * @param lAdr Adresse du salari� � modifier.
 * @param laVille Nom de la ville du salari� � modifier. 
 * @param leCp Code postal de la ville du salari� � modifier.
 * @param leTel Num�ro de t�l�phone du salari� � modifier.
 * @param leVehicule V�hicule dont s'occupe le salari� � modifier.
 * @param lePoste Poste du salari� � modifier.
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
  
  print('Salari� modifi�');
  
END modifSalarie;

FUNCTION getCurSalarie RETURN SALARIE.salarie_id%TYPE
IS
   idSalarie SALARIE.salarie_id%TYPE;
 BEGIN
   SELECT seq_salarie.currval INTO idSalarie FROM dual;
   
 RETURN idSalarie;
 
END getCurSalarie;

--------------------------------- Login ---------------------------------------

PROCEDURE ajoutLogin(lId IN LOGIN.login_id%TYPE, lePassword IN LOGIN.login_password%TYPE)
IS
BEGIN
  INSERT INTO LOGIN VALUES(lId, lePassword);
  print('Le login a bien �t� rajout�');

END ajoutLogin;


PROCEDURE suppressionLogin(lId IN LOGIN.login_id%TYPE)
IS
BEGIN 
  DELETE FROM LOGIN WHERE login_id = lId;
  print('Suppression effectu�e avec succ�s');

END suppressionLogin;
--------------------------------- Eleve ---------------------------------------


/**
 * Ajout d'un eleve dans la base de donn�es.
 * @param leNom Nom de l'eleve � ajouter.
 * @param lePrenom Pr�nom de l'eleve � ajouter.
 * @param leSurnom Surnom de l'eleve � ajouter.
 * @param lAdr Adresse de l'eleve � ajouter.
 * @param laVille Nom de la ville de l'eleve � ajouter. 
 * @param leCp Code postal de la ville de l'eleve � ajouter.
 * @param leTel Num�ro de t�l�phone de l'eleve � ajouter.
 * @param laDateNaiss Date de naissance de l'eleve � ajouter.
 * @param leSalarie Salarie auquel est affili� l'eleve � ajouter.
 * @param leCli Client qui s'occupe de payer pour l'eleve � ajouter.
 */
PROCEDURE ajoutEleve(leNom IN ELEVE.eleve_nom%TYPE, lePrenom IN ELEVE.eleve_prenom%TYPE,
					 lAdr IN ELEVE.eleve_adr%TYPE, laVille IN ELEVE.eleve_ville%TYPE, 
					 leCp IN ELEVE.eleve_cp%TYPE, leTel IN ELEVE.eleve_tel%TYPE, 
					 laDateNaiss IN ELEVE.eleve_dateNaiss%TYPE, leSalarie IN ELEVE.eleve_salarie%TYPE,
					 leCli IN ELEVE.eleve_cli%TYPE)
IS
BEGIN
  INSERT INTO ELEVE VALUES(seq_eleve.NextVal, leNom, lePrenom, lAdr, laVille, leCp, leTel, laDateNaiss, leSalarie, leCli);
  print('L''eleve a bien �t� rajout�');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est d�j� existant.');
END ajoutEleve;

/**
 * Suppression d'un eleve de la base de donn�es.
 * @param lId Id de l'eleve � supprimer.
 */
PROCEDURE suppressionEleve(lId IN ELEVE.eleve_id%TYPE)
IS
BEGIN 
  DELETE FROM ELEVE WHERE eleve_id = lId;
  print('Suppression effectu�e avec succ�s');

END suppressionEleve;



/**
 * Modification d'un eleve dans la base de donn�es.
 * @param lId Id de l'eleve � modifier
 * @param leNom Nom de l'eleve � modifier.
 * @param lePrenom Pr�nom de l'eleve � modifier.
 * @param leSurnom Surnom de l'eleve � modifier.
 * @param lAdr Adresse de l'eleve � modifier.
 * @param laVille Nom de la ville de l'eleve � modifier. 
 * @param leCp Code postal de la ville de l'eleve � modifier.
 * @param leTel Num�ro de t�l�phone de l'eleve � modifier.
 * @param laDateNaiss Date de naissance de l'eleve � modifier.
 * @param leSalarie Salarie auquel est affili� l'eleve � modifier.
 * @param leCli Client qui s'occupe de payer pour l'eleve � modifier.
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
  print('L''eleve a bien �t� modifi�');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est d�j� existant.');
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
   sommeLecon INT;
BEGIN
	SELECT COUNT(*) INTO sommeLecon FROM LECON 
	WHERE lecon_date < SYSDATE AND lecon_eleve = lId
	AND lecon_type = 2;

RETURN sommeLecon;

END sommeLeconEleve;

FUNCTION dateCodeEleve(lId IN ELEVE.eleve_id%TYPE) RETURN DATE
IS
  dateCode DATE;
BEGIN
  SELECT passer_examenDate INTO dateCode FROM PASSER 
  WHERE passer_examenType = 1 AND passer_eleve = lId
  AND passer_resultat = 0;

RETURN dateCode;

END dateCodeEleve;

---------------------------------- Client ----------------------------------


/**
 * Ajout d'un client dans la base de donn�es.
 * @param leNom Nom du client � ajouter.
 * @param lePrenom Pr�nom du client � ajouter.
 * @param leSurnom Surnom du client � ajouter.
 * @param lAdr Adresse du client � ajouter.
 * @param laVille Nom de la ville du client � ajouter. 
 * @param leCp Code postal de la ville du client � ajouter.
 * @param leTel Num�ro de t�l�phone du client � ajouter.
 * @param laDateNaiss Date de naissance du client � ajouter. 
 */
PROCEDURE ajoutClient(leNom IN CLIENT.client_nom%TYPE, lePrenom IN CLIENT.client_prenom%TYPE,
						 lAdr IN CLIENT.client_adr%TYPE, laVille IN CLIENT.client_ville%TYPE, 
						 leCp IN CLIENT.client_cp%TYPE, leTel IN CLIENT.client_tel%TYPE, 
						 laDateNaiss IN CLIENT.client_dateNaiss%TYPE)
					 
IS
BEGIN
  INSERT INTO CLIENT VALUES(seq_client.NextVal, leNom, lePrenom, lAdr, laVille, leCp, leTel, laDateNaiss);
  print('Le client a bien �t� rajout�');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est d�j� existant.');
END ajoutClient;

/**
 * Suppression d'un client de la base de donn�es.
 * @param lId Id du client � supprimer.
 */
PROCEDURE suppressionClient(lId IN CLIENT.client_id%TYPE)
IS
BEGIN 
  DELETE FROM CLIENT WHERE client_id = lId;
  print('Suppression effectu�e avec succ�s');

END suppressionClient;



/**
 * Modification d'un client dans la base de donn�es.
 * @param lId Id du client � modifier
 * @param leNom Nom du client � modifier.
 * @param lePrenom Pr�nom du client � modifier.
 * @param leSurnom Surnom du client � modifier.
 * @param lAdr Adresse du client � modifier.
 * @param laVille Nom de la ville du client � modifier. 
 * @param leCp Code postal de la ville du client � modifier.
 * @param leTel Num�ro de t�l�phone du client � modifier.
 * @param laDateNaiss Date de naissance du client � modifier. 
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
  print('Le client a bien �t� modifi�');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est d�j� existant.');
END modifClient;

FUNCTION getCurClient RETURN CLIENT.client_id%TYPE
IS
   idCli CLIENT.client_id%TYPE;
 BEGIN
   SELECT seq_client.currval INTO idCli FROM dual;
   
 RETURN idCli;
 
END getCurClient;

/*   TODO Finir */
FUNCTION sommeAchatClient(lId IN CLIENT.client_id%TYPE, lIdE IN ELEVE.eleve_id%TYPE) RETURN FLOAT
IS
  TYPE t_lstEleve IS VARRAY(10) OF ACHETER.acheter_eleve%TYPE;
  CURSOR cursorEleve IS SELECT eleve_id from ELEVE WHERE eleve_cli = lId;
  sommeAchat ACHETER.acheter_prix%TYPE;
  sommeEleve ACHETER.acheter_prix%TYPE;
  lstEleve t_lstEleve;   
  compteur INT;
  
BEGIN
  IF (lIdE = null) THEN
	compteur := 0;
	OPEN cursorEleve;
	LOOP
		FETCH cursorEleve BULK COLLECT INTO lstEleve LIMIT 10;
		EXIT WHEN cursorEleve%NOTFOUND;
	END LOOP;
	CLOSE cursorEleve;  
	WHILE (compteur < lstEleve.COUNT)
	LOOP
		SELECT SUM(acheter_prix) INTO sommeEleve FROM ACHETER WHERE acheter_eleve = lstEleve[compteur];
		sommeAchat := sommeAchat + sommeEleve;
		compteur := compteur + 1;
	END LOOP;
  ELSE
	SELECT SUM(acheter_prix) INTO sommeAchat FROM ACHETER, ELEVE 
	WHERE acheter_eleve = lIdE AND eleve_cli = lId;  
  END IF;

RETURN sommeAchat;

END sommeAchatClient;


---------------------------------- Examen ------------------------------------

/**
 * Ajout d'un examen dans la base de donn�es.
 * @param laDate Date de l'examen � ajouter.
 * @param leType Type de l'examen � ajouter.
 */
PROCEDURE ajoutExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE)
IS
BEGIN
  INSERT INTO EXAMEN VALUES(laDate, leType);
  print('L''examen a bien �t� rajout�');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est d�j� existant.');
END ajoutExamen;

/**
 * Suppression d'un examen de la base de donn�es.
 * @param laDate Date de l'examen � supprimer.
 * @param leType Type de l'examen � supprimer.
 */
PROCEDURE suppressionExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE)
IS
BEGIN 
  DELETE FROM EXAMEN WHERE examen_date = laDate AND examen_type = leType;
  print('Suppression effectu�e avec succ�s');

END suppressionExamen;

--------------------------------- Formule ------------------------------------------

/**
 * Ajout d'une formule dans la base de donn�es.
 * @param leNbLecon Le nombre de le�on de la formule � ajouter.
 * @param lePrix de la formule � ajouter.
 * @param lePrixTicket Le prix des tickets en fonction de la formule � ajouter.
 */
PROCEDURE ajoutFormule(leNbLecon IN FORMULE.formule_nbLeconConduite%TYPE, lePrix IN FORMULE.formule_prix%TYPE, 
					   lePrixTicket IN FORMULE.formule_ticketPrix%TYPE)
IS
BEGIN
  INSERT INTO FORMULE VALUES(seq_formule.NextVal, leNbLecon, lePrix, lePrixTicket);
  print('La formule a bien �t� rajout�e');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est d�j� existant.');
END ajoutFormule;

/**
 * Suppression d'une formule de la base de donn�es.
 * @param leNum Num�ro de la formule � supprimer. 
 */
PROCEDURE suppressionFormule(leNum IN FORMULE.formule_num%TYPE)
IS
BEGIN 
  DELETE FROM FORMULE WHERE formule_num = leNum;
  print('Suppression effectu�e avec succ�s');

END suppressionFormule;


/**
 * Modification d'une formule dans la base de donn�es.
 * @param leNum Num�ro de la formule � modifier.
 * @param leNbLecon Le nombre de le�on de la formule � modifier.
 * @param lePrix de la formule � modifier.
 * @param lePrixTicket Le prix des tickets en fonction de la formule � modifier.
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
  print('La formule a bien �t� modifi�e');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est d�j� existant.');
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
   
   print('ville ajout�e');
   
 END ajoutVille;
 
 PROCEDURE suppressionVille(laVille IN VILLE.ville_nom%TYPE, leCp IN VILLE.ville_cp%TYPE)
 IS
 BEGIN
   DELETE FROM VILLE WHERE ville_nom = laVille AND ville_cp = leCp;
   
   print('ville supprim�e');
   
 END suppressionVille;
 
----------------------------------- Poste ----------------------------------------

PROCEDURE ajoutPoste(leNom IN POSTE.poste_nom%TYPE)
 IS 
 BEGIN
   INSERT INTO POSTE VALUES(seq_poste.nextval, leNom);
   
   print('poste ajout�');
   
 END ajoutPoste;
 
 PROCEDURE suppressionPoste(leNum IN POSTE.poste_num%TYPE)
 IS
 BEGIN
   DELETE FROM POSTE WHERE poste_num = leNum;
   
   print('poste supprim�');
   
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
   
   print('type ajout�');
   
 END ajoutType;
 
PROCEDURE suppressionType(leNum IN TYPEL.typel_num%TYPE)
 IS
 BEGIN
   DELETE FROM TYPEL WHERE typel_num = leNum;
   
   print('type supprim�');
   
 END suppressionType;	
	
	
FUNCTION getCurType RETURN TYPEL.typel_num%TYPE
IS
   idType TYPEL.typel_num%TYPE;
 BEGIN
   SELECT seq_type.currval INTO idType FROM dual;
   
 RETURN idType;
 
END getCurType;


----------------------------------- Passer ---------------------------------------

PROCEDURE ajoutPasser(leType IN PASSER.passer_examenType%TYPE, 
						  laDate IN PASSER.passer_examenDate%TYPE,
						  lEleve IN PASSER.passer_eleve%TYPE,
						  leResultat IN PASSER.passer_resultat%TYPE)
IS
BEGIN
	INSERT INTO PASSER VALUES(seq_passer.nextval, leType, laDate, lEleve, leResultat);
	print('r�sultat ajout�');
	
END ajoutPasser;
	
PROCEDURE suppressionPasser(leNum IN PASSER.passer_num%TYPE)
IS
BEGIN
	DELETE FROM PASSER WHERE passer_num = leNum;
	print('r�sultat supprim�');
	
END suppressionPasser;	

PROCEDURE modifPasser(leNum IN PASSER.passer_num%TYPE,
					  leType IN PASSER.passer_examenType%TYPE, 
					  laDate IN PASSER.passer_examenDate%TYPE,
					  lEleve IN PASSER.passer_eleve%TYPE,
					  leResultat IN PASSER.passer_resultat%TYPE)
IS
BEGIN
	
  UPDATE PASSER SET 
  passer_examenType = leType,
  passer_examenDate = laDate,
  passer_eleve = lEleve,
  passer_resultat = leResultat
  WHERE passer_num = leNum;
  print('Le r�sultat a bien �t� modifi�');

END modifPasser;

FUNCTION getCurPasser RETURN PASSER.passer_num%TYPE
IS
   numPasser PASSER.passer_num%TYPE;
 BEGIN
   SELECT seq_passer.currval INTO numPasser FROM dual;
   
 RETURN numPasser;
 
END getCurPasser;

------------------------------------ Acheter ------------------------------------

PROCEDURE ajoutAcheter(laDate IN ACHETER.acheter_date%TYPE,
						  lEleve IN ACHETER.acheter_eleve%TYPE,
						  laFormule IN ACHETER.acheter_formule%TYPE,
						  leNbTicket IN ACHETER.acheter_nbTicket%TYPE,
						  lePrix IN ACHETER.acheter_prix%TYPE)
	
IS
BEGIN
	INSERT INTO ACHETER VALUES(seq_acheter.nextval, laDate, lEleve, laFormule, leNbTicket, lePrix);
	print('facture ajout�e');
	
END ajoutAcheter;
	
PROCEDURE suppressionAcheter(leNum IN ACHETER.acheter_num%TYPE)
IS
BEGIN
	DELETE FROM ACHETER WHERE acheter_num = leNum;
	print('facture supprim�e');
	
END suppressionAcheter;	

PROCEDURE modifAcheter(leNum IN ACHETER.acheter_num%TYPE,
					  laDate IN ACHETER.acheter_date%TYPE,
					  lEleve IN ACHETER.acheter_eleve%TYPE,
					  laFormule IN ACHETER.acheter_formule%TYPE,
					  leNbTicket IN ACHETER.acheter_nbTicket%TYPE,
					  lePrix IN ACHETER.acheter_prix%TYPE)
IS
BEGIN
	
  UPDATE ACHETER SET 
  acheter_date = laDate,
  acheter_eleve = lEleve,
  acheter_formule = laFormule,
  acheter_nbTicket = leNbTicket,
  acheter_prix = lePrix
  WHERE acheter_num = leNum;
  print('La facture a bien �t� modifi�e');

END modifAcheter;		
					
					
FUNCTION getCurAcheter RETURN ACHETER.acheter_num%TYPE
IS
   numAcheter ACHETER.acheter_num%TYPE;
 BEGIN
   SELECT seq_acheter.currval INTO numAcheter FROM dual;
   
 RETURN numAcheter;
 
END getCurAcheter;		
	
 
----------------------------------- Autre ----------------------------------------

/**
 * Affichage d'un message.
 * @param message Message � afficher.
 */
PROCEDURE print(message IN VARCHAR)
IS
BEGIN
  dbms_output.put_line(message);
END print;


END autoEcole;