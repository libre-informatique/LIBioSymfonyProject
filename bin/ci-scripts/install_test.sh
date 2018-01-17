#!/usr/bin/env bash
set -ev

rm -rf composer.lock # vendor

# composer update --no-interaction --prefer-dist
composer install --no-interaction --prefer-dist


#composer require --no-interaction --dev phpunit/phpunit
#composer require --no-interaction --dev codeception/codeception
#composer require --no-interaction --dev se/selenium-server-standalone


######## LISEM
#nvm use stable

export NVM_DIR="$HOME/.nvm"
set +v
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh" # This loads nvm
set -v

npm install
npm run gulp

# database creation
bin/console doctrine:schema:drop --force --no-interaction  --full-database --env=test     # --full-database drops default + session connections
bin/console doctrine:database:create --if-not-exists --no-interaction --env=test 
bin/console doctrine:schema:create --no-interaction --em=default --env=test 
bin/console doctrine:schema:create --no-interaction --em=session --env=test 
#bin/console doctrine:schema:update --force --no-interaction --env=test 
#bin/console doctrine:schema:validate --no-interaction --env=test 

#bin/console fos:elastica:populate --no-reset --no-interaction --env=test 

# Not needed as it is launch in composer install
#bin/console blast:patchs:apply --no-interaction  --env=test 

# asset and data
#bin/console lisem:install:setup --with-samples --yes --env=test 
bin/console lisem:install:setup --yes --no-interaction --env=test 

# Import City
bin/console blast:import:csv -d vendor/sil-project/platform/src/Sil/Bundle/CRMBundle/Resources/import/cities -m vendor/sil-project/platform/src/Sil/Bundle/CRMBundle/Resources/import/mapping.yml  --env=test 

bin/console blast:patchs:apply  --env=test 
bin/console assets:install  --env=test 
bin/console sylius:theme:assets:install  --env=test # must be done after assets:install 
