-- Active: 1658759720827@@127.0.0.1@3306@test
DROP TABLE IF EXISTS client;
CREATE TABLE client(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    adresse VARCHAR(255) NULL,
    date_naissance DATE DEFAULT CURRENT_DATE NULL
);

INSERT INTO client(nom,prenom,adresse,date_naissance)

VALUES ('Dorcel','Marc','impasse de la verge, 54000 Nancy', '1920-08-10'),
('Ta Mere','EnSlip','2 rue du trou, 69000 Marc', '1969-05-05'),