<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function estConnecte(): bool
{
    return isset($_SESSION['connecte'])
        && $_SESSION['connecte'] === true
        && isset($_SESSION['username']);
}

function protegerPage(): void
{
    if (!estConnecte()) {
        header('Location: login.php');
        exit;
    }
}

function e(string $valeur): string
{
    return htmlspecialchars(
        $valeur,
        ENT_QUOTES,
        'UTF-8'
    );
}