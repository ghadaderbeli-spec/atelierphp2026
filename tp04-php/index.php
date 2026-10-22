<?php
require_once _DIR_ . '/fonctions.php';

if (estConnecte()) {
    header('Location: dashboard.php');
} else {
    header('Location: login.php');
}

exit;