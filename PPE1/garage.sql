DROP DATABASE IF EXISTS Garage;

CREATE DATABASE IF NOT EXISTS Garage;
USE Garage;
# -----------------------------------------------------------------------------
#       TABLE : 2_ROUES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS 2_ROUES
 (
   ID_VEHICULE INTEGER NOT NULL  ,
   PUISSANCE_2ROUES INTEGER NULL  ,
   CM3_2ROUES INTEGER NULL  ,
   IMMAT_VEHICULE VARCHAR(128) NULL  ,
   DATEACHAT_VEHICULE DATE NULL  ,
   KM_VEHICULE INTEGER NULL  ,
   COULEUR_VEHICULE VARCHAR(32) NULL  
   , PRIMARY KEY (ID_VEHICULE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : DEVISLIGNE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DEVISLIGNE
 (
   NUM_DEVIS INTEGER NOT NULL AUTO_INCREMENT ,
   ID_CLIENT INTEGER NOT NULL  ,
   ESTIMATION_DEVIS INTEGER NULL  ,
   DATE_DEVIS DATE NULL  ,
   URLPDF_DEVIS VARCHAR(32) NULL  
   , PRIMARY KEY (NUM_DEVIS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DEVISLIGNE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DEVISLIGNE_CLIENTS
     ON DEVISLIGNE (ID_CLIENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : RDV
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RDV
 (
   ID_RDV INTEGER NOT NULL AUTO_INCREMENT ,
   ID_VEHICULE INTEGER NOT NULL  ,
   ID_CLIENT INTEGER NOT NULL  ,
   DATE_RDV DATE NULL  ,
   HEURE_RDV TIME NULL  ,
   RAISON_RDV VARCHAR(32) NULL  
   , PRIMARY KEY (ID_RDV) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE RDV
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_RDV_VEHICULES
     ON RDV (ID_VEHICULE ASC);

CREATE  INDEX I_FK_RDV_CLIENTS
     ON RDV (ID_CLIENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : 4_ROUES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS 4_ROUES
 (
   ID_VEHICULE INTEGER NOT NULL  ,
   PUISSANCE_4ROUES INTEGER NULL  ,
   IMMAT_VEHICULE VARCHAR(128) NULL  ,
   DATEACHAT_VEHICULE DATE NULL  ,
   KM_VEHICULE INTEGER NULL  ,
   COULEUR_VEHICULE VARCHAR(32) NULL  
   , PRIMARY KEY (ID_VEHICULE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PIECES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PIECES
 (
   ID_PIECE INTEGER NOT NULL AUTO_INCREMENT ,
   TYPE_PIECE VARCHAR(32) NULL  ,
   PRIX_PIECE DECIMAL(10,2) NULL  ,
   TAUXTVA_PIECE DECIMAL(10,2) NULL  
   , PRIMARY KEY (ID_PIECE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : OPERATIONS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS OPERATIONS
 (
   ID_OPERATION INTEGER NOT NULL AUTO_INCREMENT ,
   LIBELLE_OPERATION VARCHAR(128) NULL  ,
   PRIX_OPERATION DECIMAL(10,2) NULL  ,
   DUREEESTIME_OPERATION TIME NULL  
   , PRIMARY KEY (ID_OPERATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PARTICULIERS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARTICULIERS
 (
   ID_CLIENT INTEGER NOT NULL AUTO_INCREMENT ,
   CIVILITE_PARTICULIER VARCHAR(32) NULL  ,
   NOM_PARTICULIER VARCHAR(128) NOT NULL  ,
   PRENOM_PARTICULIER VARCHAR(32) NOT NULL  ,
   DATENAISS_PARTICULIER DATE NULL  ,
   ADR_CLIENT VARCHAR(254) NULL  ,
   CP_CLIENT INTEGER NULL  ,
   VILLE_CLIENT VARCHAR(32) NULL  ,
   MAIL_CLIENT VARCHAR(32) NOT NULL  ,
   TEL_CLIENT INTEGER NULL  ,
   MDP_CLIENT VARCHAR(32) NOT NULL  ,
   ETAT_CLIENT BOOLEAN NULL  
   , PRIMARY KEY (ID_CLIENT) 
 ) 
 comment = "";

 INSERT INTO Particuliers (CIVILITE_PARTICULIER, NOM_PARTICULIER, PRENOM_PARTICULIER, DATENAISS_PARTICULIER, ADR_CLIENT, CP_CLIENT, VILLE_CLIENT, MAIL_CLIENT, TEL_CLIENT, MDP_CLIENT, ETAT_CLIENT)
 VALUES ('Homme', 'Mauer', 'Pierre', '1992-11-25', '2, rue Jean-Francois Gerbillon', '75006', 'Paris', 'mauerpierre@gmail.com', '0680631639', '123456', '1');

# -----------------------------------------------------------------------------
#       TABLE : INTERVENTIONS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS INTERVENTIONS
 (
   NUM_INTERVENTION INTEGER NOT NULL  ,
   ID_FACTURE INTEGER NOT NULL  ,
   ID_VEHICULE INTEGER NOT NULL  ,
   DATE_INTERVENTION DATE NULL  ,
   DUREE_INTERVENTION TIME NULL  
   , PRIMARY KEY (NUM_INTERVENTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE INTERVENTIONS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_INTERVENTIONS_FACTURES
     ON INTERVENTIONS (ID_FACTURE ASC);

CREATE  INDEX I_FK_INTERVENTIONS_VEHICULES
     ON INTERVENTIONS (ID_VEHICULE ASC);

# -----------------------------------------------------------------------------
#       TABLE : TYPEVEHICULES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPEVEHICULES
 (
   ID_TYPEVEHICULE INTEGER NOT NULL AUTO_INCREMENT ,
   MARQUE_VEHICULE VARCHAR(32) NULL  ,
   MODELE_VEHICULE VARCHAR(32) NULL  
   , PRIMARY KEY (ID_TYPEVEHICULE) 
 ) 
 comment = "";

 INSERT INTO TYPEVEHICULES VALUES ('Audi', 'A4');
 INSERT INTO TYPEVEHICULES VALUES ('Audi', 'A3');
 INSERT INTO TYPEVEHICULES VALUES ('Audi', 'A2');
 INSERT INTO TYPEVEHICULES VALUES ('Audi', 'A1');

# -----------------------------------------------------------------------------
#       TABLE : FACTURES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FACTURES
 (
   ID_FACTURE INTEGER NOT NULL AUTO_INCREMENT ,
   ID_CLIENT INTEGER NOT NULL  ,
   MONTANT_FACTURE DECIMAL(10,2) NULL  ,
   URLPDF VARCHAR(32) NULL  
   , PRIMARY KEY (ID_FACTURE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE FACTURES
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_FACTURES_CLIENTS
     ON FACTURES (ID_CLIENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : VEHICULES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VEHICULES
 (
   ID_VEHICULE INTEGER NOT NULL AUTO_INCREMENT ,
   ID_TYPEVEHICULE INTEGER NOT NULL  ,
   ID_CLIENT INTEGER NOT NULL  ,
   IMMAT_VEHICULE VARCHAR(128) NULL  ,
   DATEACHAT_VEHICULE DATE NULL  ,
   KM_VEHICULE INTEGER NULL  ,
   COULEUR_VEHICULE VARCHAR(32) NULL  
   , PRIMARY KEY (ID_VEHICULE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE VEHICULES
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_VEHICULES_TYPEVEHICULES
     ON VEHICULES (ID_TYPEVEHICULE ASC);

CREATE  INDEX I_FK_VEHICULES_CLIENTS
     ON VEHICULES (ID_CLIENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : TECHNICIENS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TECHNICIENS
 (
   ID_TECHNICIEN INTEGER NOT NULL AUTO_INCREMENT ,
   NOM_TECHNICIEN VARCHAR(255) NULL  ,
   PRENOM_TECHNICIEN VARCHAR(255) NULL  ,
   DATEEMBAUCHE_TECHNICIEN DATE NULL  ,
   LOGIN_TECHNICIEN VARCHAR(128) NULL  ,
   MDP_TECHNICIEN VARCHAR(128) NULL  ,
   NBINTERVENTION_TECHNICIEN INTEGER NULL  ,
   DISPONIBILITE_TECHNICIEN BOOLEAN NULL  
   , PRIMARY KEY (ID_TECHNICIEN) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : CLIENTS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLIENTS
 (
   ID_CLIENT INTEGER NOT NULL AUTO_INCREMENT ,
   ADR_CLIENT CHAR(32) NULL  ,
   CP_CLIENT INTEGER NULL  ,
   VILLE_CLIENT VARCHAR(32) NULL  ,
   MAIL_CLIENT VARCHAR(32) NOT NULL  ,
   TEL_CLIENT INTEGER NULL  ,
   MDP_CLIENT VARCHAR(32) NOT NULL  ,
   ETAT_CLIENT BOOLEAN NULL  
   , PRIMARY KEY (ID_CLIENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ENTREPRISES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ENTREPRISES
 (
   ID_CLIENT INTEGER NOT NULL AUTO_INCREMENT ,
   NOM_ENTREPRISE VARCHAR(50) NOT NULL  ,
   NUMSIRET_ENTREPRISE INTEGER NOT NULL  ,
   ACTIVITE_ENTREPRISE VARCHAR(32) NULL  ,
   ADR_CLIENT VARCHAR(32) NULL  ,
   CP_CLIENT INTEGER NULL  ,
   VILLE_CLIENT VARCHAR(32) NULL  ,
   MAIL_CLIENT VARCHAR(32) NOT NULL  ,
   TEL_CLIENT INTEGER NULL  ,
   MDP_CLIENT VARCHAR(32) NOT NULL  ,
   ETAT_CLIENT BOOLEAN NULL  
   , PRIMARY KEY (ID_CLIENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : DEPENDRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DEPENDRE
 (
   ID_TYPEVEHICULE INTEGER NOT NULL  ,
   ID_OPERATION INTEGER NOT NULL  
   , PRIMARY KEY (ID_TYPEVEHICULE,ID_OPERATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DEPENDRE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DEPENDRE_TYPEVEHICULES
     ON DEPENDRE (ID_TYPEVEHICULE ASC);

CREATE  INDEX I_FK_DEPENDRE_OPERATIONS
     ON DEPENDRE (ID_OPERATION ASC);

# -----------------------------------------------------------------------------
#       TABLE : NECESSITER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS NECESSITER
 (
   ID_OPERATION INTEGER NOT NULL  ,
   NUM_INTERVENTION INTEGER NOT NULL  
   , PRIMARY KEY (ID_OPERATION,NUM_INTERVENTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE NECESSITER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_NECESSITER_OPERATIONS
     ON NECESSITER (ID_OPERATION ASC);

CREATE  INDEX I_FK_NECESSITER_INTERVENTIONS
     ON NECESSITER (NUM_INTERVENTION ASC);

# -----------------------------------------------------------------------------
#       TABLE : CALCULER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CALCULER
 (
   NUM_DEVIS INTEGER NOT NULL  ,
   ID_OPERATION INTEGER NOT NULL  
   , PRIMARY KEY (NUM_DEVIS,ID_OPERATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CALCULER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CALCULER_DEVISLIGNE
     ON CALCULER (NUM_DEVIS ASC);

CREATE  INDEX I_FK_CALCULER_OPERATIONS
     ON CALCULER (ID_OPERATION ASC);

# -----------------------------------------------------------------------------
#       TABLE : COMPOSER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMPOSER
 (
   ID_OPERATION INTEGER NOT NULL  ,
   ID_PIECE INTEGER NOT NULL  ,
   QUANTITE INTEGER NULL  
   , PRIMARY KEY (ID_OPERATION,ID_PIECE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMPOSER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMPOSER_OPERATIONS
     ON COMPOSER (ID_OPERATION ASC);

CREATE  INDEX I_FK_COMPOSER_PIECES
     ON COMPOSER (ID_PIECE ASC);

# -----------------------------------------------------------------------------
#       TABLE : PLANNING
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PLANNING
 (
   ID_TECHNICIEN INTEGER NOT NULL  ,
   NUM_INTERVENTION INTEGER NOT NULL  ,
   DATEHEUREDEBUT_AFFECTATION DATETIME NULL  ,
   DATEHEUREFIN_AFFECTATION DATETIME NULL  
   , PRIMARY KEY (ID_TECHNICIEN,NUM_INTERVENTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PLANNING
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PLANNING_TECHNICIENS
     ON PLANNING (ID_TECHNICIEN ASC);

CREATE  INDEX I_FK_PLANNING_INTERVENTIONS
     ON PLANNING (NUM_INTERVENTION ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE 2_ROUES 
  ADD FOREIGN KEY FK_2_ROUES_VEHICULES (ID_VEHICULE)
      REFERENCES VEHICULES (ID_VEHICULE) ;


ALTER TABLE DEVISLIGNE 
  ADD FOREIGN KEY FK_DEVISLIGNE_CLIENTS (ID_CLIENT)
      REFERENCES CLIENTS (ID_CLIENT) ;


ALTER TABLE RDV 
  ADD FOREIGN KEY FK_RDV_VEHICULES (ID_VEHICULE)
      REFERENCES VEHICULES (ID_VEHICULE) ;


ALTER TABLE RDV 
  ADD FOREIGN KEY FK_RDV_CLIENTS (ID_CLIENT)
      REFERENCES CLIENTS (ID_CLIENT) ;


ALTER TABLE 4_ROUES 
  ADD FOREIGN KEY FK_4_ROUES_VEHICULES (ID_VEHICULE)
      REFERENCES VEHICULES (ID_VEHICULE) ;


ALTER TABLE PARTICULIERS 
  ADD FOREIGN KEY FK_PARTICULIERS_CLIENTS (ID_CLIENT)
      REFERENCES CLIENTS (ID_CLIENT) ;


ALTER TABLE INTERVENTIONS 
  ADD FOREIGN KEY FK_INTERVENTIONS_FACTURES (ID_FACTURE)
      REFERENCES FACTURES (ID_FACTURE) ;


ALTER TABLE INTERVENTIONS 
  ADD FOREIGN KEY FK_INTERVENTIONS_VEHICULES (ID_VEHICULE)
      REFERENCES VEHICULES (ID_VEHICULE) ;


ALTER TABLE FACTURES 
  ADD FOREIGN KEY FK_FACTURES_CLIENTS (ID_CLIENT)
      REFERENCES CLIENTS (ID_CLIENT) ;


ALTER TABLE VEHICULES 
  ADD FOREIGN KEY FK_VEHICULES_TYPEVEHICULES (ID_TYPEVEHICULE)
      REFERENCES TYPEVEHICULES (ID_TYPEVEHICULE) ;


ALTER TABLE VEHICULES 
  ADD FOREIGN KEY FK_VEHICULES_CLIENTS (ID_CLIENT)
      REFERENCES CLIENTS (ID_CLIENT) ;


ALTER TABLE ENTREPRISES 
  ADD FOREIGN KEY FK_ENTREPRISES_CLIENTS (ID_CLIENT)
      REFERENCES CLIENTS (ID_CLIENT) ;


ALTER TABLE DEPENDRE 
  ADD FOREIGN KEY FK_DEPENDRE_TYPEVEHICULES (ID_TYPEVEHICULE)
      REFERENCES TYPEVEHICULES (ID_TYPEVEHICULE) ;


ALTER TABLE DEPENDRE 
  ADD FOREIGN KEY FK_DEPENDRE_OPERATIONS (ID_OPERATION)
      REFERENCES OPERATIONS (ID_OPERATION) ;


ALTER TABLE NECESSITER 
  ADD FOREIGN KEY FK_NECESSITER_OPERATIONS (ID_OPERATION)
      REFERENCES OPERATIONS (ID_OPERATION) ;


ALTER TABLE NECESSITER 
  ADD FOREIGN KEY FK_NECESSITER_INTERVENTIONS (NUM_INTERVENTION)
      REFERENCES INTERVENTIONS (NUM_INTERVENTION) ;


ALTER TABLE CALCULER 
  ADD FOREIGN KEY FK_CALCULER_DEVISLIGNE (NUM_DEVIS)
      REFERENCES DEVISLIGNE (NUM_DEVIS) ;


ALTER TABLE CALCULER 
  ADD FOREIGN KEY FK_CALCULER_OPERATIONS (ID_OPERATION)
      REFERENCES OPERATIONS (ID_OPERATION) ;


ALTER TABLE COMPOSER 
  ADD FOREIGN KEY FK_COMPOSER_OPERATIONS (ID_OPERATION)
      REFERENCES OPERATIONS (ID_OPERATION) ;


ALTER TABLE COMPOSER 
  ADD FOREIGN KEY FK_COMPOSER_PIECES (ID_PIECE)
      REFERENCES PIECES (ID_PIECE) ;


ALTER TABLE PLANNING 
  ADD FOREIGN KEY FK_PLANNING_TECHNICIENS (ID_TECHNICIEN)
      REFERENCES TECHNICIENS (ID_TECHNICIEN) ;


ALTER TABLE PLANNING 
  ADD FOREIGN KEY FK_PLANNING_INTERVENTIONS (NUM_INTERVENTION)
      REFERENCES INTERVENTIONS (NUM_INTERVENTION) ;

