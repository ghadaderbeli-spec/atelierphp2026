<?php

$configFile = __DIR__ . '/config.php';

if (!file_exists($configFile)) {
    exit("Fichier de configuration introuvable. Copiez config.example.php vers config.php et renseignez vos identifiants.");
}

$config = require $configFile;

$dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $config['username'], $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log($e->getMessage());
    http_response_code(500);
    exit("Impossible de se connecter à la base de données.");
}
