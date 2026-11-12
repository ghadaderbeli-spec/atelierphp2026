<?php
require_once __DIR__ . '/connexion.php';
require_once __DIR__ . '/fonctions.php';

$id = $_SERVER['REQUEST_METHOD'] === 'POST'
    ? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT)
    : filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id <= 0) {
    http_response_code(400);
    exit("Identifiant invalide.");
}

$etudiant = getEtudiantById($pdo, $id);
if (!$etudiant) {
    http_response_code(404);
    exit("Étudiant introuvable.");
}

$errors = [];
$nom = $etudiant['nom'];
$prenom = $etudiant['prenom'];
$age = $etudiant['age'];
$formation = $etudiant['formation'];
$moyenne = $etudiant['moyenne'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultat = validerEtudiant($_POST);
    $errors = $resultat['errors'];
    $v = $resultat['values'];

    $nom = $v['nom'];
    $prenom = $v['prenom'];
    $age = $_POST['age'] ?? '';
    $formation = $v['formation'];
    $moyenne = $_POST['moyenne'] ?? '';

    if (!$errors) {
        $sql = "UPDATE etudiants
                SET nom = :nom, prenom = :prenom, age = :age,
                    formation = :formation, moyenne = :moyenne
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $v['nom'],
            'prenom' => $v['prenom'],
            'age' => $v['age'],
            'formation' => $v['formation'],
            'moyenne' => $v['moyenne'],
            'id' => $id,
        ]);
        header('Location: liste.php?message=modifie');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un étudiant</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header><h1>Modifier un étudiant</h1></header>
<main class="container">
    <nav class="menu"><a href="index.php">Accueil</a><a href="liste.php">Liste des étudiants</a></nav>
    <?php if ($errors): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?><p><?= e($error) ?></p><?php endforeach; ?>
        </div>
    <?php endif; ?>
    <form method="POST" class="student-form">
        <input type="hidden" name="id" value="<?= (int) $id ?>">

        <label for="nom">Nom :</label>
        <input id="nom" type="text" name="nom" value="<?= e($nom) ?>" required>

        <label for="prenom">Prénom :</label>
        <input id="prenom" type="text" name="prenom" value="<?= e($prenom) ?>" required>

        <label for="age">Âge :</label>
        <input id="age" type="number" name="age" min="16" max="100" value="<?= e($age) ?>" required>

        <label for="formation">Formation :</label>
        <input id="formation" type="text" name="formation" value="<?= e($formation) ?>" required>

        <label for="moyenne">Moyenne :</label>
        <input id="moyenne" type="number" name="moyenne" min="0" max="20" step="0.01"
               value="<?= e($moyenne) ?>" required>

        <button type="submit">Enregistrer les modifications</button>
    </form>
</main>
</body>
</html>
