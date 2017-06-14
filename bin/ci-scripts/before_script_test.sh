#!/usr/bin/env sh
set -ev

# database creation

bin/console doctrine:database:create --if-not-exists --no-interaction
#bin/console doctrine:schema:create --no-interaction
#bin/console doctrine:schema:update --force --no-interaction
bin/console doctrine:schema:validate --no-interaction

# lisem
bin/console lisem:install:setup --with-samples

# npm
npm install
npm run gulp

# start server
bin/console server:start --no-interaction
