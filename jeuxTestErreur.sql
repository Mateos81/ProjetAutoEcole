/* On ajoute les type, poste et villes que les employés utiliseront */
exec autoEcole.ajoutVille('Millau', '12100');
exec autoEcole.ajoutVille('Rodez', '12000');
exec autoEcole.ajoutVille('Aubin', '12013');
exec autoEcole.ajoutVille('Decazeville', '12089');
exec autoEcole.ajoutVille('Druelle', '12090');
exec autoEcole.ajoutVille('Bozouls', '12033');
exec autoEcole.ajoutVille('Centrès', '12065');
exec autoEcole.ajoutVille('Espalion', '12096');
exec autoEcole.ajoutVille('Goutrens', '12111');
exec autoEcole.ajoutVille('La Serre', '12269');
exec autoEcole.ajoutPoste('Secrétaire');
exec autoEcole.ajoutPoste('Moniteur');
exec autoEcole.ajoutType('Code');
exec autoEcole.ajoutType('Conduite');		
/* On remet à zéro la base de données */ 

/* Test suppression d'un véhicule non créé */
exec autoecole.suppressionVehicule(1);
/* Test modification d'un véhicule non créé */
exec autoecole.modifVehicule(1, 'YT325PJ', 'Citroën', 'C3');
exec autoecole.ajoutVehicule('DF458SD', 'Citroën', 'C3');

/* Test suppression d'un salarié non créé */
exec autoecole.suppressionSalarie(1);
/* Test modification d'un salarié non créé */
exec autoecole.modifSalarie(1, 'Castafolt', 'Philippe', 'Riton', '24 rue de la blague','Rodez', '12000', '0584254521', autoecole.getCurVehicule, 2);
/* Test ajout salarié avec poste inexistant */
exec autoecole.ajoutSalarie('Castafolt', 'Philippe', 'Riton', '24 rue de la blague','Rodez', '12000', '0654879535', autoecole.getCurVehicule, 3);

/* Test suppression d'un client non créé */
exec autoEcole.suppressionClient(1);
/* Test modification d'un client non créé */
exec autoEcole.modifClient(1, 'ROUX', 'André', '24 avenue du bonheur', 'Rodez', '12000', '0525854696', '15/07/1967');
exec autoEcole.ajoutClient('ROUX', 'André', '12 avenue du bonheur', 'Rodez', '12000', '0525854696', '15/07/1967');

/* Test suppression d'un eleve non créé */
exec autoEcole.suppressionEleve(1);
/* Test modification d'un eleve non créé */
exec autoEcole.modifEleve(1, 'ROUX', 'Victor', '24 avenue du bonheur', 'Rodez', '12000', '0654875241', '15/06/1990', autoEcole.getCurSalarie, autoEcole.getCurClient);
/* Test ajout eleve avec client inexistant */
exec autoEcole.ajoutEleve('ROUX', 'Victor', '24 avenue du bonheur', 'Rodez', '12000', '0654875241', '15/06/1990', autoEcole.getCurSalarie, 3);
exec autoEcole.ajoutEleve('ROUX', 'Victor', '24 avenue du bonheur', 'Rodez', '12000', '0654875241', '15/06/1990', autoEcole.getCurSalarie, autoEcole.getCurClient);

/* Test suppression d'une leçon non créée */
exec autoEcole.suppressionLecon(1);
/* Test modification d'une leçon non créée */
exec autoEcole.modifLecon(1, '12/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, autoEcole.getCurEleve, 2);
/* Test ajout lecon avec salarie inexistant */
exec autoEcole.ajoutLecon('10/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, 4, 2);

/* Test suppression d'un examen non créé */
exec autoEcole.suppressionExamen('12/04/2016', 1);
/* Test ajout examen avec poste inexistant */
exec autoEcole.ajoutExamen('12/04/2016', 5);

/* Test suppression d'un passage non créé */
exec autoEcole.suppressionPasser(1);
/* Test modification d'une leçon non créée */
exec autoEcole.modifPasser(1, 1, '18/04/2016', autoEcole.getCurEleve, 0);

/* Test suppression d'une formule non créée */
exec autoEcole.suppressionFormule(3);
/* Test modification d'une formule non créée */
exec autoEcole.modifFormule(3, 30, 1300, 35);
exec autoEcole.ajoutFormule(30, 1300, 35);

/* Test suppression d'une leçon non créée */
exec autoEcole.suppressionAcheter(1);
/* Test modification d'une leçon non créée */
exec autoEcole.modifAcheter(1, '12/04/2016', autoEcole.getCurEleve, autoEcole.getCurFormule, 30, 1300);
/* Test ajout facture avec formule inexistante */
exec autoEcole.ajoutAcheter('10/04/2016', autoEcole.getCurEleve, 8, 30, 1300);

/* Test suppression d'un login non créée */
exec autoEcole.suppressionLogin('Rito');
exec autoEcole.ajoutLogin('Rito', 'Password');
/* Test ajout login existant */
exec autoEcole.ajoutLogin('Rito', 'Password');

/* Test ajout kilométrage véhicule existant */	
exec autoEcole.ajoutHistoKm(40, 110029);


/* Les erreurs ci dessous ne sont pas gérer en PL/SQL mais dans les classes PHP les utilsant :
   Cas où un client de moins de 18 ans est ajouté
   Cas où un élève de moins de 16 ans veux prendre des leçons de conduite
   Cas où un éléve de moins de 16 ans veux passer le code
   Cas où un eleve veux passer le permis sans le code (ou avec un code datant de plus de 2 ans)
   Cas où un eleve de moins de 18 ans veux passer le permis 
*/

