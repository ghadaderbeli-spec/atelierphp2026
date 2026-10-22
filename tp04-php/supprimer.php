<?php
require_once _DIR_ . '/fonctions.php';
protegerPage();

require_once _DIR_ . '/etudiants.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$etudiants = lireEtudiants();
$etudiantTrouve = null;

foreach ($etudiants as $etudiant) {
    if ($id !== false && $id !== null && $etudiant['id'] === $id) {
        $etudiantTrouve = $etudiant;
        break;
    }
}

if ($etudiantTrouve === null) {
    http_response_code(404);
    exit('Étudiant introuvable.');
}

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $etudiants = array_values(array_filter(
        lireEtudiants(),
        fn($etudiant) => $etudiant['id'] !== $id
    ));

    if (ecrireEtudiants($etudiants)) {
        header('Location: dashboard.php');
        exit;
    }

    $erreur = 'Impossible de supprimer cet étudiant.';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supprimer un étudiant</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container">
    <h1>Supprimer un étudiant</h1>

    <p>Confirmer la suppression de
        <strong><?= e($etudiantTrouve['prenom'] . ' ' . $etudiantTrouve['nom']) ?></strong> ?
    </p>

    <?php if ($erreur !== ''): ?>
        <p class="erreur"><?= e($erreur) ?></p>
    <?php endif; ?>

    <form method="POST">
        <button type="submit">Confirmer la suppression</button>
    </form>

    <p><a href="dashboard.php">Annuler</a></p>
</main>
</body>
</html>