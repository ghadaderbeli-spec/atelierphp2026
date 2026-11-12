<?php
require_once __DIR__ . '/connexion.php';
require_once __DIR__ . '/fonctions.php';

$nomRecherche = trim($_GET['nom'] ?? '');
$etudiants = [];

if ($nomRecherche !== '') {
    $sql = "SELECT id, nom, prenom, age, formation, moyenne
            FROM etudiants
            WHERE nom LIKE :nom
            ORDER BY nom, prenom";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nom' => '%' . $nomRecherche . '%']);
    $etudiants = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher un étudiant</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header><h1>Rechercher un étudiant</h1></header>
<main class="container">
    <nav class="menu"><a href="index.php">Accueil</a><a href="liste.php">Liste des étudiants</a></nav>
    <form method="GET" class="search-form">
        <label for="nom">Nom à rechercher :</label>
        <input id="nom" type="text" name="nom" value="<?= e($nomRecherche) ?>" placeholder="Saisir un nom">
        <button type="submit">Rechercher</button>
    </form>

    <?php if ($nomRecherche !== ''): ?>
        <?php if ($etudiants): ?>
            <h2>Résultats de recherche</h2>
            <table>
                <thead><tr>
                    <th>ID</th><th>Nom</th><th>Prénom</th><th>Âge</th><th>Formation</th><th>Moyenne</th>
                </tr></thead>
                <tbody>
                <?php foreach ($etudiants as $etudiant): ?>
                    <tr>
                        <td><?= (int) $etudiant['id'] ?></td>
                        <td><?= e($etudiant['nom']) ?></td>
                        <td><?= e($etudiant['prenom']) ?></td>
                        <td><?= (int) $etudiant['age'] ?></td>
                        <td><?= e($etudiant['formation']) ?></td>
                        <td><?= e($etudiant['moyenne']) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun étudiant ne correspond à cette recherche.</p>
        <?php endif; ?>
    <?php endif; ?>
</main>
</body>
</html>
