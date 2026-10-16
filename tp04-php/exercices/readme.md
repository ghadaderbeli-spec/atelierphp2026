# Activité 1 — Comprendre le problème HTTP

# Question 1 : Comment le serveur peut-il savoir qu’il s’agit du même utilisateur lorsqu’il consulte page1.php puis page2.php ?
Le serveur peut reconnaître l’utilisateur grâce à une session associée à un identifiant de session, généralement transmis par un cookie. Il peut aussi utiliser un mécanisme d’authentification.

# Question 2 : Est-ce que PHP conserve automatiquement les informations entre deux requêtes ?
Non. Les variables ordinaires d’un script PHP ne sont généralement pas conservées entre deux requêtes HTTP indépendantes.
conclusion : HTTP est un protocole sans état (stateless). Les sessions et les cookies permettent de conserver certaines informations entre plusieurs requêtes.
# Activité 3 — Lire une variable de session
1. Où avons-nous créé la variable ?
Dans exercices/session.php, avec $_SESSION['nom'] = 'Ahmed';.
2. Où avons-nous récupéré la variable ?
Dans exercices/profil.php, avec $_SESSION['nom'].
3. Pourquoi session_start() est-il nécessaire ?
Il permet de démarrer ou de reprendre la session et d’accéder à ses données.
4. La variable $_SESSION est-elle une variable classique ?
Non. C’est une superglobale PHP permettant de stocker et de récupérer des données associées à une session.
5. Que se passe-t-il si on ferme le navigateur puis qu’on revient sur la page ?Cela dépend de la configuration du cookie de session et du serveur. La session peut ne plus être accessible si son identifiant n’est plus disponible. Fermer le navigateur ne garantit pas la destruction immédiate des données côté serveur.
