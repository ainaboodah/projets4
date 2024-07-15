-- sql: nom base projets4
-- mila mi-creer base chacun

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
ALTER TABLE client
ADD CONSTRAINT unique_immatriculation UNIQUE (immatriculation);

-- slot 1 à 3
create table slot(
    id INT AUTO_INCREMENT PRIMARY KEY,
    value varchar(10)
);

-- -- service ou rendez vous
CREATE table service(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_client int,
    daty date,
    id_slot int,
    FOREIGN KEY(id_client) REFERENCES client(id),
    FOREIGN KEY(id_slot) REFERENCES slot(id)
);
-- pieces
CREATE TABLE pieces (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    description TEXT
);
-- service diagnostic
CREATE table diagnostic(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_service int,
    FOREIGN KEY(id_service) REFERENCES service(id),
);
-- piece-etat
CREATE table diagnostic_detail(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_diagnostic int,
    id_piece int,
    etat int,
    FOREIGN KEY(id_diagnostic) REFERENCES diagnostic(id),
    FOREIGN KEY(id_piece) REFERENCES pieces(id)
);
--tarif
create table tarif(
    id INT AUTO_INCREMENT PRIMARY KEY,
    value varchar(50),
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

INSERT INTO projets4.client
(id, immatriculation, idtype, nom)
VALUES(1, '9216TAB', 2, 'Boodah Aina');
INSERT INTO projets4.client
(id, immatriculation, idtype, nom)
VALUES(2, '1123TAC', 2, 'Tendry');

INSERT INTO pieces (nom, description) VALUES ('Frein', 'Système permettant de ralentir ou d\'arrêter le véhicule');
INSERT INTO pieces (nom, description) VALUES ('Pont', 'Ensemble mécanique reliant les roues motrices');
INSERT INTO pieces (nom, description) VALUES ('Boîte de vitesses', 'Mécanisme permettant de changer les rapports de transmission');
INSERT INTO pieces (nom, description) VALUES ('Moteur', 'Dispositif de propulsion du véhicule');
INSERT INTO pieces (nom, description) VALUES ('Embrayage', 'Dispositif permettant de connecter ou de déconnecter le moteur de la boîte de vitesses');
INSERT INTO pieces (nom, description) VALUES ('Alternateur', 'Dispositif permettant de recharger la batterie');
INSERT INTO pieces (nom, description) VALUES ('Amortisseur', 'Composant du système de suspension qui absorbe les chocs');
INSERT INTO pieces (nom, description) VALUES ('Radiateur', 'Dispositif permettant de refroidir le moteur');
INSERT INTO pieces (nom, description) VALUES ('Batterie', 'Source d\'énergie électrique pour le démarrage et les accessoires du véhicule');
INSERT INTO pieces (nom, description) VALUES ('Échappement', 'Système d\'évacuation des gaz brûlés');
INSERT INTO pieces (nom, description) VALUES ('Carburateur', 'Dispositif de mélange air-carburant pour les moteurs à combustion');
INSERT INTO pieces (nom, description) VALUES ('Transmission', 'Ensemble des mécanismes transmettant la puissance du moteur aux roues');
INSERT INTO pieces (nom, description) VALUES ('Filtre à huile', 'Dispositif de filtration de l\'huile moteur');
INSERT INTO pieces (nom, description) VALUES ('Filtre à air', 'Dispositif de filtration de l\'air entrant dans le moteur');
INSERT INTO pieces (nom, description) VALUES ('Bougie d\'allumage', 'Composant permettant d\'allumer le mélange air-carburant dans les moteurs à essence');
INSERT INTO pieces (nom, description) VALUES ('Courroie de distribution', 'Composant synchronisant le mouvement des pièces internes du moteur');
INSERT INTO pieces (nom, description) VALUES ('Pompe à eau', 'Dispositif permettant la circulation du liquide de refroidissement');
INSERT INTO pieces (nom, description) VALUES ('Injecteur', 'Composant permettant d\'injecter le carburant dans le moteur');
INSERT INTO pieces (nom, description) VALUES ('Pare-chocs', 'Dispositif de protection avant et arrière du véhicule');
INSERT INTO pieces (nom, description) VALUES ('Phare', 'Dispositif d\'éclairage avant du véhicule');
INSERT INTO pieces (nom, description) VALUES ('Feu arrière', 'Dispositif d\'éclairage arrière du véhicule');
INSERT INTO pieces (nom, description) VALUES ('Essuie-glace', 'Dispositif permettant de nettoyer le pare-brise');
INSERT INTO pieces (nom, description) VALUES ('Roue', 'Élément circulaire permettant le déplacement du véhicule');
INSERT INTO pieces (nom, description) VALUES ('Pneus', 'Revêtement en caoutchouc des roues');
INSERT INTO pieces (nom, description) VALUES ('Suspensions', 'Ensemble de composants permettant d\'absorber les irrégularités de la route');
INSERT INTO pieces (nom, description) VALUES ('Boîte de fusibles', 'Composant regroupant les fusibles du véhicule');
INSERT INTO pieces (nom, description) VALUES ('Ventilateur', 'Dispositif permettant de refroidir le radiateur');
INSERT INTO pieces (nom, description) VALUES ('Capteur de vitesse', 'Composant mesurant la vitesse du véhicule');
INSERT INTO pieces (nom, description) VALUES ('Pompe à carburant', 'Dispositif permettant de pomper le carburant du réservoir au moteur');
INSERT INTO pieces (nom, description) VALUES ('Volant', 'Dispositif de direction du véhicule');

INSERT INTO projets4.slot
(id, value)
VALUES(1, 'slot 1');
INSERT INTO projets4.slot
(id, value)
VALUES(2, 'slot 2');
INSERT INTO projets4.slot
(id, value)
VALUES(3, 'slot 3');

CREATE TABLE Admin (
    idAdmin INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(70) NOT NULL,
    password VARCHAR(255) NOT NULL,
    UNIQUE KEY unique_admin (username, password)
);
INSERT INTO projets4.admin
(idAdmin, username, password)
VALUES(1, 'admin', 'password');