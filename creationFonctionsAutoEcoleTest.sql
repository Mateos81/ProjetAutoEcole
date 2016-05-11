CREATE OR REPLACE PACKAGE autoEcole IS

	PROCEDURE print(message IN VARCHAR);
	

	PROCEDURE ajoutVehicule(lImmatriculation IN VEHICULE.vehicule_immatriculation%TYPE,
							laMarque IN VEHICULE.vehicule_marque%TYPE, leModele IN VEHICULE.vehicule_modele%TYPE);

						
		
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
						   
	PROCEDURE ajoutVille(laVille IN VILLE.ville_nom%TYPE, leCp IN VILLE.ville_cp%TYPE);
	PROCEDURE suppressionVille(laVille IN VILLE.ville_nom%TYPE, leCp IN VILLE.ville_cp%TYPE);
	
	PROCEDURE ajoutPoste(leNom IN POSTE.poste_nom%TYPE);
	PROCEDURE suppressionPoste(leNum IN POSTE.poste_num%TYPE);
	
	PROCEDURE ajoutType(leNom IN TYPEL.typel_nom%TYPE);
	PROCEDURE suppressionType(leNum IN TYPEL.typel_num%TYPE);
	
	FUNCTION getCurVehicule RETURN VEHICULE.vehicule_num%TYPE;
	

END autoEcole;

