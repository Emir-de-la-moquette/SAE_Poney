

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations du compte</title>
    <link rel="stylesheet" href="../static/styles/admin.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <?php include "./navbar_admin.php" ?>
        </aside>
        <main>
            <div class="titreAdmin"><h1>Informations du compte</h1></div>
            
            <section class="section">
                <div class="table-container">
                    <h2>Paiment de l'abonnement</h2>
                    <p>Abonnement de l'année en cours : Payé 🟢</p>
                </div>
            </section>

            <section class="section">
                <div class="table-container">
                    <h2>Prochains cours</h2>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Nom du cours</th>
                                <th>Date</th>
                                <th>Payé</th>
                                <th>Niveau</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>AquaPoney</td><td>2001/09/11</td><td>🟢</td><td>exp</td></tr>
                            <tr><td>Zebrarabe</td><td>2023/09/17</td><td>🔴</td><td>int</td></tr>
                        </tbody>
                    </table>
                </div>
            </section>

        </main>
    </div>
</body>
</html>
