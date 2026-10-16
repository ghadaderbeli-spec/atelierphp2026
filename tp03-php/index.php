<?php
require_once _DIR_ . "/fonctions.php";
$etudiants = $_SESSION["etudiants"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des étudiants</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="container">
        <h1>Gestion des étudiants</h1>

        <nav class="menu">
            <a href="index.php">Liste des étudiants</a>
            <a href="ajouter.php">Ajouter un étudiant</a>
            <a href="rechercher.php">Rechercher un étudiant</a>
        </nav>

        <h2>Liste des étudiants</h2>

        <?php if (empty($etudiants)): ?>
            <p>Aucun étudiant enregistré.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Âge</th>
                        <th>Formation</th>
                        <th>Moyenne</th>
                        <th>Résultat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($etudiants as $id => $etudiant): ?>
                        <tr>
                            <td><?= echapper($etudiant["nom"]) ?></td>
                            <td><?= echapper($etudiant["prenom"]) ?></td>
                            <td><?= $etudiant["age"] ?></td>
                            <td><?= echapper($etudiant["formation"]) ?></td>
                            <td><?= echapper($etudiant["moyenne"]) ?>/20</td>
                            <td><?= resultat($etudiant["moyenne"]) ?></td>
                            <td class="actions">
                                <a href="modifier.php?id=<?= $id ?>">Modifier</a>

                                <form method="POST" action="supprimer.php">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <button type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
</body>
</html>