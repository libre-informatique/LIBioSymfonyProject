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

# install nvm
rm -rf $HOME/.nvm
curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.2/install.sh | bash
export NVM_DIR="$HOME/.nvm"

set +ev
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh" # This loads nvm
set -ev

# install node 4.2.6
nvm install 4.2.6
#nvm use stable
npm -v
npm install
#npm install -g gulp-cli
npm run gulp


# build codecept
codecept build

# start server
bin/console server:start --no-interaction




# start fake x
/sbin/start-stop-daemon --start --quiet --pidfile /tmp/xvfb_99.pid --make-pidfile --background --exec /usr/bin/Xvfb -- :99 -ac -screen 0 1680x1050x16
export DISPLAY=:99

# selenium start (after display export)
bin/selenium-server-standalone 

ps -eaf | grep selenium

#wget https://selenium-release.storage.googleapis.com/3.4/selenium-server-standalone-3.4.0.jar
#java -jar selenium-server-standalone-3.4.0.jar &


