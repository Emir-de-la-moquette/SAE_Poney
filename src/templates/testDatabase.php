<!doctype html>
<html>
<head>
    <title>Test Database</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Test Database</h1>
    <?php
    $dsn = "mysql:dbname="."DBchaloine".";host="."servinfo-maria";
    try{
        $connexio = new PDO($dsn, "chaloine", "chaloine");
    }
    catch(PDOException $e){
        printf("Error connecting to database: %s", $e->getMessage());
        exit();
    }

    $sql = "SELECT * FROM PERSONNE";
    if (!$connexio->query($sql)){
        echo "Error: %s\n";
    }
    else{
        $result = $connexio->query($sql);
        echo "<table border='1'>";
        echo "<tr><th>Id</th><th>Nom</th><th>Prénom</th></tr>";
        foreach($result as $row){
            echo "<tr>";
            echo "<td>".$row['idPers']."</td>";
            echo "<td>".$row['nomPers']."</td>";
            echo "<td>".$row['prenomPers']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>