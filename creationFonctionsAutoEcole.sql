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
						 laDateNaiss IN ELEVE.eleve_dateNaiss%TYPE);
	PROCEDURE suppressionEleve(lId IN ELEVE.eleve_id%TYPE);
	PROCEDURE modifEleve(lId IN ELEVE.eleve_id%TYPE, leNom IN ELEVE.eleve_nom%TYPE, 
					     lePrenom IN ELEVE.eleve_prenom%TYPE, lAdr IN ELEVE.eleve_adr%TYPE, 
						 laVille IN ELEVE.eleve_ville%TYPE, leCp IN ELEVE.eleve_cp%TYPE, 
						 leTel IN ELEVE.eleve_tel%TYPE, laDateNaiss IN ELEVE.eleve_dateNaiss%TYPE);	

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
	PROCEDURE ajoutExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE, 
						  leSalarie IN EXAMEN.examen_salarie%TYPE, lEleve IN EXAMEN.examen_eleve%TYPE);
	PROCEDURE suppressionExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE);
	PROCEDURE modifExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE, 
						  leSalarie IN EXAMEN.examen_salarie%TYPE, lEleve IN EXAMEN.examen_eleve%TYPE);
							
	-- Formule
	PROCEDURE ajoutFormule(leNbLecon IN FORMULE.formule_nbLeconConduite%TYPE, laDate IN EXAMEN.examen_type%TYPE, 
						  lePrix IN FORMULE.formule_prix%TYPE, lePrixTicket IN FORMULE.formule_ticketPrix%TYPE);
	PROCEDURE suppressionFormule(leNum IN FORMULE.formule_num%TYPE);
	PROCEDURE modifFormule(leNum IN FORMULE.formule_num%TYPE, leNbLecon IN FORMULE.formule_nbLeconConduite%TYPE, 
						   laDate IN EXAMEN.examen_type%TYPE, lePrix IN FORMULE.formule_prix%TYPE, 
						   lePrixTicket IN FORMULE.formule_ticketPrix%TYPE);
							
	PROCEDURE print(message IN VARCHAR);
	
	-- Vehicule
	FUNCTION listeVehicule() RETURN VEHICULE[];
	FUNCTION listeKmVehicule(leNum IN VEHICULE.vehicule_num%TYPE) RETURN HISTO_KM;
	
	-- Lecon
	FUNCTION listeLecon(leType IN LECON.lecon_type%TYPE, laDateDebut IN LECON.lecon_date%TYPE,
					    laDateFin IN LECON.lecon_date%TYPE, leSalarie IN LECON.lecon_salarie%TYPE, 
						lEleve IN LECON.lecon_eleve%TYPE) RETURN LECON[];
						
	-- Salarie		
	FUNCTION listeSalarie(lId IN SALARIE.salarie_id%TYPE) RETURN SALARIE[];
	FUNCTION listeEleveSalarie(lId IN SALARIE.salarie_id%TYPE) RETURN ELEVE[];
	FUNCTION listeLeconSalarie(lId IN SALARIE.salarie_id%TYPE) RETURN LECON[];
		
	-- Eleve
	FUNCTION listeEleve() RETURN ELEVE[];
	FUNCTION sommeLeconEleve(lId IN ELEVE.eleve_id%TYPE) RETURN FLOAT;
	FUNCTION dateCodeEleve(lId IN ELEVE.eleve_id%TYPE) RETURN DATE;
	
	-- Client
	FUNCTION listeClient() RETURN CLIENT[];
	FUNCTION listeEleveClient(lId IN CLIENT.client_id%TYPE) RETURN ELEVE[];
	FUNCTION verifPaiementClient(lId IN CLIENT.client_id%TYPE) RETURN FLOAT;
	FUNCTION listeFactureClient(lId IN CLIENT.client_id%TYPE, paye INT, 
								laDateDebut IN ACHAT.achat_date%TYPE, laDateFin IN ACHAT.achat_date%TYPE)
								RETURN ACHAT[];
	FUNCTION sommeAPayerClient(lId IN CLIENT.client_id%TYPE, lIdE IN ELEVE.eleve_id%TYPE) RETURN FLOAT;
	FUNCTION sommeAchatClient(lId IN CLIENT.client_id%TYPE, lIdE IN ELEVE.eleve_id%TYPE) RETURN FLOAT;
	
	-- Examen
	FUNCTION listeExamen() RETURN EXAMEN[];
	
	-- Formule
	FUNCTION listeFormule() RETURN FORMULE[];
	
	-- Ville
	FUNCTION listeVille(leCp IN VILLE.ville_cp%TYPE, laVille IN VILLE.ville_nom%TYPE) RETURN VILLE[];
	
	
END autoEcole;

CREATE OR REPLACE PACKAGE BODY autoEcole AS


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
  INSERT INTO VEHICULE VALUES(seq_vehicule, lImmatriculation, laMarque, leModele);
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
  DELETE FROM VEHICULE WHERE leNum = leNum;
  print('Suppression effectuée avec succès');

END suppressionVehicule;

CREATE OR REPLACE PACKAGE BODY autoEcole AS

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
		req = req || 'vehicule_immatriculation = lImmatriculation';
	if (laMarque is not NULL)
		req = req || 'AND vehicule_marque = laMarque';
	if (leModele is not NULL)
		req = req || 'AND vehicule_modele = leModele';

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
  INSERT INTO HISTO_KM VALUES(SYSDATE, leVehicule, leKm);
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
 */
PROCEDURE ajoutLecon(laDate IN LECON.lecon_date%TYPE, leVehicule IN LECON.lecon_vehicule%TYPE,
						 leSalarie IN LECON.lecon_salarie%TYPE, lEleve IN LECON.lecon_eleve%TYPE,
						 leType IN LECON.lecon_type%TYPE)
IS
BEGIN
  INSERT INTO VEHICULE VALUES(seq_vehicule, lImmatriculation, laMarque, leModele);
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
  DELETE FROM VEHICULE WHERE leNum = leNum;
  print('Suppression effectuée avec succès');

END suppressionVehicule;

CREATE OR REPLACE PACKAGE BODY autoEcole AS

/**
 * Ajout d'un vehicule dans la base de données.
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
		req = req || 'vehicule_immatriculation = lImmatriculation';
	if (laMarque is not NULL)
		req = req || 'AND vehicule_marque = laMarque';
	if (leModele is not NULL)
		req = req || 'AND vehicule_modele = leModele';

  ALTER TABLE VEHICULE 
  MODIFY SET || req ||
  WHERE vehicule_num = leNum;
  print('Le véhicule a bien été modifié');

-- EXCEPTION
  -- WHEN DUP_VAL_ON_INDEX THEN print('Le login est déjà existant.');
END modifVehicule;






----------------------------------------------------------------------------------------------
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

/**
 * Vérification de l'existence d'un login dans la base.
 * @param leLogin Login à vérifier.
 * @return TRUE si l'utilisateur existe, FALSE sinon.
 */
FUNCTION existe(leLogin IN UTILISATEUR.login%TYPE) RETURN BOOLEAN
IS
BEGIN
  SELECT login FROM UTILISATEUR WHERE login = leLogin;
  RETURN TRUE;

EXCEPTION
  WHEN NO_DATA_FOUND THEN
    print('L''utilisateur n''existe pas.');
    RETURN FALSE;
END existe;

/**
 * Déconnexion de l'utilisateur courant.
 */
PROCEDURE deconnexion()
IS
BEGIN
  IF utilisateurConnecte IS NOT NULL
    print('Au revoir ' || utilisateurConnecte || '. À bientôt !');
    utilisateurConnecte = NULL;
  ELSE
    print('Aucun utilisateur connecté.');
  END IF;
END deconnexion;

/**
 * Ajout d'un ami à l'utilisateur courant.
 * @param lAmi Login de l'ami.
 */
 PROCEDURE ajoutAmi(lAmi IN UTILISATEUR.login%TYPE)
 IS
 BEGIN
  IF estConnecte(utilisateurConnecte) AND existe(lAmi)
    SELECT *
    FROM SYMPATHISER
    WHERE (login1 = utilisateurConnecte AND login2 = lAmi)
    OR (login2 = utilisateurConnecte AND login1 = lAmi);

    IF NO_DATA_FOUND THEN
      INSERT INTO SYMPATHISER VALUES(utilisateurConnecte, lAmi);
    ELSE
      print(lAmi || ' est déjà votre ami.');
    END IF;
 END ajoutAmi;

 /**
 * Suppression d'un ami de l'utilisateur courant.
 * @param lAmi Login du futur ex-ami.
 */
 PROCEDURE suppressionAmi(lAmi IN UTILISATEUR.login%TYPE)
 IS
 BEGIN
  IF estConnecte(utilisateurConnecte) AND existe(lAmi)
    SELECT *
    FROM SYMPATHISER
    WHERE (login1 = utilisateurConnecte AND login2 = lAmi)
    OR (login2 = utilisateurConnecte AND login1 = lAmi);

    IF NOT NO_DATA_FOUND THEN
      DELETE FROM SYMPATHISER
      WHERE (login1 = utilisateurConnecte AND login2 = lAmi)
         OR (login2 = utilisateurConnecte AND login1 = lAmi);
    ELSE
      print(lAmi || ' n''est pas votre ami.');
    END IF;
  END IF;
 END suppressionAmi;

 /**
  * Affichage du mur d'un utilisateur.
  * @param leLogin Utilisateur pour lequel afficher le mur.
  */
PROCEDURE afficheMur(leLogin IN UTILISATEUR.login%TYPE)
IS
DECLARE
  -- Déclarations de types
  TYPE t_pubId is table of PUBLICATION.id_pub%TYPE
  TYPE t_pubContenu is table of PUBLICATION.contenu_pub%TYPE
  TYPE t_pubDate is table of PUBLICATION.date_pub%TYPE

  TYPE t_comContenu is table of COMMENTAIRE.contenu_com%TYPE
  TYPE t_comDate is table of COMMENTAIRE.date_com%TYPE

  -- Déclarations de variables
  pubId t_pubId;
  pubContenu t_pubContenu;
  pubDate t_pubDate;

  comContenu t_comContenu;
  comDate t_comDate;
 BEGIN
  -- Remontée des données
  SELECT id_pub
  BULK COLLECT INTO pubLog
  FROM PUBLICATION
  WHERE login_pub = leLogin
  ORDER BY id_pub;

  SELECT contenu_pub
  BULK COLLECT INTO pubContenu
  FROM PUBLICATION
  WHERE login_pub = leLogin
  ORDER BY id_pub;

  SELECT date_pub
  BULK COLLECT INTO pubDate
  FROM PUBLICATION
  WHERE login_pub = leLogin
  ORDER BY id_pub;

  FOR i IN 1..pubLog.COUNT LOOP
    print('Publication ' || pubDate(i) || ' : ');
    print(pubContenu(i));
    dbms.output.new_line;
    dbms.output.new_line;

    SELECT contenu_com
    BULK COLLECT INTO comContenu
    FROM PUBLICATION
    WHERE id_pub = pubLog(i)
    ORDER BY id_com;

    SELECT date_com
    BULK COLLECT INTO comDate
    FROM COMMENTAIRE
    WHERE id_pub = pubLog(i)
    ORDER BY id_com;

    FOR j IN 1..comContenu.COUNT LOOP
      print('Commentaire ' || comDate(j) || ' : ');
      print(comContenu(j));
      dbms.output.new_line;
    END LOOP;

  END LOOP;

 END afficheMur;

 /**
  * Ajout d'un message sur le mur d'un ami.
  * @param lAmi Login de l'ami où ajouter le message.
  * @param leMessage Message à ajouter sur le mur d'un ami.
  */
PROCEDURE ajoutMessageMur(lAmi IN UTILISATEUR.login%TYPE,  leMessage IN UTILISATEUR.login%TYPE)
IS
BEGIN
IF NOT estAmi(lAmi) THEN
  print('Impossible d''ajouter un message, ' || lAmi || ' n''est pas votre ami');
  RETURN;
END IF;

INSERT INTO PUBLICATION VALUES('PUB' || seq_pub.nextval, lAmi, utilisateurConnecte, leMessage, NOW());

afficherMur(lAmi);

END ajoutMessageMur;

FUNCTION estAmi(lAmi IN UTILISATEUR.login%TYPE) RETURN BOOLEAN
IS
BEGIN
	IF estConnecte(utilisateurConnecte) AND existe(lAmi)
	  SELECT *
	  FROM SYMPATHISER
	  WHERE (login1 = utilisateurConnecte AND login2 = lAmi)
	  OR (login2 = utilisateurConnecte AND login1 = lAmi);

	  IF NOT NO_DATA_FOUND THEN
		RETURN TRUE;
	  END IF;
	END IF;

	RETURN FALSE;

END estAmi;

END autoEcole;
