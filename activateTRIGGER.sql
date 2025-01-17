-- Création de données de base
INSERT INTO PERSONNE (nomPers, prenomPers, poids, taille, tel, mail, mdp) VALUES 
('Martin', 'Paul', 75, 180, '0123456789', 'paul.martin@mail.com', 'pass123'),
('Dubois', 'Alice', 55, 160, '0987654321', 'alice.dubois@mail.com', 'pass123');

INSERT INTO CLIENT (idCli, dateInscription) VALUES (1, '2025-01-01'), (2, '2025-01-02');

INSERT INTO RACE (nomRace, description) VALUES 
('Shetland', 'Petit poney robuste d’origine écossaise'),
('Ardennais', 'Poney de trait massif');

INSERT INTO PONEY (nomPoney, poidsMax, tailleMin, nomRace) VALUES 
('Duchesse', 70, 150, 'Shetland'),
('Balthazar', 100, 160, 'Ardennais');

INSERT INTO NIVEAU (niveau) VALUES (1), (2), (3);

INSERT INTO COURS (nbPersonneMax, nomCours, niveau) VALUES 
(10, 'Cours débutant', 1);

INSERT INTO SEANCE (encadrantSeance, intitule, duree, jma, heureDebut, idCours) VALUES 
(1, 'Séance matin', 1, '2025-01-10', 9, 1);

-- Exemple d'INSERT qui déclenche le trigger 'limite_10_inscriptions'
-- (Si 10 inscriptions existent déjà, cette requête lèvera une exception.)
INSERT INTO RESERVER (idSeance, idCli) VALUES (1, 1);

-- Exemple d'INSERT qui vérifie le trigger 'client_trop_gros'
-- (Si le poids du client dépasse le poids maximum du poney, une exception sera levée.)
INSERT INTO PONEY_RESERVE (idSeance, idPoney) VALUES (1, 1);
INSERT INTO RESERVER (idSeance, idCli) VALUES (1, 2);

-- Exemple d'INSERT qui déclenche le trigger 'repos_poney'
-- (Si le poney n’a pas eu assez de repos entre deux séances, une exception sera levée.)
INSERT INTO SEANCE (encadrantSeance, intitule, duree, jma, heureDebut, idCours) VALUES 
(1, 'Séance après-midi', 1, '2025-01-10', 10, 1);
INSERT INTO PONEY_RESERVE (idSeance, idPoney) VALUES (2, 1);
