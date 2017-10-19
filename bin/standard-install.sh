#!/bin/bash

# postgres 
psql -c "CREATE USER lisem_user WITH PASSWORD 'lisem';" -U postgres
psql -c 'ALTER ROLE lisem_user WITH CREATEDB;' -U postgres

psql -c 'CREATE DATABASE lisem;' -U postgres
psql -c 'ALTER DATABASE lisem OWNER TO lisem_user' -U postgres

psql -c 'CREATE EXTENSION "uuid-ossp";' -U postgres -d lisem


composer install --no-interaction
bin/console doctrine:schema:create --no-interaction
bin/console lisem:install:setup --with-samples --yes
bin/console librinfo:patchs:apply
bin/console assets:install
bin/console sylius:theme:assets:install # must be done after assets:install
npm install
npm run gulp

bin/console server:stop
bin/console cache:clear
bin/console server:start --no-interaction

# optional for database translation
./bin/console lexik:translations:import BlastOuterExtensionBundle
./bin/console lexik:translations:import BlastBaseEntitiesBundle
./bin/console lexik:translations:import BlastUtilsBundle
./bin/console lexik:translations:import BlastDoctrinePgsqlBundle
./bin/console lexik:translations:import BlastDoctrineSessionBundle
./bin/console lexik:translations:import LibrinfoDecoratorBundle
./bin/console lexik:translations:import LibrinfoCRMBundle
./bin/console lexik:translations:import SonataSyliusUserBundle
./bin/console lexik:translations:import LibrinfoVarietiesBundle
./bin/console lexik:translations:import LibrinfoSeedBatchBundle
./bin/console lexik:translations:import LibrinfoEmailBundle
./bin/console lexik:translations:import LibrinfoEmailCRMBundle
./bin/console lexik:translations:import LibrinfoMediaBundle
./bin/console lexik:translations:import LibrinfoEcommerceBundle
./bin/console lexik:translations:import AppBundle

# optional to reset db
bin/console doctrine:schema:drop --force --no-interaction
bin/console doctrine:schema:create --no-interaction
bin/console lisem:install:setup --with-samples --yes

# option to update composer.lock
composer update; git commit composer.lock -m 'Update Version';  git push
