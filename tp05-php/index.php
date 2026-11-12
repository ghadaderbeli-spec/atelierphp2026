<?php
require_once __DIR__ . '/connexion.php';
$stmt = $pdo->query("SELECT COUNT(*) FROM etudiants");
$nombreEtudiants = (int) $stmt->fetchColumn();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des étudiants</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <h1>Gestion des étudiants</h1>
    <p>Application PHP, MySQL et PDO</p>
</header>
<main class="container">
    <h2>Bienvenue</h2>
    <p>Cette application permet de gérer les étudiants enregistrés dans la base de données.</p>
    <div class="statistique">Nombre total d'étudiants : <strong><?= $nombreEtudiants ?></strong></div>
    <nav class="menu">
        <a href="liste.php">Liste des étudiants</a>
        <a href="ajouter.php">Ajouter un étudiant</a>
        <a href="rechercher.php">Rechercher un étudiant</a>
    </nav>
</main>
</body>
</html>
