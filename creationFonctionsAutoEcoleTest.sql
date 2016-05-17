------------
-- PL SQL --
------------

CREATE OR REPLACE PACKAGE autoEcole IS

    TYPE t_lstEleve IS VARRAY(10) OF ACHETER.acheter_eleve%TYPE;
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
	PROCEDURE modifLecon(leNum IN LECON.lecon_num%TYPE, laDate IN LECON.lecon_date%TYPE, 
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
						   
	-- Login
	PROCEDURE ajoutLogin(lId IN LOGIN.login_id%TYPE, lePassword IN LOGIN.login_password%TYPE);
	PROCEDURE suppressionLogin(lId IN LOGIN.login_id%TYPE);
	
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
							
	-- Formule
	PROCEDURE ajoutFormule(leNbLecon IN FORMULE.formule_nbLeconConduite%TYPE, lePrix IN FORMULE.formule_prix%TYPE, 
						   lePrixTicket IN FORMULE.formule_ticketPrix%TYPE);
	PROCEDURE suppressionFormule(leNum IN FORMULE.formule_num%TYPE);
	PROCEDURE modifFormule(leNum IN FORMULE.formule_num%TYPE, leNbLecon IN FORMULE.formule_nbLeconConduite%TYPE, 
						   lePrix IN FORMULE.formule_prix%TYPE, lePrixTicket IN FORMULE.formule_ticketPrix%TYPE);
					
	-- autre
    PROCEDURE ajoutVille(laVille IN VILLE.ville_nom%TYPE, leCp IN VILLE.ville_cp%TYPE);
	PROCEDURE suppressionVille(laVille IN VILLE.ville_nom%TYPE, leCp IN VILLE.ville_cp%TYPE);
	
	PROCEDURE ajoutPoste(leNom IN POSTE.poste_nom%TYPE);
	PROCEDURE suppressionPoste(leNum IN POSTE.poste_num%TYPE);
	
	PROCEDURE ajoutType(leNom IN TYPEL.typel_nom%TYPE);
	PROCEDURE suppressionType(leNum IN TYPEL.typel_num%TYPE);
	
	PROCEDURE ajoutPasser(leType IN PASSER.passer_examenType%TYPE, 
						  laDate IN PASSER.passer_examenDate%TYPE,
						  lEleve IN PASSER.passer_eleve%TYPE,
						  leResultat IN PASSER.passer_resultat%TYPE);
	PROCEDURE suppressionPasser(leNum IN PASSER.passer_num%TYPE);	
	PROCEDURE modifPasser(leNum IN PASSER.passer_num%TYPE,
						  leType IN PASSER.passer_examenType%TYPE, 
						  laDate IN PASSER.passer_examenDate%TYPE,
						  lEleve IN PASSER.passer_eleve%TYPE,
						  leResultat IN PASSER.passer_resultat%TYPE);	
						  
	PROCEDURE ajoutAcheter(laDate IN ACHETER.acheter_date%TYPE,
						  lEleve IN ACHETER.acheter_eleve%TYPE,
						  laFormule IN ACHETER.acheter_formule%TYPE,
						  leNbTicket IN ACHETER.acheter_nbTicket%TYPE,
						  lePrix IN ACHETER.acheter_prix%TYPE);
	PROCEDURE suppressionAcheter(leNum IN ACHETER.acheter_num%TYPE);	
	PROCEDURE modifAcheter(leNum IN ACHETER.acheter_num%TYPE,
						  laDate IN ACHETER.acheter_date%TYPE,
						  lEleve IN ACHETER.acheter_eleve%TYPE,
						  laFormule IN ACHETER.acheter_formule%TYPE,
						  leNbTicket IN ACHETER.acheter_nbTicket%TYPE,
						  lePrix IN ACHETER.acheter_prix%TYPE);							  
    					
	PROCEDURE print(message IN VARCHAR);
	
	-- Vehicule
	FUNCTION getCurVehicule RETURN VEHICULE.vehicule_num%TYPE;
	
	-- Lecon
    FUNCTION getCurLecon RETURN LECON.lecon_num%TYPE;
	
	-- Salarie		
	FUNCTION getCurSalarie RETURN SALARIE.salarie_id%TYPE;
		
	-- Eleve
	FUNCTION getCurEleve RETURN ELEVE.eleve_id%TYPE;
	FUNCTION sommeLeconAcheteEleve(lId IN ELEVE.eleve_id%TYPE) RETURN INT;
	FUNCTION sommeLeconEleve(lId IN ELEVE.eleve_id%TYPE) RETURN INT;
	FUNCTION dateCodeEleve(lId IN ELEVE.eleve_id%TYPE) RETURN DATE;
	
	-- Client
	FUNCTION getCurClient RETURN CLIENT.client_id%TYPE;

	FUNCTION sommeAchatClient(lId IN CLIENT.client_id%TYPE, lIdE IN ELEVE.eleve_id%TYPE) RETURN FLOAT;
	
	-- Formule
	FUNCTION getCurFormule RETURN FORMULE.formule_num%TYPE;
		
	-- Poste
	FUNCTION getCurPoste RETURN POSTE.poste_num%TYPE;
	
	-- Type
	FUNCTION getCurType RETURN TYPEL.typel_num%TYPE;
	
	-- Passer
	FUNCTION getCurPasser RETURN PASSER.passer_num%TYPE;
	
	-- Acheter
	FUNCTION getCurAcheter RETURN ACHETER.acheter_num%TYPE;
		
END autoEcole;