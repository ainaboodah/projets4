-- sql: nom base projets4
-- mila mi-creer base chacun

-- Create the Admin table
CREATE TABLE Admin (
    idAdmin INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(70) NOT NULL,
    password VARCHAR(255) NOT NULL,
    UNIQUE KEY unique_admin (username, password)
);
INSERT INTO Admin VALUES (default, 'admin', 'admin');
CREATE TABLE type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    value varchar(50)
);

CREATE TABLE client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    immatriculation varchar(15),
    idtype int,
    nom varchar(50),
    FOREIGN KEY (idtype) REFERENCES type(id)
);

-- Create the Ouverture table
CREATE TABLE Ouverture (
    id INT PRIMARY KEY AUTO_INCREMENT,
    debut TIME NOT NULL,
    fin TIME NOT NULL
);
INSERT INTO Ouverture (debut, fin) VALUES ('08:00:00', '18:00:00');

CREATE TABLE services (
    id_service INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    duree TIME NOT NULL,
    prix INT NOT NULL
);
CREATE TABLE slots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slot VARCHAR(1) NOT NULL
);
-- Create the Rendezvous table
CREATE TABLE rendezvous (
    id_rdv INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    id_service INT,
    date_debut DATETIME NOT NULL,
    id_slot INT,
    date_paiement DATE,
    FOREIGN KEY (client_id) REFERENCES client(id),
    FOREIGN KEY (id_service) REFERENCES services(id_service),
    FOREIGN KEY (id_slot) REFERENCES slots(id)
);

-- Insérez les slots disponibles
INSERT INTO slots (slot) VALUES ('A'), ('B'), ('C');

-- Create view for occupied slots
CREATE OR REPLACE VIEW v_slot_occupe AS
SELECT id_slot, date_debut, DATE_ADD(date_debut, INTERVAL TIME_TO_SEC(duree) SECOND) AS date_fin
FROM rendezvous
JOIN services ON rendezvous.id_service = services.id_service;

--  Les slots disponibles
SELECT slot
FROM slots 
LEFT JOIN v_slot_occupe 
    ON slot = id_slot
    AND (
        (date_debut < '2024-07-15 10:00:00' AND date_fin > '2024-07-15 10:00:00')
    )
WHERE id_slot IS NULL;

-- Create view for travaux
CREATE OR REPLACE VIEW v_travaux AS
SELECT rendezvous.*, client.nom AS client_name, services.nom AS service_name
FROM rendezvous
JOIN client ON rendezvous.client_id = client.id
JOIN services ON rendezvous.id_service = services.id_service;

-- Query for slot usage
SELECT * FROM v_travaux WHERE DATE(date_debut) = '2024-07-15' GROUP BY id_slot;

-- Additional SQL for revenue calculation and grouping by car type
CREATE OR REPLACE VIEW v_revenue AS
SELECT r.id_rdv, r.date_paiement, s.prix, c.idtype, t.value AS car_type
FROM rendezvous r
JOIN services s ON r.id_service = s.id_service
JOIN client c ON r.client_id = c.id
JOIN type t ON c.idtype = t.id;

SELECT
    car_type,
    SUM(prix) AS total_revenue
FROM v_revenue
WHERE date_paiement IS NOT NULL
GROUP BY car_type;

INSERT INTO projets4.`type`
(id, value)
VALUES(2, 'Légère');
INSERT INTO projets4.`type`
(id, value)
VALUES(3, '4x4');
INSERT INTO projets4.`type`
(id, value)
VALUES(4, 'Utilitaire');
INSERT INTO projets4.`type`
(id, value)
VALUES(5, 'Berline');
INSERT INTO projets4.`type`
(id, value)
VALUES(6, 'Coupé');
INSERT INTO projets4.`type`
(id, value)
VALUES(7, 'Break');
INSERT INTO projets4.`type`
(id, value)
VALUES(8, 'Cabriolet');
INSERT INTO projets4.`type`
(id, value)
VALUES(9, 'Monospace');
INSERT INTO projets4.`type`
(id, value)
VALUES(10, 'Pick-up');
INSERT INTO projets4.`type`
(id, value)
VALUES(11, 'Limousine');
INSERT INTO projets4.`type`
(id, value)
VALUES(12, 'Van');
INSERT INTO projets4.`type`
(id, value)
VALUES(13, 'Voiture de sport');
INSERT INTO projets4.`type`
(id, value)
VALUES(14, 'Roadster');
INSERT INTO projets4.`type`
(id, value)
VALUES(15, 'Hatchback');
INSERT INTO projets4.`type`
(id, value)
VALUES(16, 'SUV');
INSERT INTO projets4.client
(id, immatriculation, idtype, nom)
VALUES(1, '9216TAB', 2, 'Boodah Aina');
INSERT INTO projets4.client
(id, immatriculation, idtype, nom)
VALUES(2, '1123TAC', 2, 'Tendry');