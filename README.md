# Test technique Kevin PARLY
## Introduction
*Je n'ai pas pu installer Docker sur mon ordinateur personnel, malgré plusieurs essaye avec différentes méthodes, j'ai donc écrit une docker que je n'ai pas pu tester mais qui répond au besoin de mon projet.*
## Docker:
 1) Pour build les conteneurs Docker: `docker-compose build`
 2) Lancer les conteneurs en arrière-plan: `docker-compose up -d`
## Base de données : 
 3) Création de la base de données : `php bin/console doctrine:database:create`
 4) Mise en place modèle de données : `php bin/console doctrine:migration:migrate`
 5) Ajout des données de test : `php bin/console doctrine:fixtures:load`