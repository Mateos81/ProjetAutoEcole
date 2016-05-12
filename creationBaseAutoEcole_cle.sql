-- Nettoyage
ALTER TABLE HISTO_KM DROP CONSTRAINT fk_vehiculeHisto;
ALTER TABLE LECON DROP CONSTRAINT fk_vehiculeLecon;
ALTER TABLE LECON DROP CONSTRAINT fk_eleveLecon;
ALTER TABLE LECON DROP CONSTRAINT fk_salarieLecon;
ALTER TABLE LECON DROP CONSTRAINT fk_typeLecon;
ALTER TABLE SALARIE DROP CONSTRAINT fk_villeSalarie;
ALTER TABLE SALARIE DROP CONSTRAINT fk_vehiculeSalarie;
ALTER TABLE SALARIE DROP CONSTRAINT fk_posteSalarie;
ALTER TABLE CLIENT DROP CONSTRAINT fk_villeCli;
ALTER TABLE ELEVE DROP CONSTRAINT fk_salarieEleve;
ALTER TABLE ELEVE DROP CONSTRAINT fk_villeEleve;
ALTER TABLE ELEVE DROP CONSTRAINT fk_cliEleve;
ALTER TABLE PASSER DROP CONSTRAINT fk_elevePasser;
ALTER TABLE PASSER DROP CONSTRAINT fk_examenPasser;
ALTER TABLE CONCERNER DROP CONSTRAINT fk_eleveConcerner;
ALTER TABLE CONCERNER DROP CONSTRAINT fk_formuleConcerner;
ALTER TABLE ACHETER DROP CONSTRAINT fk_cliAcheter;
ALTER TABLE ACHETER DROP CONSTRAINT fk_formAcheter;
ALTER TABLE EXAMEN DROP CONSTRAINT fk_typeExam;
ALTER TABLE SUIVRE DROP CONSTRAINT fk_eleveSuivre;
ALTER TABLE SUIVRE DROP CONSTRAINT fk_salarieSuivre;

DROP TABLE HISTO_KM;
DROP TABLE PASSER;
DROP TABLE CONCERNER;
DROP TABLE ACHETER;
DROP TABLE EXAMEN;
DROP TABLE FORMULE;
DROP TABLE CLIENT;
DROP TABLE ELEVE;
DROP TABLE SALARIE;
DROP TABLE VEHICULE;
DROP TABLE POSTE;
DROP TABLE TYPEL;
DROP TABLE SUIVRE;
DROP TABLE VILLE;
DROP TABLE LECON;

/*
DROP TYPE T_HISTO_KM;
DROP TYPE T_LECON;
DROP TYPE T_PASSER;
DROP TYPE T_CONCERNER;
DROP TYPE T_ACHETER;
DROP TYPE T_EXAMEN;
DROP TYPE T_FORMULE;
DROP TYPE T_CLIENT;
DROP TYPE T_ELEVE;
DROP TYPE T_SALARIE;
DROP TYPE T_VEHICULE;
DROP TYPE T_POSTE;
DROP TYPE T_TYPEL;
DROP TYPE T_SUIVRE;
DROP TYPE T_VILLE;
*/

DROP SEQUENCE seq_eleve;
DROP SEQUENCE seq_salarie;
DROP SEQUENCE seq_cli;
DROP SEQUENCE seq_lecon;
DROP SEQUENCE seq_vehicule;
DROP SEQUENCE seq_formule;
DROP SEQUENCE seq_poste;
DROP SEQUENCE seq_typeL;

-- Création
CREATE TABLE VEHICULE
(
  vehicule_num INT PRIMARY KEY,
  vehicule_immatriculation CHAR(9) NOT NULL,
  vehicule_marque VARCHAR(20),
  vehicule_modele VARCHAR(20)
);

CREATE TABLE VILLE
(
  ville_nom VARCHAR(30),
  ville_cp CHAR(5),
  PRIMARY KEY(ville_nom, ville_cp)
);

CREATE TABLE POSTE
(
  poste_num INT PRIMARY KEY,
  poste_nom VARCHAR(20) NOT NULL
);

CREATE TABLE SALARIE
(
  salarie_id INT PRIMARY KEY,
  salarie_nom VARCHAR(30) NOT NULL,
  salarie_prenom VARCHAR(30) NOT NULL,
  salarie_surnom VARCHAR(20) NOT NULL,
  salarie_adr VARCHAR(50) NOT NULL,
  salarie_ville VARCHAR(30) NOT NULL,
  salarie_cp CHAR(5) NOT NULL,
  salarie_tel CHAR(10),
  salarie_poste INT NOT NULL,
  salarie_vehicule INT,

  CONSTRAINT fk_villeSalarie FOREIGN KEY(salarie_ville, salarie_cp) REFERENCES VILLE(ville_nom, ville_cp) ON DELETE CASCADE,
  CONSTRAINT fk_vehiculeSalarie FOREIGN KEY(salarie_vehicule) REFERENCES VEHICULE(vehicule_num) ON DELETE CASCADE,
  CONSTRAINT fk_posteSalarie FOREIGN KEY(salarie_poste) REFERENCES POSTE(poste_num) ON DELETE CASCADE
);

CREATE TABLE CLIENT
(
  client_id INT PRIMARY KEY,
  client_nom VARCHAR(30) NOT NULL,
  client_prenom VARCHAR(30) NOT NULL,
  client_adr VARCHAR(50) NOT NULL,
  client_ville VARCHAR(30) NOT NULL,
  client_cp CHAR(5) NOT NULL,
  client_tel CHAR(10),
  client_dateNaiss DATE NOT NULL,

  CONSTRAINT fk_villeClient FOREIGN KEY(client_ville, client_cp) REFERENCES VILLE(ville_nom, ville_cp) ON DELETE CASCADE
);

CREATE TABLE ELEVE
(
  eleve_id INT PRIMARY KEY,
  eleve_nom VARCHAR(30) NOT NULL,
  eleve_prenom VARCHAR(30) NOT NULL,
  eleve_adr VARCHAR(50) NOT NULL,
  eleve_ville VARCHAR(30) NOT NULL,
  eleve_cp CHAR(5) NOT NULL,
  eleve_tel CHAR(10),
  eleve_dateNaiss DATE NOT NULL,
  eleve_salarie INT NOT NULL,
  eleve_cli INT NOT NULL,

  CONSTRAINT fk_villeEleve FOREIGN KEY(eleve_ville, eleve_cp) REFERENCES VILLE(ville_nom, ville_cp) ON DELETE CASCADE,
  CONSTRAINT fk_salarieEleve FOREIGN KEY(eleve_salarie) REFERENCES SALARIE(salarie_id) ON DELETE CASCADE,
  CONSTRAINT fk_cliEleve FOREIGN KEY(eleve_cli) REFERENCES CLIENT(client_id) ON DELETE CASCADE
);

CREATE TABLE HISTO_KM
(
  histoKm_date DATE,
  histoKm_numVehicule INT,
  histoKm_nbKm INT NOT NULL,
  PRIMARY KEY(histoKm_date, histoKm_numVehicule),

  CONSTRAINT fk_vehiculeHisto FOREIGN KEY(histoKm_numVehicule) REFERENCES VEHICULE(vehicule_num) ON DELETE CASCADE
);

CREATE TABLE TYPEL
(
	typel_id INT PRIMARY KEY,
	typel_nom VARCHAR(20) NOT NULL
);

CREATE TABLE LECON
(
	lecon_num INT PRIMARY KEY,
	lecon_date DATE NOT NULL,
	lecon_vehicule INT NOT NULL,
	lecon_salarie INT NOT NULL,
	lecon_eleve INT NOT NULL,
	lecon_type INT NOT NULL,

	CONSTRAINT fk_vehiculeLecon FOREIGN KEY(lecon_vehicule) REFERENCES VEHICULE(vehicule_num) ON DELETE CASCADE,
	CONSTRAINT fk_eleveLecon FOREIGN KEY(lecon_eleve) REFERENCES ELEVE(eleve_id) ON DELETE CASCADE,
	CONSTRAINT fk_salarieLecon FOREIGN KEY(lecon_salarie) REFERENCES SALARIE(salarie_id) ON DELETE CASCADE,
	CONSTRAINT fk_typeLecon FOREIGN KEY(lecon_type) REFERENCES TYPEL(typel_id) ON DELETE CASCADE
);


CREATE TABLE EXAMEN
(
	examen_date DATE,
	examen_type INT,
	PRIMARY KEY(examen_date, examen_type),

	CONSTRAINT fk_typeExam FOREIGN KEY(examen_type) REFERENCES TYPEL(typel_id) ON DELETE CASCADE
);

CREATE TABLE FORMULE
(
	formule_num INT PRIMARY KEY,
	formule_nbLeconConduite INT,
	formule_prix INT NOT NULL,
	formule_ticketPrix FLOAT NOT NULL
);

CREATE TABLE ACHETER
(
	acheter_num INT PRIMARY KEY,
	acheter_date DATE NOT NULL,
	acheter_client INT NOT NULL,
	acheter_formule INT NOT NULL,
	acheter_nbTicket INT,
	acheter_paye FLOAT,

	CONSTRAINT fk_cliAcheter FOREIGN KEY(acheter_client) REFERENCES CLIENT(client_id) ON DELETE CASCADE,
	CONSTRAINT fk_formuleAcheter FOREIGN KEY(acheter_formule) REFERENCES FORMULE(formule_num) ON DELETE CASCADE
);

CREATE TABLE CONCERNER
(
	concerner_num INT PRIMARY KEY,
	concerner_eleve INT NOT NULL,
	concerner_formule INT NOT NULL,

	CONSTRAINT fk_eleveConcerner FOREIGN KEY(concerner_eleve) REFERENCES ELEVE(eleve_id) ON DELETE CASCADE,
	CONSTRAINT fk_formuleConcerner FOREIGN KEY(concerner_formule) REFERENCES FORMULE(formule_num) ON DELETE CASCADE
);

CREATE TABLE PASSER
(
	passer_num INT PRIMARY KEY,
	passer_examenType INT NOT NULL,
	passer_examenDate DATE NOT NULL,
	passer_eleve INT NOT NULL,
	passer_resultat INT NOT NULL,

	CONSTRAINT fk_elevePasser FOREIGN KEY(passer_eleve) REFERENCES ELEVE(eleve_id) ON DELETE CASCADE,
	CONSTRAINT fk_examenPasser FOREIGN KEY(passer_examenDate, passer_examenType) REFERENCES EXAMEN(examen_date, examen_type) ON DELETE CASCADE
);

CREATE TABLE SUIVRE
(
	suivre_num INT PRIMARY KEY,
	suivre_eleve INT NOT NULL,
	suivre_lecon INT NOT NULL,

	CONSTRAINT fk_eleveSuivre FOREIGN KEY(suivre_eleve) REFERENCES ELEVE(eleve_id) ON DELETE CASCADE,
	CONSTRAINT fk_leconSuivre FOREIGN KEY(suivre_lecon) REFERENCES LECON(lecon_num) ON DELETE CASCADE
);


/*

CREATE TYPE T_VEHICULE
(
  vehicule_num INT,
  vehicule_immatriculation CHAR(9),
  vehicule_marque VARCHAR(20),
  vehicule_modele VARCHAR(20)
);

CREATE TYPE T_VILLE
(
  ville_nom VARCHAR(30),
  ville_cp CHAR(5)
);

CREATE TYPE T_POSTE
(
  poste_num INT,
  poste_nom VARCHAR(20)
);

CREATE TYPE T_SALARIE
(
  salarie_id INT,
  salarie_nom VARCHAR(30),
  salarie_prenom VARCHAR(30),
  salarie_surnom VARCHAR(20),
  salarie_adr VARCHAR(50),
  salarie_ville VARCHAR(30),
  salarie_cp CHAR(5),
  salarie_tel CHAR(10),
  salarie_poste INT,
  salarie_vehicule INT  
);

CREATE TYPE T_CLIENT
(
  client_id INT,
  client_nom VARCHAR(30),
  client_prenom VARCHAR(30),
  client_adr VARCHAR(50),
  client_ville VARCHAR(30),
  client_cp CHAR(5),
  client_tel CHAR(10),
  client_dateNaiss DATE
);

CREATE TYPE T_ELEVE
(
  eleve_id INT,
  eleve_nom VARCHAR(30),
  eleve_prenom VARCHAR(30),
  eleve_adr VARCHAR(50),
  eleve_ville VARCHAR(30),
  eleve_cp CHAR(5),
  eleve_tel CHAR(10),
  eleve_dateNaiss DATE,
  eleve_salarie INT,
  eleve_cli INT
);

CREATE TYPE T_HISTO_KM
(
  histoKm_date DATE,
  histoKm_numVehicule INT,
  histoKm_nbKm INT
);

CREATE TYPE T_LECON
(
	lecon_num INT,
	lecon_date DATE,
	lecon_vehicule INT,
	lecon_salarie INT,
	lecon_eleve INT,
	lecon_type INT
);

CREATE TYPE T_TYPEL
(
	typel_id INT,
	typel_nom VARCHAR(20)
);

CREATE TYPE T_EXAMEN
(
	examen_date DATE,
	examen_type INT
);

CREATE TYPE T_FORMULE
(
	formule_num INT,
	formule_nbLeconConduite INT,
	formule_prix INT,
	formule_ticketPrix FLOAT
);

CREATE TYPE T_ACHETER
(
	acheter_num INT,
	acheter_date DATE,
	acheter_client INT,
	acheter_formule INT,
	acheter_nbTicket INT,
	acheter_paye FLOAT
);

CREATE TYPE T_CONCERNER
(
	concerner_num INT,
	concerner_eleve INT,
	concerner_formule INT
);

CREATE TYPE T_PASSER
(
	passer_num INT,
	passer_examenType INT,
	passer_examenDate DATE,
	passer_eleve INT,
	passer_resultat INT
);

CREATE TYPE T_SUIVRE
(
	suivre_num INT,
	suivre_eleve INT,
	suivre_lecon INT
);

*/
CREATE SEQUENCE seq_eleve
MINVALUE 1
START WITH 1
INCREMENT BY 1
CACHE 10;

CREATE SEQUENCE seq_salarie
MINVALUE 1
START WITH 1
INCREMENT BY 1
CACHE 10;

CREATE SEQUENCE seq_cli
MINVALUE 1
START WITH 1
INCREMENT BY 1
CACHE 10;

CREATE SEQUENCE seq_lecon
MINVALUE 1
START WITH 1
INCREMENT BY 1
CACHE 10;

CREATE SEQUENCE seq_vehicule
MINVALUE 1
START WITH 1
INCREMENT BY 1
CACHE 10;

CREATE SEQUENCE seq_formule
MINVALUE 1
START WITH 1
INCREMENT BY 1
CACHE 10;

CREATE SEQUENCE seq_poste
MINVALUE 1
START WITH 1
INCREMENT BY 1
CACHE 10;

CREATE SEQUENCE seq_typeL
MINVALUE 1
START WITH 1
INCREMENT BY 1
CACHE 10;




