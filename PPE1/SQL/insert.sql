INSERT INTO PIECES (TYPE_PIECE, PRIX_PIECE, CATEGORIE_PIECE, QUANTITE_PIECE) VALUES 
			  ('Plaquettes de frein', 19.9, 'Freinage', 50),
			  ('Disques de freinage', 89.9, 'Freinage', 50),
			  ('Cylindres de freinage', 49.9 , 'Freinage', 50),
			  ('Embrayage', 69.9, 'Embrayage', 50),
			  ('Fourchette d\'embrayage', 19.9, 'Embrayage', 50),
			  ('Filtre d\'habitacle', 14.9, 'Filtration', 50),
			  ('Filtre à huile', 6.9, 'Filtration', 50),
			  ('Amortisseurs', 69.9, 'Suspension', 50),
			  ('Kit amortisseur', 19.9, 'Suspension', 50),
			  ('Rotules', 39.9, 'Suspension', 50),
			  ('Pot d\'échappement', 89.9, 'Echappement', 50),
			  ('Lampes', 29.9, 'Eclairage', 50);


INSERT INTO PARTICULIERS (CIVILITE_PARTICULIER, PRENOM_PARTICULIER, DATENAISS_PARTICULIER, NOM_CLIENT, MAIL_CLIENT, MDP_CLIENT, ADR_CLIENT, CP_CLIENT, VILLE_CLIENT, TEL_CLIENT, ETAT_CLIENT) VALUES
				('Femme', 'User', '1996-11-02', 'Default', 'user1@gmail.com', sha1(sha1('user1')), '21 Boulevard Francois Mitterand', '75000', 'Paris', '0138435898', '1'),
				('Homme', 'User', '1987-12-13', 'Default', 'user2@gmail.com', sha1(sha1('user2')), '38 Boulevard Haussmann', '75000', 'Paris', '0181437898', '1'),
				('Homme', 'Pierre', '1992-11-25', 'Mauer', 'mauerpierre@gmail.com', sha1(sha1('123456')), '2, rue Jean-Francois Gerbillon', '75006', 'Paris', '0680631639', '1'),
				('Homme', 'Jerome', '1996-11-02', 'Bueno', 'jerome.bueno@hotmail.fr', sha1(sha1('jerome')), '19, avenue Paul Herbe', '95200', 'Sarcelles', '0101010101', '1'),
				('Homme', 'Lamine', '1995-05-14', 'Messaoudi', 'lamine_78@live.fr', sha1(sha1('azerty')), '7, allee des Yvelines', '78190', 'Trappes', '0101010101', '1');


INSERT INTO  OPERATIONS (LIBELLE_OPERATION, PRIX_OPERATION, DUREEESTIME_OPERATION) VALUES
			 	('Vidange', 70.0, '01:00:00'),
			 	('Controle technique' ,85.0, '00:20:00'),
			 	('Peinture exterieure', 250.0, '06:00:00'),
			 	('Pose d\'un pneu', 10.0, '00:15:00'),
			 	('Pose des disques et des plaquettes de frein', 140.0, '03:00:00'),
			 	('Entretien climatisation', 50.0, '01:00:00'),
			 	('Changement de batterie', 30.0, '00:30:00'),
			 	('Rénovation des phares avant', 60.0, '01:00:00'),
			 	('Rénovation des phares arrière', 60.0, '01:00:00'),
			 	('Remplacement de la courroie de distribution', 60.0, '01:00:00'),
			 	('Remplacement du pot d\'échappement', 20.0, '00:30:00'),
			 	('Montage de plaque d\'immatriculation', 5.0, '00:15:00'),
			 	('Remplacement de la boite de vitesse', 300.0, '04:00:00');


INSERT INTO TYPEVEHICULES (MARQUE_VEHICULE, MODELE_VEHICULE) VALUES ('Audi','A1'),
				 ('Audi','A2'),
				 ('Audi','A3'),
				 ('Audi','Q2'),
				 ('Audi','Q3'),
				 ('Audi','R8'),
				 ('Dacia','Duster'),
				 ('Dacia','Logan'),
				 ('Dacia','Sandero'),
				 ('Dacia','Lodgy'),
				 ('Dacia','Dokker'),
				 ('Ford','Fiesta'),
				 ('Ford','Focus'),
				 ('Ford','Galaxy'),
				 ('Ford','Ka'),
				 ('Ford','Mondeo'),
				 ('Fiat','500'),
				 ('Fiat','500 L'),
				 ('Fiat','500 X'),
				 ('Fiat','Punto'),
				 ('Fiat','Panda'),
				 ('Hyundai','I10'),
				 ('Hyundai','I20'),
				 ('Hyundai','I30'),
				 ('Hyundai','I40'),
				 ('Hyundai','Ioniq'),
				 ('Kia','Niro'),
				 ('Kia','Picanto'),
				 ('Kia','Rio'),
				 ('Kia','Sportage'),
				 ('Kia','Venga'),
				 ('Mercedes','Classe A'),
				 ('Mercedes','Classe B'),
				 ('Mercedes','Classe C'),
				 ('Mercedes','Classe E'),
				 ('Mercedes','Classe S'),
				 ('Nissan','Juke'),
				 ('Nissan','Micra'),
				 ('Nissan','Note'),
				 ('Nissan','Pulsar'),
				 ('Nissan','Qashqai'),
				 ('Opel','Adam'),
				 ('Opel','Astra'),
				 ('Opel','Corsa'),
				 ('Opel','Meriva'),
				 ('Opel','Zafira'),
				 ('Peugeot','108'),
				 ('Peugeot','207'),
				 ('Peugeot','2008'),
				 ('Peugeot','308'),
				 ('Peugeot','Traveller'),
				 ('Renault','Captur'),
				 ('Renault','Clio'),
				 ('Renault','Espace'),
				 ('Renault','Kadjar'),
				 ('Renault','Megane'),
				 ('Renault','Scenic'),
				 ('Renault','Twingo'),
				 ('Smart','Forfour'),
				 ('Smart','Fortwo'),
				 ('Toyota','Auris'),
				 ('Toyota','Aygo'),
				 ('Toyota','Iq'),
				 ('Toyota','Verso'),
				 ('Toyota','Yaris'),
				 ('Volkswagen','Cc'),
				 ('Volkswagen','Coccinelle'),
				 ('Volkswagen','Golf'),
				 ('Volkswagen','Passat'),
				 ('Volkswagen','Polo'),
				 ('Volkswagen','Tiguan'),
				 ('Volkswagen','Up!');


INSERT INTO VEHICULES (ID_TYPEVEHICULE, ID_CLIENT, IMMAT_VEHICULE, DATEACHAT_VEHICULE, KM_VEHICULE, COULEUR_VEHICULE) VALUES
				(3, 3, 'AB-123-AB', '2012-11-25', 100000, 'Noir'),
				(12, 3, 'AB-123-AB', '2013-11-25', 50000, 'Blanc'),
				(34, 3, 'AB-123-AB', '2014-11-25', 20000, 'Gris');


INSERT INTO RDV (ID_VEHICULE, ID_CLIENT, DATE_RDV, HEURE_RDV) VALUES
				(1, 3, '2017-03-15', '13:00:00'),
				(2, 3, '2017-03-27', '16:00:00');


INSERT INTO COMPOSER (ID_OPERATION, ID_PIECE, NB_PIECE) VALUES
				(8, 12, 2),
				(9, 12, 2),
				(5, 1, 1),
				(5, 2, 1);
				

INSERT INTO DEVIS (ID_CLIENT, ID_VEHICULE, ID_OPERATION, DATE_DEVIS) VALUES
				(3, 1, 8, '2017-03-01'),
				(3, 2, 5, '2017-03-01');
