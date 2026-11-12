<?php

function e($valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES, 'UTF-8');
}

function getEtudiants(PDO $pdo): array
{
    $sql = "SELECT id, nom, prenom, age, formation, moyenne
            FROM etudiants
            ORDER BY nom, prenom";
    return $pdo->query($sql)->fetchAll();
}

function getEtudiantById(PDO $pdo, int $id): array|false
{
    $stmt = $pdo->prepare(
        "SELECT id, nom, prenom, age, formation, moyenne
         FROM etudiants WHERE id = :id"
    );
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

function validerEtudiant(array $donnees): array
{
    $errors = [];
    $nom = trim($donnees['nom'] ?? '');
    $prenom = trim($donnees['prenom'] ?? '');
    $formation = trim($donnees['formation'] ?? '');
    $ageSaisi = $donnees['age'] ?? '';
    $moyenneSaisie = $donnees['moyenne'] ?? '';

    if ($nom === '') $errors[] = "Le nom est obligatoire.";
    if ($prenom === '') $errors[] = "Le prénom est obligatoire.";
    if ($formation === '') $errors[] = "La formation est obligatoire.";

    $age = filter_var($ageSaisi, FILTER_VALIDATE_INT);
    if ($age === false || $age < 16 || $age > 100) {
        $errors[] = "L'âge doit être un entier entre 16 et 100.";
    }

    $moyenne = filter_var($moyenneSaisie, FILTER_VALIDATE_FLOAT);
    if ($moyenne === false || $moyenne < 0 || $moyenne > 20) {
        $errors[] = "La moyenne doit être comprise entre 0 et 20.";
    }

    return [
        'errors' => $errors,
        'values' => [
            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age,
            'formation' => $formation,
            'moyenne' => $moyenne,
        ],
    ];
}
