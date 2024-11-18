INSERT INTO PERSONNE(idPers,nomPers,prenomPers,poids,taille,tel,mail) VALUES 
(1,'ULAIT','Jacques',80,180,'06 12 34 56 78','ulait.jacques@mail.com'),
(2,'ULAIT','Yvonne',60,160,'06 12 34 56 79','ulait.yvonne@mail.com'),
(3,'MENVUSAT','Gérard',70,170,'06 12 34 56 80','gérard.menvusat@mail.com'),
(4,'LADEN','Ben',50,150,'06 12 34 56 81','laden99.ben@mail.com'),
(5,'TERRIEUR','Alex',90,210,'06 12 34 56 82','alex.terrieur@mail.com'),
(6,'TERRIEUR','Alain',130,190,'06 12 34 56 83','alain.terrieur@mail.com'),
(7,'LAPORTE','Jean-Phonse',75,175,'06 12 34 56 84','jean-phonse.laporte@mail.com'),
(8,'DURE','Laure',65,165,'06 12 34 56 85','laure.dure@mail.com'),
(9,'BOULA','Alban',85,195,'06 12 34 56 86','alban1.boula@mail.com'),
(10,'PHEURE','Kwoï',55,145,'06 12 34 56 87','kwoi.pheure@mailcom'),
(11,'WHITE','Walter',98,180,'06 12 34 56 88','ww.ww@mail.com'),
(12,'PLUDAINSPI','Jay',69,142,'06 12 34 56 89','jay.pludeinspi@mail.com');

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
('poney','poney'),
('pegase','cheval ailé'),
('licorne','cheval magique'),
('alicorne','cheval ailé magique'),
('girafe','cheval à long cou'),
('hippotame','cheval amphibie');

INSERT INTO PONEY(idPoney,nomPoney,poidsMax,tailleMin,nomRace) VALUES
(1,'Sophie',170,190,'girafe'),
(2,'Hyppoglouton',250,150,'hippotame'),
(3,'Bramble', 90, 110, 'poney'),
(4,'Cinnamon', 80, 115, 'poney'),
(5,'Rusty', 310, 120, 'poney'),
(6,'Jasper', 85, 125, 'poney'),
(7,'Lily', 280, 105, 'poney'),
(8,'Peanut', 200, 90, 'poney'),
(9,'Marshmallow', 210, 95, 'poney'),
(10,'Sugar', 215, 95, 'poney'),
(11,'Clover', 160, 100, 'poney'),
(12,'Pumpkin', 170, 100, 'poney'),
(13,'Rainbow Dash', 80, 125, 'pegase'),
(14,'Fluttershy', 70, 120, 'pegase'),
(15,'Stormy', 200, 130, 'pegase'),
(16,'Zephyr', 180, 135, 'pegase'),
(17,'Skyline', 85, 130, 'pegase'),
(18,'Twilight Sparkle', 65, 130, 'licorne'),
(19,'Rarity', 55, 130, 'licorne'),
(20,'Sunset Shimmer', 95, 128, 'licorne'),
(21,'Starlight Glimmer', 80, 125, 'licorne'),
(22,'Trixie', 120, 120, 'licorne'),
(23,'Princess Celestia', 95, 140, 'alicorne'),
(24,'Princess Luna', 55, 135, 'alicorne'),
(25,'Princess Cadance', 85, 130, 'alicorne'),
(26,'Shining Armor', 6, 130, 'alicorne'),
(27,'Flurry Heart', 80, 125, 'alicorne'),
(28,'Twinkleshine', 70, 120, 'licorne'),
(29,'Lily Blossom', 290, 110, 'poney'),
(30,'Cheerilee', 80, 125, 'poney'),
(31,'Big Mac', 400, 145, 'poney'),
(32,'Applejack', 330, 10, 'poney'),
(33,'Zecora', 330, 125, 'poney');

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


INSERT INTO PERSONNE(idPers,nomPers,prenomPers,poids,taille,tel,mail) VALUES 
(13,'test','test',250,150,'06 12 34 44 44','test.test@test.txt'),
(14,'test','test2',60,30,'06 12 34 45 99','t.t'),
(15, 'Dupont', 'Pierre', 70, 175, '06 23 45 67 89', 'p.dupont@mail.com'),
(16, 'Martin', 'Sophie', 60, 165, '06 34 56 78 90', 's.martin@mail.com'),
(17, 'Durand', 'Julien', 80, 180, '06 45 67 89 01', 'j.durand@mail.com'),
(18, 'Lemoine', 'Claire', 65, 170, '06 56 78 90 12', 'c.lemoine@mail.com'),
(19, 'Leclerc', 'Marc', 85, 185, '06 67 89 01 23', 'm.leclerc@mail.com');

INSERT INTO CLIENT(idCli,dateInscription) VALUES
(13,'2020-07-19'),
(14,'2020-07-19'),
(15,'2021-08-19'),
(16,'2023-11-02'),
(17,'2024-02-29'),
(18,'2024-02-29'),
(19,'2024-02-29');

INSERT INTO COTISATION_CLIENT(idCli,anneeCotisation,prix) VALUES
(13,2020,100),
(13,2021,100),
(13,2022,200),
(14,2020,400),
(15,2021,300),
(16,2023,200),
(17,2024,100),
(18,2024,100),
(19,2024,100);


INSERT INTO PONEY(idPoney,nomPoney,poidsMax,tailleMin,nomRace) VALUES
(34,'test', 90, 110, 'poney');

INSERT INTO OBTENIR_LVL(idPers, niveau, jma) VALUES
(13, 4, '2023-01-01');

INSERT INTO SEANCE(idSeance, encadrantSeance, intitule, duree, jma, heureDebut,idCours) VALUES
(8, 1, 'Séance test', 1, '2024-11-20', 10,1),
(9, 2, 'Séance test1', 1, '2024-11-20', 12,2),
(11,3,'Séance test3',1,'2024-11-20',13,4);
--(10, 3, 'Séance test2', 2, '2024-11-20', 11,3);

INSERT INTO PONEY_RESERVE(idSeance, idPoney) VALUES
(8,32),
(8, 34),
(9, 34),
(10, 34);

INSERT INTO RESERVER(idSeance, idCli) VALUES
(8, 13), 
(8, 12), 
(8, 11),
(8, 10), 
(8, 9), 
(8, 8),
(8,14),
(8,15),
(8,16),
(8,17),
(8,18),
(8,19);
