DROP DATABASE IF EXISTS garage;

CREATE DATABASE IF NOT EXISTS garage;
USE garage;
# -----------------------------------------------------------------------------
#       TABLE : RDV
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RDV
 (
   ID_RDV INTEGER NOT NULL AUTO_INCREMENT ,
   ID_VEHICULE INTEGER NOT NULL  ,
   ID_CLIENT INTEGER NOT NULL  ,
   DATE_RDV DATE NOT NULL  ,
   HEURE_RDV TIME NOT NULL  ,
   RAISON_RDV CHAR(32) NULL
   , PRIMARY KEY (ID_RDV)
 )
 comment = "", charset="UTF8";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE RDV
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_RDV_VEHICULES
     ON RDV (ID_VEHICULE ASC);

CREATE  INDEX I_FK_RDV_CLIENTS
     ON RDV (ID_CLIENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : DEVIS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DEVIS
 (
   NUM_DEVIS INTEGER NOT NULL AUTO_INCREMENT ,
   ID_CLIENT INTEGER NOT NULL  ,
   ID_VEHICULE INTEGER NOT NULL  ,
   ID_OPERATION INTEGER NOT NULL  ,
   DATE_DEVIS DATE NULL
   , PRIMARY KEY (NUM_DEVIS)
 )
 comment = "", charset="UTF8";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DEVIS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DEVIS_CLIENTS
     ON DEVIS (ID_CLIENT ASC);

CREATE  INDEX I_FK_DEVIS_VEHICULES
     ON DEVIS (ID_VEHICULE ASC);

CREATE  INDEX I_FK_DEVIS_OPERATIONS
     ON DEVIS (ID_OPERATION ASC);

# -----------------------------------------------------------------------------
#       TABLE : PIECES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PIECES
 (
   ID_PIECE INTEGER NOT NULL AUTO_INCREMENT ,
   TYPE_PIECE VARCHAR(255) NULL  ,
   PRIX_PIECE DECIMAL(10,2) NULL  ,
   CATEGORIE_PIECE VARCHAR(255) NULL  ,
   QUANTITE_PIECE BIGINT(4) NULL
   , PRIMARY KEY (ID_PIECE)
 )
 comment = "", charset="UTF8";

# -----------------------------------------------------------------------------
#       TABLE : OPERATIONS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS OPERATIONS
 (
   ID_OPERATION INTEGER NOT NULL AUTO_INCREMENT ,
   LIBELLE_OPERATION VARCHAR(128) NOT NULL  ,
   PRIX_OPERATION DECIMAL(10,2) NOT NULL  ,
   DUREEESTIME_OPERATION TIME NULL
   , PRIMARY KEY (ID_OPERATION)
 )
 comment = "", charset="UTF8";

# -----------------------------------------------------------------------------
#       TABLE : PARTICULIERS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARTICULIERS
 (
   ID_CLIENT INTEGER NOT NULL AUTO_INCREMENT ,
   CIVILITE_PARTICULIER VARCHAR(128) NULL  ,
   PRENOM_PARTICULIER VARCHAR(255) NULL  ,
   DATENAISS_PARTICULIER DATE NULL  ,
   NOM_CLIENT VARCHAR(255) NOT NULL  ,
   MAIL_CLIENT VARCHAR(255) NOT NULL  ,
   MDP_CLIENT VARCHAR(255) NOT NULL  ,
   ADR_CLIENT VARCHAR(255) NULL  ,
   CP_CLIENT VARCHAR(128) NULL  ,
   VILLE_CLIENT VARCHAR(128) NULL  ,
   TEL_CLIENT VARCHAR(128) NULL  ,
   ETAT_CLIENT BOOL NULL
   , PRIMARY KEY (ID_CLIENT)
 )
 comment = "", charset="UTF8";

# -----------------------------------------------------------------------------
#       TABLE : TYPEVEHICULES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPEVEHICULES
 (
   ID_TYPEVEHICULE INTEGER NOT NULL AUTO_INCREMENT ,
   MARQUE_VEHICULE CHAR(32) NULL  ,
   MODELE_VEHICULE CHAR(32) NULL  ,
   COEFF_VEHICULE DECIMAL(10,2) NULL
   , PRIMARY KEY (ID_TYPEVEHICULE)
 )
 comment = "", charset="UTF8";

# -----------------------------------------------------------------------------
#       TABLE : VEHICULES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VEHICULES
 (
   ID_VEHICULE INTEGER NOT NULL AUTO_INCREMENT ,
   ID_TYPEVEHICULE INTEGER NOT NULL  ,
   ID_CLIENT INTEGER NOT NULL  ,
   IMMAT_VEHICULE VARCHAR(128) NOT NULL  ,
   DATEACHAT_VEHICULE DATE NULL  ,
   KM_VEHICULE INTEGER NULL  ,
   COULEUR_VEHICULE CHAR(32) NULL
   , PRIMARY KEY (ID_VEHICULE)
 )
 comment = "", charset="UTF8";

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
   NOM_TECHNICIEN CHAR(255) NOT NULL  ,
   PRENOM_TECHNICIEN CHAR(255) NOT NULL  ,
   DATEEMBAUCHE_TECHNICIEN DATE NULL
   , PRIMARY KEY (ID_TECHNICIEN)
 )
 comment = "", charset="UTF8";

# -----------------------------------------------------------------------------
#       TABLE : CLIENTS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLIENTS
 (
   ID_CLIENT INTEGER NOT NULL AUTO_INCREMENT ,
   NOM_CLIENT VARCHAR(255) NOT NULL  ,
   MAIL_CLIENT VARCHAR(255) NOT NULL  ,
   MDP_CLIENT VARCHAR(255) NOT NULL  ,
   ADR_CLIENT VARCHAR(255) NULL  ,
   CP_CLIENT VARCHAR(128) NULL  ,
   VILLE_CLIENT VARCHAR(128) NULL  ,
   TEL_CLIENT VARCHAR(128) NULL  ,
   ETAT_CLIENT BOOL NULL
   , PRIMARY KEY (ID_CLIENT)
 )
 comment = "", charset="UTF8";

# -----------------------------------------------------------------------------
#       TABLE : ENTREPRISES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ENTREPRISES
 (
   ID_CLIENT INTEGER NOT NULL AUTO_INCREMENT ,
   NUMSIRET_ENTREPRISE BIGINT(4) NULL  ,
   ACTIVITE_ENTREPRISE VARCHAR(128) NULL  ,
   NOM_CLIENT VARCHAR(255) NOT NULL  ,
   MAIL_CLIENT VARCHAR(255) NOT NULL  ,
   MDP_CLIENT VARCHAR(255) NOT NULL  ,
   ADR_CLIENT VARCHAR(255) NULL  ,
   CP_CLIENT VARCHAR(128) NULL  ,
   VILLE_CLIENT VARCHAR(128) NULL  ,
   TEL_CLIENT VARCHAR(128) NULL  ,
   ETAT_CLIENT BOOL NULL
   , PRIMARY KEY (ID_CLIENT)
 )
 comment = "", charset="UTF8";

# -----------------------------------------------------------------------------
#       TABLE : CALCULER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CALCULER
 (
   NUM_DEVIS INTEGER NOT NULL  ,
   HT_DEVIS DECIMAL(10,2) NULL  ,
   TVA_DEVIS DECIMAL(10,2) NULL  ,
   TTC_DEVIS DECIMAL(10,2) NOT NULL
   , PRIMARY KEY (NUM_DEVIS)
 )
 comment = "", charset="UTF8";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CALCULER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CALCULER_DEVIS
     ON CALCULER (NUM_DEVIS ASC);

# -----------------------------------------------------------------------------
#       TABLE : COMPOSER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMPOSER
 (
   ID_OPERATION INTEGER NOT NULL  ,
   ID_PIECE INTEGER NOT NULL  ,
   NB_PIECE INT NOT NULL
   , PRIMARY KEY (ID_OPERATION,ID_PIECE)
 )
 comment = "", charset="UTF8";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMPOSER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMPOSER_OPERATIONS
     ON COMPOSER (ID_OPERATION ASC);

CREATE  INDEX I_FK_COMPOSER_PIECES
     ON COMPOSER (ID_PIECE ASC);

# -----------------------------------------------------------------------------
#       TABLE : VALIDER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VALIDER
 (
   NUM_DEVIS INTEGER NOT NULL  ,
   DATE_VALIDATION DATE NULL  ,
   VALIDATION BOOL
   , PRIMARY KEY (NUM_DEVIS)
 )
 comment = "", charset="UTF8";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE VALIDER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_VALIDER_DEVIS
     ON VALIDER (NUM_DEVIS ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE RDV
  ADD FOREIGN KEY FK_RDV_VEHICULES (ID_VEHICULE)
      REFERENCES VEHICULES (ID_VEHICULE) ;


ALTER TABLE RDV
  ADD FOREIGN KEY FK_RDV_CLIENTS (ID_CLIENT)
      REFERENCES CLIENTS (ID_CLIENT) ;


ALTER TABLE DEVIS
  ADD FOREIGN KEY FK_DEVIS_CLIENTS (ID_CLIENT)
      REFERENCES CLIENTS (ID_CLIENT) ;


ALTER TABLE DEVIS
  ADD FOREIGN KEY FK_DEVIS_VEHICULES (ID_VEHICULE)
      REFERENCES VEHICULES (ID_VEHICULE) ;


ALTER TABLE DEVIS
  ADD FOREIGN KEY FK_DEVIS_OPERATIONS (ID_OPERATION)
      REFERENCES OPERATIONS (ID_OPERATION) ;


ALTER TABLE VEHICULES
  ADD FOREIGN KEY FK_VEHICULES_TYPEVEHICULES (ID_TYPEVEHICULE)
      REFERENCES TYPEVEHICULES (ID_TYPEVEHICULE) ;


ALTER TABLE VEHICULES
  ADD FOREIGN KEY FK_VEHICULES_CLIENTS (ID_CLIENT)
      REFERENCES CLIENTS (ID_CLIENT) ;


ALTER TABLE CALCULER
  ADD FOREIGN KEY FK_CALCULER_DEVIS (NUM_DEVIS)
      REFERENCES DEVIS (NUM_DEVIS) ;


ALTER TABLE COMPOSER
  ADD FOREIGN KEY FK_COMPOSER_OPERATIONS (ID_OPERATION)
      REFERENCES OPERATIONS (ID_OPERATION) ;


ALTER TABLE COMPOSER
  ADD FOREIGN KEY FK_COMPOSER_PIECES (ID_PIECE)
      REFERENCES PIECES (ID_PIECE) ;


ALTER TABLE VALIDER
  ADD FOREIGN KEY FK_VALIDER_DEVIS (NUM_DEVIS)
      REFERENCES DEVIS (NUM_DEVIS) ;
