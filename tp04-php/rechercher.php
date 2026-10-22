<?php
require_once _DIR_ . '/fonctions.php';
protegerPage();

require_once _DIR_ . '/etudiants.php';

$recherche = trim($_GET['q'] ?? '');
$resultats = [];

if ($recherche !== '') {
    foreach (lireEtudiants() as $etudiant) {
        $texte = $etudiant['nom'] . ' '
            . $etudiant['prenom'] . ' '
            . $etudiant['email'];

        if (stripos($texte, $recherche) !== false) {
            $resultats[] = $etudiant;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rechercher un étudiant</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container">
    <h1>Rechercher un étudiant</h1>

    <form method="GET">
        <label for="q">Nom, prénom ou email</label>
        <input id="q" name="q"
               value="<?= e($recherche) ?>">
        <button type="submit">Rechercher</button>
    </form>

    <?php if ($recherche !== ''): ?>
        <h2>Résultats</h2>

        <?php if (empty($resultats)): ?>
            <p>Aucun résultat trouvé.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultats as $etudiant): ?>
                        <tr>
                            <td><?= (int) $etudiant['id'] ?></td>
                            <td><?= e($etudiant['nom']) ?></td>
                            <td><?= e($etudiant['prenom']) ?></td>
                            <td><?= e($etudiant['email']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endif; ?>

    <p><a href="dashboard.php">Retour au tableau de bord</a></p>
</main>
</body>
</html>