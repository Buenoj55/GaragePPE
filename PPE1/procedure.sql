/*
-	Supprimer heritage 2 roues 4 roues
-	Procedure avec curseur qui va calculer le montant HT et le montant TTC et la TVA pour piece et operations
-	Procedure pour gestion des stock
-	Procedure de mise à jours pour les rendez-vous et les clients
-	Procedure pour la table Planning
*/

DROP PROCEDURE IF EXISTS Calcul_MontantHT;
DELIMITER //
	CREATE PROCEDURE Calcul_MontantHT()
	BEGIN
	DECLARE fini INT DEFAULT 0;
	DECLARE idP int;
	DECLARE prixP,tvaP FLOAT;
	DECLARE curFac CURSOR FOR SELECT ID_PIECE, PRIX_PIECE, TAUXTVA_PIECE FROM PIECES;
	DECLARE continue HANDLER FOR NOT FOUND SET fini = 1;
	OPEN curFac;
	FETCH curFac INTO idP, prixP, tvaP;
	WHILE fini != 1
	DO
	UPDATE PIECES
	SET MONTANTHT_PIECE = PRIX_PIECE * ((100 - TAUXTVA_PIECE) / 100)
	WHERE ID_PIECE = idP;
	FETCH curFac INTO idP, prixP, tvaP;
	END WHILE;
	CLOSE curFac;
	END // 
DELIMITER ;

/*
DROP TRIGGER IF EXISTS exCalcul_MontantHT;
DELIMITER //
CREATE TRIGGER exCalcul_MontantHT
	AFTER INSERT ON PIECES
	FOR EACH ROW
BEGIN
	CALL Calcul_MontantHT();
END //
DELIMITER ;