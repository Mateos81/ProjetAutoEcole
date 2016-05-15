exec autoEcole.suppressionVille('Rodez', '12000');
exec autoEcole.suppressionVille('Millau', '12100');
exec autoEcole.suppressionPoste(1);
exec autoEcole.suppressionPoste(2);
exec autoEcole.suppressionType(1);
exec autoEcole.suppressionType(2);

exec autoecole.suppressionVehicule(1);
exec autoecole.suppressionSalarie(1);
exec autoEcole.suppressionClient(1);
exec autoEcole.suppressionEleve(1);

exec autoEcole.ajoutVille('Rodez', '12000');
exec autoEcole.ajoutVille('Millau', '12100');
exec autoEcole.ajoutPoste('Secrétaire');
exec autoEcole.ajoutPoste('Moniteur');
exec autoEcole.ajoutType('Code');
exec autoEcole.ajoutType('Conduite');

exec autoecole.ajoutVehicule('124587789', 'Citroën', 'C3');
exec autoecole.ajoutSalarie('Castafolt', 'Philippe', 'Riton', '24 rue de la blague','Rodez', '12000', '0654879535', 1, 1);
exec autoEcole.ajoutClient('ROUX', 'André', '12 avenue du bonheur', 'Rodez', '12000', '0525854696', '15/07/1967');
exec autoEcole.ajoutEleve('ROUX', 'Victor', '12 avenue du bonheur', 'Rodez', '12000', '0654875241', '15/06/1990', 1, 1);
exec autoEcole.ajoutEleve('ROUX', 'Francky', '12 avenue du bonheur', 'Rodez', '12000', '0625487936', '15/02/1995', 1, 1);
exec autoEcole.ajoutLecon('02/04/2016', 1, 1, 1, 2);
exec autoEcole.ajoutLecon('12/04/2016', 1, 1, 1, 2);
exec autoEcole.ajoutExamen('12/04/2016', 1);
exec autoEcole.ajoutPasser(1, '12/04/2016', 1, 0);
exec autoEcole.ajoutFormule(0, 400.0, 40.0);
exec autoEcole.ajoutFormule(20, 1100, 35);
exec autoEcole.ajoutFormule(30, 1300, 35);
exec autoEcole.ajoutAcheter('12/04/2016', 1, 2, 0, 1100);
exec autoEcole.ajoutAcheter('12/04/2016', 2, 3, 0, 1300);

SELECT autoecole.sommeLeconEleve(1) FROM dual;
SELECT autoEcole.dateCodeEleve(1) FROM dual;
SELECT autoEcole.sommeAchatClient(1, 1) from dual; 


