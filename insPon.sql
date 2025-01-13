INSERT INTO PERSONNE(idPers,nomPers,prenomPers,poids,taille,tel,mail,mdp) VALUES 
(1,'ULAIT','Jacques',80,180,'06 12 34 56 78','ulait.jacques@mail.com','2cb4b1431b84ec15d35ed83bb927e27e8967d75f4bcd9cc4b25c8d879ae23e18'),
(2,'ULAIT','Yvonne',60,160,'06 12 34 56 79','ulait.yvonne@mail.com','110812f67fa1e1f0117f6f3d70241c1a42a7b07711a93c2477cc516d9042f9db'),
(3,'MENVUSAT','Gérard',70,170,'06 12 34 56 80','gérard.menvusat@mail.com','6a1db92b1b6f2a1f8ed03daf24b5569537167683081322067e88c23efa55f097'),
(4,'LADEN','Ben',50,150,'06 12 34 56 81','laden99.ben@mail.com','b909c6702e754e2401640e5f77739027c0c9dd32c871bf8ccf31bc16f8334552'),
(5,'TERRIEUR','Alex',90,210,'06 12 34 56 82','alex.terrieur@mail.com','106b086224a4d945eae25f7be3805a931a873270326dd868b0e41f71ee9fff72'),
(6,'TERRIEUR','Alain',130,190,'06 12 34 56 83','alain.terrieur@mail.com','31207a2065f46a5b948fce6fe5c13e85abaf5631e2f894b47dcd4fce14f6c57b'),
(7,'LAPORTE','Jean-Phonse',75,175,'06 12 34 56 84','jean-phonse.laporte@mail.com','c6cd4cf936fd5ad884ed4c278d147982124a6b7df27d95ddf58cd7a60660664c'),
(8,'DURE','Laure',65,165,'06 12 34 56 85','laure.dure@mail.com','533b25dbc5b0335cda2170239b85d97bdf9e3a1f789c3f276941153b29efa8a8'),
(9,'BOULA','Alban',85,195,'06 12 34 56 86','alban1.boula@mail.com','00b109cf1123a591253cc534b17e5268eb8fc2fbb7d6772de7a55c135ef1282f'),
(10,'PHEURE','Kwoï',55,145,'06 12 34 56 87','kwoi.pheure@mailcom','a8d9c1ca0e1bafff1aefae52e2cc01b343f58f826efa461eb24e2a329722854d'),
(11,'WHITE','Walter',98,180,'06 12 34 56 88','ww.ww@mail.com','dcfa237943d4fd7e2a514ca54642efaccd2cdbd5003bfb19a1e70737273e1190'),
(13,'UWU','OWO',100,100,'06 06 06 06 06','uwu@mail.com','dcfa237943d4fd7e2a514ca54642efaccd2cdbd5003bfb19a1e70737273e1190'),
(12,'PLUDAINSPI','Jay',69,142,'06 12 34 56 89','jay.pludeinspi@mail.com','b9e50e0e8b504aa57a1bb6711ee832ee4ce9c641a1618b91833582382c709023');
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

INSERT INTO ADMIN(idAdm) VALUES
(13);

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
('Hippopotame','Cheval amphibie');

INSERT INTO PONEY(idPoney,nomPoney,poidsMax,tailleMin,nomRace) VALUES
(1,'Sophie',170,190,'Girafe'),
(2,'Hyppoglouton',250,150,'Hippopotame'),
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
(1, 1, 'Séance débutants', 1, '2025-01-20', 9,1),
(2, 2, 'Séance avancés', 1, '2025-01-20', 10,2),
(3, 3, 'Séance intermédiaires', 2, '2025-01-20', 12,3),
(4, 4, 'Séance enfants', 1, '2025-01-21', 9,4),
(5, 5, 'Séance adultes', 2, '2025-01-21', 14,5),
(6, 6, 'Séance seniors', 1, '2025-01-22', 15,6),
(7, 7, 'Séance compétitions', 2, '2025-01-23', 11,7);

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
