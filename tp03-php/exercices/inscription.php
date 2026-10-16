<<?php
$erreurs = [];

$nom = "";
$prenom = "";
$age = "";
$formation = "";
$moyenne = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // 1. Récupération des données
    $nom = trim($_POST["nom"] ?? "");
    $prenom = trim($_POST["prenom"] ?? "");
    $age = trim($_POST["age"] ?? "");
    $formation = trim($_POST["formation"] ?? "");
    $moyenne = trim($_POST["moyenne"] ?? "");

    // 2. Vérification des champs obligatoires
    if ($nom === "") {
        $erreurs[] = "Le nom est obligatoire.";
    }

    if ($prenom === "") {
        $erreurs[] = "Le prénom est obligatoire.";
    }

    if ($age === "") {
        $erreurs[] = "L'âge est obligatoire.";
    }

    if ($formation === "") {
        $erreurs[] = "La formation est obligatoire.";
    }

    if ($moyenne === "") {
        $erreurs[] = "La moyenne est obligatoire.";
    }

    // 3. Validation de l'âge
    if ($age !== "" && (!is_numeric($age) || $age < 16 || $age > 40)) {
        $erreurs[] = "L'âge doit être compris entre 16 et 40 ans.";
    }

    // 4. Validation de la moyenne
    if ($moyenne !== "" && (!is_numeric($moyenne) || $moyenne < 0 || $moyenne > 20)) {
        $erreurs[] = "La moyenne doit être comprise entre 0 et 20.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription étudiant</title>
</head>
<body>

    <h1>Inscription d'un étudiant</h1>

    <?php foreach ($erreurs as $erreur): ?>
        <p><?= htmlspecialchars($erreur, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endforeach; ?>

    <form method="POST">

        <label>Nom :</label>
        <input
            type="text"
            name="nom"
            value="<?= htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') ?>"
        >
        <br><br>

        <label>Prénom :</label>
        <input
            type="text"
            name="prenom"
            value="<?= htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8') ?>"
        >
        <br><br>

        <label>Âge :</label>
        <input
            type="number"
            name="age"
            value="<?= htmlspecialchars($age, ENT_QUOTES, 'UTF-8') ?>"
        >
        <br><br>

        <label>Formation :</label>
        <input
            type="text"
            name="formation"
            value="<?= htmlspecialchars($formation, ENT_QUOTES, 'UTF-8') ?>"
        >
        <br><br>

        <label>Moyenne :</label>
        <input
            type="number"
            name="moyenne"
            step="any"
            value="<?= htmlspecialchars($moyenne, ENT_QUOTES, 'UTF-8') ?>"
        >
        <br><br>

        <button type="submit">S'inscrire</button>

    </form>

</body>
</html>