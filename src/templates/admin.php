

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des ressources internes</title>
    <link rel="stylesheet" href="../static/styles/admin.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <?php include "./navbar_admin.php" ?>
        </aside>
        <main>
            <div class="titreAdmin"><h1>Gestion des ressources internes</h1></div>
            
            <section class="section">
                <div class="table-container">
                    <h2>Gestion moniteurs</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Nom moniteurs</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Menvusa Gérard</td><td>...</td></tr>
                            <tr><td>Laden Ben</td><td>...</td></tr>
                            <tr><td>Terrieur Alex</td><td>...</td></tr>
                            <tr><td>Terrieur Alain</td><td>...</td></tr>
                            <tr><td>Laporte Jean-Phonse</td><td>...</td></tr>
                        </tbody>
                    </table>
                    <button>Ajouter un moniteur +</button>
                </div>
            </section>

            <section class="section">
                <div class="table-container">
                    <h2>Gestion adhérents</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom client</th>
                                <th>Date insc.</th>
                                <th>Payé</th>
                                <th>Cours payé</th>
                                <th>Poids</th>
                                <th>Taille</th>
                                <th>Niveau</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>001</td><td>Dure Laure</td><td>2001/09/11</td><td>🟢</td><td>🟢</td><td>69kg</td><td>180cm</td><td>exp</td></tr>
                            <tr><td>002</td><td>Boula Alban</td><td>2023/09/17</td><td>🔴</td><td>🟢</td><td>80kg</td><td>240cm</td><td>int</td></tr>
                            <tr><td>003</td><td>Pheure kwoï</td><td>2021/09/03</td><td>🔴</td><td>🔴</td><td>23kg</td><td>172cm</td><td>int</td></tr>
                            <tr><td>004</td><td>White Walter</td><td>2022/09/04</td><td>🟢</td><td>🟢</td><td>59kg</td><td>112cm</td><td>deb</td></tr>
                        </tbody>
                    </table>
                    <button>Ajouter un adhérent +</button>
                </div>
            </section>

            <section class="section">
                <div class="table-container">
                    <h2>Gestion poneys</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom animal</th>
                                <th>Race</th>
                                <th>Poids max</th>
                                <th>Taille min</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>001</td><td>Applejack</td><td>Poney</td><td>150kg</td><td>120cm</td></tr>
                            <tr><td>002</td><td>Rarity</td><td>Licorne</td><td>80kg</td><td>140cm</td></tr>
                            <tr><td>003</td><td>Twilight Sparkle</td><td>Alicorne</td><td>100kg</td><td>110cm</td></tr>
                            <tr><td>004</td><td>Trixie</td><td>Licorne</td><td>110kg</td><td>120cm</td></tr>
                        </tbody>
                    </table>
                    <button>Ajouter un poney +</button>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
