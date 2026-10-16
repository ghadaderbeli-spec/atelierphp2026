<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["etudiants"])) {
    $_SESSION["etudiants"] = [
        1 => [
            "nom" => "Dupont",
            "prenom" => "Ahmed",
            "age" => 21,
            "formation" => "Informatique",
            "moyenne" => 14.5
        ],
        2 => [
            "nom" => "Ben Ali",
            "prenom" => "Sarra",
            "age" => 20,
            "formation" => "DSI",
            "moyenne" => 8
        ],
        3 => [
            "nom" => "Trabelsi",
            "prenom" => "Youssef",
            "age" => 22,
            "formation" => "Informatique",
            "moyenne" => 12
        ]
    ];
}

function resultat($moyenne)
{
    return $moyenne >= 10 ? "Admis" : "Ajourné";
}

function echapper($valeur)
{
    return htmlspecialchars(
        (string) $valeur,
        ENT_QUOTES,
        "UTF-8"
    );
}

function validerEtudiant($donnees)
{
    $erreurs = [];

    $nom = trim($donnees["nom"] ?? "");
    $prenom = trim($donnees["prenom"] ?? "");
    $age = trim((string) ($donnees["age"] ?? ""));
    $formation = trim($donnees["formation"] ?? "");
    $moyenne = trim((string) ($donnees["moyenne"] ?? ""));

    if ($nom === "") {
        $erreurs[] = "Le nom est obligatoire.";
    }

    if ($prenom === "") {
        $erreurs[] = "Le prénom est obligatoire.";
    }

    if ($age === "") {
        $erreurs[] = "L'âge est obligatoire.";
    } elseif (
        !ctype_digit($age) ||
        (int) $age < 16 ||
        (int) $age > 40
    ) {
        $erreurs[] = "L'âge doit être compris entre 16 et 40 ans.";
    }

    if ($formation === "") {
        $erreurs[] = "La formation est obligatoire.";
    }

    if ($moyenne === "") {
        $erreurs[] = "La moyenne est obligatoire.";
    } elseif (
        !is_numeric($moyenne) ||
        (float) $moyenne < 0 ||
        (float) $moyenne > 20
    ) {
        $erreurs[] = "La moyenne doit être comprise entre 0 et 20.";
    }

    $etudiant = [
        "nom" => $nom,
        "prenom" => $prenom,
        "age" => (int) $age,
        "formation" => $formation,
        "moyenne" => (float) $moyenne
    ];

    return [$erreurs, $etudiant];
}

function prochainId()
{
    if (empty($_SESSION["etudiants"])) {
        return 1;
    }

    return max(array_keys($_SESSION["etudiants"])) + 1;
}
?>