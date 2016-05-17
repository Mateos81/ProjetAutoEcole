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
/* On gére les véhicules */
exec autoecole.ajoutVehicule('DF458SD', 'Citroën', 'C3');
exec autoecole.ajoutVehicule('AA354ER', 'Citroën', 'C3');
exec autoecole.ajoutVehicule('OI894SZ', 'Citroën', 'C3');
exec autoecole.ajoutVehicule('ML653QE', 'Citroën', 'C3');
exec autoecole.ajoutVehicule('AK945NB', 'Citroën', 'C3');
exec autoecole.ajoutVehicule('PO458ML', 'Citroën', 'C3');
exec autoecole.ajoutVehicule('YT325PJ', 'Citroën', 'C3');
exec autoecole.suppressionVehicule(autoecole.getCurVehicule);
exec autoecole.ajoutVehicule('SR457IU', 'Citroën', 'C3');
exec autoecole.modifVehicule(autoecole.getCurVehicule, 'YT325PJ', 'Citroën', 'C3');

/* On gére les salarié */
exec autoecole.ajoutSalarie('Durand', 'Laurent', 'Jojo', '14 avenue du 8 mai','Rodez', '12000', '06578479535', 1, 1);
exec autoecole.ajoutSalarie('Trello', 'florent', 'Flo', '6 impasse du neant','Millau', '12100', '0642189574', 2, 2);
exec autoecole.ajoutSalarie('Crior', 'Jennie', 'Jean', '91 avenue de Paris','Decazeville', '12089', '0658742125', 3, 2);
exec autoecole.ajoutSalarie('Fridri', 'Dan', 'Dan', '24 chemin du temps','Rodez', '12000', '0548123954', 4, 2);
exec autoecole.ajoutSalarie('Grio', 'Freddy', 'Didi', '37 rue de la tramontane','Bozouls', '12033', '0548796325', 5, 2);
exec autoecole.ajoutSalarie('Castafolt', 'Emilie', 'Nini', '24 rue de la blague','Rodez', '12000', '0654879535', null, 1);
exec autoecole.ajoutSalarie('Castafolt', 'Philippe', 'Riton', '24 rue de la blague','Rodez', '12000', '0654879535', autoecole.getCurVehicule, 2);
exec autoecole.suppressionSalarie(autoEcole.getCurSalarie);
exec autoecole.ajoutSalarie('Castafolt', 'Philippe', 'Riton', '24 rue de la blague','Rodez', '12000', '0654879535', autoecole.getCurVehicule, 1);
exec autoecole.modifSalarie(autoEcole.getCurSalarie, 'Castafolt', 'Philippe', 'Riton', '24 rue de la blague','Rodez', '12000', '0584254521', autoecole.getCurVehicule, 2);
/* On gére les clients */
exec autoEcole.ajoutClient('ROUX', 'André', '12 avenue du bonheur', 'Rodez', '12000', '0525854696', '15/07/1967');
exec autoEcole.suppressionClient(autoEcole.getCurClient);
exec autoEcole.ajoutClient('ROUX', 'André', '12 avenue du bonheur', 'Rodez', '12000', '0525854696', '15/07/1967');
exec autoEcole.modifClient(autoEcole.getCurClient, 'ROUX', 'André', '24 avenue du bonheur', 'Rodez', '12000', '0525854696', '15/07/1967');
/* On gére les éléves */
exec autoEcole.ajoutEleve('ROUX', 'Victor', '24 avenue du bonheur', 'Rodez', '12000', '0654875241', '15/06/1990', autoEcole.getCurSalarie, autoEcole.getCurClient);
exec autoEcole.modifEleve(autoEcole.getCurEleve, 'ROUX', 'Victor', '24 avenue du bonheur', 'Rodez', '12000', '0654875241', '15/06/1990', autoEcole.getCurSalarie, autoEcole.getCurClient);
exec autoEcole.suppressionEleve(autoEcole.getCurEleve);
exec autoEcole.ajoutEleve('ROUX', 'Francky', '24 avenue du bonheur', 'Rodez', '12000', '0625487936', '15/02/1995', autoEcole.getCurSalarie, autoEcole.getCurClient);
q/* On gére les leçons */
exec autoEcole.ajoutLecon('02/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, autoEcole.getCurEleve, 2);
exec autoEcole.ajoutLecon('12/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, autoEcole.getCurEleve, 2);
exec autoEcole.suppressionLecon('12/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, autoEcole.getCurEleve, 2);
exec autoEcole.ajoutLecon('10/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, autoEcole.getCurEleve, 2);
exec autoEcole.ajoutLecon(autoEcole.getCurLecon, '12/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, autoEcole.getCurEleve, 2);
/* On gére les examens */
exec autoEcole.ajoutExamen('12/04/2016', 1);
exec autoEcole.suppressionExamen('12/04/2016', 1);
exec autoEcole.ajoutExamen('10/04/2016', 1);
/* On gére les passage d'un examen */
exec autoEcole.ajoutPasser(1, '10/04/2016', autoEcole.getCurEleve, 0);
exec autoEcole.suppressionPasser(1);
exec autoEcole.ajoutPasser(1, '12/04/2016', autoEcole.getCurEleve, 0);
exec autoEcole.modifPasser(autoEcole.getCurPasser, 1, '18/04/2016', autoEcole.getCurEleve, 0);
/* On gére les formules */
exec autoEcole.ajoutFormule(0, 400.0, 40.0);
exec autoEcole.ajoutFormule(20, 1100, 35);
exec autoEcole.ajoutFormule(30, 1300, 35);
exec autoEcole.suppressionFormule(3);
exec autoEcole.ajoutFormule(30, 1200, 35);
exec autoEcole.modifFormule(autoEcole.getCurFormule, 30, 1300, 35);
/* On gére les factures */
exec autoEcole.ajoutAcheter('12/04/2016', 1, 2, 20, 1100);
exec autoEcole.ajoutAcheter('12/04/2016', autoEcole.getCurEleve, autoEcole.getCurFormule, 30, 1300);
exec autoEcole.suppressionAcheter(autoEcole.getCurAcheter);
exec autoEcole.ajoutAcheter('10/04/2016', autoEcole.getCurEleve, autoEcole.getCurFormule, 30, 1300);
exec autoEcole.modifAcheter(autoEcole.getCurAcheter, '12/04/2016', autoEcole.getCurEleve, autoEcole.getCurFormule, 30, 1300);
/* On gére les logins */
exec autoEcole.ajoutLogin('Rito', 'Password');
exec autoEcole.suppressionLogin('Rito');
exec autoEcole.ajoutLogin('Riton', 'Password');
/* On gére le kilométrage */	
exec autoEcole.ajoutHistoKm(autoecole.getCurVehicule, 110029);

SELECT autoecole.sommeLeconEleve(1) FROM dual;
SELECT autoEcole.dateCodeEleve(1) FROM dual;
SELECT autoEcole.sommeAchatClient(1, 1) from dual; 

