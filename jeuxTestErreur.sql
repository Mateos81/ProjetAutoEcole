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
/* On remet � z�ro la base de donn�es */ 

/* Test suppression d'un v�hicule non cr�� */
exec autoecole.suppressionVehicule(1);
/* Test modification d'un v�hicule non cr�� */
exec autoecole.modifVehicule(1, 'YT325PJ', 'Citro�n', 'C3');
exec autoecole.ajoutVehicule('DF458SD', 'Citro�n', 'C3');

/* Test suppression d'un salari� non cr�� */
exec autoecole.suppressionSalarie(1);
/* Test modification d'un salari� non cr�� */
exec autoecole.modifSalarie(1, 'Castafolt', 'Philippe', 'Riton', '24 rue de la blague','Rodez', '12000', '0584254521', autoecole.getCurVehicule, 2);
/* Test ajout salari� avec poste inexistant */
exec autoecole.ajoutSalarie('Castafolt', 'Philippe', 'Riton', '24 rue de la blague','Rodez', '12000', '0654879535', autoecole.getCurVehicule, 3);

/* Test suppression d'un client non cr�� */
exec autoEcole.suppressionClient(1);
/* Test modification d'un client non cr�� */
exec autoEcole.modifClient(1, 'ROUX', 'Andr�', '24 avenue du bonheur', 'Rodez', '12000', '0525854696', '15/07/1967');
exec autoEcole.ajoutClient('ROUX', 'Andr�', '12 avenue du bonheur', 'Rodez', '12000', '0525854696', '15/07/1967');

/* Test suppression d'un eleve non cr�� */
exec autoEcole.suppressionEleve(1);
/* Test modification d'un eleve non cr�� */
exec autoEcole.modifEleve(1, 'ROUX', 'Victor', '24 avenue du bonheur', 'Rodez', '12000', '0654875241', '15/06/1990', autoEcole.getCurSalarie, autoEcole.getCurClient);
/* Test ajout eleve avec client inexistant */
exec autoEcole.ajoutEleve('ROUX', 'Victor', '24 avenue du bonheur', 'Rodez', '12000', '0654875241', '15/06/1990', autoEcole.getCurSalarie, 3);
exec autoEcole.ajoutEleve('ROUX', 'Victor', '24 avenue du bonheur', 'Rodez', '12000', '0654875241', '15/06/1990', autoEcole.getCurSalarie, autoEcole.getCurClient);

/* Test suppression d'une le�on non cr��e */
exec autoEcole.suppressionLecon(1);
/* Test modification d'une le�on non cr��e */
exec autoEcole.modifLecon(1, '12/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, autoEcole.getCurEleve, 2);
/* Test ajout lecon avec salarie inexistant */
exec autoEcole.ajoutLecon('10/04/2016', autoecole.getCurVehicule, autoEcole.getCurSalarie, 4, 2);

/* Test suppression d'un examen non cr�� */
exec autoEcole.suppressionExamen('12/04/2016', 1);
/* Test ajout examen avec poste inexistant */
exec autoEcole.ajoutExamen('12/04/2016', 5);

/* Test suppression d'un passage non cr�� */
exec autoEcole.suppressionPasser(1);
/* Test modification d'une le�on non cr��e */
exec autoEcole.modifPasser(1, 1, '18/04/2016', autoEcole.getCurEleve, 0);

/* Test suppression d'une formule non cr��e */
exec autoEcole.suppressionFormule(3);
/* Test modification d'une formule non cr��e */
exec autoEcole.modifFormule(3, 30, 1300, 35);
exec autoEcole.ajoutFormule(30, 1300, 35);

/* Test suppression d'une le�on non cr��e */
exec autoEcole.suppressionAcheter(1);
/* Test modification d'une le�on non cr��e */
exec autoEcole.modifAcheter(1, '12/04/2016', autoEcole.getCurEleve, autoEcole.getCurFormule, 30, 1300);
/* Test ajout facture avec formule inexistante */
exec autoEcole.ajoutAcheter('10/04/2016', autoEcole.getCurEleve, 8, 30, 1300);

/* Test suppression d'un login non cr��e */
exec autoEcole.suppressionLogin('Rito');
exec autoEcole.ajoutLogin('Rito', 'Password');
/* Test ajout login existant */
exec autoEcole.ajoutLogin('Rito', 'Password');

/* Test ajout kilom�trage v�hicule existant */	
exec autoEcole.ajoutHistoKm(40, 110029);


/* Les erreurs ci dessous ne sont pas g�rer en PL/SQL mais dans les classes PHP les utilsant :
   Cas o� un client de moins de 18 ans est ajout�
   Cas o� un �l�ve de moins de 16 ans veux prendre des le�ons de conduite
   Cas o� un �l�ve de moins de 16 ans veux passer le code
   Cas o� un eleve veux passer le permis sans le code (ou avec un code datant de plus de 2 ans)
   Cas o� un eleve de moins de 18 ans veux passer le permis 
*/

