
<?php

require_once "fonction.php";

$etudiants = [
    [
        "nom" => "Ahmed",
        "prenom" => "Ali",
        "age" => 20,
        "moyenne" => 14
    ],
    [
        "nom" => "Sami",
        "prenom" => "Ben",
        "age" => 21,
        "moyenne" => 9
    ],
    [
        "nom" => "Nour",
        "prenom" => "Amine",
        "age" => 19,
        "moyenne" => 16
    ],
    [
        "nom" => "Amine",
        "prenom" => "Hassan",
        "age" => 20,
        "moyenne" => 11
    ],
    [
        "nom" => "Mariem",
        "prenom" => "Salah",
        "age" => 19,
        "moyenne" => 13
    ],
    [
        "nom" => "Yasmine",
        "prenom" => "Mohamed",
        "age" => 21,
        "moyenne" => 8
    ]
];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestion des etudiants</title>
</head>

<body>

<h1>Gestion des etudiants</h1>

<h2>Liste des etudiants</h2>

<table border="1">
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Age</th>
        <th>Moyenne</th>
        <th>Resultat</th>
        <th>Appreciation</th>
    </tr>

<?php

foreach ($etudiants as $etudiant) {

    echo "<tr>";

    echo "<td>" . $etudiant["nom"] . "</td>";
    echo "<td>" . $etudiant["prenom"] . "</td>";
    echo "<td>" . $etudiant["age"] . "</td>";
    echo "<td>" . $etudiant["moyenne"] . "</td>";

    if ($etudiant["moyenne"] >= 10) {
        echo "<td>Admis</td>";
    } else {
        echo "<td>Ajourne</td>";
    }

    if ($etudiant["moyenne"] >= 16) {
        echo "<td>Tres bien</td>";
    } elseif ($etudiant["moyenne"] >= 14) {
        echo "<td>Bien</td>";
    } elseif ($etudiant["moyenne"] >= 12) {
        echo "<td>Assez bien</td>";
    } elseif ($etudiant["moyenne"] >= 10) {
        echo "<td>Passable</td>";
    } else {
        echo "<td>Insuffisant</td>";
    }

    echo "</tr>";
}

?>

</table>

<h2>Statistiques</h2>

<p>Nombre d etudiants : <?php echo count($etudiants); ?></p>

<p>Moyenne de la classe :
    <?php echo moyenneClasse($etudiants); ?>
</p>

<p>Nombre d admis :
    <?php echo count(obtenirAdmis($etudiants)); ?>
</p>

<h2>Recherche d un etudiant</h2>

<form method="get">

    <label>Nom :</label>

    <input type="text" name="nom">

    <button type="submit">Rechercher</button>

</form>

<?php

if (isset($_GET["nom"]) && $_GET["nom"] != "") {

    $resultat = rechercherEtudiant(
        $etudiants,
        $_GET["nom"]
    );

    if ($resultat != null) {

        echo "<p>Etudiant trouve : "
            . $resultat["nom"] . " "
            . $resultat["prenom"]
            . "</p>";

    } else {

        echo "<p>Etudiant non trouve</p>";

    }
}

?>

<h2>Etudiants avec une moyenne >= 12</h2>

<?php

$selection = filtrerParMoyenne($etudiants, 12);

foreach ($selection as $etudiant) {

    echo "<p>";
    echo $etudiant["nom"]
        . " : "
        . $etudiant["moyenne"];
    echo "</p>";
}

?>

</body>
</html>
```
