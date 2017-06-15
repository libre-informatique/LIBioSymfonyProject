#!/usr/bin/env sh
set -ev

# database creation

bin/console doctrine:database:create --if-not-exists --no-interaction
bin/console doctrine:schema:create --no-interaction
#bin/console doctrine:schema:update --force --no-interaction
#bin/console doctrine:schema:validate --no-interaction

# lisem
bin/console lisem:install:setup --with-samples --yes

# npm
npm -v
. $HOME/.nvm/nvm.sh
nvm install stable
nvm use stable
npm -v
npm install
#npm install -g gulp-cli
npm run gulp

# start server
bin/console server:start --no-interaction
