<?php
require_once _DIR_ . '/fonctions.php';
protegerPage();

require_once _DIR_ . '/etudiants.php';

$erreur = '';

$nom = '';
$prenom = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($nom === '' || $prenom === '' || $email === '') {
        $erreur = 'Tous les champs sont obligatoires.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur = 'Adresse email invalide.';
    } else {
        $etudiants = lireEtudiants();

        $etudiants[] = [
            'id' => prochainId($etudiants),
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email
        ];

        if (ecrireEtudiants($etudiants)) {
            header('Location: dashboard.php');
            exit;
        }

        $erreur = 'Erreur lors de l’enregistrement.';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un étudiant</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container">
    <h1>Ajouter un étudiant</h1>

    <?php if ($erreur !== ''): ?>
        <p class="erreur"><?= e($erreur) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="nom">Nom</label>
        <input id="nom" name="nom"
               value="<?= e($nom) ?>" required>

        <label for="prenom">Prénom</label>
        <input id="prenom" name="prenom"
               value="<?= e($prenom) ?>" required>

        <label for="email">Email</label>
        <input id="email" name="email" type="email"
               value="<?= e($email) ?>" required>

        <button type="submit">Ajouter</button>
    </form>

    <p><a href="dashboard.php">Retour au tableau de bord</a></p>
</main>
</body>
</html>