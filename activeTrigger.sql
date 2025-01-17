INSERT INTO PERSONNE (idPers,nomPers, prenomPers, poids, taille, tel, mail, mdp) VALUES
(14,'Dupont', 'Jean', 75, 180, '0212345678', 'jean.dupont@example.com', 'password1'),
(15,'Martin', 'Claire', 65, 165, '0223456789', 'claire.martin@example.com', 'password2'),
(16,'Durand', 'Paul', 82, 175, '0234567890', 'paul.durand@example.com', 'password3'),
(17,'Lemoine', 'Marie', 58, 160, '0245678901', 'marie.lemoine@example.com', 'password4'),
(18,'Petit', 'Jacques', 70, 172, '0256789012', 'jacques.petit@example.com', 'password5'),
(19,'Rousseau', 'Elise', 55, 168, '0267890123', 'elise.rousseau@example.com', 'password6'),
(20,'Moreau', 'Lucas', 78, 185, '0278901234', 'lucas.moreau@example.com', 'password7'),
(21,'Blanc', 'Julie', 60, 162, '0289012345', 'julie.blanc@example.com', 'password8'),
(22,'Lefevre', 'Pierre', 85, 178, '0230123456', 'lefevre.pierre@exemple.com', 'password9'),
(23,'Garnier', 'Thomas', 90, 190, '0290123456', 'thomas.garnier@example.com', 'password9'),
(24,'Bertrand', 'Sophie', 100, 100, '0211122233', 'sophie.bertrand@example.com', 'password10');

INSERT INTO CLIENT (idCli, dateInscription) VALUES
(14, '2020-07-19'),
(15, '2020-07-19'),
(16, '2021-08-19'),
(17, '2023-11-02'),
(18, '2024-02-29'),
(19, '2020-07-19'),
(20, '2020-07-19'),
(21, '2021-08-19'),
(24, '2023-11-02'),
(23, '2024-02-29');

INSERT INTO RESERVER (idSeance,idCli) VALUES
(1,14),
(1,15),
(1,16),
(1,17),
(1,18),
(1,19),
(1,20),
(1,21),
(1,22),
(1,24);

INSERT INTO SEANCE (idSeance, encadrantSeance, intitule, duree, jma, heureDebut,idCours) VALUES
(8, 1, 'Séance débutants', 2, '2025-01-20', 8,1),
(9,2,'Séance avancés', 2, '2025-01-20', 8,2),
(10,3,'Séance intermédiaires', 1, '2025-01-21', 8,3),
(11,4,'Séance enfants', 1, '2025-01-21', 9,4),
(12,5,'Séance adultes', 1, '2025-01-21', 10,5);


INSERT INTO PONEY_RESERVE (idSeance, idPoney) VALUES
(2,34),
(9,34),
(10,33),
(11,33),
(12,33);

INSERT INTO RESERVER(idSeance, idCli) VALUES
(2,24);

INSERT INTO RESERVER(idSeance, idCli) VALUES
(10,24);