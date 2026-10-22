<?php
require_once _DIR_ . '/fonctions.php';
protegerPage();

require_once _DIR_ . '/etudiants.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
}

$etudiants = lireEtudiants();
$position = null;

foreach ($etudiants as $i => $etudiant) {
    if ($id !== false && $id !== null && $etudiant['id'] === $id) {
        $position = $i;
        break;
    }
}

if ($position === null) {
    http_response_code(404);
    exit('Étudiant introuvable.');
}

$nom = $etudiants[$position]['nom'];
$prenom = $etudiants[$position]['prenom'];
$email = $etudiants[$position]['email'];
$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($nom === '' || $prenom === '' || $email === '') {
        $erreur = 'Tous les champs sont obligatoires.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur = 'Adresse email invalide.';
    } else {
        $etudiants[$position]['nom'] = $nom;
        $etudiants[$position]['prenom'] = $prenom;
        $etudiants[$position]['email'] = $email;

        if (ecrireEtudiants($etudiants)) {
            header('Location: dashboard.php');
            exit;
        }

        $erreur = 'Erreur lors de la modification.';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier un étudiant</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container">
    <h1>Modifier un étudiant</h1>

    <?php if ($erreur !== ''): ?>
        <p class="erreur"><?= e($erreur) ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="hidden" name="id" value="<?= (int) $id ?>">

        <label for="nom">Nom</label>
        <input id="nom" name="nom"
               value="<?= e($nom) ?>" required>

        <label for="prenom">Prénom</label>
        <input id="prenom" name="prenom"
               value="<?= e($prenom) ?>" required>

        <label for="email">Email</label>
        <input id="email" name="email" type="email"
               value="<?= e($email) ?>" required>

        <button type="submit">Enregistrer les modifications</button>
    </form>

    <p><a href="dashboard.php">Retour au tableau de bord</a></p>
</main>
</body>
</html>