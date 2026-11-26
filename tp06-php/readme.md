Activité 13 — Page de listing des utilisateurs
1. Pourquoi cette page doit-elle être protégée par protegerAdmin() et non protegerPage() ?
Parce que la liste contient les informations des comptes utilisateurs. Seul un administrateur doit pouvoir consulter et gérer ces comptes. protegerPage() autorise tous les utilisateurs connectés, tandis que protegerAdmin() vérifie aussi le rôle administrateur.
2. Pourquoi utilise-t-on (int) devant $u['id'] ?
Pour convertir l'identifiant en entier. Cela évite d'afficher ou d'utiliser une valeur qui ne serait pas de type numérique attendu.
3. Pourquoi échappe-t-on username et created_at mais pas actif ?
username et created_at sont des valeurs textuelles provenant de la base : on utilise htmlspecialchars() pour empêcher l'injection de code HTML ou JavaScript. actif est utilisé comme une valeur logique pour afficher un texte fixe : « Actif » ou « Inactif ».
4. Pourquoi ORDER BY username plutôt que ORDER BY id ?
Pour afficher les utilisateurs par ordre alphabétique de leur nom d'utilisateur. Avec ORDER BY id, le classement serait fait selon leur identifiant.
Activité 14 — Créer un utilisateur depuis l'administration
1. Pourquoi cette page doit-elle être protégée par protegerAdmin() et non protegerPage() ?
Parce que créer un compte est une opération de gestion des utilisateurs. Un utilisateur normal ne doit pas pouvoir créer des comptes depuis l'espace d'administration.
2. Pourquoi valide-t-on $role avec in_array(..., ['admin', 'user'], true) ?
Pour accepter uniquement les deux rôles autorisés : admin et user. Le troisième paramètre true impose une comparaison stricte, sans conversion automatique de type.
3. Pourquoi force-t-on actif = 1 à la création ?
Pour que le nouveau compte soit actif dès sa création et puisse se connecter immédiatement, si ses identifiants sont corrects.
4. Pourquoi le formulaire est-il en POST et non en GET ?
Parce que le formulaire envoie des informations sensibles, notamment le mot de passe, et déclenche une création en base. POST évite de placer ces informations dans l'URL et convient aux opérations qui modifient les données.
Activité 15 — Modifier le rôle d'un utilisateur
1. Pourquoi utilise-t-on filter_input(..., FILTER_VALIDATE_INT) plutôt que $_GET['id'] directement ?
Pour récupérer et valider l'identifiant transmis dans l'URL. La fonction vérifie qu'il s'agit bien d'un entier valide avant de l'utiliser.
2. Pourquoi empêche-t-on un administrateur de retirer son propre rôle administrateur ?
Pour éviter qu'il perde ses droits d'administration et ne puisse plus gérer les comptes.
3. Pourquoi empêche-t-on la rétrogradation du dernier administrateur actif ?
Pour garantir qu'il reste toujours au moins un administrateur actif capable de gérer l'application.
4. Pourquoi recharge-t-on l'utilisateur depuis la base avant le traitement POST ?
Pour vérifier que l'utilisateur existe réellement et récupérer ses informations actuelles depuis la base. On ne doit pas faire confiance à des informations envoyées par le navigateur.
Activité 16 — Activer ou désactiver un compte
1. Pourquoi l'action d'activation/désactivation passe-t-elle par POST et non par un simple lien GET ?
Parce qu'il s'agit d'une modification de la base de données. POST est adapté aux actions qui modifient les données, alors qu'un lien GET sert normalement à consulter une ressource.
2. Pourquoi empêche-t-on un administrateur de désactiver son propre compte ?
Pour éviter qu'il bloque lui-même son accès à l'espace d'administration.
3. Pourquoi empêche-t-on la désactivation du dernier administrateur actif ?
Pour qu'il reste toujours un administrateur actif qui puisse gérer l'application.
4. Que se passe-t-il pour les sessions déjà ouvertes d'un compte qu'on désactive ?
La désactivation empêche les nouvelles connexions si le statut actif est vérifié lors de la connexion. Les sessions déjà ouvertes ne sont pas automatiquement détruites par ce seul changement en base. Pour les bloquer immédiatement, il faudrait aussi vérifier le statut du compte à chaque page protégée.
5. Pourquoi affiche-t-on le statut actuel avant le formulaire ?
Pour informer l'administrateur de l'état actuel du compte et lui permettre de choisir l'action correcte : activer ou désactiver.
Activité 17 — Supprimer un utilisateur
1. Pourquoi la suppression nécessite-t-elle une confirmation explicite via un formulaire POST ?
Parce que la suppression est une action définitive. La confirmation évite une suppression accidentelle et POST est adapté à une opération qui modifie la base.
2. Pourquoi empêche-t-on un administrateur de supprimer son propre compte ?
Pour éviter qu'il perde son accès à l'administration et ne puisse plus gérer l'application.
3. Pourquoi vérifie-t-on qu'il restera au moins un administrateur actif après suppression ?
Pour garantir qu'un administrateur pourra toujours gérer les utilisateurs et les paramètres de l'application.
4. Quelle différence y a-t-il entre désactiver et supprimer un utilisateur ? Quel choix privilégier en pratique ?
- Désactiver : le compte reste dans la base, mais l'utilisateur ne peut plus se connecter. Il peut être réactivé.
- Supprimer : le compte est effacé de la base.
En pratique, on privilégie souvent la désactivation, car elle conserve les informations et l'historique du compte.
5. Pourquoi remet-on $utilisateur = null après suppression ?
Pour indiquer que l'utilisateur n'existe plus dans la page et éviter d'afficher à nouveau le formulaire de confirmation.
Activité 18 — Questions de synthèse de la Partie B
1. Pourquoi la gestion des utilisateurs doit-elle être réservée aux administrateurs ?
Parce que les administrateurs ont seuls le droit de créer, modifier, activer, désactiver ou supprimer les comptes. Cela protège l'application contre les opérations non autorisées.
2. Pourquoi protegerAdmin() est-elle appelée avant toute lecture ou écriture en base ?
Pour vérifier les droits de l'utilisateur avant de lui permettre d'accéder aux données ou de les modifier. Un utilisateur non autorisé est redirigé ou refusé avant l'opération.
3. Pourquoi refuse-t-on l'auto-suppression et l'auto-désactivation ?
Pour éviter que l'administrateur connecté supprime ou bloque son propre compte et perde l'accès à l'administration.
4. Pourquoi refuse-t-on la suppression ou la désactivation du dernier administrateur actif ?
Pour garantir qu'il reste toujours au moins un administrateur capable de gérer l'application.
5. Pourquoi préférer la désactivation à la suppression d'un compte en exploitation réelle ?
Parce que la désactivation conserve les données et l'historique du compte. Elle est réversible : on peut réactiver le compte plus tard.
6. Pourquoi filter_input(..., FILTER_VALIDATE_INT) est-il préférable à (int) $_GET['id'] dans ces pages ?
Parce qu'il vérifie que la valeur reçue est réellement un entier valide. Une simple conversion avec (int) peut transformer une valeur incorrecte en nombre, par exemple en 0, sans signaler clairement que l'entrée était invalide.
7. Pourquoi chaque action passe-t-elle par une page dédiée plutôt que par une seule page fourre-tout ?
Pour séparer les responsabilités, rendre le code plus clair, faciliter la maintenance et repérer plus facilement les erreurs.
8. Pourquoi valide-t-on $role avec in_array(..., true) alors qu'une simple comparaison === 'admin' pourrait sembler suffire ?
Parce qu'il faut accepter deux valeurs possibles : admin et user. in_array() vérifie que la valeur appartient à cette liste. Avec true, la comparaison est stricte et évite les conversions automatiques de type.
