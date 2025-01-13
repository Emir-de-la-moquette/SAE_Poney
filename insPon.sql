INSERT INTO PERSONNE(idPers,nomPers,prenomPers,poids,taille,tel,mail,mdp) VALUES 
(1,'ULAIT','Jacques',80,180,'06 12 34 56 78','ulait.jacques@mail.com','a91b1d2f7f5e74b9b8bdb57b92ac4e2f56ab0b14d9b34f7dca6c94e255fa032b'),
(2,'ULAIT','Yvonne',60,160,'06 12 34 56 79','ulait.yvonne@mail.com','8d969eef6ecad3c29a3a629280e686cf0f31f75e0d4d764ffde420d47f115f99'),
(3,'MENVUSAT','Gérard',70,170,'06 12 34 56 80','gérard.menvusat@mail.com','378beaf5b14a3c5668b1f9e37b76bce7b344fe4e1b7f8f2999e590ab4b5d9b59'),
(4,'LADEN','Ben',50,150,'06 12 34 56 81','laden99.ben@mail.com','e9f6d1f3bcda75e7e3f2a1b064e26e7aaf0e527e6e56b10f6ff7d7124cd3e437'),
(5,'TERRIEUR','Alex',90,210,'06 12 34 56 82','alex.terrieur@mail.com','2c6ee24b09816a6f14f95d1698b24ead'),
(6,'TERRIEUR','Alain',130,190,'06 12 34 56 83','alain.terrieur@mail.com','f8f8e098c680a64e0e1b8814eb4661d864699cc8a3c6a5f08e54d4045b70904d'),
(7,'LAPORTE','Jean-Phonse',75,175,'06 12 34 56 84','jean-phonse.laporte@mail.com','c9f0f895fb98ab9159f51fd0297e236d'),
(8,'DURE','Laure',65,165,'06 12 34 56 85','laure.dure@mail.com','7f1b8e2e92cc8e9ec0d6f5eae41eab21b444e2f4970a5ae1be5e50b2c3abf3d0'),
(9,'BOULA','Alban',85,195,'06 12 34 56 86','alban1.boula@mail.com','1a0bc2560d4b6d8cb0a9ef30c018a1b25dfb44c320d907b4fc8d88a402054009'),
(10,'PHEURE','Kwoï',55,145,'06 12 34 56 87','kwoi.pheure@mailcom','fcdeb6f03b31b1c0d6258db2e7b6490736bb09e6e24d8d375470a1ab632fa60a'),
(11,'WHITE','Walter',98,180,'06 12 34 56 88','ww.ww@mail.com','d7f8d6b65c7c6f5b8d8c547a30a9e342ea7c2fbb3a9f800e6b1d3d3b8b2bc30d'),
(12,'PLUDAINSPI','Jay',69,142,'06 12 34 56 89','jay.pludeinspi@mail.com','d2d2d2d2f0e3c2e47ff37c428ab2b7c2e8bb47fe4d94a69cf8a153fdca9c15b2');
--bonjour
--coucou
--alt+f4
--azerty1234
--inside
--outside
--FBI
--poubelle
--queue
--feur
--UwU
--mot de passe

INSERT INTO ENCADRANT(idEnc,nbHeuresMax) VALUES 
(1,20),
(2,15),
(3,25),
(4,30),
(5,10),
(6,20),
(7,15);

INSERT INTO CLIENT(idCli,dateInscription) VALUES
(8,'2020-07-19'),
(9,'2020-07-19'),
(10,'2021-08-19'),
(11,'2023-11-02'),
(12,'2024-02-29');

INSERT INTO COTISATION_CLIENT(idCli,anneeCotisation,prix) VALUES
(8,2020,100),
(8,2021,100),
(8,2022,200),
(9,2020,400),
(10,2021,300),
(11,2023,200),
(12,2024,100);

INSERT INTO RACE(nomRace,description) VALUES
('Poney','Poney'),
('Pegase','Cheval ailé'),
('Licorne','Cheval magique'),
('Alicorne','Cheval ailé magique'),
('Girafe','Cheval à long cou'),
('Hippotame','Cheval amphibie');

INSERT INTO PONEY(idPoney,nomPoney,poidsMax,tailleMin,nomRace) VALUES
(1,'Sophie',170,190,'Girafe'),
(2,'Hyppoglouton',250,150,'Hippotame'),
(3,'Bramble', 90, 110, 'Poney'),
(4,'Cinnamon', 80, 115, 'Poney'),
(5,'Rusty', 310, 120, 'Poney'),
(6,'Jasper', 85, 125, 'Poney'),
(7,'Lily', 280, 105, 'Poney'),
(8,'Peanut', 200, 90, 'Poney'),
(9,'Marshmallow', 210, 95, 'Poney'),
(10,'Sugar', 215, 95, 'Poney'),
(11,'Clover', 160, 100, 'Poney'),
(12,'Pumpkin', 170, 100, 'Poney'),
(13,'Rainbow Dash', 80, 125, 'Pegase'),
(14,'Fluttershy', 70, 120, 'Pegase'),
(15,'Stormy', 200, 130, 'Pegase'),
(16,'Zephyr', 180, 135, 'Pegase'),
(17,'Skyline', 85, 130, 'Pegase'),
(18,'Twilight Sparkle', 65, 130, 'Licorne'),
(19,'Rarity', 55, 130, 'Licorne'),
(20,'Sunset Shimmer', 95, 128, 'Licorne'),
(21,'Starlight Glimmer', 80, 125, 'Licorne'),
(22,'Trixie', 120, 120, 'Licorne'),
(23,'Princess Celestia', 95, 140, 'Alicorne'),
(24,'Princess Luna', 55, 135, 'Alicorne'),
(25,'Princess Cadance', 85, 130, 'Alicorne'),
(26,'Shining Armor', 6, 130, 'Alicorne'),
(27,'Flurry Heart', 80, 125, 'Alicorne'),
(28,'Twinkleshine', 70, 120, 'Licorne'),
(29,'Lily Blossom', 290, 110, 'Poney'),
(30,'Cheerilee', 80, 125, 'Poney'),
(31,'Big Mac', 400, 145, 'Poney'),
(32,'Applejack', 330, 10, 'Poney'),
(33,'Zecora', 330, 125, 'Poney'),
(34,'Gros', 69, 42, 'Poney');

INSERT INTO NIVEAU(niveau) VALUES
(1),
(2),
(3),
(4);

INSERT INTO COURS(idCours, nbPersonneMax, nomCours, niveau) VALUES
(1, 10, 'Cours débutants', 1),
(2, 12, 'Cours avancés', 2),
(3, 8, 'Cours intermédiaires', 3),
(4, 15, 'Cours enfants', 1),
(5, 20, 'Cours adultes', 2),
(6, 25, 'Cours seniors', 3),
(7, 30, 'Cours compétitions', 4);

INSERT INTO OBTENIR_LVL(idPers, niveau, jma) VALUES
(1, 1, '2023-01-01'),
(2, 2, '2023-01-02'),
(3, 1, '2023-01-01'),
(4, 2, '2023-01-03'),
(5, 3, '2023-01-01'),
(6, 4, '2023-01-04'),
(7, 2, '2023-02-01'),
(8, 1, '2023-01-02'),
(9, 2, '2023-02-01'),
(10, 3, '2023-01-02'),
(11, 4, '2023-01-05'),
(12, 1, '2023-01-01');

INSERT INTO SEANCE(idSeance, encadrantSeance, intitule, duree, jma, heureDebut,idCours) VALUES
(1, 1, 'Séance débutants', 1, '2024-11-20', 9,1),
(2, 2, 'Séance avancés', 1, '2024-11-20', 10,2),
(3, 3, 'Séance intermédiaires', 2, '2024-11-20', 12,3),
(4, 4, 'Séance enfants', 1, '2024-11-21', 9,4),
(5, 5, 'Séance adultes', 2, '2024-11-21', 14,5),
(6, 6, 'Séance seniors', 1, '2024-11-22', 15,6),
(7, 7, 'Séance compétitions', 2, '2024-11-23', 11,7);

INSERT INTO PONEY_RESERVE(idSeance, idPoney) VALUES
(1, 1),
(2, 3),
(3, 4),
(4, 5),
(5, 6),
(6, 7),
(7, 8),
(2, 26),
(3, 13),
(7, 17),
(1, 19);

INSERT INTO RESERVER(idSeance, idCli) VALUES
(1, 8), 
(2, 9), 
(3, 10),
(4, 11),
(5, 12),
(6, 8), 
(7, 10);
