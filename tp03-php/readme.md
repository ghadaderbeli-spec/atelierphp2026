# TP 3 — Formulaires, GET/POST et validation en PHP

*Matière :* Développement côté serveur  
*Niveau :* 2ème année Licence  
*Langage :* PHP  
*Environnement :* Ubuntu 24.04, VS Code et serveur intégré PHP  
*Fil rouge :* Gestion des étudiants

## Activité 1 — Premier formulaire HTML

### 1. Quel est le rôle de l'attribut name ?

L'attribut name permet d'identifier un champ du formulaire. Sa valeur sert de clé pour récupérer la donnée envoyée au serveur avec $_GET ou $_POST.

### 2. Pourquoi chaque champ possède-t-il un name différent ?

Chaque champ possède un nom différent afin de distinguer les données saisies et de récupérer chaque valeur séparément en PHP.

### 3. Que se passe-t-il lorsqu'on clique sur Envoyer ?

Le navigateur envoie les données du formulaire au serveur. Lorsque l'attribut method n'est pas précisé, la méthode utilisée par défaut est GET.

### 4. Quelle URL apparaît dans le navigateur ?

L'URL contient le chemin de la page et, après l'envoi avec GET, les paramètres du formulaire. Par exemple :

formulaire.php?nom=Dupont&prenom=Ahmed&age=21&formation=Informatique

Les valeurs affichées dépendent des données saisies.

## Activité 2 — Récupérer les données avec $_GET

### 1. Observer l'URL après validation.

Après l'envoi du formulaire avec GET, les données saisies apparaissent dans l'URL sous forme de paramètres.

### 2. Où apparaissent les données ?

Les données apparaissent dans l'URL du navigateur. Elles peuvent être récupérées côté serveur avec le tableau superglobal $_GET.

### 3. Pourquoi la méthode GET permet-elle de voir les données dans l'URL ?

La méthode GET transmet les données sous forme de paramètres ajoutés à l'URL.

### 4. Que se passe-t-il si on ouvre directement la page sans envoyer le formulaire ?

Les paramètres du formulaire peuvent être absents. Si le programme essaie d'accéder directement à une clé inexistante de $_GET, PHP peut afficher un avertissement. Il faut vérifier l'existence des données avec isset().

## Activité 3 — Éviter les erreurs avec isset()

La fonction isset() permet de vérifier si une variable ou une clé existe et n'est pas égale à null. Elle permet d'éviter d'accéder à un paramètre qui n'a pas été envoyé.

Lorsque le formulaire n'a pas encore été envoyé, le programme affiche : « Veuillez remplir le formulaire. »

## Activité 4 — GET ou POST ?

### Comparaison entre GET et POST

| GET | POST |
|---|---|
| Les données sont transmises dans l'URL. | Les données sont transmises dans le corps de la requête HTTP. |
| Adapté aux recherches et aux filtres. | Adapté à l'inscription et à l'envoi de formulaires. |
| Les paramètres peuvent être partagés avec l'URL. | Les données ne figurent pas dans l'URL. |
| Les paramètres peuvent être conservés dans l'historique du navigateur. | Les données ne sont pas ajoutées à l'URL, mais peuvent être conservées autrement. |
| Les données peuvent être mises en cache selon la requête. | Les requêtes ne sont généralement pas mises en cache de la même manière. |

POST ne chiffre pas les données. HTTPS est nécessaire pour protéger leur transmission.

## Activité 5 — Vérifier les données saisies

Les champs nom, prénom, âge, formation et moyenne sont vérifiés afin de détecter les champs obligatoires non renseignés. Les messages d'erreur sont stockés dans un tableau et affichés à l'utilisateur.

## Activité 6 — Validation de l'âge et de la moyenne

L'âge doit être compris entre 16 et 40 ans inclus. La moyenne doit être comprise entre 0 et 20 inclus. Les données sont vérifiées côté serveur avant le traitement.

## Activité 7 — Conserver les valeurs saisies

### Pourquoi utilise-t-on htmlspecialchars() ?

La fonction htmlspecialchars() convertit les caractères spéciaux HTML en entités HTML. Elle permet d'afficher les données saisies comme du texte et de limiter les risques d'injection HTML, notamment les attaques XSS.

## Activité 8 — Affichage du résultat

La fonction resultat($moyenne) retourne « Admis » lorsque la moyenne est supérieure ou égale à 10 et « Ajourné » lorsque la moyenne est inférieure à 10.

## Activité 9 — Intégration au projet Gestion des étudiants

Les fonctions communes sont placées dans fonctions.php afin de pouvoir être réutilisées dans les différentes pages de l'application.

## Activité 10 — Ajouter un étudiant

La page ajouter.php utilise un formulaire POST. Après validation des données, un tableau associatif est créé pour représenter l'étudiant.

## Activité 11 — Séparer traitement et affichage

Le traitement est organisé en plusieurs étapes : récupération des données, validation, traitement des données valides, puis affichage du résultat en HTML.

## Activité 12 — Recherche d'un étudiant avec GET

### Pourquoi GET est-il particulièrement adapté à cette fonctionnalité ?

GET est adapté à la recherche parce que le nom recherché apparaît dans l'URL. La recherche peut ainsi être partagée ou reproduite à partir des mêmes paramètres.

## Activité 13 — Mini-projet du TP

L'application Gestion des étudiants permet de lister les étudiants, d'en ajouter, de rechercher un étudiant par son nom, de modifier ses informations et de le supprimer. Les données saisies sont validées côté serveur et le résultat est calculé automatiquement à partir de la moyenne.

## Activité 14 — Réflexion

### 1. Quelle est la différence entre GET et POST ?

GET transmet les paramètres dans l'URL, tandis que POST les transmet dans le corps de la requête HTTP.

### 2. Dans quel cas utiliser GET ?

GET est utilisé pour rechercher des informations, appliquer des filtres ou transmettre des paramètres qui peuvent être conservés dans une URL.

### 3. Dans quel cas utiliser POST ?

POST est utilisé pour envoyer des données à traiter, par exemple lors d'une inscription ou de l'ajout d'un étudiant.

### 4. Pourquoi vérifier isset() ou empty() ?

isset() permet de vérifier si une variable ou une clé existe et n'est pas null. empty() permet de vérifier si une valeur est considérée comme vide. Ces fonctions aident à gérer les champs manquants et à éviter certaines erreurs.

### 5. Pourquoi valider les données reçues par le serveur ?

La validation permet de vérifier que les données respectent les règles attendues avant de les traiter ou de les enregistrer.

### 6. Pourquoi ne faut-il pas faire confiance aux données envoyées par le navigateur ?

Les utilisateurs peuvent modifier les valeurs envoyées ou contourner les contraintes HTML. Le serveur doit donc vérifier lui-même toutes les données reçues.

### 7. Quel est le rôle de htmlspecialchars() ?

Cette fonction transforme les caractères spéciaux HTML en entités afin d'afficher les données comme du texte et de limiter les risques d'injection HTML.

### 8. Quelle différence existe entre validation et affichage sécurisé ?

La validation vérifie que les données respectent les règles attendues. L'affichage sécurisé consiste à encoder les données en fonction du contexte pour éviter qu'elles soient interprétées comme du code, notamment HTML.

### 9. Pourquoi séparer les fonctions dans fonctions.php ?

Cela permet de réutiliser le même code dans plusieurs pages, d'éviter les répétitions et de faciliter la maintenance de l'application.