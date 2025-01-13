<?php
$dsn = "mysql:dbname="."DBchaloine".";host="."servinfo-maria";
try{
    $connexion = new PDO($dsn, "chaloine", "chaloine");
}
catch(PDOException $e){
    printf("Error connecting to database: %s", $e->getMessage());
    exit();
}

function getMoniteur(){
    global $connexion;
    $sql = "SELECT * FROM PERSONNE NATURAL JOIN ENCADRANT where idPers = idEnc order by nomPers";
    if (!$connexion->query($sql)){
        echo "Error: %s\n";
    }
    else{
        $result = $connexion->query($sql);
        echo "<table border='1'>";
        echo "<tr><th>Nom</th><th>Prénom</th></tr>";
        foreach($result as $row){
            echo "<tr>";
            echo "<td>".$row['nomPers']."</td>";
            echo "<td>".$row['prenomPers']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

function getAdherent(){
    global $connexion;
    $sql = "SELECT * FROM PERSONNE NATURAL JOIN CLIENT where idPers = idCli order by nomPers";
    if (!$connexion->query($sql)){
        echo "Error: %s\n";
    }
    else{
        $result = $connexion->query($sql);
        echo "<table border='1'>";
        echo "<tr><th>Nom</th><th>Prénom</th><th>Tel</th><th>Mail</th><th>Taille</th><th>Poids</th></tr>";
        foreach($result as $row){
            echo "<tr>";
            echo "<td>".$row['nomPers']."</td>";
            echo "<td>".$row['prenomPers']."</td>";
            echo "<td>".$row['tel']."</td>";
            echo "<td>".$row['mail']."</td>";
            echo "<td>".$row['taille']."</td>";
            echo "<td>".$row['poids']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

function getPoneys(){
    global $connexion;
    $sql = "SELECT * FROM PONEY order by nomRace";
    if (!$connexion->query($sql)){
        echo "Error: %s\n";
    }
    else{
        $result = $connexion->query($sql);
        echo "<table border='1'>";
        echo "<tr><th>Race</th><th>Nom</th><th>Poids maximal</th><th>Taille Mininimale</th></tr>";
        foreach($result as $row){
            echo "<tr>";
            echo "<td>".$row['nomRace']."</td>";
            echo "<td>".$row['nomPoney']."</td>";
            echo "<td>".$row['poidsMax']."</td>";
            echo "<td>".$row['tailleMin']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

function insertPersonne($nom, $prenom, $tel, $mail, $taille, $poids,$mdp){
    global $connexion;
    $sql = "SELECT max(idPers) as maxid FROM PERSONNE";
    $result = $connexion->query($sql);
    $row = $result->fetch();
    $id = $row['maxid'] + 1;
    $hash=hash('sha256',$mdp);
    $stmt = $connexion->prepare("INSERT INTO PERSONNE (idPers,nomPers,prenomPers,poids,taille,tel,mail,mdp) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$id, $nom, $prenom, $poids, $taille, $tel, $mail, $hash]);
    return $id;
}

function insertMoniteur($nom, $prenom, $tel, $mail, $taille, $poids, $nbHeureMax,$mdp){
    global $connexion;
    $id = insertPersonne($nom, $prenom, $tel, $mail, $taille, $poids,$mdp);
    $stmt = $connexion->prepare("INSERT INTO ENCADRANT (idEnc,nbHeuresMax) VALUES (?, ?)");
    $stmt->execute([$id, $nbHeureMax]);
}

function insertAdherent($nom, $prenom, $tel, $mail, $taille, $poids, $dateInscription,$mdp){
    global $connexion;
    $id = insertPersonne($nom, $prenom, $tel, $mail, $taille, $poids,$mdp);
    $stmt = $connexion->prepare("INSERT INTO CLIENT (idCli,dateInscription) VALUES (?, ?)");
    $stmt->execute([$id, $dateInscription]);
    assignerNiveau($id, 1, $dateInscription);
}

function insertPoney($nomPoney, $nomRace, $poidsMax, $tailleMin){
    global $connexion;
    $stmt = $connexion->prepare("INSERT INTO PONEY (nomPoney,nomRace,poidsMax,tailleMin) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nomPoney, $nomRace, $poidsMax, $tailleMin]);
}

function creerCours($nbPersonne, $nomCours, $niveau){
    global $connexion;
    $sql = "SELECT max(idCours) as maxid FROM COURS";
    $result = $connexion->query($sql);
    $row = $result->fetch();
    $id = $row['maxid'] + 1;
    $stmt = $connexion->prepare("INSERT INTO COURS (idCours,nbPersonneMax,nomCours,niveau) VALUES (?, ?, ?, ?)");
    $stmt->execute([$id, $nbPersonne, $nomCours, $niveau]);
}

function creerSceance($encadrant, $heureDebut, $duree, $jma, $idCours, $intitule){
    global $connexion;
    $sql = "SELECT max(idSeance) as maxid FROM SEANCE";
    $result = $connexion->query($sql);
    $row = $result->fetch();
    $id = $row['maxid'] + 1;
    $stmt = $connexion->prepare("INSERT INTO SEANCE (idSeance,encadrantSeance,heureDebut,duree,jma,idCours,intitule) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$id, $encadrant, $heureDebut, $duree, $jma, $idCours, $intitule]);
}

function reserveCreneau($idCli,$idSceance){
    global $connexion;
    $stmt = $connexion->prepare("INSERT INTO RESERVER (idCli,idSeance) VALUES (?, ?)");
    $stmt->execute([$idCli, $idSceance]);
}

function assignerNiveau($idCli, $niveau, $dateObtention){
    global $connexion;
    $stmt = $connexion->prepare("INSERT INTO OBTENIR_LVL (idPers,niveau,jma) VALUES (?, ?, ?)");
    $stmt->execute([$idCli, $niveau, $dateObtention]);
}

function cotiser($idCli, $anneeCotisation, $montant){
    global $connexion;
    $stmt = $connexion->prepare("INSERT INTO COTISATION_CLIENT (idCli,anneeCotisation,prix) VALUES (?, ?, ?)");
    $stmt->execute([$idCli, $anneeCotisation, $montant]);
}

function assignerPoney($idPoney, $idSceance){
    global $connexion;
    $stmt = $connexion->prepare("INSERT INTO PONEY_RESERVE (idPoney,idSeance) VALUES (?, ?)");
    $stmt->execute([$idPoney, $idSceance]);
}

function utilisateurExistant($mail,$mdp){
    global $connexion;
    $hash=hash('sha256',$mdp);
    $sql = "SELECT * FROM PERSONNE where mail=? and mdp=?";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([$mail,$hash]);
    $result = $stmt->fetch();
    if($result){
        return $result['idPers'];
    }
    else{
        return -1;
    }
}

function isMoniteur($mail, $mdp){
    global $connexion;
    $hash=hash('sha256',$mdp);
    $sql = "SELECT * FROM PERSONNE NATURAL JOIN ENCADRANT where mail=? and mdp=? and idPers=idEnc";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([$mail,$hash]);
    $result = $stmt->fetch();
    if($result){
        return true;
    }
    else{
        return false;
    }
}

function isAdherent($mail, $mdp){
    global $connexion;
    $hash=hash('sha256',$mdp);
    $sql = "SELECT * FROM PERSONNE NATURAL JOIN CLIENT where mail=? and mdp=? and idPers=idEnc";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([$mail,$hash]);
    $result = $stmt->fetch();
    if($result){
        return true;
    }
    else{
        return false;
    }
}

function getCours($dateDebut,$dateFin){
    global $connexion;
    $sql = "SELECT * FROM SEANCE NATURAL JOIN COURS where jma>=? and jma=<?";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([$dateDebut,$dateFin]);
    $result = $stmt->fetch();
    var_dump($result);
}