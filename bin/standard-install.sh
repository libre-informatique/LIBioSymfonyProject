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

