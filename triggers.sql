DELIMITER mlp

CREATE OR REPLACE TRIGGER limite_10_inscriptions
BEFORE INSERT ON RESERVER FOR EACH ROW
BEGIN
    DECLARE nbInscriptions INT;
    DECLARE mes VARCHAR(128);

    SELECT COUNT(*) INTO nbInscriptions
        FROM INSCRIPTION
        WHERE idSeance = NEW.idSeance;

    IF nbInscriptions >= 10 THEN
        SIGNAL SQLSTATE '45000'
        SET mes = 'Le nombre maximum de 10 inscriptions est atteint pour cette seance';
    END IF;
END mlp


CREATE OR REPLACE TRIGGER depassement_seances
BEFORE INSERT ON SEANCE FOR EACH ROW
BEGIN
    DECLARE depassement INT;
    DECLARE heureFin INT;
    DECLARE mes VARCHAR(128);

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
        SET mes = 'Plusieurs séance organisées par le même moniteur se chevauchent';
    END IF;
END mlp

CREATE OR REPLACE TRIGGER client_deja_inscrit 
BEFORE INSERT ON RESERVER FOR EACH ROW
BEGIN
    DECLARE nbInscriptions INT;
    DECLARE mes VARCHAR(128);

    SELECT COUNT(*) INTO nbInscriptions
        FROM INSCRIPTION
        WHERE idSeance = NEW.idSeance AND idCli = NEW.idCli;

    IF nbInscriptions > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET mes = 'Ce client est déjà inscrit à cette séance';
    END IF;
END mlp

CREATE OR REPLACE TRIGGER poney_deja_inscrit 
BEFORE INSERT ON PONEY_RESERVE FOR EACH ROW
BEGIN
    DECLARE nbInscriptions INT;
    DECLARE mes VARCHAR(128);

    SELECT COUNT(*) INTO nbInscriptions
        FROM PONEY_RESERVE
        WHERE idSeance = NEW.idSeance AND idPoney = NEW.idPoney;

    IF nbInscriptions > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET mes = 'Ce poney est déjà inscrit à cette séance';
    END IF;
END mlp

CREATE OR REPLACE TRIGGER repos_poney 
BEFORE INSERT ON PONEY_RESERVE FOR EACH ROW
BEGIN
    DECLARE dureeCoursActuel INT;
    DECLARE dureeCoursPrec1 INT;
    DECLARE dureeCoursPrec2 INT;
    DECLARE jmaSeance DATE; 
    DECLARE heureDebutActuel INT;
    DECLARE mes VARCHAR(128);

    SELECT jma,dureeSeance,heureDebut INTO jmaSeance,dureeCoursActuel,heureDebutActuel
    FROM SEANCE
    WHERE idSeance=NEW.idSeance;

    SELECT IFNULL(dureeCours,0) INTO dureeCoursPrec1
    FROM SEANCE NATURAL JOIN PONEY_RESERVE
    WHERE jmaSeance=jma AND idPoney=NEW.idPoney AND
    heureDebut=heureDebutActuel-1;

    SELECT IFNULL(dureeCours,0) INTO dureeCoursPrec2
    FROM SEANCE NATURAL JOIN PONEY_RESERVE
    WHERE jmaSeance=jma AND idPoney=NEW.idPoney AND
    heureDebut=heureDebutActuel-2;

    IF  dureeCoursActuel=2 THEN
        IF NOT(dureeCoursPrec1=0 AND (dureeCoursPrec2=1 OR dureeCoursPrec2=0)) THEN
            SIGNAL SQLSTATE '45000'
            SET mes = 'Ce poney a besoin de repos';
    END IF;

    IF  dureeCoursActuel=1 THEN
        IF dureeCoursPrec2=2 OR(dureeCoursPrec1=1 AND dureeCoursPrec2=1) THEN
            SIGNAL SQLSTATE '45000'
            SET mes = 'Ce poney a besoin de repos';
    END IF;
END mlp

CREATE OR REPLACE TRIGGER client_trop_gros 
BEFORE INSERT ON RESERVER FOR EACH ROW
BEGIN
    DECLARE poidsMaxPoney INT;
    DECLARE poidsPers INT;
    DECLARE mes VARCHAR(128);

    SELECT MAX(poidsMax)INTO poidsMaxPoney
    FROM PONEY_RESERVE NATURAL JOIN PONEY
    WHERE idSeance=NEW.idSeance;

    SELECT poids INTO poidsPers
    FROM PERSONNE
    WHERE idCli=new.idCli;

    IF poidsPers>poidsMax THEN
        SIGNAL SQLSTATE '45000'
        SET mes = 'Le client est trop gros pour participer à la séance';
END mlp

CREATE OR REPLACE TRIGGER client_pas_assez_grand 
BEFORE INSERT ON RESERVER FOR EACH ROW
BEGIN
    DECLARE tailleMinPoney INT;
    DECLARE taillePers INT;
    DECLARE mes VARCHAR(128);

    SELECT MIN(tailleMin)INTO tailleMinPoney
    FROM PONEY_RESERVE NATURAL JOIN PONEY
    WHERE idSeance=NEW.idSeance;

    SELECT taille INTO taillePers
    FROM PERSONNE
    WHERE idCli=new.idCli;

    IF tailleMinPoney>taillePers THEN
        SIGNAL SQLSTATE '45000'
        SET mes = 'Le client est trop petit pour participer à la séance';
END mlp


DELIMITER ;
