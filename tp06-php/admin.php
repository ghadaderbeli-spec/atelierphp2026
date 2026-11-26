<?php
require_once __DIR__ . '/auth.php';

// Seul l'administrateur peut accéder à cette page
protegerAdmin();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration</title>
</head>
<body>

    <h1>Page d'administration</h1>

    <p>Bienvenue dans l'espace administrateur.</p>

    <a href="dashboard.php">Retour au tableau de bord</a>
    <br>
    <a href="deconnexion.php">Se déconnecter</a>

</body>
</html>