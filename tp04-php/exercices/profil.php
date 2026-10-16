<?php
session_start();

if (isset($_SESSION['nom'])) {
    echo "Bonjour " . htmlspecialchars(
        $_SESSION['nom'],
        ENT_QUOTES,
        'UTF-8'
    );
} else {
    echo "Aucune session de profil trouvée.";
}