SET FOREIGN_KEY_CHECKS=0;

CREATE OR REPLACE TABLE PERSONNE (
    idPers SERIAL PRIMARY KEY,
    nomPers VARCHAR(64),
    prenomPers VARCHAR(64),
    poids INT,
    taille INT,
    tel VARCHAR(16) unique,
    mail VARCHAR(128) unique
);

CREATE OR REPLACE TABLE ENCADRANT (
    idEnc SERIAL PRIMARY KEY,
    nbHeuresMax INT,
    FOREIGN KEY (idEnc) REFERENCES personne(idPers) ON DELETE CASCADE
);

CREATE OR REPLACE TABLE CLIENT (
    idCli SERIAL PRIMARY KEY,
    dateInscription DATE,
    FOREIGN KEY (idCli) REFERENCES personne(idPers) ON DELETE CASCADE
);

CREATE OR REPLACE TABLE COTISATION_CLIENT (
    idCli SERIAL,
    anneeCotisation YEAR,
    prix DECIMAL(6,2),
    PRIMARY KEY(idCli, anneeCotisation),
    FOREIGN KEY (idCli) REFERENCES CLIENT(idCli) ON DELETE CASCADE
);

CREATE OR REPLACE TABLE RACE (
    nomRace VARCHAR(32) PRIMARY KEY,
    description VARCHAR(512)
);

CREATE OR REPLACE TABLE PONEY (
    idPoney SERIAL PRIMARY KEY,
    nomPoney VARCHAR(32),
    poidsMax INT,
    tailleMin INT,
    nomRace VARCHAR(32),
    FOREIGN KEY (nomRace) REFERENCES RACE(nomRace) ON DELETE CASCADE
);


CREATE OR REPLACE TABLE COURS (
    idCours SERIAL PRIMARY KEY,
    nbPersonneMax INT,
    nomCours VARCHAR(64),
    niveau INT,
    FOREIGN KEY (niveau) REFERENCES NIVEAU(niveau) ON DELETE CASCADE

);

CREATE OR REPLACE TABLE NIVEAU (
    niveau INT PRIMARY KEY
);

CREATE OR REPLACE TABLE OBTENIR_LVL (
    idPers SERIAL,
    niveau INT,
    jma DATE, 
    PRIMARY KEY (idPers, niveau, jma),
    FOREIGN KEY (idPers) REFERENCES personne(idPers) ON DELETE CASCADE,
    FOREIGN KEY (niveau) REFERENCES niveau(niveau) ON DELETE CASCADE
);

CREATE OR REPLACE TABLE SEANCE (
    idSeance SERIAL PRIMARY KEY,
    encadrantSeance BIGINT UNSIGNED,
    intitule VARCHAR(64),
    duree INT,
    jma DATE,
    heureDebut INT,
    idCours BIGINT UNSIGNED,
    FOREIGN KEY (idCours) REFERENCES COURS(idCours) ON DELETE CASCADE,
    FOREIGN KEY (encadrantSeance) REFERENCES ENCADRANT(idEnc) ON DELETE CASCADE,
    CONSTRAINT seanceTropLongue CHECK (duree <= 2)
);

CREATE OR REPLACE TABLE PONEY_RESERVE (
    idSeance BIGINT UNSIGNED,
    idPoney BIGINT UNSIGNED,
    PRIMARY KEY (idSeance, idPoney),
    FOREIGN KEY (idSeance) REFERENCES SEANCE(idSeance) ON DELETE CASCADE,
    FOREIGN KEY (idPoney) REFERENCES PONEY(idPoney) ON DELETE CASCADE
);

CREATE OR REPLACE TABLE RESERVER (
    idSeance BIGINT UNSIGNED,
    idCli BIGINT UNSIGNED,
    PRIMARY KEY (idSeance, idCli),
    FOREIGN KEY (idSeance) REFERENCES SEANCE(idSeance) ON DELETE CASCADE,
    FOREIGN KEY (idCli) REFERENCES CLIENT(idCli) ON DELETE CASCADE
);


CREATE OR REPLACE INDEX idx_nomPoney ON PONEY(nomPoney);
CREATE OR REPLACE INDEX idx_nomPers ON PERSONNE(nomPers);

SET FOREIGN_KEY_CHECKS=1;

--   _______   _                       
--  |__   __| (_)                      
--     | |_ __ _  __ _  __ _  ___ _ __ 
--     | | '__| |/ _` |/ _` |/ _ \ '__|
--     | | |  | | (_| | (_| |  __/ |   
--     |_|_|  |_|\__, |\__, |\___|_|   
--                __/ | __/ |          
--               |___/ |___/           

DELIMITER mlp

CREATE OR REPLACE TRIGGER limite_10_inscriptions
BEFORE INSERT ON RESERVER FOR EACH ROW
BEGIN
    DECLARE nbInscriptions INT;

    SELECT COUNT(*) INTO nbInscriptions
        FROM INSCRIPTION
        WHERE idSeance = NEW.idSeance;

    IF nbInscriptions >= 10 THEN
        SIGNAL SQLSTATE '45000'
        SET message_text = 'Le nombre maximum de 10 inscriptions est atteint pour cette seance';
    END IF;
END mlp


CREATE OR REPLACE TRIGGER depassement_seances
BEFORE INSERT ON SEANCE FOR EACH ROW
BEGIN
    DECLARE depassement INT;
    DECLARE heureFin INT;

    -- Calcul de l'heure de fin de la nouvelle séance
    SET heureFin = NEW.heureDebut + NEW.duree;

    IF heureFin < 24 then -- Même jour
        SELECT COUNT(*) INTO depassement
        FROM SEANCE
        WHERE 
        NEW.jma = jma  
        AND New.heureDebut < heureFin 
        AND New.encadrantSeance = encadrantSeance;
    ELSE -- séance dépasse sur un autre jour
        SET heureFin = heureFin-24;
        SELECT COUNT(*) INTO depassement
        FROM SEANCE
        WHERE 
        NEW.jma = DATE_ADD(jma, INTERVAL 1 DAY)
        AND New.heureDebut < heureFin
        AND New.encadrantSeance = encadrantSeance;
    END IF;


    -- Si depassement > 0 c'est que il y a au moins 2 séance qui s'entrochoquent
    IF depassement > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET message_text = 'Plusieurs séance organisées par le même moniteur se chevauchent';
    END IF;
END mlp

CREATE OR REPLACE TRIGGER client_deja_inscrit 
BEFORE INSERT ON RESERVER FOR EACH ROW
BEGIN
    DECLARE nbInscriptions INT;

    SELECT COUNT(*) INTO nbInscriptions
        FROM INSCRIPTION
        WHERE idSeance = NEW.idSeance AND idCli = NEW.idCli;

    IF nbInscriptions > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET message_text = 'Ce client est déjà inscrit à cette séance';
    END IF;
END mlp

CREATE OR REPLACE TRIGGER poney_deja_inscrit 
BEFORE INSERT ON PONEY_RESERVE FOR EACH ROW
BEGIN
    DECLARE nbInscriptions INT;

    SELECT COUNT(*) INTO nbInscriptions
        FROM PONEY_RESERVE
        WHERE idSeance = NEW.idSeance AND idPoney = NEW.idPoney;

    IF nbInscriptions > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET message_text = 'Ce poney est déjà inscrit à cette séance';
    END IF;
END mlp

CREATE OR REPLACE TRIGGER repos_poney 
BEFORE INSERT ON PONEY_RESERVE 
FOR EACH ROW
BEGIN
    DECLARE dureeCoursActuel INT;
    DECLARE dureeCoursPrec1 INT;
    DECLARE dureeCoursPrec2 INT;
    DECLARE jmaSeance DATE; 
    DECLARE heureDebutActuel INT;

    SELECT jma, dureeSeance, heureDebut 
    INTO jmaSeance, dureeCoursActuel, heureDebutActuel
    FROM SEANCE
    WHERE idSeance = NEW.idSeance;

    SELECT IFNULL(dureeSeance, 0) INTO dureeCoursPrec1
    FROM SEANCE s
    JOIN PONEY_RESERVE pr ON pr.idSeance = s.idSeance
    WHERE s.jma = jmaSeance
      AND pr.idPoney = NEW.idPoney
      AND s.heureDebut = heureDebutActuel - 1;

    SELECT IFNULL(dureeSeance, 0) INTO dureeCoursPrec2
    FROM SEANCE s
    JOIN PONEY_RESERVE pr ON pr.idSeance = s.idSeance
    WHERE s.jma = jmaSeance
      AND pr.idPoney = NEW.idPoney
      AND s.heureDebut = heureDebutActuel - 2;

    IF dureeCoursActuel = 2 THEN
        IF NOT (dureeCoursPrec1 = 0 AND (dureeCoursPrec2 = 1 OR dureeCoursPrec2 = 0)) THEN
            SIGNAL SQLSTATE '45000'
            SET message_text = 'Ce poney a besoin de repos';
        END IF;
    END IF;

    IF dureeCoursActuel = 1 THEN
        IF dureeCoursPrec2 = 2 OR (dureeCoursPrec1 = 1 AND dureeCoursPrec2 = 1) THEN
            SIGNAL SQLSTATE '45000'
            SET message_text = 'Ce poney a besoin de repos';
        END IF;
    END IF;
END mlp


CREATE OR REPLACE TRIGGER client_trop_gros 
BEFORE INSERT ON RESERVER FOR EACH ROW
BEGIN
    DECLARE poidsMaxPoney INT;
    DECLARE poidsPers INT;

    SELECT MAX(poidsMax)INTO poidsMaxPoney
    FROM PONEY_RESERVE NATURAL JOIN PONEY
    WHERE idSeance=NEW.idSeance;

    SELECT poids INTO poidsPers
    FROM PERSONNE
    WHERE idCli=new.idCli;

    IF poidsPers>poidsMaxPoney THEN
        SIGNAL SQLSTATE '45000'
        SET message_text = 'Le client est trop gros pour participer à la séance';
    END IF;
END mlp

CREATE OR REPLACE TRIGGER client_pas_assez_grand 
BEFORE INSERT ON RESERVER FOR EACH ROW
BEGIN
    DECLARE tailleMinPoney INT;
    DECLARE taillePers INT;

    SELECT MIN(tailleMin)INTO tailleMinPoney
    FROM PONEY_RESERVE NATURAL JOIN PONEY
    WHERE idSeance=NEW.idSeance;

    SELECT taille INTO taillePers
    FROM PERSONNE
    WHERE idCli=new.idCli;

    IF tailleMinPoney>taillePers THEN
        SIGNAL SQLSTATE '45000'
        SET message_text = 'Le client est trop petit pour participer à la séance';
    END IF;
END mlp


DELIMITER ;
