# exercicePHP

## Sommaire

Objectif(#objectif)
Technologies(#technologies)
Installation(#installation)

## Objectif

Le but de cet exercice est de créer un mini projet utilisant le framework PHP : Symfony, en vue d'une évaluation pour tester nos compétences.
Le projet permet de créer des offres d'emplois par l'intermédiaire de compétences requises, le job recherché, le type de contrat et les candidatures de personnes cherchant à postuler via cette offre.

## Technologies

Ce projet nécessite :

- Le framework PHP : Symfony 4
- L'ORM : Doctrine
- Une base de données : MySQL

Il est préférable d'avoir un outils spécifique pour la console sur le système d'exploitation que vous utilisez, comme par exemple : GitBash

## Installation

Pour récupérer le projet et pouvoir l'utiliser, il est nécessaire de suivre les étapes suivantes :

- Récupérer le dépôt sur GitHub :
$ git clone git@github.com:DylanNoally/exercice.git

Cela créera un dépôt du projet en local sur votre ordinateur.

Utiliser une console de commande pour aller dans le dépôt local et tapez cette commande :
$ cd c:/wamp64/www/exercice

Puis, afin d'installer les composants du projet pour qu'il fonctionne de manière optimal, tapez cette commande :
$ composer install

Une fois la dernière commande totalement exécuté, il vous faudra créer une base de données dans PHPMyAdmin.
Vous pouvez utilisé le nom par défaut : "bd_exercice", soit vous pouvez lui donner un autre nom mais dans ce cas, pensez à modifier le nom de la base de données rattaché au projet dans le fichier .env situé à la racine du projet sur cette ligne :
DATABASE_URL=mysql://root:@127.0.0.1:3306/bd_exercice => nom de la base de donnée

Une fois cette étape franchi, il ne vous reste plus qu'à mettre à jour votre base de données, à l'aide de cette commande :
$ php bin/console doctrine:schema:update --force

Enfin, vous pouvez lancer le projet via cette commande :
$ php bin/console server:run

(Si, votre navigateur par défaut ne s'ouvre pas automatiquement après cette commande, ouvrez une page web et tapez l'URL suivant : "localhost8000").
