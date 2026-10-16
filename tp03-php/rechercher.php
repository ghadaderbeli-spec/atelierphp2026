<?php
require_once _DIR_ . "/fonctions.php";

$nomRecherche = trim($_GET["nom"] ?? "");
$resultats = [];

if ($nomRecherche !== "") {
    foreach ($_SESSION["etudiants"] as $id => $etudiant) {
        if (stripos($etudiant["nom"], $nomRecherche) !== false) {
            $resultats[$id] = $etudiant;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rechercher un étudiant</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container">
    <h1>Rechercher un étudiant</h1>

    <form method="GET">
        <label>Nom :</label>
        <input type="text" name="nom" value="<?= echapper($nomRecherche) ?>">
        <button type="submit">Rechercher</button>
    </form>

    <?php if ($nomRecherche !== ""): ?>
        <h2>Résultats de la recherche</h2>

        <?php if (empty($resultats)): ?>
            <p>Aucun étudiant trouvé.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Formation</th>
                        <th>Moyenne</th>
                        <th>Résultat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultats as $etudiant): ?>
                        <tr>
                            <td><?= echapper($etudiant["nom"]) ?></td>
                            <td><?= echapper($etudiant["prenom"]) ?></td>
                            <td><?= echapper($etudiant["formation"]) ?></td>
                            <td><?= echapper($etudiant["moyenne"]) ?>/20</td>
                            <td><?= resultat($etudiant["moyenne"]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endif; ?>

    <p><a href="index.php">Retour à l'accueil</a></p>
</main>
</body>
</html>