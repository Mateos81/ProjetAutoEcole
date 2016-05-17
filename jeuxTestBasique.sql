/* On ajoute les type, poste et villes que les employés utiliseront */
exec autoEcole.ajoutVille('Millau', '12100');
exec autoEcole.ajoutPoste('Secrétaire');
exec autoEcole.ajoutPoste('Moniteur');
exec autoEcole.ajoutType('Code');
exec autoEcole.ajoutType('Conduite');		
/* On gére les véhicules */
exec autoecole.ajoutVehicule('124587789', 'Citroën', 'C3');
exec autoecole.suppressionVehicule(autoecole.getCurVehicule);
exec autoecole.ajoutVehicule('124587789', 'Citroën', 'C3');
exec autoecole.modifVehicule(autoecole.getCurVehicule, '124587458', 'Citroën', 'C3');
/* On gére les salarié */
exec autoecole.ajoutSalarie('Castafolt', 'Emilie', 'Nini', '24 rue de la blague','Rodez', '12000', '0654879535', null, 2);
exec autoecole.ajoutSalarie('Castafolt', 'Philippe', 'Riton', '24 rue de la blague','Rodez', '12000', '0654879535', autoecole.getCurVehicule, 1);
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
exec autoEcole.ajoutLecon('12/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, autoEcole.getCurEleve, 2);
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
exec autoEcole.ajoutAcheter('12/04/2016', 1, 2, 0, 1100);
exec autoEcole.ajoutAcheter('12/04/2016', autoEcole.getCurEleve, autoEcole.getCurFormule, 0, 1300);

SELECT autoecole.sommeLeconEleve(1) FROM dual;
SELECT autoEcole.dateCodeEleve(1) FROM dual;
SELECT autoEcole.sommeAchatClient(1, 1) from dual; 

