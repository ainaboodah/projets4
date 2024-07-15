-- sql: nom base projets4
-- mila mi-creer base chacun

CREATE TABLE type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    value varchar(50)
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