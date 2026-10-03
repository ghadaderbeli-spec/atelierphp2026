```php
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TP 2 - Tableaux et fonctions PHP</title>
</head>

<body>

<h1>TP 2 - Tableaux et fonctions en PHP</h1>

<hr>

<h2>Activite 1 - Premier tableau PHP</h2>

<?php

$etudiants = ["Ahmed", "Sami", "Nour", "Amine"];

echo "<p>Premier etudiant : " . $etudiants[0] . "</p>";
echo "<p>Troisieme etudiant : " . $etudiants[2] . "</p>";

?>

<hr>

<h2>Activite 2 - Parcourir avec for</h2>

<?php

for ($i = 0; $i < count($etudiants); $i++) {
    echo "<p>" . $etudiants[$i] . "</p>";
}

?>

<hr>

<h2>Activite 3 - Parcourir avec foreach</h2>

<?php

foreach ($etudiants as $etudiant) {
    echo "<p>" . $etudiant . "</p>";
}

?>

<hr>

<h2>Activite 4 - Ajouter et supprimer</h2>

<?php

$etudiants4 = ["Ahmed", "Sami", "Nour", "Amine", "Mariem"];

$etudiants4[] = "Yasmine";

array_push($etudiants4, "Ali");

array_pop($etudiants4);

echo "<p>Nombre final : " . count($etudiants4) . "</p>";

foreach ($etudiants4 as $etudiant) {
    echo "<p>" . $etudiant . "</p>";
}

?>

<hr>

<h2>Activite 5 - Rechercher un etudiant</h2>

<?php

$nomRecherche = "Nour";

if (in_array($nomRecherche, $etudiants)) {
    echo "<p>Etudiant trouve</p>";
} else {
    echo "<p>Etudiant non trouve</p>";
}

?>

<hr>

<h2>Activite 6 - Tableau associatif</h2>

<?php

$etudiant = [
    "nom" => "Ahmed",
    "prenom" => "Ali",
    "age" => 20,
    "formation" => "Informatique",
    "moyenne" => 14
];

$etudiant["telephone"] = "12345678";
$etudiant["ville"] = "Sousse";
$etudiant["niveau"] = "2eme annee";

echo "<p>Nom : " . $etudiant["nom"] . "</p>";
echo "<p>Prenom : " . $etudiant["prenom"] . "</p>";
echo "<p>Age : " . $etudiant["age"] . "</p>";
echo "<p>Formation : " . $etudiant["formation"] . "</p>";
echo "<p>Moyenne : " . $etudiant["moyenne"] . "</p>";
echo "<p>Telephone : " . $etudiant["telephone"] . "</p>";
echo "<p>Ville : " . $etudiant["ville"] . "</p>";
echo "<p>Niveau : " . $etudiant["niveau"] . "</p>";

?>

<hr>

<h2>Activite 7 - Tableau de plusieurs etudiants</h2>

<?php

$classe = [
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
    ]
];

foreach ($classe as $etudiant) {
    echo "<p>";
    echo $etudiant["nom"] . " ";
    echo $etudiant["prenom"] . " - ";
    echo $etudiant["age"] . " ans - ";
    echo $etudiant["moyenne"];
    echo "</p>";
}

?>

<hr>

<h2>Activite 8 - Tableau HTML</h2>

<table border="1">
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Age</th>
        <th>Moyenne</th>
    </tr>

<?php

foreach ($classe as $etudiant) {
    echo "<tr>";
    echo "<td>" . $etudiant["nom"] . "</td>";
    echo "<td>" . $etudiant["prenom"] . "</td>";
    echo "<td>" . $etudiant["age"] . "</td>";
    echo "<td>" . $etudiant["moyenne"] . "</td>";
    echo "</tr>";
}

?>

</table>

<hr>

<h2>Activite 9 - Premiere fonction</h2>

<?php

function afficherNom($nom) {
    echo "<p>Nom : " . $nom . "</p>";
}

afficherNom("Ghada");

?>

<hr>

<h2>Activite 10 - Fonction avec return</h2>

<?php

function calculerDouble($nombre) {
    return $nombre * 2;
}

$resultat = calculerDouble(5);

echo "<p>Le double de 5 est : " . $resultat . "</p>";

?>

<hr>

<h2>Activite 11 - Calculer une moyenne</h2>

<?php

function calculerMoyenne($note1, $note2, $note3) {
    return ($note1 + $note2 + $note3) / 3;
}

$moyenne = calculerMoyenne(12, 15, 14);

echo "<p>Moyenne : " . $moyenne . "</p>";

?>

<hr>

<h2>Activite 12 - Resultat et appreciation</h2>

<?php

function determinerResultat($moyenne) {
    if ($moyenne >= 10) {
        return "Admis";
    } else {
        return "Ajourne";
    }
}

function appreciation($moyenne) {
    if ($moyenne >= 16) {
        return "Tres bien";
    } elseif ($moyenne >= 14) {
        return "Bien";
    } elseif ($moyenne >= 12) {
        return "Assez bien";
    } elseif ($moyenne >= 10) {
        return "Passable";
    } else {
        return "Insuffisant";
    }
}

$moyenneTest = 14;

echo "<p>Resultat : " . determinerResultat($moyenneTest) . "</p>";
echo "<p>Appreciation : " . appreciation($moyenneTest) . "</p>";

?>

<hr>

<h2>Activite 13 - Afficher un etudiant</h2>

<?php

function afficherEtudiant($etudiant) {
    echo "<p>";
    echo $etudiant["nom"] . " ";
    echo $etudiant["prenom"] . " - ";
    echo $etudiant["age"] . " ans - ";
    echo "Moyenne : " . $etudiant["moyenne"];
    echo "</p>";
}

foreach ($classe as $etudiant) {
    afficherEtudiant($etudiant);
}

?>

<hr>

<h2>Activite 14 - Moyenne de la classe</h2>

<?php

function moyenneClasse($etudiants) {

    $somme = 0;

    foreach ($etudiants as $etudiant) {
        $somme += $etudiant["moyenne"];
    }

    return $somme / count($etudiants);
}

echo "<p>Moyenne de la classe : " . moyenneClasse($classe) . "</p>";

?>

<hr>

<h2>Activite 15 - Rechercher un etudiant</h2>

<?php

function rechercherEtudiant($etudiants, $nomRecherche) {

    foreach ($etudiants as $etudiant) {

        if (strtolower($etudiant["nom"]) == strtolower($nomRecherche)) {
            return $etudiant;
        }
    }

    return null;
}

$recherche = rechercherEtudiant($classe, "Nour");

if ($recherche != null) {
    echo "<p>Etudiant trouve : "
        . $recherche["nom"] . " "
        . $recherche["prenom"]
        . "</p>";
} else {
    echo "<p>Etudiant non trouve</p>";
}

?>

<hr>

<h2>Activite 16 - Etudiants admis</h2>

<?php

function obtenirAdmis($etudiants) {

    $admis = [];

    foreach ($etudiants as $etudiant) {

        if ($etudiant["moyenne"] >= 10) {
            $admis[] = $etudiant;
        }
    }

    return $admis;
}

$admis = obtenirAdmis($classe);

foreach ($admis as $etudiant) {
    echo "<p>"
        . $etudiant["nom"]
        . " : "
        . $etudiant["moyenne"]
        . "</p>";
}

?>

<hr>

<h2>Activite 17 - Filtrer par moyenne</h2>

<?php

function filtrerParMoyenne($etudiants, $moyenneMin) {

    $resultat = [];

    foreach ($etudiants as $etudiant) {

        if ($etudiant["moyenne"] >= $moyenneMin) {
            $resultat[] = $etudiant;
        }
    }

    return $resultat;
}

$selection = filtrerParMoyenne($classe, 14);

foreach ($selection as $etudiant) {
    echo "<p>"
        . $etudiant["nom"]
        . " : "
        . $etudiant["moyenne"]
        . "</p>";
}

?>

</body>
</html>
```
