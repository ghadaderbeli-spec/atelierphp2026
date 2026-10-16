<?php
require_once _DIR_ . "/fonctions.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

if ($id !== false && $id !== null && isset($_SESSION["etudiants"][$id])) {
    unset($_SESSION["etudiants"][$id]);
}

header("Location: index.php");
exit;
?>