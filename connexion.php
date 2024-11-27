<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'journal';

try {
    // Connexion au serveur MySQL
    $conn = new PDO("mysql:host=$host", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification si la base de données existe
    $result = $conn->query("SHOW DATABASES LIKE '$dbname'");
    if ($result->rowCount() === 0) {
        // Création de la base de données
        $conn->exec("CREATE DATABASE $dbname");
        echo "Base de données '$dbname' créée avec succès.<br>";
    }

    // Connexion à la base que l'on vient de créér
    $conn->exec("USE $dbname");

    // Vérification si la table article existe
    $result = $conn->query("SHOW TABLES LIKE 'articles'");
    if ($result->rowCount() === 0) {
        // Création de la table articles
        $sql = "
        CREATE TABLE articles (
            id INT AUTO_INCREMENT PRIMARY KEY,
            titre VARCHAR(255) NOT NULL,
            contenu TEXT NOT NULL,
            date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
            auteur VARCHAR(100) NOT NULL
        )";
        $conn->exec($sql);
        echo "Table 'articles' créée avec succès.<br>";
    }

} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>
