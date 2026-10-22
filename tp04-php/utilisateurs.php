<?php
require_once _DIR_ . '/fonctions.php';

const FICHIER_UTILISATEURS = _DIR_ . '/utilisateurs.json';

function lireUtilisateurs(): array
{
    if (!file_exists(FICHIER_UTILISATEURS)) {
        $admin = [
            'username' => 'admin',
            'password' => password_hash(
                '123456',
                PASSWORD_DEFAULT
            )
        ];

        ecrireUtilisateurs([$admin]);
    }

    $contenu = file_get_contents(FICHIER_UTILISATEURS);
    $utilisateurs = json_decode($contenu, true);

    return is_array($utilisateurs) ? $utilisateurs : [];
}

function ecrireUtilisateurs(array $utilisateurs): bool
{
    $json = json_encode(
        $utilisateurs,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    return file_put_contents(
        FICHIER_UTILISATEURS,
        $json,
        LOCK_EX
    ) !== false;
}

function trouverUtilisateur(string $username): ?array
{
    foreach (lireUtilisateurs() as $utilisateur) {
        if (
            isset($utilisateur['username']) &&
            $utilisateur['username'] === $username
        ) {
            return $utilisateur;
        }
    }

    return null;
}

function ajouterUtilisateur(
    string $username,
    string $password
): bool {
    $utilisateurs = lireUtilisateurs();

    foreach ($utilisateurs as $utilisateur) {
        if (
            strtolower($utilisateur['username']) ===
            strtolower($username)
        ) {
            return false;
        }
    }

    $utilisateurs[] = [
        'username' => $username,
        'password' => password_hash(
            $password,
            PASSWORD_DEFAULT
        )
    ];

    return ecrireUtilisateurs($utilisateurs);
}