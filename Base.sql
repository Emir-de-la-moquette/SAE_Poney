CREATE OR REPLACE PERSONNE (
    idPers SERIAL PRIMARY KEY,
    nomPers VARCHAR(64),
    prenomPers VARCHAR(64),
    poids INT,
    taille INT,
    tel VARCHAR(16),
    mail VARCHAR(128);
);

CREATE OR REPLACE ENCADRANT (
    idPers INT PRIMARY KEY,
    nbHeuresMax INT,
    FOREIGN KEY (idPers) REFERENCES personne(idPers);
);

CREATE OR REPLACE CLIENT (
    idPers INT PRIMARY KEY,
    dateInscription DATE,
    FOREIGN KEY (idPers) REFERENCES personne(idPers);
);

CREATE OR REPLACE COTISATION_CLIENT (
    idPers INT,
    anneecotisation DATE,
    prix DECIMAL(6,2),
    PRIMARY KEY(idPers, anneecotisation),
    FOREIGN KEY (idPers) REFERENCES personne(idPers);
);

CREATE OR REPLACE PONEY (
    idPoney SERIAL PRIMARY KEY,
    nomPoney VARCHAR(32),
    poidsMax INT,
    tailleMax INT;
);

CREATE OR REPLACE SEANCE (
    idSeance SERIAL PRIMARY KEY,
    intitule VARCHAR(64),
    duree INT,
    jma DATE,
    hh INT;
);

CREATE OR REPLACE COURS (
    idCours SERIAL PRIMARY KEY,
    nbPersonneMax INT,
    nomCours VARCHAR(64);
);

CREATE OR REPLACE NIVEAU (
    niveau INT PRIMARY KEY,
);

CREATE TABLE OBTENIR_LVL (
    idPers INT,
    niveau INT,
    jma DATE, 
    PRIMARY KEY (idPers, idNiveau, jma),
    FOREIGN KEY (idPers) REFERENCES personne(idPers),
    FOREIGN KEY (idNiveau) REFERENCES niveau(idNiveau);
);
