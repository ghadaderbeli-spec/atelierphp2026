<?php
setcookie('nom', 'Ahmed', time() + 3600, '/');
setcookie('theme', 'clair', time() + 3600, '/');
setcookie('langue', 'fr', time() + 3600, '/');

echo "Cookies configurés. Rechargez la page pour les lire.";

echo '<hr>';

foreach (['nom', 'theme', 'langue'] as $nomCookie) {
    if (isset($_COOKIE[$nomCookie])) {
        echo htmlspecialchars($nomCookie) . ' : '
            . htmlspecialchars(
                $_COOKIE[$nomCookie],
                ENT_QUOTES,
                'UTF-8'
            ) . '<br>';
    } else {
        echo htmlspecialchars($nomCookie) . ' : cookie absent<br>';
    }
}