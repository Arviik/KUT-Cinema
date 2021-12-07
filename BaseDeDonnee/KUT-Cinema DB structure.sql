CREATE DATABASE IF NOT EXISTS `KUT-Cinema`;

USE `KUT-Cinema`;

DROP TABLE IF EXISTS `Client`;
CREATE TABLE IF NOT EXISTS `Client` (
    `id_client` int (11) NOT NULL AUTO_INCREMENT,
    `nom` varchar (50) NOT NULL,
    `prenom` varchar (50) NOT NULL,
    `mot_de_passe` varchar (50) NOT NULL,
    `email` varchar (50) NOT NULL,
    PRIMARY KEY (`id_client`)
);

DROP TABLE IF EXISTS `Tarif`;
CREATE TABLE IF NOT EXISTS `Tarif` (
    `id_tarif` int (11) NOT NULL AUTO_INCREMENT,
    `nom` varchar (50) NOT NULL,
    `prix_unitaire` varchar (6) NOT NULL,
    `description` varchar (200) NOT NULL,
    PRIMARY KEY (`id_tarif`)
);

DROP TABLE IF EXISTS `Film`;
CREATE TABLE IF NOT EXISTS `Film` (
    `id_film` int (11) NOT NULL AUTO_INCREMENT,
    `titre` varchar (50) NOT NULL,
    `annee_sortie` varchar (11) NOT NULL,
    `description` varchar (500) NOT NULL,
    `image_link` varchar (50) NOT NULL,
	`image_bg` varchar (50) NOT NULL,
    PRIMARY KEY (`id_film`)
);

DROP TABLE IF EXISTS `Salle`;
CREATE TABLE IF NOT EXISTS `Salle` (
    `id_salle` int (11) NOT NULL AUTO_INCREMENT,
    `nom` varchar (50) NOT NULL,
    `nb_place_salle` int (11) NOT NULL,
    `ref_film` int (11),
    PRIMARY KEY (`id_salle`)
);

DROP TABLE IF EXISTS `Reservation`;
CREATE TABLE IF NOT EXISTS `Reservation` (
    `id_reservation` int (11) NOT NULL AUTO_INCREMENT,
    `nb_place_reservation` int (11) NOT NULL,
    `moyen_paiement` varchar (50) NOT NULL,
    `date_reservation` varchar (11) NOT NULL,
    `ref_client` int (11) NOT NULL,
    `ref_salle` int (11) NOT NULL,
    `ref_tarif` int (11) NOT NULL,
    PRIMARY KEY (`id_reservation`)
);

ALTER TABLE `Salle`
    ADD CONSTRAINT `fk_salle_film` FOREIGN KEY (`ref_film`) REFERENCES `Film` (`id_film`);

ALTER TABLE `Reservation`
    ADD CONSTRAINT `fk_reservation_client` FOREIGN  KEY (`ref_client`) REFERENCES `Client` (`id_client`),
    ADD CONSTRAINT `fk_reservation_salle` FOREIGN KEY (`ref_salle`) REFERENCES `Salle` (`id_salle`),
    ADD CONSTRAINT `fk_reservation_tarif` FOREIGN KEY (`ref_tarif`) REFERENCES `Tarif` (`id_tarif`);