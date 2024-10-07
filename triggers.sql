DELIMITER mlp

CREATE OR REPLACE TRIGGER limite_10_inscriptions
BEFORE INSERT ON INSCRIPTION FOR EACH ROW
BEGIN
    DECLARE nbInscriptions INT;
    DECLARE mes VARCHAR(128);

    SELECT COUNT(*) INTO nbInscriptions
        FROM INSCRIPTION
        WHERE idSeance = NEW.idSeance;

    IF nbInscriptions >= 10 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Le nombre maximum de 10 inscriptions est atteint pour cette seance';
    END IF;
END mlp;


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
        SET MESSAGE_TEXT = 'Plusieurs séance organisées par le même moniteur se chevauchent';
    END IF;
END mlp;

CREATE OR REPLACE TRIGGER limite_10_inscriptions
BEFORE INSERT ON INSCRIPTION FOR EACH ROW
BEGIN
    DECLARE nbInscriptions INT;
    DECLARE mes VARCHAR(128);

    SELECT COUNT(*) INTO nbInscriptions
        FROM INSCRIPTION
        WHERE idSeance = NEW.idSeance;

    IF nbInscriptions >= 10 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Le nombre maximum de 10 inscriptions est atteint pour cette seance';
    END IF;
END mlp;


CREATE OR REPLACE TRIGGER poney_deja_inscrit 
BEFORE INSERT ON PONEY_RESERVE FOR EACH ROW
BEGIN
END mlp;

CREATE OR REPLACE TRIGGER repos_poney 
BEFORE INSERT ON PONEY_RESERVE FOR EACH ROW
BEGIN
END mlp;

CREATE OR REPLACE TRIGGER client_trop_gros 
BEFORE INSERT ON INSCRIPTION FOR EACH ROW
BEGIN
END mlp;

CREATE OR REPLACE TRIGGER client_pas_assez_grand 
BEFORE INSERT ON INSCRIPTION FOR EACH ROW
BEGIN
END mlp;


DELIMITER ;
