<?php
require_once _DIR_ . '/utilisateurs.php';

if (estConnecte()) {
    header('Location: dashboard.php');
    exit;
}

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $utilisateur = trouverUtilisateur($username);

    if (
        $utilisateur !== null &&
        password_verify(
            $password,
            $utilisateur['password']
        )
    ) {
        session_regenerate_id(true);

        $_SESSION['username'] = $utilisateur['username'];
        $_SESSION['connecte'] = true;

        header('Location: dashboard.php');
        exit;
    }

    $erreur = 'Nom d’utilisateur ou mot de passe incorrect.';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container">
    <h1>Gestion des étudiants</h1>
    <h2>Connexion</h2>

    <?php if ($erreur !== ''): ?>
        <p class="erreur"><?= e($erreur) ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label for="username">Nom d'utilisateur</label>
        <input id="username" name="username"
               type="text" required>

        <label for="password">Mot de passe</label>
        <input id="password" name="password"
               type="password" required>

        <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore de compte ?
        <a href="inscription.php">S'inscrire</a>
    </p>
</main>
</body>
</html>