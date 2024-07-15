-- Create the database
CREATE DATABASE garage;

-- Use the garage database
USE garage;

-- Create the Ouverture table
CREATE TABLE Ouverture (
    id INT PRIMARY KEY AUTO_INCREMENT,
    debut TIME NOT NULL,
    fin TIME NOT NULL
);

INSERT INTO Ouverture (debut, fin) VALUES ('08:00:00', '18:00:00');

-- Create the Admin table
CREATE TABLE Admin (
    idAdmin INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(70) NOT NULL,
    motDePasse VARCHAR(40) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    dateNaissance DATE NOT NULL,
    sexe CHAR(1) NOT NULL,
    UNIQUE KEY unique_admin (email, motDePasse)
);

-- Create the TypeVoiture table
CREATE TABLE TypeVoiture (
    idType INT PRIMARY KEY AUTO_INCREMENT,
    nomType VARCHAR(70) NOT NULL
);

-- Create the Client table
CREATE TABLE Client (
    idClient INT PRIMARY KEY AUTO_INCREMENT,
    numVoiture VARCHAR(50) NOT NULL, -- Car number, serves as part of the login
    typeVoiture INT NOT NULL, -- Foreign key referencing TypeVoiture
    nomProprio VARCHAR(100), -- Name of the car owner
    numProprio VARCHAR(100), -- Contact information of the car owner
    dateRegistration DATE NOT NULL, -- Date when the client registered
    UNIQUE KEY unique_car (numVoiture, typeVoiture), -- Ensuring car number and type combination is unique
    FOREIGN KEY (typeVoiture) REFERENCES TypeVoiture(idType) -- Foreign key constraint
);

-- Create the Service table
CREATE TABLE Service (
    idService INT PRIMARY KEY AUTO_INCREMENT,
    nomService VARCHAR(70) NOT NULL,
    prix DECIMAL(16,3) NOT NULL,
    durreeMin TIME NOT NULL
);

-- Create the Slot table
CREATE TABLE Slot (
    idSlot INT PRIMARY KEY AUTO_INCREMENT,
    nomSlot CHAR(1) NOT NULL -- A B C
);

INSERT INTO Slot (nomSlot) VALUES ('A');
INSERT INTO Slot (nomSlot) VALUES ('B');
INSERT INTO Slot (nomSlot) VALUES ('C');

-- Create the RendezVous table
CREATE TABLE RendezVous (
    idRDV INT PRIMARY KEY AUTO_INCREMENT,
    idClient INT NOT NULL,
    dateHeureRDV DATETIME NOT NULL,
    dateConsultation DATETIME NOT NULL,
    idService INT NOT NULL,
    idSlot INT NOT NULL,
    FOREIGN KEY (idClient) REFERENCES Client(idClient),
    FOREIGN KEY (idSlot) REFERENCES Slot(idSlot),
    FOREIGN KEY (idService) REFERENCES Service(idService)
);
