# Burger Quiz 

####

    Je rendre un jeux de quiz en ligne pour cette projet. Vous pouvez joue en tant que invite.

* Jouabilite en tant que invite

    * Il n'a pas acces a scoreboard

    * Il n'a pas acces aussi a username

    * Pas necessaire de se connecter pour jouer
    
* Jouabilite en se connectent 

    * Il a acces a scoreboard

    * Il a acces aussi a username

    * Pas necessaire de se connecter pour jouer

* Gameplay

    * Chaque bonne reponse t'ajoute plus un.

    * Chaque bonne reponse t'enleve moins un.

## Guide pour instalations:

####
    Etape 1: Acceder a phpmyadmin est creer la basse de donne qui s'appele quiz.
####
    Etape 2: Recuper le fichier sql dans Core/App/Database/Sql et mise en dans la base de donnée.
####
    Etape 3: Changer la config de base de donnée dans Core/App/Database/Config.
####
    Etape 4: Vous pouvez vous connecte en tant que admin utilisateur:admin mot de passe: admin.

## Démarche professionnelle: 

* ### Les difficultés rencontrées:  
    
    * Une probleme de autoload qui ne charge pas les classes.
    * Probleme de logique pour additionner les point si la reponse est bonne
    * Pas de temps pour utilisation de framework.
    * Pas de temps pour le design.

* ### Solutions:  

    * Probleme de notation corrige
    * Creation d'une controller pour additionner les point si la reponse est bonne
    * Utilisation de MVC
    * Utilisation de Bootstrap

####
    Utilisation de mvc avec du bootstrap et mariadb.