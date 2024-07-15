-- sql: nom base projets4
-- mila mi-creer base chacun

-- Create the Admin table
CREATE TABLE Admin (
    idAdmin INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(70) NOT NULL,
    password VARCHAR(255) NOT NULL,
    UNIQUE KEY unique_admin (username, password)
);

-- Create the Ouverture table
CREATE TABLE Ouverture (
    id INT PRIMARY KEY AUTO_INCREMENT,
    debut TIME NOT NULL,
    fin TIME NOT NULL
);
INSERT INTO Ouverture (debut, fin) VALUES ('08:00:00', '18:00:00');

CREATE TABLE type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    value varchar(50)
);


CREATE TABLE services (
    id_service INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    duree TIME NOT NULL,
    prix INT NOT NULL
);

CREATE TABLE rendezvous (
    id_rdv INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    id_service INT,
    date_debut DATETIME NOT NULL,
    slot VARCHAR(1),
    date_paiement DATE,
    FOREIGN KEY (client_id) REFERENCES clients(id),
    FOREIGN KEY (id_service) REFERENCES services(id_service)
);
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

CREATE TABLE client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    immatriculation varchar(15),
    idtype int,
    nom varchar(50),
    FOREIGN KEY (idtype) REFERENCES type(id)
);

INSERT INTO projets4.client
(id, immatriculation, idtype, nom)
VALUES(1, '9216TAB', 2, 'Boodah Aina');
INSERT INTO projets4.client
(id, immatriculation, idtype, nom)
VALUES(2, '1123TAC', 2, 'Tendry');