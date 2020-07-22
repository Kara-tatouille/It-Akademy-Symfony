# Examen Symfony 5 - ItAkademy
  > Pour cet examen, vous devrez créer un projet Symfony incluant toutes les librairies pour une application web (avec l'option --full). Ce projet vous permettra d'appliquer les problèmes posés dans les exercices. Vous rendrez un dossier zippé contenant le projet créé, sans le dossier vendor.
  
  > Votre chef de projet vous propose de créer un prototype pour un projet client. Il s'agit d'une plateforme de location/vente immobilères entre particuliers, Le Bon Appart, qui serait une marketplace pour les utilisateurs qui souhaitent vendre/louer leur appartement, acheter/emprunter une appartement.
### Exercice 1 - CRUD d'annonces immobilières (11 points)
### Exercice 2 - Formulaire de contact (6 points)
> Comme il s'agit d'un concept de projet, votre chef de projet souhaiterait également un formulaire de contact permettant aux utilisateurs de prévenir d'éventuels bugs et aux administrateurs de voir les messages saisis.
### Exercice 3 - Notation globale (3 points)

## Installation du projet :

1. Installer les dépendances avec Composer :
    ```shell script
    composer install
    ```
2. Créer la base de donnée si elle n'existe pas avec la commande suivante :
    ```shell script
    php bin/console doctrine:database:create
    ```
3. Lancer les fixtures pour peupler la base de donnée avec la commande suivante :
    ```shell script
    php bin/console doctrine:fixtures:load
    ```
4. Lancer le serveur local symfony avec le binaire Symfony (https://symfony.com/download)
    ```shell script
    symfony serve
    ```

Voilà ! tout est dit !
