CREATE OR REPLACE VIEW v_ClientAndVehicule AS (
	SELECT marque_Vehicule, modele_Vehicule, ID_Vehicule, v.ID_Client, immat_Vehicule, dateachat_Vehicule, km_Vehicule, couleur_Vehicule
	FROM Vehicules v, TypeVehicules t, Clients c
	WHERE v.ID_TypeVehicule = t.ID_TypeVehicule
	AND c.ID_Client = v.ID_Client
);

CREATE OR REPLACE VIEW v_RDVClientVehicule AS (
	SELECT marque_Vehicule, modele_Vehicule, r.ID_Vehicule, r.ID_Client, immat_Vehicule, ID_RDV, date_RDV, heure_RDV
	FROM RDV r, Vehicules v, TypeVehicules t, Clients c
	WHERE c.ID_Client = r.ID_Client
	AND v.ID_TypeVehicule = t.ID_TypeVehicule
	AND v.ID_Vehicule = r.ID_Vehicule
);