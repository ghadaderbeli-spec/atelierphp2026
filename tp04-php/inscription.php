<?php
require_once _DIR_ . '/utilisateurs.php';

$erreurs = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmation = $_POST['confirmation'] ?? '';

    if ($username === '') {
        $erreurs[] = 'Le nom d’utilisateur est obligatoire.';
    }

    if (strlen($password) < 6) {
        $erreurs[] = 'Le mot de passe doit contenir au moins 6 caractères.';
    }

    if ($password !== $confirmation) {
        $erreurs[] = 'Les mots de passe ne correspondent pas.';
    }

    if (trouverUtilisateur($username) !== null) {
        $erreurs[] = 'Ce nom d’utilisateur existe déjà.';
    }

    if (empty($erreurs)) {
        if (ajouterUtilisateur($username, $password)) {
            header('Location: login.php');
            exit;
        }

        $erreurs[] = 'Impossible d’enregistrer le compte.';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container">
    <h1>Créer un compte</h1>

    <?php foreach ($erreurs as $erreur): ?>
        <p class="erreur"><?= e($erreur) ?></p>
    <?php endforeach; ?>

    <form method="POST" action="inscription.php">
        <label for="username">Nom d'utilisateur</label>
        <input id="username" name="username"
               type="text" required>

        <label for="password">Mot de passe</label>
        <input id="password" name="password"
               type="password" minlength="6" required>

        <label for="confirmation">Confirmer le mot de passe</label>
        <input id="confirmation" name="confirmation"
               type="password" minlength="6" required>

        <button type="submit">Créer mon compte</button>
    </form>

    <p><a href="login.php">Retour à la connexion</a></p>
</main>
</body>
</html>