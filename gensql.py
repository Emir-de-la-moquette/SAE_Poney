import sqlite3
import random

# Chemin du fichier SQLite
db_path = "./src/data/data.sqlite"

# Connexion à la base de données SQLite
conn = sqlite3.connect(db_path)
cursor = conn.cursor()

# Création de la table avec clé primaire composite (email et mdp)
cursor.execute("""
CREATE TABLE IF NOT EXISTS users (
    email TEXT NOT NULL,
    name TEXT NOT NULL,
    prenom TEXT NOT NULL,
    mdp TEXT NOT NULL,
    telephone TEXT NOT NULL,
    taille REAL NOT NULL,
    poids REAL NOT NULL,
    PRIMARY KEY (email, mdp)
)
""")

# Génération de données utilisateur aléatoires
for _ in range(5):  # Ajouter 5 utilisateurs aléatoires
    email = f"user{random.randint(1000, 9999)}@example.com"
    name = f"Nom{random.randint(1, 100)}"
    prenom = f"Prenom{random.randint(1, 100)}"
    mdp = f"mdp{random.randint(1000, 9999)}"
    telephone = f"+33{random.randint(600000000, 699999999)}"
    taille = round(random.uniform(1.50, 2.00), 2)
    poids = random.randint(50, 100)
    cursor.execute("""
    INSERT INTO users (email, name, prenom, mdp, telephone, taille, poids)
    VALUES (?, ?, ?, ?, ?, ?, ?)
    """, (email, name, prenom, mdp, telephone, taille, poids))

# Sauvegarde et fermeture
conn.commit()
conn.close()

print(f"Base de données créée à l'emplacement : {db_path}")
