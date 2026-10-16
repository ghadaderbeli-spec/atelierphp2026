<!doctype html>
<html lang="fr"> 
    <head>
        <meta charset="UTF-8">
        <title> formulaire etudiant </title>
</head>
<body>
    <h1> formulaire etudiant </h1>
    <form>
<label>Nom :</label>
<input type="text" name="nom">
<label>Prénom :</label>
<input type="text" name="prenom">
<label>Âge :</label>
<input type="number" name="age">
<label>Formation :</label>
<input type="text" name="formation">
<button type="submit">Envoyer</button>
</form>
</body>
</html>
<?php
if (isset($_GET['nom'])) {
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $age = $_GET['age'];
    $formation = $_GET['formation'];

    echo "<h2>Données reçues</h2>";
    echo "<p>Nom : " . htmlspecialchars($nom) . "</p>";
    echo "<p>Prénom : " . htmlspecialchars($prenom) . "</p>";
    echo "<p>Âge : " . htmlspecialchars($age) . "</p>";
    echo "<p>Formation : " . htmlspecialchars($formation) . "</p>";
} else {
    echo "<p>Veuillez remplir le formulaire.</p>";
}
?>