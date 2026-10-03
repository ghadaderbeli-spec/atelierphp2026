```php
<?php

function afficherEtudiant($etudiant) {
    echo "<p>";
    echo $etudiant["nom"] . " ";
    echo $etudiant["prenom"] . " - ";
    echo $etudiant["age"] . " ans - ";
    echo "Moyenne : " . $etudiant["moyenne"];
    echo "</p>";
}

function moyenneClasse($etudiants) {

    $somme = 0;

    foreach ($etudiants as $etudiant) {
        $somme += $etudiant["moyenne"];
    }

    return $somme / count($etudiants);
}

function rechercherEtudiant($etudiants, $nomRecherche) {

    foreach ($etudiants as $etudiant) {

        if (strtolower($etudiant["nom"]) == strtolower($nomRecherche)) {
            return $etudiant;
        }
    }

    return null;
}

function obtenirAdmis($etudiants) {

    $admis = [];

    foreach ($etudiants as $etudiant) {

        if ($etudiant["moyenne"] >= 10) {
            $admis[] = $etudiant;
        }
    }

    return $admis;
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

?>
```
