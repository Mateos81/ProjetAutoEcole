/* On ajoute les type, poste et villes que les employ�s utiliseront */
exec autoEcole.ajoutVille('Millau', '12100');
exec autoEcole.ajoutVille('Rodez', '12000');
exec autoEcole.ajoutVille('Aubin', '12013');
exec autoEcole.ajoutVille('Decazeville', '12089');
exec autoEcole.ajoutVille('Druelle', '12090');
exec autoEcole.ajoutVille('Bozouls', '12033');
exec autoEcole.ajoutVille('Centr�s', '12065');
exec autoEcole.ajoutVille('Espalion', '12096');
exec autoEcole.ajoutVille('Goutrens', '12111');
exec autoEcole.ajoutVille('La Serre', '12269');
exec autoEcole.ajoutPoste('Secr�taire');
exec autoEcole.ajoutPoste('Moniteur');
exec autoEcole.ajoutType('Code');
exec autoEcole.ajoutType('Conduite');		
/* On g�re les v�hicules */
exec autoecole.ajoutVehicule('DF458SD', 'Citro�n', 'C3');
exec autoecole.ajoutVehicule('AA354ER', 'Citro�n', 'C3');
exec autoecole.ajoutVehicule('OI894SZ', 'Citro�n', 'C3');
exec autoecole.ajoutVehicule('ML653QE', 'Citro�n', 'C3');
exec autoecole.ajoutVehicule('AK945NB', 'Citro�n', 'C3');
exec autoecole.ajoutVehicule('PO458ML', 'Citro�n', 'C3');
exec autoecole.ajoutVehicule('YT325PJ', 'Citro�n', 'C3');
exec autoecole.suppressionVehicule(autoecole.getCurVehicule);
exec autoecole.ajoutVehicule('SR457IU', 'Citro�n', 'C3');
exec autoecole.modifVehicule(autoecole.getCurVehicule, 'YT325PJ', 'Citro�n', 'C3');

/* On g�re les salari� */
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
/* On g�re les clients */
exec autoEcole.ajoutClient('ROUX', 'Andr�', '12 avenue du bonheur', 'Rodez', '12000', '0525854696', '15/07/1967');
exec autoEcole.suppressionClient(autoEcole.getCurClient);
exec autoEcole.ajoutClient('ROUX', 'Andr�', '12 avenue du bonheur', 'Rodez', '12000', '0525854696', '15/07/1967');
exec autoEcole.modifClient(autoEcole.getCurClient, 'ROUX', 'Andr�', '24 avenue du bonheur', 'Rodez', '12000', '0525854696', '15/07/1967');
/* On g�re les �l�ves */
exec autoEcole.ajoutEleve('ROUX', 'Victor', '24 avenue du bonheur', 'Rodez', '12000', '0654875241', '15/06/1990', autoEcole.getCurSalarie, autoEcole.getCurClient);
exec autoEcole.modifEleve(autoEcole.getCurEleve, 'ROUX', 'Victor', '24 avenue du bonheur', 'Rodez', '12000', '0654875241', '15/06/1990', autoEcole.getCurSalarie, autoEcole.getCurClient);
exec autoEcole.suppressionEleve(autoEcole.getCurEleve);
exec autoEcole.ajoutEleve('ROUX', 'Francky', '24 avenue du bonheur', 'Rodez', '12000', '0625487936', '15/02/1995', autoEcole.getCurSalarie, autoEcole.getCurClient);
q/* On g�re les le�ons */
exec autoEcole.ajoutLecon('02/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, autoEcole.getCurEleve, 2);
exec autoEcole.ajoutLecon('12/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, autoEcole.getCurEleve, 2);
exec autoEcole.suppressionLecon('12/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, autoEcole.getCurEleve, 2);
exec autoEcole.ajoutLecon('10/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, autoEcole.getCurEleve, 2);
exec autoEcole.ajoutLecon(autoEcole.getCurLecon, '12/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, autoEcole.getCurEleve, 2);
/* On g�re les examens */
exec autoEcole.ajoutExamen('12/04/2016', 1);
exec autoEcole.suppressionExamen('12/04/2016', 1);
exec autoEcole.ajoutExamen('10/04/2016', 1);
/* On g�re les passage d'un examen */
exec autoEcole.ajoutPasser(1, '10/04/2016', autoEcole.getCurEleve, 0);
exec autoEcole.suppressionPasser(1);
exec autoEcole.ajoutPasser(1, '12/04/2016', autoEcole.getCurEleve, 0);
exec autoEcole.modifPasser(autoEcole.getCurPasser, 1, '18/04/2016', autoEcole.getCurEleve, 0);
/* On g�re les formules */
exec autoEcole.ajoutFormule(0, 400.0, 40.0);
exec autoEcole.ajoutFormule(20, 1100, 35);
exec autoEcole.ajoutFormule(30, 1300, 35);
exec autoEcole.suppressionFormule(3);
exec autoEcole.ajoutFormule(30, 1200, 35);
exec autoEcole.modifFormule(autoEcole.getCurFormule, 30, 1300, 35);
/* On g�re les factures */
exec autoEcole.ajoutAcheter('12/04/2016', 1, 2, 20, 1100);
exec autoEcole.ajoutAcheter('12/04/2016', autoEcole.getCurEleve, autoEcole.getCurFormule, 30, 1300);
exec autoEcole.suppressionAcheter(autoEcole.getCurAcheter);
exec autoEcole.ajoutAcheter('10/04/2016', autoEcole.getCurEleve, autoEcole.getCurFormule, 30, 1300);
exec autoEcole.modifAcheter(autoEcole.getCurAcheter, '12/04/2016', autoEcole.getCurEleve, autoEcole.getCurFormule, 30, 1300);
/* On g�re les logins */
exec autoEcole.ajoutLogin('Rito', 'Password');
exec autoEcole.suppressionLogin('Rito');
exec autoEcole.ajoutLogin('Riton', 'Password');
/* On g�re le kilom�trage */	
exec autoEcole.ajoutHistoKm(autoecole.getCurVehicule, 110029);

SELECT autoecole.sommeLeconEleve(1) FROM dual;
SELECT autoEcole.dateCodeEleve(1) FROM dual;
SELECT autoEcole.sommeAchatClient(1, 1) from dual; 

