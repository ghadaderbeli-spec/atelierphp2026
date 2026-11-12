<?php
require_once __DIR__ . '/connexion.php';
require_once __DIR__ . '/fonctions.php';

$etudiants = getEtudiants($pdo);
$message = $_GET['message'] ?? '';
$messagesAutorises = [
    'ajoute' => 'Étudiant ajouté avec succès.',
    'modifie' => 'Étudiant modifié avec succès.',
    'supprime' => 'Étudiant supprimé avec succès.',
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header><h1>Liste des étudiants</h1></header>
<main class="container">
    <nav class="menu">
        <a href="index.php">Accueil</a>
        <a href="ajouter.php">Ajouter</a>
        <a href="rechercher.php">Rechercher</a>
    </nav>

    <?php if (isset($messagesAutorises[$message])): ?>
        <p class="success"><?= e($messagesAutorises[$message]) ?></p>
    <?php endif; ?>

    <?php if ($etudiants): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Nom</th><th>Prénom</th><th>Âge</th>
                <th>Formation</th><th>Moyenne</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($etudiants as $etudiant): ?>
            <tr>
                <td><?= (int) $etudiant['id'] ?></td>
                <td><?= e($etudiant['nom']) ?></td>
                <td><?= e($etudiant['prenom']) ?></td>
                <td><?= (int) $etudiant['age'] ?></td>
                <td><?= e($etudiant['formation']) ?></td>
                <td><?= e($etudiant['moyenne']) ?></td>
                <td class="actions">
                    <a href="modifier.php?id=<?= (int) $etudiant['id'] ?>">Modifier</a>
                    <form action="supprimer.php" method="POST"
                          onsubmit="return confirm('Voulez-vous vraiment supprimer cet étudiant ?');">
                        <input type="hidden" name="id" value="<?= (int) $etudiant['id'] ?>">
                        <button type="submit" class="btn-delete">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Aucun étudiant enregistré.</p>
    <?php endif; ?>
</main>
</body>
</html>
