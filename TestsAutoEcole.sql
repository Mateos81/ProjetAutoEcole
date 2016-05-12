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
exec autoEcole.sommeLeconEleve(1);
exec autoEcole.dateCodeEleve(1);


