<?php

$etudiants = [
    [
        "nom" => "Ahmed",
        "prenom" => "Ali",
        "age" => 20,
        "formation" => "Informatique",
        "moyenne" => 14
    ],
    [
        "nom" => "Sami",
        "prenom" => "Ben",
        "age" => 21,
        "formation" => "Informatique",
        "moyenne" => 9
    ],
    [
        "nom" => "Nour",
        "prenom" => "Amine",
        "age" => 19,
        "formation" => "Informatique",
        "moyenne" => 16
    ],
    [
        "nom" => "Amine",
        "prenom" => "Hassan",
        "age" => 20,
        "formation" => "Informatique",
        "moyenne" => 11
    ],
    [
        "nom" => "Mariem",
        "prenom" => "Salah",
        "age" => 19,
        "formation" => "Informatique",
        "moyenne" => 13
    ],
    [
        "nom" => "Yasmine",
        "prenom" => "Mohamed",
        "age" => 21,
        "formation" => "Informatique",
        "moyenne" => 8
    ]
];

function afficherEtudiants($etudiants) {
    foreach ($etudiants as $etudiant) {
        echo "<p>";
        echo $etudiant["nom"] . " ";
        echo $etudiant["prenom"] . " - ";
        echo $etudiant["age"] . " ans - ";
        echo $etudiant["formation"] . " - ";
        echo $etudiant["moyenne"];
        echo "</p>";
    }
}

function moyenneClasse($etudiants) {
    $somme = 0;

    foreach ($etudiants as $etudiant) {
        $somme += $etudiant["moyenne"];
    }

    return $somme / count($etudiants);
}

function compterAdmis($etudiants) {
    $nombre = 0;

    foreach ($etudiants as $etudiant) {
        if ($etudiant["moyenne"] >= 10) {
            $nombre++;
        }
    }

    return $nombre;
}

function rechercherEtudiant($etudiants, $nomRecherche) {
    foreach ($etudiants as $etudiant) {
        if (strtolower($etudiant["nom"]) == strtolower($nomRecherche)) {
            return $etudiant;
        }
    }

    return null;
}

function filtrerParMoyenne($etudiants, $moyenneMin) {
    $resultat = [];

    foreach ($etudiants as $etudiant) {
        if ($etudiant["moyenne"] >= $moyenneMin) {
            $resultat[] = $etudiant;
        }
    }

    return $resultat;
}

echo "<h1>Exercice 2 - Gestion de la classe</h1>";

echo "<h2>Tous les etudiants</h2>";
afficherEtudiants($etudiants);

echo "<h2>Moyenne de la classe</h2>";
echo moyenneClasse($etudiants);

echo "<h2>Nombre d admis</h2>";
echo compterAdmis($etudiants);

echo "<h2>Recherche</h2>";

$recherche = rechercherEtudiant($etudiants, "Nour");

if ($recherche != null) {
    echo "Etudiant trouve : " . $recherche["nom"] . " " . $recherche["prenom"];
} else {
    echo "Etudiant non trouve";
}

echo "<h2>Etudiants avec moyenne >= 12</h2>";

$selection = filtrerParMoyenne($etudiants, 12);

foreach ($selection as $etudiant) {
    echo "<p>" . $etudiant["nom"] . " : " . $etudiant["moyenne"] . "</p>";
}

?>