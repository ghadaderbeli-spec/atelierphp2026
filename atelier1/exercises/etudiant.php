<!DOCTYPE html>
<html>
<head>
    <title>Gestion des etudiants</title>
</head>
<body>

    <h1>Gestion des etudiants</h1>

    <form method="get">

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">
        <br><br>

        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom">
        <br><br>

        <label for="age">Age :</label>
        <input type="number" id="age" name="age">
        <br><br>

        <label for="formation">Formation :</label>
        <input type="text" id="formation" name="formation">
        <br><br>

        <label for="moyenne">Moyenne :</label>
        <input type="number" step="0.01" id="moyenne" name="moyenne">
        <br><br>

        <button type="submit">Valider</button>

    </form>
    <?php

if (isset($_GET['nom'])) {

    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $age = $_GET['age'];
    $formation = $_GET['formation'];
    $moyenne = $_GET['moyenne'];

}
?>
<?php

if (isset($_GET['nom'])) {

    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $age = $_GET['age'];
    $formation = $_GET['formation'];
    $moyenne = $_GET['moyenne'];

    echo "<h2>FICHE ETUDIANT</h2>";
    echo "<p>Nom : $nom</p>";
    echo "<p>Prenom : $prenom</p>";
    echo "<p>Age : $age</p>";
    echo "<p>Formation : $formation</p>";
    echo "<p>Moyenne : $moyenne</p>";
if ($moyenne >= 10) {
    $resultat = "Admis";
} else {
    $resultat = "Ajourne";
}

echo "<p>Resultat : $resultat</p>"; 
}
?>


</body>
</html>