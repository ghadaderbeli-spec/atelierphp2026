<?php

$notes = [12, 15, 9, 14, 16];

function calculerSomme($notes) {
    $somme = 0;

    foreach ($notes as $note) {
        $somme += $note;
    }

    return $somme;
}

function calculerMoyenne($notes) {
    return calculerSomme($notes) / count($notes);
}

function trouverMax($notes) {
    return max($notes);
}

function trouverMin($notes) {
    return min($notes);
}

function compterAdmis($notes) {
    $nombre = 0;

    foreach ($notes as $note) {
        if ($note >= 10) {
            $nombre++;
        }
    }

    return $nombre;
}

echo "<h1>Exercice 1 - Statistiques des notes</h1>";

echo "<p>Notes : " . implode(", ", $notes) . "</p>";
echo "<p>Somme : " . calculerSomme($notes) . "</p>";
echo "<p>Moyenne : " . calculerMoyenne($notes) . "</p>";
echo "<p>Maximum : " . trouverMax($notes) . "</p>";
echo "<p>Minimum : " . trouverMin($notes) . "</p>";
echo "<p>Nombre de notes >= 10 : " . compterAdmis($notes) . "</p>";

?>