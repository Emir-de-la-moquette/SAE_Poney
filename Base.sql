CREATE OR REPLACE PERSONNE (
    idPers SERIAL PRIMA,
    nomPers VARCHAR(64),
    prenomPers VARCHAR(64),
    poids INT,
    taille INT,
    tel VARCHAR(16),
    mail VARCHAR(128);
);

CREATE OR REPLACE ENCADRANT (
    idPers SERIAL,
    nbHeuresMax INT,
    PRIMARY KEY (idPers)
)

CREATE OR REPLACE PONEY (
    idPoney SERIAL,
    nomPoney VARCHAR(32),
    poidsMax INT,
    tailleMax INT;
);