#!/usr/bin/env sh
set -ev

mkdir --parents "${HOME}/bin"

# Ugly hack
echo "memory_limit=-1" >> ~/.phpenv/versions/$(phpenv version-name)/etc/conf.d/travis.ini

# composer update --no-interaction --prefer-dist
composer install --no-interaction --prefer-dist
composer require --no-interaction --dev phpunit/phpunit
#composer update --no-interaction "blast-project/*" 
#composer update --no-interaction "libre-informatique/*"


#composer require --no-interaction --dev codeception/codeception


php_ver=$(php -v |cut -f 2 -d ' ' |cut -f1-2 -d '.' | head -n 1)

if [ ${php_ver} = "5.6" ]
then
    #http://codeception.com/php5/codecept.phar
    wget "http://codeception.com/releases/2.3.1/php54/codecept.phar"  --output-document="${HOME}/bin/codecept"
else
    wget "http://codeception.com/codecept.phar"  --output-document="${HOME}/bin/codecept"
fi

chmod u+x "${HOME}/bin/codecept"

# Coveralls client install
wget https://github.com/satooshi/php-coveralls/releases/download/v1.0.1/coveralls.phar --output-document="${HOME}/bin/coveralls"
chmod u+x "${HOME}/bin/coveralls"


# for selenium
sudo apt-get install xvfb
sudo apt-get install chromium-browser


#wget http://chromedriver.storage.googleapis.com/2.12/chromedriver_linux64.zip
#wget http://chromedriver.storage.googleapis.com/2.29/chromedriver_linux64.zip
wget http://chromedriver.storage.googleapis.com/2.32/chromedriver_linux64.zip
unzip chromedriver_linux64.zip
mv chromedriver ${HOME}/bin/

composer require --no-interaction --dev se/selenium-server-standalone '^3.5'

chromium-browser --version
chromedriver --version

# npm
npm -v

# install nvm
rm -rf $HOME/.nvm
rm -rf $HOME/.npm
curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.2/install.sh | bash
export NVM_DIR="$HOME/.nvm"

set +v
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh" # This loads nvm
set -v

# install node 4.2.6
nvm install 4.2.6


nvm --version
npm -v

which npm
