TP 2 - Tableaux et fonctions en PHP
# Activite 1 - Premier tableau PHP
Question 1
Combien d elements contient le tableau ?

Le tableau contient 4 elements.

Question 2
Quel est l indice du premier element ?

L indice du premier element est 0.

Question 3

Quel est l indice du dernier element ?

L indice du dernier element est 3.

Question 4

Que produit echo $etudiants[2] ?

Il affiche Nour.

Question 5

Que se passe-t-il avec $etudiants[4] ?

L indice 4 n existe pas dans le tableau. PHP genere donc un avertissement car cet element n existe pas.

Activite 2 - Parcourir avec for
Question 1

Quel est le role de count() ?

count() permet de connaitre le nombre d elements du tableau.

Question 2

Pourquoi utilise-t-on < et non <= ?

Parce que les indices commencent a 0. Le dernier indice est donc count($etudiants) - 1.

Question 3

Pourquoi ne pas ecrire directement 4 ?

Parce que le nombre d elements du tableau peut changer. count() permet de parcourir automatiquement tous les elements.

Activite 3 - Parcourir avec foreach
Question

Dans quels cas foreach est-il plus pratique que for ?

foreach est plus pratique lorsqu on veut parcourir directement tous les elements d un tableau sans utiliser les indices.

Activite 9 - Premiere fonction
Question 1

Quel est le role du parametre ?

Le parametre permet de transmettre une valeur a une fonction pour qu elle puisse l utiliser.

Question 2

Pourquoi une fonction evite-t-elle de repeter du code ?

Une fonction permet de regrouper un code reutilisable et de l appeler plusieurs fois sans reecrire le meme code.

Activite 10 - Fonction avec return
Question

Quelle est la difference entre une fonction qui utilise echo et une fonction qui utilise return ?

echo affiche directement une valeur.

return renvoie une valeur au programme qui a appele la fonction. Cette valeur peut ensuite etre stockee ou reutilisee.

Activite 14 - Moyenne de la classe
Question 1

Combien de parametres possede la fonction ?

La fonction possede un seul parametre : $etudiants.

Question 2

Que represente $etudiants ?

$etudiants represente le tableau contenant les differents etudiants.

Question 3

Pourquoi utilise-t-on foreach ?

On utilise foreach pour parcourir tous les etudiants du tableau et recuperer leur moyenne.

Question 4

Que retourne la fonction ?

La fonction retourne la moyenne generale de la classe.

Activite 18 - Separer les fonctions
Question 1

Pourquoi separer les fonctions ?

Pour organiser le code, eviter les repetitions et reutiliser facilement les fonctions.

Question 2

Que fait require_once ?

require_once permet d inclure un fichier PHP dans un autre fichier une seule fois.

Question 3

Pourquoi utilise-t-on ../ ?

../ permet de remonter d un dossier dans l arborescence.

Questions de reflexion
Question 1

Pourquoi utiliser un tableau plutot que $etudiant1, $etudiant2, etc. ?

Un tableau permet de regrouper plusieurs etudiants dans une seule structure et de les parcourir facilement avec des boucles.

Question 2

Quelle difference entre $etudiants[0] et $etudiant["nom"] ?

$etudiants[0] permet d acceder au premier element d un tableau indexe.

$etudiant["nom"] permet d acceder a la valeur associee a la cle "nom" dans un tableau associatif.

Question 3

Pourquoi une fonction ameliore-t-elle la reutilisation du code ?

Une fonction permet d utiliser plusieurs fois le meme traitement sans reecrire le code.

Question 4

Quelle difference entre echo et return ?

echo affiche une valeur.

return renvoie une valeur depuis une fonction.

Question 5

Pourquoi separer les fonctions dans un fichier ?

Cela permet de mieux organiser le programme et de reutiliser les fonctions dans plusieurs fichiers PHP.