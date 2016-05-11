CREATE OR REPLACE PACKAGE autoEcole IS

	PROCEDURE ajoutVehicule(lImmatriculation IN VEHICULE.vehicule_immatriculation%TYPE,
							laMarque IN VEHICULE.vehicule_marque%TYPE, leModele IN VEHICULE.vehicule_modele%TYPE);
	PROCEDURE suppressionVehicule(leNum IN VEHICULE.vehicule_num%TYPE);
	PROCEDURE modifVehicule(leNum IN VEHICULE.vehicule_num%TYPE, lImmatriculation IN VEHICULE.vehicule_immatriculation%TYPE,
							laMarque IN VEHICULE.vehicule_marque%TYPE, leModele IN VEHICULE.vehicule_modele%TYPE);
			
	PROCEDURE ajoutHistoKm(leVehicule IN HISTO_KM.histoKm_numVehicule%TYPE, leKm IN HISTO_KM.HistoKm_nbKm%TYPE);

	PROCEDURE ajoutLecon(laDate IN LECON.lecon_date%TYPE, leVehicule IN LECON.lecon_vehicule%TYPE,
						 leSalarie IN LECON.lecon_salarie%TYPE, lEleve IN LECON.lecon_eleve%TYPE,
						 leType IN LECON.lecon_type%TYPE);
	PROCEDURE suppressionLecon(leNum IN LECON.lecon_num%TYPE);
	PROCEDURE modifLecon(leNum IN VEHICULE.vehicule_num%TYPE, laDate IN LECON.lecon_date%TYPE, 
						 leVehicule IN LECON.lecon_vehicule%TYPE, leSalarie IN LECON.lecon_salarie%TYPE, 
						 lEleve IN LECON.lecon_eleve%TYPE, leType IN LECON.lecon_type%TYPE);

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


	PROCEDURE ajoutClient(leNom IN CLIENT.client_nom%TYPE, lePrenom IN CLIENT.client_prenom%TYPE,
						 lAdr IN CLIENT.client_adr%TYPE, laVille IN CLIENT.client_ville%TYPE, 
						 leCp IN CLIENT.client_cp%TYPE, leTel IN CLIENT.client_tel%TYPE, 
						 laDateNaiss IN CLIENT.client_dateNaiss%TYPE);
	PROCEDURE suppressionClient(lId IN CLIENT.client_id%TYPE);
	PROCEDURE modifClient(lId IN CLIENT.client_id%TYPE, leNom IN CLIENT.client_nom%TYPE, 
					     lePrenom IN CLIENT.client_prenom%TYPE, lAdr IN CLIENT.client_adr%TYPE, 
						 laVille IN CLIENT.client_ville%TYPE, leCp IN CLIENT.client_cp%TYPE, 
						 leTel IN CLIENT.client_tel%TYPE, laDateNaiss IN CLIENT.client_dateNaiss%TYPE);		
	

	PROCEDURE ajoutExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE);
	PROCEDURE suppressionExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE);
	PROCEDURE modifExamen(laDate IN EXAMEN.examen_date%TYPE, leType IN EXAMEN.examen_type%TYPE);
							

	PROCEDURE ajoutFormule(leNbLecon IN FORMULE.formule_nbLeconConduite%TYPE, lePrix IN FORMULE.formule_prix%TYPE, 
						   lePrixTicket IN FORMULE.formule_ticketPrix%TYPE);
	PROCEDURE suppressionFormule(leNum IN FORMULE.formule_num%TYPE);
	PROCEDURE modifFormule(leNum IN FORMULE.formule_num%TYPE, leNbLecon IN FORMULE.formule_nbLeconConduite%TYPE, 
						   lePrix IN FORMULE.formule_prix%TYPE, lePrixTicket IN FORMULE.formule_ticketPrix%TYPE);
							
	PROCEDURE print(message IN VARCHAR);
	

	FUNCTION listeVehicule RETURN OBJECT;
	FUNCTION listeKmVehicule(leNum IN VEHICULE.vehicule_num%TYPE) RETURN OBJECT;
	

	FUNCTION listeLecon(leType IN LECON.lecon_type%TYPE, laDateDebut IN LECON.lecon_date%TYPE,
					    laDateFin IN LECON.lecon_date%TYPE, leSalarie IN LECON.lecon_salarie%TYPE, 
						lEleve IN LECON.lecon_eleve%TYPE) RETURN OBJECT;
						
		
	FUNCTION listeSalarie(lId IN SALARIE.salarie_id%TYPE) RETURN OBJECT;
	FUNCTION listeEleveSalarie(lId IN SALARIE.salarie_id%TYPE) RETURN OBJECT;
	FUNCTION listeLeconSalarie(lId IN SALARIE.salarie_id%TYPE) RETURN OBJECT;
		

	FUNCTION listeEleve RETURN OBJECT;
	FUNCTION sommeLeconEleve(lId IN ELEVE.eleve_id%TYPE) RETURN FLOAT;
	FUNCTION dateCodeEleve(lId IN ELEVE.eleve_id%TYPE) RETURN DATE;
	

	FUNCTION listeClient RETURN OBJECT;
	FUNCTION listeEleveClient(lId IN CLIENT.client_id%TYPE) RETURN OBJECT;
	FUNCTION verifPaiementClient(lId IN CLIENT.client_id%TYPE) RETURN FLOAT;
	FUNCTION listeFactureClient(lId IN CLIENT.client_id%TYPE, paye INT, 
								laDateDebut IN ACHAT.achat_date%TYPE, laDateFin IN ACHAT.achat_date%TYPE)
								RETURN OBJECT;
	FUNCTION sommeAPayerClient(lId IN CLIENT.client_id%TYPE, lIdE IN ELEVE.eleve_id%TYPE) RETURN FLOAT;
	FUNCTION sommeAchatClient(lId IN CLIENT.client_id%TYPE, lIdE IN ELEVE.eleve_id%TYPE) RETURN FLOAT;
	

	FUNCTION listeExamen RETURN OBJECT;
	

	FUNCTION listeFormule RETURN OBJECT;
	

	FUNCTION listeVille(leCp IN VILLE.ville_cp%TYPE, laVille IN VILLE.ville_nom%TYPE) RETURN OBJECT;
	
	
END autoEcole;
