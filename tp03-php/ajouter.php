<?php
require_once _DIR_ . "/fonctions.php";

$erreurs = [];
$etudiant = null;

$donnees = [
    "nom" => "",
    "prenom" => "",
    "age" => "",
    "formation" => "",
    "moyenne" => ""
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    [$erreurs, $etudiant] = validerEtudiant($_POST);

    foreach ($donnees as $champ => $valeur) {
        $donnees[$champ] = trim((string) ($_POST[$champ] ?? ""));
    }

    if (empty($erreurs)) {
        $id = prochainId();
        $_SESSION["etudiants"][$id] = $etudiant;

        header("Location: index.php?ajout=ok");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un étudiant</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container">
    <h1>Ajouter un étudiant</h1>

    <?php foreach ($erreurs as $erreur): ?>
        <p class="erreur"><?= echapper($erreur) ?></p>
    <?php endforeach; ?>

    <form method="POST">
        <label>Nom :</label>
        <input type="text" name="nom" value="<?= echapper($donnees["nom"]) ?>">

        <label>Prénom :</label>
        <input type="text" name="prenom" value="<?= echapper($donnees["prenom"]) ?>">

        <label>Âge :</label>
        <input type="number" name="age" min="16" max="40"
               value="<?= echapper($donnees["age"]) ?>">

        <label>Formation :</label>
        <input type="text" name="formation" value="<?= echapper($donnees["formation"]) ?>">

        <label>Moyenne :</label>
        <input type="number" name="moyenne" min="0" max="20" step="any"
               value="<?= echapper($donnees["moyenne"]) ?>">

        <button type="submit">Enregistrer</button>
    </form>

    <p><a href="index.php">Retour à l'accueil</a></p>
</main>
</body>
</html>