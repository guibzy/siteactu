# Creation DB
CREATE DATABASE base2i;

# Précise que nous travaillons bien sur la DB cabinet
USE base2i;

CREATE TABLE Activite(
	Code_Activite integer NOT NULL AUTO_Increment PRIMARY KEY,
	Nom_Activite varchar(100)
	);

CREATE TABLE Categorie(
	ID_Categorie integer NOT NULL AUTO_Increment PRIMARY KEY,
	Nom_Categorie varchar(30),
	Logo_Categorie varchar(50)
	);

CREATE TABLE SousCategorie(
	ID_SousCategorie integer NOT NULL AUTO_Increment PRIMARY KEY,
	Nom_SousCategorie varchar(30),
	Logo_SousCategorie varchar(50),
	ID_Categorie integer
	);
	
CREATE TABLE Utilisateur(
	ID_Utilisateur integer NOT NULL AUTO_Increment PRIMARY KEY,
	Pseudo_Utilisateur char(32) NOT NULL,
	Mot_De_Passe char(32) NOT NULL,
	Adresse_Mail char(40) NOT NULL,
	Redacteur boolean,
	DateNaissance DATE,
	Code_Activite integer NOT NULL);
	
CREATE TABLE Article(
	ID_Article integer NOT NULL AUTO_Increment PRIMARY KEY,
	Titre_Article varchar(100),
	Date_Article DATE,
	Contenu_Article varchar(50000),
	Note_Redacteur float,
	ID_Utilisateur integer,
	ID_SousCategorie integer);
	
	
CREATE TABLE Commentaire(
	ID_Commentaire integer NOT NULL AUTO_Increment PRIMARY KEY,
	Contenu_Commentaire varchar(5000),
	Date_Commentaire DATE,
	ID_Utilisateur integer,
	ID_Article integer);
	
CREATE TABLE Note(
	ID_Article_note integer NOT NULL,
	ID_Utilisateur_note integer NOT NULL,
	Note_Utilisateur float,
	CONSTRAINT pk_note PRIMARY KEY (ID_Article_note,ID_Utilisateur_note)
	);



-- Création des clés secondaires
ALTER TABLE `SousCategorie` ADD FOREIGN KEY (ID_Categorie) REFERENCES Categorie(ID_Categorie);
ALTER TABLE `Article` ADD FOREIGN KEY (ID_Utilisateur) REFERENCES Utilisateur(ID_Utilisateur);
ALTER TABLE `Article` ADD FOREIGN KEY (ID_SousCategorie) REFERENCES SousCategorie(ID_SousCategorie);
ALTER TABLE `Note` ADD FOREIGN KEY (ID_Article_note) REFERENCES Article(ID_Article);
ALTER TABLE `Note` ADD FOREIGN KEY (ID_Utilisateur_note) REFERENCES Utilisateur(ID_Utilisateur);
ALTER TABLE `Commentaire` ADD FOREIGN KEY (ID_Utilisateur) REFERENCES Utilisateur(ID_Utilisateur);
ALTER TABLE `Commentaire` ADD FOREIGN KEY (ID_Article) REFERENCES Article(ID_Article);
ALTER TABLE `Utilisateur` ADD FOREIGN KEY (Code_Activite) REFERENCES Activite(Code_Activite);
/*INSERTION de base*/

insert into categorie VALUES
	(null,"Ordinateurs",""),
	(null,"Tablettes",""),
	(null,"Smartphones","");

insert into souscategorie VALUES
	(null,"Ordinateurs Android","","1"),
	(null,"Ordinateurs iOS","","1"),
	(null,"Ordinateurs Windows","","1"),
	(null,"Tablettes Android","","2"),
	(null,"Tablettes iOS","","2"),
	(null,"Tablettes Windows","","2"),
	(null,"Smartphones Android","","3"),
	(null,"Smartphones iOS","","3"),
	(null,"Smartphones Windows","","3");
	
insert into activite VALUES
	(null,"Agriculture, chasse, sylviculture"),
	(null,"Pêche, aquaculture"),
	(null,"Industries extractives"),
	(null,"Industrie manufacturière"),
	(null,"Construction"),
	(null,"Commerce"),
	(null,"Communication"),
	(null,"Hôtels et restaurants"),
	(null,"Transports et communications"),
	(null,"Activités financières"),
	(null,"Immobilier, location et services aux entreprises"),
	(null,"Administration publique"),
	(null,"Education"),
	(null,"Santé et action sociale"),
	(null,"Services collectifs, sociaux et personnels"),
	(null,"Services domestiques"),
	(null,"Activités extra-territoriales"),
	(null,"Etudiant"),
	(null,"Informatique"),
	(null,"Autres");

insert into utilisateur VALUES (null,"bob","bobi","bob@mail.com",true,"010102 08:35:07","1");

insert into article values(null,"Test","010102 09:05:47","Test insertion BD","3","1","1");