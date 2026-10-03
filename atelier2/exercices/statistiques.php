<?php

$etudiants = [
    ["nom" => "Ahmed", "moyenne" => 14],
    ["nom" => "Sami", "moyenne" => 9],
    ["nom" => "Nour", "moyenne" => 16],
    ["nom" => "Amine", "moyenne" => 11],
    ["nom" => "Mariem", "moyenne" => 13],
    ["nom" => "Yasmine", "moyenne" => 8]
];

function meilleureMoyenne($etudiants) {
    $max = $etudiants[0]["moyenne"];

    foreach ($etudiants as $etudiant) {
        if ($etudiant["moyenne"] > $max) {
            $max = $etudiant["moyenne"];
        }
    }

    return $max;
}

function plusFaibleMoyenne($etudiants) {
    $min = $etudiants[0]["moyenne"];

    foreach ($etudiants as $etudiant) {
        if ($etudiant["moyenne"] < $min) {
            $min = $etudiant["moyenne"];
        }
    }

    return $min;
}

function compterSuperieur14($etudiants) {
    $nombre = 0;

    foreach ($etudiants as $etudiant) {
        if ($etudiant["moyenne"] >= 14) {
            $nombre++;
        }
    }

    return $nombre;
}

function pourcentageAdmis($etudiants) {
    $admis = 0;

    foreach ($etudiants as $etudiant) {
        if ($etudiant["moyenne"] >= 10) {
            $admis++;
        }
    }

    return ($admis / count($etudiants)) * 100;
}

echo "<h1>Exercice 3 - Statistiques</h1>";

echo "<p>Meilleure moyenne : " . meilleureMoyenne($etudiants) . "</p>";

echo "<p>Plus faible moyenne : " . plusFaibleMoyenne($etudiants) . "</p>";

echo "<p>Nombre d etudiants avec moyenne >= 14 : "
    . compterSuperieur14($etudiants) . "</p>";

echo "<p>Pourcentage d admis : "
    . pourcentageAdmis($etudiants) . " %</p>";

?>