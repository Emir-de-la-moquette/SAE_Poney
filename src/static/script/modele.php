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

function insertPersonne($nom, $prenom, $tel, $mail, $taille, $poids){
    global $connexion;
    $stmt = $connexion->prepare("INSERT INTO PERSONNE (idPers,nomPers,prenomPers,poids,taille,tel,mail) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([, $nom, $prenom, $poids, $taille, $tel, $mail]);
}