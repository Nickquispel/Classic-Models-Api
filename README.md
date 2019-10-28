# Classic-models-api

## Installeren van de framework
https://api-platform.com/docs/distribution/#validating-data

Bash:
* mkdir classic-models-api
* cd classic-models-api
* composer create-project symfony/skeleton .
* composer req api

pas de .env file aan:
DATABASE_URL=mysql://xsarus:xsarus@mysql57-2:3306/classicmodels

controleer of de verbinding met de datbase in orde is door de volgende bash commando te proberen:

* php bin/console doctrine:schema:update --force

de classicmodels is de example database van de opdracht waarvan wij informatie gaan ophalen om vervolgens in Magento te plaatsen.

## Op basis van bestaande database PHP classes + getters en setters genereren
https://symfony.com/doc/current/doctrine/reverse_engineering.html

### genereren van PHP classes + getters & setters op basis van database

Bash commando
* php bin/console doctrine:mapping:import "App\Entity" annotation --path=src/Entity

Deze klassen bevatten de variabelen, alleen niet de getters/setters. Deze kun je krijgen door de volgende commando:
* php bin/console make:entity --regenerate App 

hiervoor heb je wel de de maker-bundle nodig:
* composer require symfony/maker-bundle --dev

Indien je een php server hebt gestart (* php -S localhost:8888 -t public/) kun je naar het volgende adres gaan:
localhost:8888/api




~ F I N ~