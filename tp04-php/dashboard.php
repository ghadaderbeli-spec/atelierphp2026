<?php
require_once _DIR_ . '/fonctions.php';
protegerPage();

require_once _DIR_ . '/etudiants.php';
$etudiants = lireEtudiants();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container">
    <h1>Gestion des étudiants</h1>

    <p>Utilisateur connecté :
        <strong><?= e($_SESSION['username']) ?></strong>
    </p>

    <nav class="menu">
        <a href="dashboard.php">Liste des étudiants</a>
        <a href="ajouter.php">Ajouter un étudiant</a>
        <a href="rechercher.php">Rechercher un étudiant</a>
        <a href="inscription.php">Créer un compte utilisateur</a>
        <a href="logout.php">Se déconnecter</a>
    </nav>

    <h2>Liste des étudiants</h2>

    <?php if (empty($etudiants)): ?>
        <p>Aucun étudiant enregistré.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($etudiants as $etudiant): ?>
                    <tr>
                        <td><?= (int) $etudiant['id'] ?></td>
                        <td><?= e($etudiant['nom']) ?></td>
                        <td><?= e($etudiant['prenom']) ?></td>
                        <td><?= e($etudiant['email']) ?></td>
                        <td>
                            <a href="modifier.php?id=<?= (int) $etudiant['id'] ?>">Modifier</a>
                            <a href="supprimer.php?id=<?= (int) $etudiant['id'] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</main>
</body>
</html>