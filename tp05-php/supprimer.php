<?php
require_once __DIR__ . '/connexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit("Méthode non autorisée.");
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if ($id === false || $id === null || $id <= 0) {
    http_response_code(400);
    exit("Identifiant invalide.");
}

$stmt = $pdo->prepare("DELETE FROM etudiants WHERE id = :id");
$stmt->execute(['id' => $id]);

if ($stmt->rowCount() > 0) {
    header('Location: liste.php?message=supprime');
    exit;
}

http_response_code(404);
echo "Aucun étudiant ne correspond à cet identifiant.";
