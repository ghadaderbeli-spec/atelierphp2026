<?php
session_start();

if (isset($_SESSION['nom'])) {
    echo "Bienvenue dans votre espace privé.";
} else {
    http_response_code(403);
    echo "Accès refusé.";
}