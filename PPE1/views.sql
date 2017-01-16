CREATE OR REPLACE VIEW ClientAndVehicule AS (
	SELECT marque_Vehicule, modele_Vehicule, ID_Vehicule, c.ID_Client
	FROM Vehicules v, TypeVehicules t, Clients c
	WHERE v.ID_TypeVehicule = t.ID_TypeVehicule
	AND c.ID_Client = v.ID_Client
);