INSERT in TABLE PERSONNE(idPers,nomPers,prenomPers,poids,taille,tel,mail) VALUES 
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
(12,'PLUDEINSPI','Jay',69,142,'06 12 34 56 89','jay.pludeinspi@mail.com');

INSERT in TABLE ENCADRANT(idEnc,nbHeuresMax) VALUES 
(1,20),
(2,15),
(3,25),
(4,30),
(5,10),
(6,20)
(7,15);

INSERT in TABLE CLIENT(idCli,dateInscription) VALUES
(8,'2020-07-19'),
(9,'2020-07-19'),
(10,'2021-08-19'),
(11,'2023-11-02'),
(12,'2024-02-29');

INSERT in TABLE COTISATION_CLIENT(idCli,anneeCotisation,prix) VALUES
(8,2020,100),
(8,2021,100),
(8,2022,200),
(9,2020,400),
(10,2021,300),
(11,2023,200),
(12,2024,100);

INSERT in TABLE RACE(nomRace,description) VALUES
('poney','poney'),
('pegase','cheval ailé'),
('licorne','cheval magique'),
('alicorne','cheval ailé magique'),
('girafe','cheval à long cou'),
('hippotame','cheval amphibie');

INSERT in TABLE PONEY(idPoney,nomPoney,poidsMax,tailleMin,nomRace) VALUES
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
(32,'Applejack', 330, 125, 'poney'),
(33,'Zecora', 330, 125, 'poney');