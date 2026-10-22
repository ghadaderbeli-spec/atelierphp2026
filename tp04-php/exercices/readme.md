Partie 1 — Sessions et cookies

Activité 1 — Comprendre le problème HTTP

Question 1 : Comment le serveur peut-il savoir qu’il s’agit du même utilisateur lorsqu’il consulte page1.php puis page2.php ?

Le serveur peut reconnaître l’utilisateur grâce à une session associée à un identifiant de session, généralement transmis par un cookie. Il peut aussi utiliser un mécanisme d’authentification.

Question 2 : Est-ce que PHP conserve automatiquement les informations entre deux requêtes ?

Non. Les variables ordinaires d’un script PHP ne sont généralement pas conservées entre deux requêtes HTTP indépendantes.

Conclusion : HTTP est un protocole sans état (stateless). Les sessions et les cookies permettent de conserver certaines informations entre plusieurs requêtes.

Activité 2 — Première session PHP

Dans exercices/session.php :

<?php
session_start();

$_SESSION['nom'] = 'Ahmed';

echo "Session créée.";

session_start() démarre une nouvelle session ou reprend une session existante. $_SESSION['nom'] enregistre le nom dans la session.

Activité 3 — Lire une variable de session

Dans exercices/profil.php :

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

1. Où avons-nous créé la variable ?

Dans exercices/session.php, avec $_SESSION['nom'] = 'Ahmed';.

2. Où avons-nous récupéré la variable ?

Dans exercices/profil.php, avec $_SESSION['nom'].

3. Pourquoi session_start() est-il nécessaire ?

Il permet de démarrer ou de reprendre la session et d’accéder à ses données.

4. La variable $_SESSION est-elle une variable classique ?

Non. C’est une superglobale PHP permettant de stocker et de récupérer des données associées à une session.

5. Que se passe-t-il si on ferme le navigateur puis qu’on revient sur la page ?

Cela dépend de la configuration du cookie de session et du serveur. La session peut ne plus être accessible si son identifiant n’est plus disponible. Fermer le navigateur ne garantit pas la destruction immédiate des données côté serveur.

Activité 4 — Plusieurs informations dans la session

Exemple :

<?php
session_start();

$_SESSION['nom'] = 'Ahmed';
$_SESSION['prenom'] = 'Ali';
$_SESSION['formation'] = 'Informatique';
$_SESSION['age'] = 20;
$_SESSION['email'] = 'ahmed@example.com';

La session peut contenir plusieurs informations associées au même utilisateur. Pour les afficher dans une page HTML, il est recommandé d’échapper les chaînes avec htmlspecialchars().

Activité 5 — Vérifier l’existence d’une session

Dans exercices/espace-prive.php :

<?php
session_start();

if (isset($_SESSION['nom'])) {
    echo "Bienvenue dans votre espace privé.";
} else {
    http_response_code(403);
    echo "Accès refusé.";
}

1. Pourquoi faut-il vérifier l’existence de la variable ?

Pour s’assurer qu’une information existe avant de l’utiliser et éviter les erreurs.

2. Que se passe-t-il si l’utilisateur accède directement à la page ?

Si la variable $_SESSION['nom'] n’existe pas, l’accès est refusé.

3. Pourquoi cette vérification est-elle importante pour l’authentification ?

Elle permet de contrôler l’accès aux pages privées. Dans une application réelle, il faut vérifier un indicateur de connexion fiable plutôt que la simple présence d’un nom.

Activité 6 — Détruire une session

Dans exercices/logout.php :

<?php
session_start();

$_SESSION = [];
session_unset();
session_destroy();

echo "Vous êtes déconnecté.";

Question : Que se passe-t-il après session_destroy() ?

La session est détruite côté serveur. Cette fonction ne supprime pas automatiquement toutes les variables PHP déjà chargées ni le cookie de session du navigateur. Pour une déconnexion complète, il faut aussi gérer le cookie si nécessaire.

Activité 7 — Créer un cookie

Exemple :

<?php
setcookie('langue', 'fr', time() + 3600, '/');

echo "Cookie configuré.";

1. Où est stocké le cookie ?

Principalement dans le navigateur de l’utilisateur.

2. Que représente 3600 ?

3600 secondes, soit une heure.

3. Quelle différence existe entre un cookie et une session ?

Un cookie est stocké côté navigateur. Les données d’une session PHP sont principalement stockées côté serveur.

4. Que se passe-t-il lorsque le cookie expire ?

Le navigateur cesse normalement de l’envoyer après son expiration.

Activité 8 — Lire un cookie

Le fichier exercices/cookie.php crée les cookies nom, theme et langue, puis affiche les valeurs reçues dans $_COOKIE.

Pourquoi faut-il parfois recharger la page ?

Les cookies sont envoyés au navigateur dans les en-têtes HTTP. $_COOKIE contient les cookies reçus lors de la requête courante ; un cookie nouvellement créé est généralement visible lors d’une requête suivante.

Activité 9 — Supprimer un cookie

Dans exercices/supprimer-cookie.php :

<?php
setcookie('langue', '', time() - 3600, '/');

echo "Cookie langue marqué pour suppression.";

Un cookie est supprimé en lui donnant une date d’expiration passée et en utilisant le même chemin et le même domaine que lors de sa création.

Activité 10 — Session ou cookie ?

|Caractéristique                |Session                                            |Cookie                                                    |
|-------------------------------|---------------------------------------------------|----------------------------------------------------------|
|Stockage principal             |Serveur                                            |Navigateur                                                |
|Durée de vie                   |Selon la configuration et la destruction           |Jusqu’à expiration ou suppression                         |
|Peut mémoriser un utilisateur ?|Oui                                                |Oui                                                       |
|Envoyé avec les requêtes HTTP ?|Généralement, son identifiant est envoyé par cookie|Oui, selon le domaine, le chemin et les règles applicables|
|Accessible côté navigateur ?   |Les données restent normalement côté serveur       |Oui, selon les attributs du cookie                        |

1. Pourquoi les sessions sont-elles adaptées à l’authentification ?

Elles permettent de conserver côté serveur l’état de connexion de l’utilisateur entre plusieurs requêtes.

2. Pourquoi éviter de stocker des informations sensibles directement dans un cookie ?

Un cookie est stocké sur le navigateur et peut être exposé ou modifié selon sa configuration. Il ne faut jamais y enregistrer un mot de passe en clair.

3. Un cookie est-il totalement sécurisé ?

Non. Les attributs Secure, HttpOnly et SameSite, ainsi que l’utilisation de HTTPS, contribuent à sa protection sans garantir une sécurité absolue.

────────

Partie 2 — Authentification

Activités 11 et 12 — Formulaire et vérification des identifiants

Le formulaire login.php utilise la méthode POST pour recevoir le nom d’utilisateur et le mot de passe.

Dans la version finale, les identifiants sont vérifiés à partir des utilisateurs enregistrés dans utilisateurs.json.

1. Que se passe-t-il avec un mauvais identifiant ?

La connexion échoue et un message d’erreur est affiché.

2. Que se passe-t-il avec un mauvais mot de passe ?

La connexion échoue également.

3. Pourquoi une comparaison directe avec un mot de passe écrit dans le code n’est-elle pas adaptée à une véritable application ?

Parce que le mot de passe serait stocké en clair dans le code source. Il est préférable de stocker un hash sécurisé et de vérifier le mot de passe avec password_verify().

Activité 13 — Mémoriser l’utilisateur connecté

Après une connexion réussie, le programme enregistre les informations suivantes :

$_SESSION['username'] = $utilisateur['username'];
$_SESSION['connecte'] = true;

La session permet de conserver l’identité de l’utilisateur et son état de connexion.

Activité 14 — Protéger une page

Dans dashboard.php :

require_once _DIR_ . '/fonctions.php';
protegerPage();

La fonction protegerPage() redirige vers login.php si l’utilisateur n’est pas connecté.

La vérification doit être réalisée côté serveur avant l’affichage du contenu.

Activité 15 — Déconnexion

Le fichier logout.php :

1. Vide les variables de session.
2. Expire le cookie de session.
3. Détruit la session.
4. Redirige vers login.php.

Après la déconnexion, les pages protégées doivent refuser l’accès.

Activité 16 — Sécuriser les mots de passe

Exemple :

$password = '123456';

$hash = password_hash(
    $password,
    PASSWORD_DEFAULT
);

1. Le résultat est-il identique à 123456 ?

Non, c’est une chaîne représentant un hash.

2. Pourquoi ?

password_hash() génère une empreinte destinée au stockage sécurisé, avec un sel généré automatiquement.

3. Peut-on retrouver directement le mot de passe à partir du hash ?

Non. Le hash n’est pas conçu pour être inversé, même si des mots de passe faibles peuvent être devinés.

4. Pourquoi ne faut-il jamais stocker les mots de passe en clair ?

Une fuite de données révélerait directement les mots de passe et pourrait compromettre d’autres comptes.

Activité 17 — Vérifier un mot de passe

if (password_verify($password, $hash)) {
    echo "Mot de passe correct.";
} else {
    echo "Mot de passe incorrect.";
}

password_verify() vérifie si le mot de passe fourni correspond au hash enregistré.

Avec 123456 et son hash correspondant, la vérification réussit. Avec abcdef, elle échoue.

Activité 18 — Simuler un utilisateur

Le fichier utilisateurs.php contient les fonctions de stockage et de recherche des comptes.

Le compte de test est initialisé avec :

• Nom d’utilisateur : admin
• Mot de passe : 123456

Le mot de passe est stocké sous forme de hash grâce à password_hash().

Pour les connexions, le programme utilise password_verify().

Activité 19 — Intégration dans Gestion des étudiants

Le tableau de bord permet d’accéder aux fonctionnalités suivantes :

• Liste des étudiants.
• Ajout d’un étudiant.
• Recherche d’un étudiant.
• Modification d’un étudiant.
• Suppression d’un étudiant.
• Déconnexion.

Les comptes sont stockés dans utilisateurs.json et les étudiants dans etudiants.json.

Activité 20 — Fonction de protection

Dans fonctions.php :

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

Question : Quel est l’intérêt de créer ces fonctions ?

Elles évitent de répéter le même code sur chaque page et centralisent la logique de protection. Une modification de la vérification peut être réalisée à un seul endroit.

Activité 21 — Afficher l’utilisateur connecté

echo htmlspecialchars(
    $_SESSION['username'],
    ENT_QUOTES,
    'UTF-8'
);

Pourquoi utiliser htmlspecialchars() ?

Cette fonction encode les caractères spéciaux HTML et réduit les risques d’injection de code HTML ou JavaScript dans la page.

Activité 22 — Mini-projet

Avant la connexion, l’utilisateur peut accéder aux pages publiques nécessaires, notamment login.php et inscription.php.

Après la connexion, il peut accéder aux pages protégées :

• dashboard.php
• ajouter.php
• rechercher.php
• modifier.php
• supprimer.php

Le bouton de déconnexion détruit la session et redirige vers la page de connexion.

La protection est vérifiée côté serveur : masquer simplement un lien ne suffit pas.

────────

Partie 3 — Questions de synthèse

Activité 23

1. Qu’est-ce qu’une session ?

Une session est un mécanisme qui conserve des informations côté serveur entre plusieurs requêtes d’un utilisateur.

2. Pourquoi session_start() est-il nécessaire ?

Il démarre ou reprend une session afin d’accéder à ses données.

3. Quel est le rôle de $_SESSION ?

Elle permet de stocker et de récupérer des informations liées à la session courante.

4. Qu’est-ce qu’un cookie ?

Un cookie est une petite donnée enregistrée par le navigateur à la demande du serveur.

5. Quelle différence existe entre cookie et session ?

Le cookie est principalement stocké côté navigateur, tandis que les données d’une session PHP sont principalement stockées côté serveur.

6. Quel est le rôle de $_COOKIE ?

Cette superglobale permet de lire les cookies reçus avec la requête HTTP courante.

7. Pourquoi utilise-t-on session_destroy() ?

Pour détruire les données de session côté serveur.

8. Pourquoi ne faut-il pas stocker les mots de passe en clair ?

Pour éviter leur exposition directe en cas de fuite de données.

9. Quel est le rôle de password_hash() ?

Générer un hash sécurisé destiné au stockage d’un mot de passe.

10. Quel est le rôle de password_verify() ?

Vérifier qu’un mot de passe correspond à un hash existant.

11. Pourquoi une page d’administration doit-elle être protégée ?

Pour empêcher les utilisateurs non authentifiés d’accéder aux données et aux fonctionnalités privées.

12. Pourquoi créer une fonction protegerPage() ?

Pour réutiliser la même vérification sur toutes les pages protégées et éviter les répétitions.

13. Pourquoi utiliser htmlspecialchars() ?

Pour encoder les caractères spéciaux HTML et réduire les risques d’injection de contenu malveillant.