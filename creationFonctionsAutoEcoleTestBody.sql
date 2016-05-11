CREATE OR REPLACE PACKAGE BODY autoEcole AS

PROCEDURE ajoutVehicule(lImmatriculation IN VEHICULE.vehicule_immatriculation%TYPE,
							laMarque IN VEHICULE.vehicule_marque%TYPE, leModele IN VEHICULE.vehicule_modele%TYPE)
IS	
BEGIN

  INSERT INTO VEHICULE VALUES(seq_vehicule.nextval, lImmatriculation, laMarque, leModele);
  print('Véhicule ajouté');
  
END ajoutVehicule;

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

PROCEDURE ajoutSalarie(leNom IN SALARIE.salarie_nom%TYPE, lePrenom IN SALARIE.salarie_prenom%TYPE,
						   leSurnom IN SALARIE.salarie_surnom%TYPE, lAdr IN SALARIE.salarie_adr%TYPE,
						   laVille IN SALARIE.salarie_ville%TYPE, leCp IN SALARIE.salarie_cp%TYPE,
						   leTel IN SALARIE.salarie_tel%TYPE, leVehicule IN SALARIE.salarie_vehicule%TYPE,
						   lePoste IN SALARIE.salarie_poste%TYPE)
IS
BEGIN

  INSERT INTO SALARIE VALUES(seq_salarie.nextval, leNom, lePrenom, leSurnom, lAdr, laVille, leCp, leTel, leVehicule, lePoste);
  print('Salarié ajouté');
  
END ajoutSalarie;

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


PROCEDURE suppressionSalarie(lId IN SALARIE.salarie_id%TYPE)
IS 
BEGIN
  DELETE FROM SALARIE WHERE salarie_id = lId;
  
 END suppressionSalarie;
 
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
	
PROCEDURE ajoutType(leNom IN TYPEL.typel_nom%TYPE)
 IS 
 BEGIN
   INSERT INTO TYPEL VALUES(seq_typel.nextval, leNom);
   
   print('type ajouté');
   
 END ajoutType;
 
PROCEDURE suppressionType(leNum IN TYPEL.typel_num%TYPE)
 IS
 BEGIN
   DELETE FROM TYPEL WHERE typel_num = leNum;
   
   print('type supprimé');
   
 END suppressionType;	
	
 
END autoEcole;	
