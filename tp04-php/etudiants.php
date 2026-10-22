<?php
require_once _DIR_ . '/fonctions.php';

const FICHIER_ETUDIANTS = _DIR_ . '/etudiants.json';

function lireEtudiants(): array
{
    if (!file_exists(FICHIER_ETUDIANTS)) {
        file_put_contents(
            FICHIER_ETUDIANTS,
            '[]',
            LOCK_EX
        );
    }

    $contenu = file_get_contents(FICHIER_ETUDIANTS);
    $etudiants = json_decode($contenu, true);

    return is_array($etudiants) ? $etudiants : [];
}

function ecrireEtudiants(array $etudiants): bool
{
    $json = json_encode(
        $etudiants,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    return file_put_contents(
        FICHIER_ETUDIANTS,
        $json,
        LOCK_EX
    ) !== false;
}

function prochainId(array $etudiants): int
{
    $ids = array_column($etudiants, 'id');

    return empty($ids) ? 1 : max($ids) + 1;
}