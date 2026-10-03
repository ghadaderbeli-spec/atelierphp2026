# Question 1 Quelle version d'Ubuntu est installee sur votre machine ?
 la version instalee sur ma machine est :  Ubuntu 24.04.1 LTS
# Question 2  quoi sert la commande apt update ?
Elle sert a mettre a jour les informations concernant les paquets disponibles sur les depots.
# 4.3 Installer PHP
# Questions
# 1. Quelle version de PHP est installee ?
#PHP 8.3.6 (cli) est installee sur la machine.
# Question 2  Que signifie CLI ?
#CLI signifie Command Line Interface ,Cela signifie que PHP peut etre execute directement depuis le terminal.
# Question 3 PHP est-il deja associe  a Apache dans cette installation ?
#Non,dans ce TP, PHP est utilise avec son serveur web integret il n'est pas necessaire d'installer Apache.
# 7.1 Executer directement le programme PHP
# Question 1:  Quel resultat obtenez-vous ?
Le resultat obtenu est :
bonjour php  !
# question 2 Quelle difference observez-vous entre php index.php et l'ouverture de index.php dans un navigateur ?
Avec php index.php le fichier PHP est execute directement dans le terminal et le resultat est affiche dans le terminal
Dans un navigateur le fichier PHP doit etre execute par un serveur PHP afin que le navigateur recoive le resultat genere.
# 8. Activite 5 le serveur integre de PHP
# question 1 : Quel est le role de localhost ?
localhost designe l ordinateur local sur lequel le serveur PHP est execute. Il permet d acceder au serveur depuis le meme ordinateur.

# Question 2 : Que represente le numero 8000 ?
Le numero 8000 represente le port utilise par le serveur PHP pour recevoir les requetes du navigateur.

# Question 3 : Quel programme ecoute sur ce port ?
C est le serveur HTTP integre de PHP qui ecoute sur le port 8000.

# Question 4 : Pourquoi le navigateur ne doit il pas acceder directement au fichier index.php ?
 Le navigateur doit passer par le serveur PHP pour que le code PHP soit interprete et transforme en HTML avant d etre affiche.

# Question 5 : Que se passe t il lorsque vous modifiez index.php puis rechargez la page ?
Le serveur PHP interprete la nouvelle version du fichier index.php et le navigateur affiche le nouveau resultat apres le rechargement de la page.
# 9. Activite 6 Premiere page HTML contenant du PHP
# Question Le code PHP :<?php  echo "<p>Bonjour depuis PHP !</p>";?> apparait-il dans le code source envoye au navigateur ?
Non, le code PHP Bonjour depuis PHP n apparait pas dans le code source envoye au navigateur.
Le serveur PHP execute le code PHP avant de l envoyer au navigateur. Le navigateur recoit seulement le HTML genere par PHP.
# 11. Activitee Les variables PHP
# Question 1 : Faut il declarer explicitement le type de $age ?
Non, PHP determine automatiquement le type de la variable selon la valeur qui lui est affectee.
# Question 2 : Que se passe t il si on ecrit $age = "vingt" ?
La variable $age contient maintenant une chaine de caracteres et non un nombre.
# Question 3 : Une variable PHP peut elle changer de type au cours de l execution ?
Oui, une variable PHP peut changer de type au cours de l execution selon la valeur qui lui est affectee.
# 12. Activite 9 Types de donnees
# Questions Identifier le type de chaque variable.
$nom = "Ahmed" est de type string car il contient du texte.
$age = 20 est de type integer car il contient un nombre entier.
$taille = 1.75 est de type float car il contient un nombre decimal.
$etudiant = true est de type boolean car il contient une valeur vraie ou fausse.
Avec gettype :
gettype($nom) retourne string.
gettype($age) retourne integer.
gettype($taille) retourne double.
gettype($etudiant) retourne boolean.
# Activite 15 premiere interaction avec une page web
# Question 1 : Que contient $_GET ?
$_GET contient les donnees envoyees par le navigateur avec la methode GET.
# Question 2 : Pourquoi utilise t on $_GET['nom'] ?
On utilise $_GET['nom'] pour recuperer la valeur envoyee par le champ qui a name="nom".
# Question 3 : Quel rapport existe entre name="nom" et $_GET['nom'] ?
name="nom" donne le nom du champ. Ce meme nom permet a PHP de recuperer sa valeur avec $_GET['nom'].
# Question 4 : Que se passe t il si l utilisateur ne saisit aucun nom ?
Le champ nom est vide. PHP recupere une valeur vide et affiche Bonjour !.
# Activite 17 Comprendre le cycle requete/reponse
# Etape 1 : completer le schema

Navigateur
    |
    | 1. Requete HTTP
    v
Serveur PHP
localhost:8000
    |
    | 2. Execution du code PHP
    v
Code PHP
    |
    | 3. Generation du HTML
    v
HTML genere
    |
    | 4. Reponse HTTP
    v
Navigateur
# Question 
# 1. Qui execute le code PHP ?
Le code PHP est execute par le serveur PHP.
# 2. Qui interprete le HTML ?
Le HTML est interprete et affiche par le navigateur.
# 3. Le navigateur execute-t-il PHP ?
Non. Le navigateur n execute pas PHP. Le PHP est execute par le serveur, puis le navigateur recoit le HTML genere.
# 4. Pourquoi PHP est-il qualifie de langage cote serveur ? 
PHP est qualifie de langage cote serveur car son code est execute sur le serveur avant d envoyer le resultat au navigateur.
# 5. Quelle est la difference entre le role de PHP et celui de JavaScript dans une application web ?
PHP est principalement execute cote serveur pour traiter les donnees et generer du HTML. JavaScript est principalement execute cote client, dans le navigateur, pour rendre la page interactive et dynamique.
