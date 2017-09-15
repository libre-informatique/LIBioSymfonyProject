#!/usr/bin/env sh
set -ev

######## LISEM
# database creation
bin/console doctrine:database:create --if-not-exists --no-interaction
bin/console doctrine:schema:create --no-interaction
#bin/console doctrine:schema:update --force --no-interaction
#bin/console doctrine:schema:validate --no-interaction

# lisem
bin/console lisem:install:setup --with-samples --yes
bin/console librinfo:patchs:apply
bin/console assets:install
bin/console sylius:theme:assets:install # must be done after assets:install


#nvm use stable

export NVM_DIR="$HOME/.nvm"
set +v
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh" # This loads nvm
set -v

npm -v
npm install
#npm install -g gulp-cli
npm run gulp


# start server
bin/console server:start --no-interaction


######### TOOLS

# start fake x
/sbin/start-stop-daemon --start --quiet --pidfile /tmp/xvfb_99.pid --make-pidfile --background --exec /usr/bin/Xvfb -- :99 -ac -screen 0 1680x1050x16
export DISPLAY=:99

# selenium start (after display export)
#/sbin/start-stop-daemon --start --quiet --pidfile /tmp/selenium.pid --make-pidfile --background --exec $(pwd)/bin/selenium-server-standalone 

# check java version
java -version

sel_start_date=$(date)
bin/selenium-server-standalone -debug > selenium.log 2>&1  &
# -debug true

set +e
while [ $(netstat -an | grep LISTEN | grep 4444| wc -l) -eq 0 ]
do
    echo $(date) " wait for selenium start... (since " $sel_start_date ")";
    ps -eaf | grep selenium;
    netstat -an | grep LISTEN | grep 4444;
    sleep 10;
done

echo $(date) " it look like selenium is started (waiting since " $sel_start_date ")";



#wget https://selenium-release.storage.googleapis.com/3.4/selenium-server-standalone-3.4.0.jar
#java -jar selenium-server-standalone-3.4.0.jar &



