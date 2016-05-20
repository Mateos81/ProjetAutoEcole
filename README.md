# ProjetAutoEcole
Projet de seconde année d'école d'ingénieur.

# Installation
- Installer Oracle Database 11g Express Edition ;
- Créer un espace de travail nommé ROUX_MATEOS_CIULLI, idem pour le mot de passe ;
- Installer SQL Developper, le lancer et ajouter une connexion à la base créée ;
- Exécuter les scripts suivants dans l'ordre :
  * creationBaseAutoEcole.sql ;
  * creationFonctionsAutoEcoleTest.sql ;
  * creationFonctionsAutoEcoleTestBody.sql.
- Installer XAMPP 1.8.3 (https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/1.8.3/) ;
- Modifier le fichier php.ini dans le sous dossier php de XAMPP pour charger la DLL php_oci8_11g ;
- Démarrer XAMPP, et démarrer Apache ;
- Créer un dossier dans le sous-dossier de XAMPP appelé htdocs, par exemple ProjetAutoEcole ;
- Mettre dedans :
  * Le conteu du dossier ProjetAutoEcole/EclipsePHP/Projet/application/AutoEcole/ ;
  * Les dossiers BLL et DAL.
- Ouvrir un navigateur sur la page http://localhost/ProjetAutoEcole/index.php
