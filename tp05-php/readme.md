## Activité 1 - Comprendre une base de données relationnelle

### 1. Que représente une ligne de cette table ?
Une ligne représente un enregistrement, c'est-à-dire un étudiant avec toutes ses informations.

### 2. Que représente une colonne ?
Une colonne représente un attribut ou une information concernant les étudiants, par exemple le nom, le prénom, l'âge ou la moyenne.

### 3. Pourquoi chaque étudiant possède-t-il un identifiant ?
L'identifiant permet de distinguer chaque étudiant et de retrouver précisément son enregistrement, même si plusieurs étudiants ont le même nom.

### 4. Pourquoi une base de données peut-elle être plus pratique pour rechercher et modifier des données ?
Elle permet de rechercher, trier, ajouter, modifier et supprimer rapidement des données avec des requêtes SQL.

## Activité 2 - Créer la base et la table avec SQL

### 1. Pourquoi id est-il une clé primaire ?
Parce qu'il identifie de manière unique chaque étudiant. Deux étudiants ne peuvent pas avoir le même identifiant.

### 2. Pourquoi nom est-il déclaré NOT NULL ?
Parce que le nom est une information obligatoire. La valeur NULL n'est donc pas autorisée.

### 3. Que signifie AUTO_INCREMENT ?
Cela signifie que l'identifiant est généré automatiquement par la base de données à chaque nouvel enregistrement.

### 4. Pourquoi la moyenne n'est-elle pas stockée dans une colonne de type texte ?
Parce que la moyenne est une valeur numérique. Le type DECIMAL permet de stocker des nombres avec des chiffres après la virgule et de réaliser des calculs.

### 5. Que se passe-t-il si l'on tente d'insérer NULL dans une colonne obligatoire ?
La base de données refuse l'insertion et retourne une erreur, car la colonne est déclarée NOT NULL.

## Activité 3 - Insérer des étudiants avec INSERT

### 1. Quel est le rôle de INSERT INTO ?
INSERT INTO permet d'ajouter un nouvel enregistrement dans une table.

### 2. Quel est le rôle de SELECT ?
SELECT permet de consulter et récupérer les données d'une table.

### 3. À quoi sert la clause WHERE ?
WHERE permet de filtrer les enregistrements selon une condition.

### 4. À quoi sert ORDER BY ?
ORDER BY permet de trier les résultats selon une ou plusieurs colonnes. DESC signifie ordre décroissant et ASC signifie ordre croissant.

### 5. Quelle différence existe entre SELECT * et la sélection de colonnes précises ?
SELECT * récupère toutes les colonnes de la table, tandis que la sélection de colonnes précises récupère uniquement les informations demandées.

## Activité 4 - Modifier et supprimer avec SQL

### 1. Quel est le rôle de UPDATE ?
UPDATE permet de modifier les informations d'un ou plusieurs enregistrements dans une table.

### 2. Quel est le rôle de DELETE ?
DELETE permet de supprimer un ou plusieurs enregistrements d'une table.

### 3. Pourquoi faut-il vérifier attentivement la clause WHERE ?
Parce que WHERE détermine les lignes concernées. Sans cette clause, UPDATE ou DELETE peut modifier ou supprimer toutes les lignes de la table.

### 4. Pourquoi vaut-il mieux utiliser un identifiant plutôt qu'un nom pour modifier un étudiant ?
Parce que l'identifiant est unique, alors que plusieurs étudiants peuvent avoir le même nom.

## Activité 5 - Créer la connexion PDO

### 1. Quel est le rôle de new PDO(...) ?
new PDO() permet de créer une connexion entre PHP et la base de données.

### 2. À quoi sert require_once ?
require_once permet d'inclure un fichier PHP une seule fois dans un autre fichier.

### 3. Pourquoi utilise-t-on __DIR__ pour construire le chemin du fichier ?
__DIR__ retourne le chemin du dossier contenant le fichier PHP actuel. Cela permet de construire un chemin fiable vers les autres fichiers.

### 4. Pourquoi ne doit-on pas afficher les détails techniques d'une erreur de connexion aux utilisateurs ?
Parce que ces informations peuvent révéler des détails sensibles sur la configuration du serveur ou de la base de données.

### 5. Pourquoi les identifiants de connexion doivent-ils rester confidentiels ?
Pour empêcher les personnes non autorisées d'accéder à la base de données et de consulter, modifier ou supprimer les informations.

## Activité 6 - Lire les étudiants depuis PHP

### 1. Quel est le rôle de $pdo->query() ?
Cette méthode permet d'exécuter une requête SQL simple depuis PHP.

### 2. Que retourne fetchAll() ?
fetchAll() retourne toutes les lignes du résultat sous forme d'un tableau.

### 3. Pourquoi utilise-t-on foreach ?
foreach permet de parcourir les éléments d'un tableau, notamment pour afficher chaque étudiant.

### 4. Pourquoi utilise-t-on htmlspecialchars() lors de l'affichage des chaînes ?
Cette fonction transforme les caractères spéciaux en entités HTML afin d'éviter l'exécution de code HTML ou JavaScript injecté dans les données.

### 5. Quelle différence existe entre les données stockées dans la base et le HTML généré ?
Les données stockées dans la base sont les informations enregistrées durablement. Le HTML généré est la présentation de ces informations dans le navigateur.

## Activité 7 - Ajouter un étudiant avec un formulaire

### 1. Pourquoi la validation HTML ne suffit-elle pas ?
Parce que les règles HTML peuvent être contournées. Un utilisateur peut envoyer directement des données sans utiliser le formulaire.

### 2. Pourquoi faut-il vérifier les données côté serveur ?
Pour garantir que les données reçues sont correctes avant de les enregistrer dans la base de données.

### 3. Pourquoi id n'apparaît-il pas dans le formulaire ?
Parce que l'identifiant est généré automatiquement par la base grâce à AUTO_INCREMENT.

### 4. Comment vérifier que l'étudiant a réellement été ajouté à la base ?
On peut consulter la table avec une requête SELECT ou afficher la liste des étudiants depuis l'application.

## Activité 8 - Utiliser une requête préparée

### 1. Quel est le rôle de prepare() ?
prepare() prépare une requête SQL avec des paramètres qui seront transmis séparément des instructions SQL.

### 2. Quel est le rôle de execute() ?
execute() exécute la requête préparée en lui transmettant les valeurs des paramètres.

### 3. À quoi correspondent :nom, :prenom et les autres paramètres nommés ?
Ce sont des marqueurs qui représentent les valeurs qui seront fournies à la requête lors de son exécution.

### 4. Pourquoi ne faut-il pas construire la requête SQL en concaténant directement les données du formulaire ?
Parce que cela peut permettre une injection SQL. Les requêtes préparées séparent les instructions SQL des valeurs fournies par l'utilisateur.

### 5. Une requête préparée remplace-t-elle la validation des données ? Justifiez.
Non. Une requête préparée protège la requête SQL contre l'injection SQL, mais elle ne vérifie pas que les données sont correctes. La validation côté serveur reste nécessaire.

## Activité 9 - Rechercher un étudiant avec GET

### 1. Pourquoi GET est-il adapté à une recherche ?
Parce que GET transmet les critères de recherche dans l'URL. Cela permet de retrouver et partager une recherche facilement.

### 2. Quel est le rôle de LIKE ?
LIKE permet de rechercher des valeurs qui correspondent à un modèle de texte.

### 3. À quoi servent les caractères % dans cette requête ?
Le caractère % représente zéro ou plusieurs caractères. Il permet de rechercher un nom qui contient le texte saisi.

### 4. Pourquoi utiliser une requête préparée même pour une recherche ?
Pour séparer la valeur saisie par l'utilisateur de la requête SQL et éviter les injections SQL.

## Activité 10 - Modifier un étudiant

### 1. Pourquoi l'identifiant doit-il être vérifié ?
Pour s'assurer que l'identifiant reçu est un entier valide et éviter de traiter une valeur incorrecte.

### 2. Pourquoi faut-il vérifier que l'étudiant existe ?
Pour éviter de modifier un enregistrement inexistant et afficher un message adapté si aucun étudiant ne correspond à l'identifiant.

### 3. Pourquoi l'identifiant ne doit-il pas être modifiable comme les autres champs ?
Parce qu'il identifie de manière unique l'étudiant. Le modifier pourrait provoquer des incohérences dans la base de données.

### 4. Pourquoi faut-il utiliser une requête préparée pour UPDATE ?
Pour transmettre les valeurs séparément de la requête SQL et éviter les injections SQL.

## Activité 11 - Supprimer un étudiant

### 1. Pourquoi la suppression est-elle une opération à protéger ?
Parce qu'elle entraîne la perte d'un enregistrement. Une suppression incorrecte peut entraîner la perte de données importantes.

### 2. Pourquoi ne faut-il pas supprimer une ligne uniquement à partir du nom ?
Parce que plusieurs étudiants peuvent avoir le même nom. L'identifiant permet de cibler précisément un seul étudiant.

### 3. Pourquoi privilégier POST pour déclencher la suppression ?
Parce que POST permet d'envoyer une demande de modification de données sans déclencher la suppression par un simple lien ou une visite d'URL.

### 4. Comment vérifier qu'une ligne a été supprimée ?
On peut vérifier le nombre de lignes affectées avec rowCount() ou consulter à nouveau la table avec SELECT.

## Activité 13 - Comparer JSON et base de données

| Critère | Fichier JSON | Base MySQL/MariaDB |
|---|---|---|
| Organisation des données | Données stockées dans un fichier structuré | Données organisées dans des tables |
| Recherche avec critères SQL | Non | Oui |
| Modification d'un seul enregistrement | Nécessite de lire et réécrire le fichier | Possible avec UPDATE |
| Gestion de plusieurs utilisateurs | Limitée | Adaptée à plusieurs utilisateurs |
| Mise en place initiale | Simple | Nécessite une installation et une configuration |
| Utilisation d'une clé primaire | Non imposée par JSON | Possible et utilisée pour identifier les lignes |

## Questions de synthèse

### 1. Pourquoi ne supprime-t-on pas immédiatement le TP 5 de la progression ?
Parce que le TP 5 permet de comprendre la persistance des données avec JSON avant d'apprendre à utiliser une base de données relationnelle.

### 2. Dans quels cas un fichier JSON reste-t-il pratique ?
Il est pratique pour stocker de petites quantités de données, des configurations ou des données simples dans un format facile à lire et à échanger.

### 3. Quels avantages apporte une base de données relationnelle ?
Elle permet d'organiser les données dans des tables, de faire des recherches avec SQL, de modifier des enregistrements précisément et de gérer plusieurs utilisateurs.

### 4. Quel est le rôle de PDO dans cette architecture ?
PDO permet à PHP de se connecter à la base de données et d'exécuter des requêtes SQL.

### 5. Quelle différence existe entre SQL et PHP ?
SQL est un langage utilisé pour créer, consulter et modifier les données dans une base de données. PHP est un langage de programmation utilisé pour développer l'application web et communiquer avec la base.

### 6. Pourquoi les requêtes préparées sont-elles importantes ?
Elles séparent les instructions SQL des données fournies par l'utilisateur et contribuent à prévenir les injections SQL.

### 7. Quelle différence existe entre validation des données et protection contre l'injection SQL ?
La validation vérifie que les données respectent les règles attendues. La protection contre l'injection SQL empêche les données saisies de modifier le fonctionnement d'une requête SQL.

## Configuration locale

1. Copier `config.example.php` vers `config.php`.
2. Renseigner les identifiants MariaDB dans `config.php`.
3. Ne jamais publier `config.php` sur un dépôt public.