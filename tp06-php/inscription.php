<?php
require_once __DIR__ . '/connexion_bdd.php';

$erreur = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $erreur = "Veuillez remplir tous les champs.";
    } elseif (strlen($password) < 8) {
        $erreur = "Le mot de passe doit contenir au moins 8 caractères.";
    } else {
        $sql = "SELECT id FROM utilisateurs WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);

        if ($stmt->fetch()) {
            $erreur = "Ce nom d'utilisateur existe déjà.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO utilisateurs (username, password_hash, role)
                    VALUES (:username, :password_hash, 'user')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'username' => $username,
                'password_hash' => $hash
            ]);

            $message = "Inscription réussie !";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>

<h1>Créer un compte</h1>

<?php if ($erreur !== ''): ?>
    <p style="color:red;"><?= htmlspecialchars($erreur) ?></p>
<?php endif; ?>

<?php if ($message !== ''): ?>
    <p style="color:green;"><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

<form method="POST">
    <label>Nom d'utilisateur :</label>
    <input type="text" name="username" required>

    <br><br>

    <label>Mot de passe :</label>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit">S'inscrire</button>
</form>

</body>
</html>